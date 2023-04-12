<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>DayPay | {{ $title }}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700", "Comfortaa:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="/admin-assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets//app/custom/wizard/wizard-v2.default.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="/admin-assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="/admin-assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    @toastr_css
    <link href="/admin-assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="/admin-assets/demo/demo7/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/images/logo/favicon.png" />
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(56822071, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/56822071" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize" style="background: #edeef0;">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="javascript:void(0)">
            <img alt="Logo" src="/images/logo/mobile-logo-black.png" width="90px" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

            <!-- begin:: Brand -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="javascript:void(0)">
                        <img alt="Logo" src="/images/logo/logo-black.png" width="45px" />
                    </a>
                </div>
            </div>

            <!-- end:: Brand -->

            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
                    <ul class="kt-menu__nav ">
                        <li class="kt-menu__item {{ $namespace == 'App\Http\Controllers\Pages\Dashboard' ? 'kt-menu__item--here' : '' }}" id="kt_menu_item1">
                            <a href="{{ route('login') }}" class="kt-menu__link">
                                <i class="kt-menu__link-icon flaticon2-protection"></i>
                                <span class="kt-menu__link-text">Главная</span>
                            </a>
                        </li>
                        <li class="kt-menu__item  {{ $namespace == 'App\Http\Controllers\Pages\AdvanceAccount' ? 'kt-menu__item--here' : '' }}" id="kt_menu_item2">
                            <a href="{{ route('advance-account-list') }}" class="kt-menu__link">
                                <i class="kt-menu__link-icon flaticon-list-1"></i>
                                <span class="kt-menu__link-text">История выплат</span>
                            </a>
                        </li>
                        <li class="kt-menu__item  {{ $namespace == 'App\Http\Controllers\Pages\Lib\Offer' ? 'kt-menu__item--here' : '' }}" id="kt_menu_item2">
                            <a href="{{ route('offer_list_employee') }}" class="kt-menu__link">
                                <i class="kt-menu__link-icon flaticon-file-2"></i>
                                <span class="kt-menu__link-text">Документы</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- end:: Aside Menu -->
        </div>
        <div class="kt-aside-menu-overlay"></div>

        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

                <!-- begin: Header Menu -->
                <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">

                    </div>
                </div>

                <!-- end: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">

                    <!--begin: User bar -->
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                            <span class="kt-header__topbar-icon bg-primary"><i class="flaticon2-user-outline-symbol"></i></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                            <!--begin: Head -->
                            <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
                                <div class="kt-user-card__avatar">
                                    <img class="{{ $user->photo ? '' : 'kt-hidden' }}" alt="Pic" src="/{{ $user->photo ? $user->photo : '' }}" />
                                    <span class="kt-badge kt-badge--username kt-badge--unified-primary kt-badge--lg kt-badge--rounded kt-badge--bold {{ $user->photo ? 'kt-hidden' : '' }} kt-font-transform-u" >{{ $user->first_character }}</span>
                                </div>
                                <div class="kt-user-card__name">
                                    {{ $user->full_name }}
                                </div>
                            </div>

                            <!--end: Head -->

                            <!--begin: Navigation -->
                            <div class="kt-notification">
                                <a href="{{ route('employee_profile_account') }}" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-calendar-3 kt-font-primary"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            Профиль
                                        </div>
                                        <div class="kt-notification__item-time">
                                            Настройки аккаунта и другое
                                        </div>
                                    </div>
                                </a>
                                <div class="kt-notification__custom">
                                    <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-primary">Выйти</a>
                                </div>
                            </div>

                            <!--end: Navigation -->
                        </div>
                    </div>

                    <!--end: User bar -->
                </div>

                <!-- end:: Header Topbar -->
            </div>

            <!-- end:: Header -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="padding-top: 20px;">

                <!-- begin:: Content -->

                <!-- begin:: Content -->
                @yield('content')
                <!-- end:: Content -->

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
                <div class="kt-footer__copyright">
                    2019 © PayDay Service | All rights reserved
                </div>
            </div>

            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->


<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
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
<script src="/admin-assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
@toastr_js
<script src="/admin-assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
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
<script src="/admin-assets/demo/demo7/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="/admin-assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="/admin-assets/app/custom/general/dashboard.js" type="text/javascript"></script>

<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="/admin-assets/app/bundle/app.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/main/main.js" type="text/javascript"></script>
@toastr_render
<!--end::Global App Bundle -->

<!-- begin::Custom js -->
@yield('js')
<!-- end::Custom js -->
<script>
    $('#kt_menu_item1').click(function () {
        $('body').removeClass('kt-aside--on');
        $('#kt_aside').removeClass('kt-aside--on');
    })
    $('#kt_menu_item2').click(function () {
        $('body').removeClass('kt-aside--on');
        $('#kt_aside').removeClass('kt-aside--on');
    })
</script>
</body>

<!-- end::Body -->
</html>
