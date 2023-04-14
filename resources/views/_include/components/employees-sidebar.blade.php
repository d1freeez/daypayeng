<div
    class="cabinet__left <?= request()->input('dashboard') !== null && request()->input('dashboard') === 'true' ? '-desktop' : '-mobile' ?>">
    <div class="cabinet__card">
        <div class="cabinet__card_header">Available amount</div>
        <div class="cabinet__card_content">
            <div class="cabinet__card_price">
                {{ auth()->user()->balance }} ₸
            </div>
            <div class="cabinet__card_bar">
                <div class="cabinet__card_bar_percent">
                </div>
            </div>
        </div>
    </div>
    <div class="cabinet__card mt-4">
        <div class="cabinet__card_header">Withdraw money</div>
        @if(!$card && config('app.env') == 'production')
            <div class="cabinet__card_content">
                <div class="cabinet__card_input mt-4">
                    <p class="text-danger mt-1 mb-1">
                    You need to add your bank card to receive your payout
                    </p>
                </div>
                <div>
                    <button type="button" class="cabinet__card_btn"
                            onclick="window.location.replace('{{ route('employees.dashboard.cards') }}')">
                        Add <img src="{{ asset('images/icons/ic-arrow-right.png') }}" alt="">
                    </button>
                </div>
            </div>
        @else
            <div class="cabinet__card_content">
                <form action="{{ route('request-advances.store') }}" method="post">
                    @csrf
                    <div class="cabinet__card_input">
                        <input type="number" id="js_amount_disabled" placeholder="Введите сумму* "
                               data-balance="{{ auth()->user()->balance }}" name="amount" required
                               data-small_text="js_advance_percent">
                        <p class="text-danger mb-0" id="js_advance_percent"></p>
                        <input type="hidden" name="amount" id="advance_amount">
                        <input type="hidden" name="amount_percents" id="advance_amount_percents">
                    </div>
                    <div>
                        <button type="submit" id="js_button_disabled" class="cabinet__card_btn" disabled>
                            Получить <img src="{{ asset('images/icons/ic-arrow-right.png') }}" alt="">
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
    <div class="cabinet__card mt-4">
        <div class="cabinet__card_header">Withdraws</div>
        <div class="cabinet__card_content">
            <div class="cabinet__card_description">
                Total number of payments for all time
            </div>
            <div class="cabinet__card_subprice">
                {{ auth()->user()->accounts()->completed()->count() }}
            </div>
        </div>
    </div>
    <div class="cabinet__card mt-4">
        <div class="cabinet__card_header">Active Withdraws</div>
        <div class="cabinet__card_content">
            <div class="cabinet__card_description">
                Amount of withdraws this motnh
            </div>
            <div class="cabinet__card_subprice">
                {{ auth()->user()->accounts()->monthly()->count() }}
            </div>
        </div>
    </div>
</div>
