<template>
    <div>
        <div class="login__section">
            <div class="login__header">
                <div class="login__header_left">
                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.25 7.27441L16.25 7.27441" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M7.2998 13.2988L1.2498 7.27476L7.2998 1.24976" stroke="white" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <a href="http://wage2.cash/">
                        <img src="/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login__header_right">
                    <div class="login__header_right_left -desktop">
                    </div>
                    <div class="login__header_right_right -desktop">
                        <a href="#"> No account?</a>
                        <a href="#"> Employer registration</a>
                    </div>
                    <div class="login__header_right_right -mobile">
                        <router-link to="'/'">
                            Войти
                            <svg width="17" height="20" viewBox="0 0 17 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_188:514" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="12"
                                      width="17" height="8">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M0.5 12.4961H16.3399V19.8701H0.5V12.4961Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_188:514)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.421 13.9961C4.16 13.9961 2 14.7281 2 16.1731C2 17.6311 4.16 18.3701 8.421 18.3701C12.681 18.3701 14.84 17.6381 14.84 16.1931C14.84 14.7351 12.681 13.9961 8.421 13.9961ZM8.421 19.8701C6.462 19.8701 0.5 19.8701 0.5 16.1731C0.5 12.8771 5.021 12.4961 8.421 12.4961C10.38 12.4961 16.34 12.4961 16.34 16.1931C16.34 19.4891 11.82 19.8701 8.421 19.8701Z"
                                          fill="white"/>
                                </g>
                                <mask id="mask1_188:514" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="3" y="0"
                                      width="11" height="11">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.10986 0H13.7299V10.6186H3.10986V0Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask1_188:514)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.42089 1.42751C6.27989 1.42751 4.53789 3.16851 4.53789 5.30951C4.53089 7.44351 6.25989 9.18351 8.39189 9.19151L8.42089 9.90551V9.19151C10.5609 9.19151 12.3019 7.44951 12.3019 5.30951C12.3019 3.16851 10.5609 1.42751 8.42089 1.42751ZM8.42089 10.6185H8.3889C5.4669 10.6095 3.09989 8.22651 3.10989 5.30651C3.10989 2.38151 5.49189 -0.000488281 8.42089 -0.000488281C11.3489 -0.000488281 13.7299 2.38151 13.7299 5.30951C13.7299 8.23751 11.3489 10.6185 8.42089 10.6185Z"
                                          fill="white"/>
                                </g>
                            </svg>
                        </router-link>


                    </div>
                </div>
            </div>


            <div class="login__block">
                <div class="login__left">
                </div>
                <div class="login__right">
                    <form class="login__form">
                        <div class="login__form_title">
                            Logging into your account
                        </div>
                        <div class="login__form_input">
                            <img src="/images/icons/ic-login-message.svg"> <input placeholder="Email">
                        </div>
                        <div class="login__form_input">
                            <img src="/images/icons/ic-login-password.svg"> <input placeholder="Password" type="password">
                            <img src="/images/icons/ic-login-glass.svg">
                        </div>
                        <div>
                            <button class="login__form_btn">Sign in</button>
                        </div>
                        <div class="login__form__forget">
                            <router-link :to="'/forget'">Forgot your password?</router-link>
                        </div>

                    </form>


                </div>
                <div class="login__footer">
                    <router-link to="'/'">No account?</router-link>
                    <router-link to="'/'"> Employer registration</router-link>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
import $ from "jquery";
import 'swiper/swiper.scss'

export default {
    layout: 'login',
    data() {
        return {}
    },

    components: {},
    mounted() {

    },
}
</script>
<style>

</style>
