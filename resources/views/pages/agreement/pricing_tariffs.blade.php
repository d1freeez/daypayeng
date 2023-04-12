@extends('pages.layouts.empty')

@section('css')
    <link href="/admin-assets/app/custom/pricing/pricing-v3.default.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    <i class="la la-puzzle-piece"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{ $title }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('logout') }}" class="btn btn-outline-brand js_create_modal">
                            Выйти
                        </a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-pricing-3 kt-pricing-3--fixed">
                    <div class="kt-pricing-3__items">
                        <div class="row row-no-padding">
                            @if ($tariff)
                                <div class="kt-pricing-3__item col-lg-12">
                                    <div class="kt-pricing-3__wrapper">
                                        <h3 class="kt-pricing-3__title">Оплатите тариф для входа в аккаунт</h3>
                                        <span class="kt-pricing-3__price kt-pricing-3__price--padding">
                                            <span class="kt-pricing-3__label kt-font-brand kt-opacity-7">&#8376;</span>
                                            <span class="kt-pricing-3__number kt-font-brand">{{ $tariff->amount }}</span>
                                        </span><br>
                                        <div class="kt-pricing-3__btn">
                                            <form action="{{ route('dashboard_employee_tariff_store') }}" method="post">
                                                <input type="hidden" name="amount" id="amount" value="{{ $tariff->amount }}">
                                                @csrf
                                                <button type="submit" class="btn btn-pill  btn-brand btn-wide btn-upper btn-bold">Купить</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
