@extends('pages.layouts.main')

@section('content')
    <main-header :user="{{ auth()->user() }}" :cabinet="true" :type_link="'a'" ></main-header>
    <div class="container">
        <div class="cabinet__addcard_block">
            @if (!$card)
                <div class="cabinet__addcard_title">Add card <img src="{{ asset('images/icons/ic-addcard.png') }}" alt="add-card"></div>
                <div class="cabinet__addcard_form">
                    <div class="cabinet__addcard_form_title">Add card with Paybox System
                    </div>
                    <a href="javascript:" class="cabinet__addcard_btn"
                        onclick="document.getElementById('cards_add_form').submit()">
                        add card
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L8.5 8L1.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <form id="cards_add_form" action="{{ route('employees.dashboard.cards.store') }}" method="post">
                        @csrf
                    </form>
                </div>
            @else
                <div class="kt-form__section kt-form__section--first">
                    <div class="kt-wizard-v2__form">
                        <div class="form-group">
                            <label for="card_hash" class="cabinet__addcard_title">{{ __('table.card_number') }}</label>
                            <input id="card_hash" type="text" class="form-control" value="{{ $card->card_hash }}" disabled>
                        </div>
                    </div>
                    <form action="{{ route('employees.profile.cards.applications.store') }}" method="post">
                        <div class="form-group">
                            <label for="phone" class="cabinet__addcard_title" for="">{{ __('table.phone') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                            <input id="phone" class="form-control" type="text" name="phone" required>
                        </div>
                        <button type="submit" class="btn btn-success">{{ __('table.apply_for_change') }}</button>
                        @csrf
                    </form>
                </div>
            @endif
        </div>
    </div>
    <main-footer :mobile="true"></main-footer>
    <cabinet-footer :footer_url="'{{ Request::getRequestUri() }}'"></cabinet-footer>
@endsection
