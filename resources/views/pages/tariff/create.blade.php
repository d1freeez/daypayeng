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
                    <form class="kt-form" action="{{ route('tariff-store') }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-3">
                                        <label for="">{{ __('table.title') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" name="title" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">{{ __('table.amount') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="number" name="amount" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">{{ __('table.month') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="number" name="month" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">{{ __('table.declination_month') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" name="month_name" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="note">{{ __('table.description') }} </label>
                                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>{{ __('table.in_middle') }}</label>
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="is_optimal"> Да
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @csrf
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.create') }}</button>
                                        <a href="{{ route('tariff-list') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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

@section('script')
    <script>
        $('.m-select2').select2();
    </script>

@endsection
