@extends('pages.layouts.base')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        @include('_include.message')
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                        <div class="kt-form">

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Банковские карты</div>
                                @if ($card)
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v2__form">
                                            <div class="form-group">
                                                <label>Номер карты</label>
                                                <input type="text" class="form-control" value="{{ $card->card_hash }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v2__form">
                                            <div class="form-group">
                                                <h5>Добавление карты происходить через систему ePay!</h5>
                                            </div>
                                        </div>
                                        <a href="{{ route('profile_cards_add') }}" class="btn btn-success">
                                            Добавить
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

@section('script')
    <script src="/admin-assets/app/custom/wizard/wizard-v2.js" type="text/javascript"></script>
@endsection
