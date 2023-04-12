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
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('companies.store') }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.name') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" placeholder="ТОО Example" name="name" autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.bin') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" placeholder="123456789101" name="bin" autocomplete="off" maxlength="12" required >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.registration_date') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input id="rg_date" class="form-control" type="date" name="rg_date" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.full_name') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" placeholder="Jhon Doe" name="full_name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.email') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="email" placeholder="example@mail.ru" name="email" required>
                                        <span class="form-text text-muted">{{ __('table.email_will_be_sent') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="six_day"> {{ __('table.six_day_work') }}
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">{{ __('table.if_five_days') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="is_active" checked> {{ __('table.active_after_confirmed') }}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    @csrf
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                            </div>
                        </div>




                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.create') }}</button>
                                        <a href="{{ route('companies.index') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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
