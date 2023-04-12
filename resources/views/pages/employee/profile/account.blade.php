@extends('pages.layouts.main')

@section('content')
    <main-header :user="{{ auth()->user() }}" :cabinet="true" :type_link="'a'"></main-header>
    <div class="container">
        <div class="cabinet__settings_block">
            @include('_include.message')
            <div class="cabinet__settings_title">Настройка аккаунта <img src="{{ asset('images/icons/ic-lb-user.png') }}" alt="profile-settings"></div>
            <form action="{{ route('profile_account_save') }}" method="post">
                <div class="cabinet__settings_form">
                    <div class="cabinet__settings_form_title">Введите данные аккаунта</div>
                    <div>
                        <input name="full_name" value="{{ auth()->user()->full_name }}" placeholder="{{ __('table.full_name') }}">
                    </div>
                    <div>
                        <input name="email" value="{{ auth()->user()->email }}" placeholder="{{ __('table.email') }}">
                    </div>
                    <div>
                        <input name="password" type="password" placeholder="{{ __('auth.password') }} ">
                    </div>
                    <div class="cabinet__settings_warning">
                        {{ __('auth.if_dont_want_change_password') }}
                    </div>
                    @csrf
                </div>
                <button class="cabinet__settings_btn">
                    Сохранить
                    <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 1L8.5 8L1.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                </button>
            </form>

        </div>

    </div>
    <main-footer :mobile="true"></main-footer>
    <cabinet-footer :footer_url="'<?=Request::getRequestUri()?>'"></cabinet-footer>
@endsection
