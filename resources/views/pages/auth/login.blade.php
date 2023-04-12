<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>DayPay | {{$title}} </title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700", "Comfortaa:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->

    <link href="/admin-assets/app/custom/login/login-v1.default.css" rel="stylesheet" type="text/css"/>

    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="/admin-assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"
          type="text/css"/>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="/admin-assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css"
          rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css"
          rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css"/>
    @toastr_css
    <link href="/admin-assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin-assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css"/>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="/admin-assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="/admin-assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/images/logo/favicon.png"/>


    <link href="/fonts/Qanelos/stylesheet.css" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        .d-flex {
            align-items: center;
            justify-content: space-between;
        }

        input {
            background: #fff !important;
        }

        /*.modal-dialog {*/
        /*    top: 50%;*/
        /*    transform: translateY(-50%);*/
        /*}*/
        .login__header_right_right a:hover {
            color: #39AFFD !important;
        }

        body a[href]:hover {
            color: #39AFFD !important;
        }

        .login__header_right_left a[href]:hover{
            color: #fff !important;
        }
    </style>
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"
    style="background-color:#fff;">
<div class="login__section">
    <div class="login__header">
        <div class="login__header_left">
            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.25 7.27441L16.25 7.27441" stroke="white" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M7.2998 13.2988L1.2498 7.27476L7.2998 1.24976" stroke="white" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <a href="/">
                <img src="/images/logo.png" alt="">
            </a>
        </div>
        <div class="login__header_right">
            <div class="login__header_right_left -desktop">
                <a href="/">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="white" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="white"
                              stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Назад</a>
            </div>
            <div class="login__header_right_right -desktop">
                <a href="#"> Нет аккаунта?</a>
                <a href="/employer#form" class="-last"> Регистрация работодателя</a>
            </div>
            <div class="login__header_right_right -mobile">
                <a href="'/'">
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
                </a>


            </div>
        </div>
    </div>


    <div class="login__block">
        <div class="login__left">
            <img src="/images/login-page.png"/>
        </div>
        <div class="login__right">
            <form class="login__form" action="{{ route('login.post') }}" method="POST">
                <div class="login__form_title">
                    Вход в свой аккаунт
                </div>
                <div class="form-group @error('password') validated @enderror ">
                    <div class="login__form_input">
                        <img src="/images/icons/ic-login-message.svg">
                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                               placeholder="Email" name="email">
                    </div>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group  @error('password') validated @enderror">
                    <div class="login__form_input">
                        <img src="/images/icons/ic-login-password.svg"> <input
                            class="form-control @error('password') is-invalid @enderror" type="password"
                            placeholder="{{ __('auth.password') }}" name="password">
                        {{--                    <img--}}
                        {{--                        src="/images/icons/ic-login-glass.svg">--}}
                    </div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @csrf

                <div>
                    <button class="login__form_btn" type="submit">Войти</button>
                </div>
                <div class="login__form__forget">
                    <a href="{{ route('reset_password') }}">Забыли Ваш пароль ?</a>
                </div>

            </form>


        </div>
        <div class="login__footer">
            <router-link to="'/'">Нет аккаунта?</router-link>
            <router-link to="'/'"> Регистрация работодателя</router-link>
        </div>

    </div>
</div>


<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="/admin-assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="/admin-assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-markdown/init.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery-validation/dist/additional-methods.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
@toastr_js
<script src="/admin-assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="/admin-assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="/admin-assets/app/custom/login/login-v1.js" type="text/javascript"></script>

<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="/admin-assets/app/bundle/app.bundle.js" type="text/javascript"></script>
@toastr_render
<!--end::Global App Bundle -->
</body>

<!-- end::Body -->
</html>
