<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <!-- begin:: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
        </div>
    </div>

    <!-- end:: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">

        @if(auth()->user()->company)
            <div class="kt-header__topbar-item align-items-center mr-2">
                <small class="text-muted">{{ __('header.company') }}</small>&nbsp;&nbsp;{{ auth()->user()->company->name }}
            </div>
        @endif
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">{{ auth()->user()->type->name }}</span>
                    <img class="{{ auth()->user()->photo ? '' : 'kt-hidden' }}" alt="Pic" src="/{{ auth()->user()->photo }}" />
                    <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success {{ auth()->user()->photo ? 'kt-hidden' : '' }} kt-font-transform-u" >{{ auth()->user()->first_character }}</span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/admin-assets/media/misc/bg-1.jpg)">
                    <div class="kt-user-card__avatar">
                        <img class="{{ auth()->user()->photo ? '' : 'kt-hidden' }}" alt="Pic" src="/{{ auth()->user()->photo ? auth()->user()->photo : '' }}" />
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success {{ auth()->user()->photo ? 'kt-hidden' : '' }} kt-font-transform-u" >{{ auth()->user()->first_character }}</span>
                    </div>
                    <div class="kt-user-card__name">
                        {{ auth()->user()->full_name }}
                    </div>
                </div>

                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="{{ route('profile_account') }}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                {{ __('header.profile') }}
                            </div>
                            <div class="kt-notification__item-time">
                                {{ __('header.settings') }}
                            </div>
                        </div>
                    </a>
                    @can('update', auth()->user()->company)
                        @if(auth()->user()->company)
                            <a href="{{ route('companies.edit', auth()->user()->company) }}" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon-buildings kt-font-warning"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title kt-font-bold">
                                        {{ __('header.Company') }}
                                    </div>
                                    <div class="kt-notification__item-time">
                                        {{ __('header.update_company_data') }}
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endcan
                    @can('view', App\Models\Offer::class)
                        <a href="{{ route('offers.index') }}" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="la la-file-text"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    {{ __('sidebar.documents') }}
                                </div>
                                <div class="kt-notification__item-time">
                                    {{ __('header.see_all_documents') }}
                                </div>
                            </div>
                        </a>
                    @endcan
                    <div class="kt-notification__custom">
                        <a href="{{ route('logout') }}" class="btn btn-label-brand btn-sm btn-bold">{{ __('header.logout') }}</a>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->
