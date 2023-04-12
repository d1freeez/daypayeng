<div class="kt-grid__item kt-wizard-v2__aside">
    <!--begin: Form Wizard Nav -->
    <div class="kt-wizard-v2__nav">
        <div class="kt-wizard-v2__nav-items">
            <a class="kt-wizard-v2__nav-item" href="{{ route('employee_profile_account') }}" {{ $action == 'employeeIndex' ? 'data-ktwizard-state=current' : '' }}>
                <div class="kt-wizard-v2__nav-body">
                    <div class="kt-wizard-v2__nav-icon">
                        <i class="fa fa-user-cog"></i>
                    </div>
                    <div class="kt-wizard-v2__nav-label">
                        <div class="kt-wizard-v2__nav-label-title">
                            {{ __('header.settings') }}
                        </div>
                        <div class="kt-wizard-v2__nav-label-desc">
                            {{ __('header.settings') }}
                        </div>
                    </div>
                </div>
            </a>
            @can('create', 'App\Model\Card\Card')
                <a class="kt-wizard-v2__nav-item" href="{{ route('employee_profile_cards') }}" {{ $action == 'employeeCards' ? 'data-ktwizard-state=current' : '' }}>
                    <div class="kt-wizard-v2__nav-body">
                        <div class="kt-wizard-v2__nav-icon">
                            <i class="fab fa-cc-mastercard"></i>
                        </div>
                        <div class="kt-wizard-v2__nav-label">
                            <div class="kt-wizard-v2__nav-label-title">
                                {{ __('header.bank_cards') }}
                            </div>
                            <div class="kt-wizard-v2__nav-label-desc">
                                {{ __('header.add_bank_card') }}
                            </div>
                        </div>
                    </div>
                </a>
            @endcan
        </div>
    </div>

    <!--end: Form Wizard Nav -->
</div>
