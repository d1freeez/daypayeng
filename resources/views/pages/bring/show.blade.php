@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('_include.message')
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ $title }}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions">
                                <a href="{{ route('brings.index') }}" class="btn btn-outline-brand js_create_modal">
                                    <i class="la la-arrow-left"></i> Назад
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.company_name') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->company_name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.address_company') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->company_address }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.phone') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->company_number }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.email') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->company_email }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('auth.employee_count') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->employees_count }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.where_did_you_hear') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->where_did_you_hear }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
