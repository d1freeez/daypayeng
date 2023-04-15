<template>
    <div>
        <div class="header">
            <div class="container">
                <h1>FAQ</h1>
            </div>
            <div class="__path">
                <ul>
                    <li><nuxt-link to="/">Main</nuxt-link></li>
                    <li><span>/</span></li>
                    <li><nuxt-link to="/question">FAQ</nuxt-link></li>
                    <li><span>/</span></li>
                    <li><a>For employee</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <h3>Do you have a question?</h3>
                <p>Here are our FAQs to help you further, however, if we missed something you want to know, contact us below or contact us here.</p>

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
