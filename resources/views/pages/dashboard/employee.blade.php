@extends('pages.layouts.main')

@section('content')
    <main-header :user="{{ auth()->user() }}" :cabinet="true" :type_link="'a'" :backlink="true"></main-header>
    <div class="container">
        <div class="cabinet__block">
            @include('_include.components.employees-sidebar')
            <div
                class="cabinet__right <?= isset($_GET['dashboard']) && $_GET['dashboard'] === 'true' ? '-mobile' : '-desktop' ?>">
                <div class="cabinet__card" id="cabinet__card">
                    <div class="cabinet__navbar">
                        <a href="{{ route('employees.dashboard') }}" class="cabinet__navbar_item -active">History of payouts</a>
                        <a href="{{ route('employees.dashboard.cards') }}" class="cabinet__navbar_item ">Cards</a>
                        <a href="{{ route('employees.dashboard.documents') }}" class="cabinet__navbar_item ">Documents</a>
                    </div>
                    <div class="cabinet__history_list">

                        @forelse($accounts as $account)
                            <div class="cabinet__history_date">
                                {{ $account->created_at->diffForHumans() }} <span>- {{ $account->amount }} ₸</span>
                            </div>
                            <div class="cabinet__history_item">
                                <div class="cabinet__history_item_left">
                                    <img src="{{ asset('/images/icons/ic-transuction.png') }}" alt="">
                                    <span>∙∙ {{ $card->card_hash ?? 'Карта не найдена' }}</span>
                                    <span></span>
                                </div>
                                <div class="cabinet__history_item_right">
                                    <p>- {{ $account->amount }} ₸</p>
                                    <p class="text-{{ $account->class_name }} mt-2">{{ $account->status }}</p>
                                    <span>{{ $account->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="cabinet__card_header" style="margin-top: 20px;">No payouts now</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main-footer :mobile="true"></main-footer>
    <cabinet-footer :footer_url="'{{ request()->getRequestUri() }}'"></cabinet-footer>

@endsection
@section('js')
    <script>
        $('#js_amount_disabled').keyup(function() {
            let balance = $(this).data('balance')
            let target = $(this).data('small_text')
            let advance = $(this).val();
            let percent = advance * 0.035;
            if (percent < 300) {
                percent = 300;
            } else {
                percent = parseInt(percent)
            }
            let amount = advance - percent
            $('#advance_amount').val(amount)
            $('#advance_amount_percents').val(percent)

            if ($(this).val() < balance + 1 && advance > 499) {
                $('#js_button_disabled').attr('disabled', false)
                $(`#${target}`).empty().append(`<small>Комиссия за транзакцию - 3,5% (минимальная комиссия - 300 тенге). Вам поступит выплата в размере ${amount}.</small>`)
            } else {
                $('#js_button_disabled').attr('disabled', true)
                $(`#${target}`).empty().append(`<small>Вы можете запросить выплату от 500тг. до ${balance}тг.</small>`)
            }
        })
    </script>
@endsection
