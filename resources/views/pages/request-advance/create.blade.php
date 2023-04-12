@extends('pages.layouts.employee')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('_include.message')
                <div class="kt-portlet kt-portlet--solid-success">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Доступная сумма</h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-portlet__content">
                            <h1 class="user-balance" data-balance="{{ $user->balance }}">&#8376; {{ $user->balance }} </h1>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ $title }}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('request-advance-post-create') }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="form-group col-md-12">
                                <label for="">{{ __('table.enter_amount') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">&#8376;</span></div>
                                    <input type="number" class="form-control amount user-balance js_amount_disabled" data-balance="{{ $user->balance }}" name="amount">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success js_button_disabled">{{ __('table.get') }}</button>
                                        <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">{{ __('table.close') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
