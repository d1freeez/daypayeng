<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>Web2Cash | {{$title}} </title>
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
{{--		<link href="/css/app.css" rel="stylesheet" type="text/css" />--}}
<!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(56822071, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/56822071" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/images/logo/favicon.png"/>


    <style>
        input {
            background: #fff !important;
        }

        .register-back {
            position: absolute;
            top: 39px;
            left: 39px;
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"
    style="background-color: #fff;">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div
            class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

            <!--begin::Aside-->
            <div
                class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside kt-hidden-mobile"
                style="background-image: url(/images/banner/login-banner.png); background-position:center;">
                <div class="kt-grid__item">
                    <a href="https://Web2Cash.kz/" class="kt-link kt-link--state kt-link--danger kt-font-bolder">
                        <img src="/images/logo/logo-white.png" style="width: 175px;">
                    </a>
                </div>
            </div>

            <!--begin::Aside-->

            <!--begin::Content-->
            <div
                class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper position-relative"
                style="background: rgba(9, 179, 239, 0.05)">
                <!--begin::Body-->
                <div class="kt-login__body">
                    <a href="{{ route('login') }}"
                       class="btn btn-primary btn-elevate kt-login__btn-primary kt-hidden-mobile position-absolute register-back">
                        <img src="/admin-assets/media/icons/svg/Navigation/Left-2-w.svg"/> {{ __('auth.back') }}</a>

                    <!--begin::Signin-->
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <h3>{{ __('auth.employer_registration') }}</h3>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form" action="{{ route('register.store') }}" method="POST">
                            <div class="form-group mb-3 @error('name') validated @enderror">
                                <label for="register_name">{{ __('table.company_name') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                       placeholder="Example company name" id="register_name" name="name"
                                       autocomplete="off">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 @error('bin') validated @enderror">
                                <label for="register_bin">{{ __('table.bin') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('bin') is-invalid @enderror" type="text"
                                       placeholder="123456789101" name="bin" id="register_bin" autocomplete="off"
                                       maxlength="12">
                                @error('bin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 @error('rg_date') validated @enderror">
                                <label for="register_rg_date">{{ __('table.registration_date') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('rg_date') is-invalid @enderror" type="date"
                                       name="rg_date" id="register_rg_date">
                                @error('rg_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 @error('full_name') validated @enderror">
                                <label for="register_full_name">{{ __('table.full_name') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('full_name') is-invalid @enderror"
                                       id="register_full_name" type="text"
                                       placeholder="Jhon Doe" name="full_name">
                                @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 @error('email') validated @enderror">
                                <label for="register_email">{{ __('table.email') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('email') is-invalid @enderror" id="register_email"
                                       type="email" placeholder="example@mail.ru" name="email">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <span class="form-text text-muted">{{ __('auth.after_registration_send') }}</span>
                            </div>
                            <div class="form-group mb-3 @error('email') validated @enderror">
                                <label for="register_password">{{ __('auth.password') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('email') is-invalid @enderror" id="register_password"
                                       type="password" placeholder="********" name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 @error('email') validated @enderror">
                                <label for="register_password_confirmation">{{ __('auth.password_confirmation') }} <span
                                        class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                       id="register_password_confirmation" type="password" placeholder="********"
                                       name="password_confirmation">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="register_employees_count @error('employees_count') validated @enderror">
                                    {{ __('auth.employee_count') }}
                                </label>
                                <input class="form-control @error('employees_count') is-invalid @enderror"
                                       id="register_employees_count" type="number" name="employees_count">
                                @error('employees_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group @error('accept_policy') validated @enderror">
                                <div class="kt-checkbox-list">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="accept_policy"
                                               class="@error('accept_policy') is-invalid @enderror">
                                        {{ __('auth.i_give') }}
                                        <a href="https://paydayservice.kz/main/offers/show/2" target="_blank">
                                            <b>{{ __('auth.consent_personal_data') }}</b>
                                        </a> {{ __('auth.and_accept') }}
                                        <a href="https://paydayservice.kz/main/offers/show/3" target="_blank">
                                            <b>
                                                {{ __('auth.privacy_policy') }}
                                            </b>
                                        </a>
                                        {{ __('auth.and') }}
                                        <a href="https://paydayservice.kz/main/offers/show/1" target="_blank">
                                            <b>{{ __('auth.public_offer') }}.</b>
                                        </a>
                                        <span></span>
                                        @error('accept_policy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </label>
                                </div>
                            </div>
                        @csrf

                        <!--begin::Action-->
                            <div class="kt-login__actions">
                                <a href="{{ route('login') }}" class="kt-link kt-login__link-forgot">
                                    {{ __('auth.login') }}
                                </a>
                                <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">
                                    {{ __('auth.register') }}
                                </button>
                            </div>

                            <!--end::Action-->
                        </form>

                        <!--end::Form-->
                    </div>

                    <!--end::Signin-->
                </div>

                <!--end::Body-->
            </div>

            <!--end::Content-->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "linear-gradient(to right, #09b3ef 0%, #1e50e2 51%, #09b3ef 100%)",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

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
