<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>DayPay | {{ $title }} </title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts -->

    <script src="/admin-assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700", "Comfortaa:300,400,500,600,700", "Open+Sans:300,400,600,700,800"]},
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
{{-- <link href="/admin-assets/vendors/custom/filepond/filepond.css" rel="stylesheet"> --}}
{{--    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">--}}
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="/admin-assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="/admin-assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css" />

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

    @yield('css')
</head>
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed">

@include('_include.header_mobile')
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('_include.sidebar')
        @include('_include.header')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                @yield('content')
            </div>
            @include('_include.footer')
        </div>
    </div>
</div>

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
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
<script src="/admin-assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
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
<script src="/admin-assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
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
<script src="/admin-assets/vendors/custom/filepond/filepond.js"></script>
<script src="/admin-assets/vendors/custom/filepond/filepond.jquery.js"></script>
<!-- include FilePond plugins -->
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

<!--end:: Global Optional Vendors -->
<script src="/admin-assets/main/main.js" type="text/javascript"></script>
<script src="{{ asset('admin-assets/main/crud_in_modal.js') }}" type="text/javascript"></script>

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="/admin-assets/demo/default/base/scripts.bundle.min.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="/admin-assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="/admin-assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="/admin-assets/app/custom/general/dashboard.js" type="text/javascript"></script>

<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="/admin-assets/app/bundle/app.bundle.min.js" type="text/javascript"></script>
@toastr_render
<!--end::Global App Bundle -->
@yield('script')
</body>
</html>
