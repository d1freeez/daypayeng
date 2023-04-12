<template>
    <div>
        <div class="header">
            <div class="container">
                <h1>ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</h1>
            </div>
            <div class="__path">
                <ul>
                    <li><nuxt-link to="/">Главная</nuxt-link></li>
                    <li><span>/</span></li>
                    <li><nuxt-link to="/question">Часто задаваемые вопросы</nuxt-link></li>
                    <li><span>/</span></li>
                    <li><a>Для работников</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <h3>Есть вопрос?</h3>
                <p>Вот наши часто задаваемые вопросы, чтобы помочь вам в дальнейшем, однако, если мы пропустили то, что вы хотите знать, свяжитесь с нами ниже или свяжитесь с нами здесь.</p>

                <div class="accordion">
                    <div class="__block" v-for="r of data">
                        <h3 class="trigger" :data-count="r.id">{{r.question}}</h3>

                        <div class="accordion-body" :class="'trigger_' + r.id">
                            <p v-html="r.answer"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from "jquery";

    export default {
        name: "index",
        data() {
            return{
                data: []
            }
        },

        async mounted() {
            await this.$axios.$get('https://dashboard.paydayservice.kz/api/faq/' + this.$route.params.id)
                .then(data => {
                    this.data = data
                })
                .catch(err => {
                    console.error(err.message);
                });

            $('.trigger').click(function(){
                $('.trigger_' + $(this).data('count')).slideToggle('slow');
            })
        }
    }
</script>

<style scoped>

</style>
