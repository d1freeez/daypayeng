@extends('pages.layouts.base')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        @include('_include.message')
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-form">
                            <div class="kt-wizard-v2__content" >
                                <div class="kt-heading kt-heading--md">Enter your account information</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <form action="{{ route('profile_account_save') }}" method="post">
                                            <div class="kt-wizard-v2__form">
                                                <div class="form-group">
                                                    <label for="">{{ __('table.full_name') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                                    <input class="form-control" type="text" value="{{ $user->full_name }}" placeholder="Jhon Doe" name="full_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{ __('table.email') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                                    <input class="form-control" type="email" value="{{ $user->email }}" placeholder="example@mail.ru" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{ __('auth.password') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                                    <input class="form-control" type="password" placeholder="********" name="password">
                                                    <span class="form-text text-muted">Если пароль не изменен, оставьте поле пустым.</span>
                                                </div>
                                            </div>
                                            @csrf
                                            <div class="kt-form__actions text-right">
                                                <button type="submit" class="btn btn-success">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 1-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
