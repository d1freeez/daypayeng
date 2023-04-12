<template>
    <div>
        <div class="footer -black" :class="mobile==true?'footer-mobile':''">
            <div class="container">
                <div class="__social -mobile">

                    <div class="__call">
                        <div class="img">
                            <img src="/images/icons/call.svg" alt="">
                        </div>
                        <a href="tel:+77478884957">+123</a>
                    </div>
                    <div class="__call">
                        <div class="img">
                            <img src="/images/icons/mess.svg" alt="">
                        </div>
                        <a href="mailto:info@daypay.kz">info@wage2.cash</a>
                    </div>
                </div>

                <div class="__social -desktop">
                    <div class="__social_list">
                        <div class="__call">
                            <div class="img">
                                <img src="/images/icons/call.svg" alt="">
                            </div>
                            <a href="tel:+77478884957">+123</a>
                        </div>
                        <div class="__call">
                            <div class="img">
                                <img src="/images/icons/mess.svg" alt="">
                            </div>
                            <a href="mailto:info@daypay.kz">info@wage2.cash</a>
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
                                <li><a href="/#what_is__section">About us</a></li>
                                <li><a href="/legal-data">Legal information</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <p>To the employee</p>
                                <li>
                                    <a href="/#form">Bring your employer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <p>To the Employer</p>
                                <li><a href="/#form">Sign up</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <p>FAQ</p>
                                <li>
                                    <a href="/question">Employee</a>
                                </li>
                                <li>
                                    <a href="/question">Employer</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="__copyright">
                <div class="container">
                    <p>«Wage2Cash Limited | All rights reserved»</p>
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
