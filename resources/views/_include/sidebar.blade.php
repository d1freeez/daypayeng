<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="javascript: void(0)" class="kt-link kt-link--state kt-link--success kt-font-bolder">
                <img src="{{ asset('images/logo/logo-white.png') }}" style="width: 60px;" alt="">
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                        </g>
                    </svg></span>
                <span><svg xmlns='http://www.w3.org/2000/svg' width='24px' height='24px' viewBox='0 0 24 24'
                           class='kt-svg-icon'>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                        </g>
                    </svg></span>
            </button>
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item {{ url()->current() == '/' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('login') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="fa fa-home"></i></span>
                        <span class="kt-menu__link-text">{{ __('sidebar.home') }}</span>
                    </a>
                </li>
                @can('create', 'App\Model\Lib\Country\Country')
                    <li class="kt-menu__item  kt-menu__item--submenu {{ request()->route()->getPrefix() == 'admin/lib/location' ? 'kt-menu__item--open kt-menu__item--here' : '' }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-map-marked-alt"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.locality') }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                @can('view', App\Models\LibCountry::class)
                                    <li class="kt-menu__item {{ Str::contains(request()->route()->getControllerClass(), 'CountryController') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                                        <a href="{{ route('country.index') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('sidebar.country') }}</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view', App\Models\LibRegion::class)
                                    <li class="kt-menu__item {{ Str::contains(request()->route()->getControllerClass(), 'RegionController') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                                        <a href="{{ route('region.index') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('sidebar.region') }}</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view', App\Models\LibCity::class)
                                    <li class="kt-menu__item {{ !Str::contains(request()->route()->getControllerClass(), 'CityController') ?: 'kt-menu__item--active' }}" aria-haspopup="true">
                                        <a href="{{ route('city.index') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('sidebar.city') }}</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('create', App\Models\ProductionCalendar::class)
                    <li class="kt-menu__item  kt-menu__item--submenu {{ request()->route()->getPrefix() != 'admin/lib/calendar' ?: 'kt-menu__item--open kt-menu__item--here' }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-calendar-alt"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.production_calendar') }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                @can('view', App\Models\ProductionCalendar::class)
                                    <li class="kt-menu__item {{ !Str::contains(request()->route()->getControllerClass(), 'MonthController') ?: 'kt-menu__item--active' }}" aria-haspopup="true">
                                        <a href="{{ route('month.index') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('sidebar.month') }}</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view', App\Models\Holiday::class)
                                    <li class="kt-menu__item {{ !Str::contains(request()->route()->getControllerClass(), 'HolidayController') ?: 'kt-menu__item--active' }}" aria-haspopup="true">
                                        <a href="{{ route('holiday.index') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('sidebar.holiday') }}</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('view', App\Models\LibCompany::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'company' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('companies.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-building"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.companies') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Department::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() != 'department' ?: 'kt-menu__item--active' }}" aria-haspopup="true">
                        <a href="{{ route('departments.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-building"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.departments') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Employee::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\Employee' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('employees.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-user-tie"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.employees') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Manager::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\Manager' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('managers.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-user-cog"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.managers') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\SuperManager::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\SuperManager' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('super-managers.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-user-cog"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.super_managers') }}</span>
                        </a>
                    </li>
                @endcan
                @can('viewRequest', App\Models\AdvanceAccount::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\RequestAdvance' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('request-advances.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-envelope"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.payment_requests') }}</span>
                        </a>
                    </li>
                @endcan
                @can('viewArchive', App\Models\AdvanceAccount::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\AdvanceAccount' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('accounts.archive') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-archive"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.payments_archive') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Bring::class)
                    <li class="kt-menu__item {{ request()->route()->getControllerClass() == 'BringController' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('brings.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-envelope-open"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.employer_invitation') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\FaqParent::class)
                    <li class="kt-menu__item {{ request()->route()->getControllerClass() == 'FaqParentController' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('faq-parents.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="la la-file-text"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.FAQ_category') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Faq::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'faq' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('faqs.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-tasks"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.faq') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Feedback::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'location' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('feedbacks.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-tasks"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.feedback') }}</span>
                        </a>
                    </li>
                @endcan
                @can('create', App\Models\Offer::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\Lib\Offer' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('offers.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="la la-file-text"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.documents') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\Application::class)
                    <li class="kt-menu__item {{ request()->route()->getPrefix() == 'App\Http\Controllers\Pages\Application' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('applications.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-exclamation-circle"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.card_change_application') }}</span>
                        </a>
                    </li>
                @endcan
                @can('view', App\Models\RefundApplication::class)
                    <li class="kt-menu__item {{ request()->route()->getControllerClass() == 'RefundApplicationController' ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('refund-applications.index') }}" class="kt-menu__link ">
                            <span class="kt-menu__link-icon"><i class="fa fa-exclamation-circle"></i></span>
                            <span class="kt-menu__link-text">{{ __('sidebar.commission_refund_application') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->
