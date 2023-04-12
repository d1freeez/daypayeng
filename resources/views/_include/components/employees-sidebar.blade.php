<div
    class="cabinet__left <?= request()->input('dashboard') !== null && request()->input('dashboard') === 'true' ? '-desktop' : '-mobile' ?>">
    <div class="cabinet__card">
        <div class="cabinet__card_header">Доступная сумма</div>
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
        <div class="cabinet__card_header">Вывести деньги</div>
        @if(!$card && config('app.env') == 'production')
            <div class="cabinet__card_content">
                <div class="cabinet__card_input mt-4">
                    <p class="text-danger mt-1 mb-1">
                        Для получения выплаты вам нужно добавить свою банковскую карту
                    </p>
                </div>
                <div>
                    <button type="button" class="cabinet__card_btn"
                            onclick="window.location.replace('{{ route('employees.dashboard.cards') }}')">
                        Добавить <img src="{{ asset('images/icons/ic-arrow-right.png') }}" alt="">
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
        <div class="cabinet__card_header">Выплаты</div>
        <div class="cabinet__card_content">
            <div class="cabinet__card_description">
                Общее количество выплат за все время
            </div>
            <div class="cabinet__card_subprice">
                {{ auth()->user()->accounts()->completed()->count() }}
            </div>
        </div>
    </div>
    <div class="cabinet__card mt-4">
        <div class="cabinet__card_header">Активные выплаты</div>
        <div class="cabinet__card_content">
            <div class="cabinet__card_description">
                Количество выплат выполненных за этот месяц
            </div>
            <div class="cabinet__card_subprice">
                {{ auth()->user()->accounts()->monthly()->count() }}
            </div>
        </div>
    </div>
</div>
