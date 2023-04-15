@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Employees
                                    </h4>
                                    <span class="kt-widget24__desc">общее количество</span>
                                </div>
                                <span
                                    class="kt-widget24__stats kt-font-brand">
                                    @isset(auth()->user()->company->employees)
                                        {{ auth()->user()->company->employees()->count() }}
                                    @else
                                        0
                                    @endisset
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Feedbacks-->
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        payouts
                                    </h4>
                                    <span class="kt-widget24__desc">total amount of payouts of all time</span>
                                </div>
                                <span
                                    class="kt-widget24__stats kt-font-warning">
                                    @isset(auth()->user()->company)
                                        {{ auth()->user()->company->accounts()->where('is_commission_paid', true)->count() }}
                                    @else
                                        0
                                    @endisset
                                </span>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Active payouts
                                    </h4>
                                    <span class="kt-widget24__desc">amount of payouts in this month</span>
                                </div>
                                <span
                                    class="kt-widget24__stats kt-font-danger">
                                    @isset(auth()->user()->company)
                                        {{ auth()->user()->company->accounts()->monthly()->count() }}
                                    @else
                                        0
                                    @endisset
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        amount of managers
                                    </h4>
                                    <span class="kt-widget24__desc">total amount of managers</span>
                                </div>
                                <span
                                    class="kt-widget24__stats kt-font-success">
                                    @isset(auth()->user()->company->managers)
                                        {{ auth()->user()->company->managers->count() }}
                                    @else
                                        0
                                    @endisset
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
