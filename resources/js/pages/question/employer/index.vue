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
                    <li><a>Для работодателей</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <h3>Есть вопрос?</h3>
                <p>Вот наши часто задаваемые вопросы, чтобы помочь вам в дальнейшем, однако, если мы пропустили то, что вы хотите знать, свяжитесь с нами ниже или свяжитесь с нами здесь.</p>

                <div class="question_list row">
                    <div class="col-md-6" v-for="emp of employer">
                        <nuxt-link :to="'/question/employee/' + emp.id">
                            <div class="question-card ">
                                <h4>{{ emp.title }}</h4>
                            </div>
                        </nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",

        data(){
            return {
                employer: null
            }
        },

        async mounted() {
            await this.$axios.$get('https://dashboard.paydayservice.kz/api/faq/parent')
                .then(data => {
                    this.employer = data
                })
                .catch(err => {
                    console.error(err.message);
                });
        }
    }
</script>

<style scoped>

</style>
