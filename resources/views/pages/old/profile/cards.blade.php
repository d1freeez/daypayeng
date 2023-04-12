@extends('pages.layouts.employee')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        @include('_include.message')
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2">
                    @include('pages.employee.profile._aside')

                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                        <div class="kt-form">

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v2__content">
                                <div class="kt-heading kt-heading--md">{{ __('header.bank_cards') }}</div>
                                @if ($card)
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v2__form">
                                            <div class="form-group">
                                                <label>{{ __('table.card_number') }}</label>
                                                <input type="text" class="form-control" value="{{ $card->card_hash }}" disabled>
                                            </div>
                                        </div>
                                        <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_cards_store">
                                            {{ __('table.apply_for_change') }}
                                        </button>
                                    </div>
                                    <div class="modal fade" id="modal_cards_store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <form action="{{ route('employee_profile_application_store') }}" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        {{ __('table.apply_for_change') }}
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-lg-12">
                                                            <label for="">{{ __('table.phone') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                                            <input class="form-control" type="text" name="phone" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('auth.back') }}</button>
                                                        <button type="submit" class="btn btn-success">{{ __('table.submit') }}</button>
                                                    </div>
                                                </div>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v2__form">
                                            <div class="form-group">
                                                <h5>{{ __('table.adding_card_through_paybox') }}</h5>
                                                <h5>{{ __('table.obliged_salary_card') }}</h5>
                                            </div>
                                        </div>
                                        <a href="{{ route('profile_cards_add') }}" class="btn btn-success">
                                            {{ __('table.add') }}
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <!--end: Form Wizard Step 2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
@endsection
