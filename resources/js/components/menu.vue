<template>
    <div>
        <div class="menu">
            <div class="container">
                <div class="nav-menu">
                    <div class="nav-icon" :class="[menu ? 'open': '',cabinet ? 'mobile-d-none':'']"
                         @click="menuToggle()"
                    >
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="__logo">
                        <template v-if="cabinet">
                            <a href="/dashboard/redirect">
                                <img src="/images/logo.png" alt="">
                            </a>
                        </template>
                        <template v-else="">
                            <a href="/">
                                <img src="/images/logo.png" alt="">
                            </a>
                        </template>
                    </div>
                    <div class="__list" v-if="!cabinet">
                        <ul v-if="type_link=='a'">
                            <li>
                                <a href="/">
                                    For employee
                                </a>
                            </li>
                            <li>
                                <a href="/employer">
                                    For employer
                                </a>
                            </li>
                            <li class="animation_scroll">
                                <a href="/#form">Bring your employer</a>
                            </li>
                            <li>
                                <a href="/question">FAQ</a>
                            </li>
                        </ul>
                        <ul v-else="">
                            <li>
                                <router-link to="/">
                                    For employee
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/employer"
                                >
                                    For employer
                                </router-link>
                            </li>
                            <li class="animation_scroll">
                                <a href="#form">Bring your employer</a>
                            </li>
                            <li>
                                <router-link to="/question">FAQ</router-link>
                            </li>
                        </ul>
                    </div>

                    <div class="__login">
                        <template v-if="user">
                            <a-dropdown :placement="'bottomCenter'">
                                <a-button>{{ user.name }} <img src="/images/icons/avatar.svg"/>
                                </a-button>
                                <a-menu slot="overlay">
                                    <a-menu-item>
                                        <template v-if="!backlink">
                                            <a href="/dashboard/redirect"
                                            >Dashboard</a
                                            >
                                        </template>
                                        <template v-else="">
                                            <a href="/employee/profile"
                                            >Account settings</a
                                            >
                                        </template>
                                    </a-menu-item>
                                    <a-menu-item>
                                        <a href="#" @click="showModal"
                                        >Support team</a
                                        >
                                    </a-menu-item>
                                    <a-menu-item>
                                        <a href="/question"
                                        >F.A.Q.</a
                                        >
                                    </a-menu-item>
                                    <a-menu-item>
                                        <a href="/logout"
                                        >Exit</a
                                        >
                                    </a-menu-item>
                                </a-menu>
                            </a-dropdown>
                        </template>
                        <template v-else="">
                            <a href="/login" class="btn btn-blue mini">Войти
                                <img src="/images/icons/avatar.svg">
                            </a>
                        </template>

                    </div>
                </div>
            </div>
        </div>
        <div class="side-menu" :class="menu ? 'active': ''">
            <div class="__list">
                <div class="__list_in">
                    <div class="nav-icon" :class="menu ? 'open': ''" @click="menuToggle()">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="__logo">
                        <a href="/">
                            <img src="/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <ul>
                    <li @click="menuToggle()">
                        <a href="/">Employee</a>
                    </li>
                    <li @click="menuToggle()">
                        <a href="/employer">Employer</a>
                    </li>
                    <li @click="menuToggle()" class="animation_scroll">
                        <a href="/#form">Bring your employer</a>
                    </li>
                    <li @click="menuToggle()">
                        <a href="/question">FAQ</a>
                    </li>
                    <li>
                        <template v-if="user">
                            <a href="/dashboard/redirect">{{ user.s_name + " " + user.name }}</a>
                        </template>
                        <template v-else="">
                            <a href="/login">Sign in</a>
                        </template>
                    </li>
                </ul>
            </div>
        </div>
        <a-modal
            title="Support team"
            :visible="visible"
            :confirm-loading="confirmLoading"
            @ok="handleOk"
            :okText="'Send'"
            @cancel="handleCancel"
        >
            <div class="cabinet__card_input"><input v-model="form.title" required placeholder="Title"></div>
            <div class="cabinet__card_input"><textarea v-model="form.description" required
                                                       placeholder="Description"></textarea>
            </div>

            <p>{{ ModalText }}</p>
        </a-modal>

    </div>
</template>

<script>
import $ from 'jquery'

$(document).ready(function () {
    $('.nav-icon').click(function () {
        $('.nav-icon').toggleClass('open');
        $('.side-menu').toggleClass('active');
    });

    $(document).scroll(function () {
        if ($(this)[0].scrollingElement.scrollTop > 0) {
            $('.menu').addClass('active')
        } else {
            $('.menu').removeClass('active')
        }
    });
    $(".animation_scroll a").click(function (e) {
        if ($(location).attr('pathname') == '/question') {
            window.location.href = "/#form";
        }
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset().top}, 'slow');
    });
});
export default {
    name: "menu-block",
    props: ['user', 'type_link', 'backlink', 'cabinet'],
    data() {
        return {
            menu: false,
            ModalText: 'Content of the modal',
            visible: false,
            confirmLoading: false,
            form: {
                'title': '',
                'description': '',
                // 'user_id': this.user != 'underfined' ? this.user.id : '',
            }
        }
    },
    methods: {
        showModal() {
            this.visible = true;
        },
        handleOk(e) {
            let app = this;
            app.confirmLoading = true;
            if (this.user != 'underfined' && this.user != null) {
                app.form.user_id = this.user.id;
            }


            axios.post('/api/feedback/store', app.form).then(function (response) {
                app.form.title = '';
                app.form.description = '';
                app.$notification.success({
                    message: 'Служба поддержки',
                    description: response.data.message,
                })
                app.visible = false;
                app.confirmLoading = false;
            }).catch(function (error) {
                if (error.response.status == 422) {
                    app.$notification.error({
                        message: 'Форма',
                        description: error.response.data.message,
                    })
                    // this.visible = false;

                }
                app.confirmLoading = false;
            })


            // setTimeout(() => {

            // }, 2000);
        },
        handleCancel(e) {
            console.log('Clicked cancel button');
            this.visible = false;
        },
        menuToggle() {
            this.menu = !this.menu
        }
    }
}
</script>

<style scoped>

</style>
