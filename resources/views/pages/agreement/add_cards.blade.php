@extends('pages.layouts.empty')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
			<i class="la la-puzzle-piece"></i>
			</span>
                    <h3 class="kt-portlet__head-title">
                        Добавьте карту
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <h3>
                    Добавьте карту для проведение денежных трансферов.
                    <small class="text-muted">Добавление карты будет происходить через систему PayBox</small>
                </h3>
            </div>
            <div class="kt-portlet__foot">
                <div class="row align-items-center">
                    <div class="col-lg-6 kt-valign-middle"></div>
                    <div class="col-lg-6 kt-align-right">
                        <a href="{{ route('profile_cards_add', ['registered' => 'true']) }}" class="btn btn-primary" style="background-image: linear-gradient(to right, #09b3ef 0%, #1e50e2 100%); border:none;">Добавить</a>
                        <span class="kt-margin-left-10">or <a href="{{ route('logout') }}" class="kt-link kt-font-bold">Выйти</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
