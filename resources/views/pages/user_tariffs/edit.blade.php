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
                    <form class="kt-form" action="{{ route('user_tariff_update', $item) }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-4">
                                        <label for="user_name">{{ __('table.user') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" id="user_name" type="text" value="{{ $item->user->full_name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Истек</label>
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="expired" @if ($item->isExpired()) checked @endif> Да
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Оплачена</label>
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="paid" @if ($item->isPaid()) checked @endif> Да
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('put')
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.save') }}</button>
                                        <a href="{{ route('user_tariff_list') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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
