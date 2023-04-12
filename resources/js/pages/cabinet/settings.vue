<template>
    <div>
        <div class="container">
            <div class="cabinet__settings_block">
                <div class="cabinet__settings_title">Настройка аккаунта <img src="/images/icons/ic-lb-user.png"></div>
                <div class="cabinet__settings_form">
                    <div class="cabinet__settings_form_title">Enter your account information</div>
                    <div>
                        <input placeholder="Full Name*">
                    </div>
                    <div>
                        <input placeholder="Email* ">
                    </div>
                    <div>
                        <input placeholder="Password* ">
                    </div>
                    <div class="cabinet__settings_warning">
                        If you do not want to change the password, leave the field blank.
                    </div>

                </div>
                <button class="cabinet__settings_btn">
                    Сохранить
                    <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 1L8.5 8L1.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                </button>

            </div>

        </div>
        <cabinet-footer></cabinet-footer>
    </div>
</template>

<script>
import cabinetfooter from '~/components/cabinet-footer.vue'

export default {
    data() {
        return {}
    },

    components: {'cabinet-footer': cabinetfooter},
    mounted() {

    },
}
</script>
<style>

</style>
