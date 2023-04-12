<template>
    <div>
        <div class="modal" :class="modal ? 'open': ''">
            <div class="modal-block">
                <div class="__close" @click="modal = false">
                    <i class="fa fa-times"></i>
                </div>
                <div class="__img">
                    <img src="/images/smart.png" alt="">
                </div>

                <h3>Добро пожаловать в DayPay!</h3>
                <p>Выберите интересующий вас раздел</p>
                <div class="row">
                    <div class="col-md-6" @click="modal = false">
                        <nuxt-link to="/" class="btn btn-blue">Работникам</nuxt-link>
                    </div>
                    <div class="col-md-6" @click="modal = false">
                        <nuxt-link to="/employer" class="btn btn-blue">Работодателям</nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "modal-select",

        data() {
            return{
                modal: false
            }
        },

        mounted() {
            if(localStorage.getItem('modal')){
                this.modal = false
            }else{
                localStorage.setItem('modal', true);
                this.modal = true
            }
        }
    }
</script>

<style scoped>

</style>
