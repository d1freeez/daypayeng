<template>
    <div>
        <div class="footer -black" :class="mobile==true?'footer-mobile':''">
            <div class="container">
                <div class="__social -mobile">

                    <div class="__call">
                        <div class="img">
                            <img src="/images/icons/call.svg" alt="">
                        </div>
                        <a href="tel:+77478884957">+7(747)888-49-57</a>
                    </div>
                    <div class="__call">
                        <div class="img">
                            <img src="/images/icons/mess.svg" alt="">
                        </div>
                        <a href="mailto:info@daypay.kz">info@daypay.kz</a>
                    </div>
                </div>

                <div class="__social -desktop">
                    <div class="__social_list">
                        <div class="__call">
                            <div class="img">
                                <img src="/images/icons/call.svg" alt="">
                            </div>
                            <a href="tel:+77478884957">+7(747)888-49-57</a>
                        </div>
                        <div class="__call">
                            <div class="img">
                                <img src="/images/icons/mess.svg" alt="">
                            </div>
                            <a href="mailto:info@daypay.kz">info@daypay.kz</a>
                        </div>
                    </div>
                </div>

                <div class="__list">
                    <div class="row">
                        <div class="col-md-3">
                            <ul>
                                <li>
                                    <a href="/">Главная</a>
                                </li>
                                <li><a href="/#what_is__section">О компании</a></li>
                                <li><a href="/legal-data">Юридические данные</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <p>Работнику</p>
                                <li>
                                    <a href="/#form">Приведи работодателя</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <p>Работодателю</p>
                                <li><a href="/#form">Зарегистрироваться</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <p>Часто задаваемые вопросы</p>
                                <li>
                                    <a href="/question">Работник</a>
                                </li>
                                <li>
                                    <a href="/question">Работодатель</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="__copyright">
                <div class="container">
                    <p>«DayPay Limited | All rights reserved»</p>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: "main-footer",
    props: ['mobile']
}
</script>

<style scoped>

</style>
