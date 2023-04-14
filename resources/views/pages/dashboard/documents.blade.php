@extends('pages.layouts.main')

@section('content')
    <main-header :user="{{ auth()->user() }}" :cabinet="true" :type_link="'a'" ></main-header>
    <div class="container">
        <div class="cabinet__block">
            @include('_include.components.employees-sidebar')
            <div class="cabinet__right ">
                <div class="cabinet__card">
                    <div class="cabinet__navbar">
                        <a href="{{ route('employees.dashboard') }}" class="cabinet__navbar_item ">Payout history</a>
                        <a href="{{ route('employees.dashboard.cards') }}" class="cabinet__navbar_item ">Cards</a>
                        <a href="{{ route('employees.dashboard.documents') }}" class="cabinet__navbar_item -active">Documents</a>
                    </div>
                    <div class="cabinet__document_list">
                        <div class="cabinet__document_item">
                            <div class="cabinet__document_item_left">
                                <span> #1</span>
                                Document.pdf
                            </div>
                            <div class="cabinet__document_item_right">
                                <a href="#" download=""> Download
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12.2806 2.30154H6.73725C5.00391 2.29487 3.58391 3.6757 3.54225 5.40904V14.3565C3.50475 16.1082 4.89475 17.5582 6.64558 17.5957C6.67641 17.5957 6.70725 17.5965 6.73725 17.5957H13.3939C15.1356 17.534 16.5122 16.099 16.5022 14.3565V6.6982L12.2806 2.30154Z"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path
                                            d="M12.0625 2.29175V4.71591C12.0625 5.89925 13.02 6.85842 14.2033 6.86175H16.4983"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                        <path d="M9.70182 13.2915V8.25732" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.74707 11.3286L9.70124 13.2911L11.6554 11.3286" stroke="white"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>

                            </div>
                        </div>
                        <div class="cabinet__document_item">
                            <div class="cabinet__document_item_left">
                                <span> #1</span>
                                Document.pdf
                            </div>
                            <div class="cabinet__document_item_right">
                                <a href="#" download=""> Download
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12.2806 2.30154H6.73725C5.00391 2.29487 3.58391 3.6757 3.54225 5.40904V14.3565C3.50475 16.1082 4.89475 17.5582 6.64558 17.5957C6.67641 17.5957 6.70725 17.5965 6.73725 17.5957H13.3939C15.1356 17.534 16.5122 16.099 16.5022 14.3565V6.6982L12.2806 2.30154Z"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path
                                            d="M12.0625 2.29175V4.71591C12.0625 5.89925 13.02 6.85842 14.2033 6.86175H16.4983"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                        <path d="M9.70182 13.2915V8.25732" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.74707 11.3286L9.70124 13.2911L11.6554 11.3286" stroke="white"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>

                            </div>
                        </div>
                        <div class="cabinet__document_item">
                            <div class="cabinet__document_item_left">
                                <span> #1</span>
                                Document.pdf
                            </div>
                            <div class="cabinet__document_item_right">
                                <a href="#" download=""> Download
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12.2806 2.30154H6.73725C5.00391 2.29487 3.58391 3.6757 3.54225 5.40904V14.3565C3.50475 16.1082 4.89475 17.5582 6.64558 17.5957C6.67641 17.5957 6.70725 17.5965 6.73725 17.5957H13.3939C15.1356 17.534 16.5122 16.099 16.5022 14.3565V6.6982L12.2806 2.30154Z"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path
                                            d="M12.0625 2.29175V4.71591C12.0625 5.89925 13.02 6.85842 14.2033 6.86175H16.4983"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                        <path d="M9.70182 13.2915V8.25732" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.74707 11.3286L9.70124 13.2911L11.6554 11.3286" stroke="white"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>

                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
    <main-footer :mobile="true"></main-footer>
    <cabinet-footer :footer_url="'<?=Request::getRequestUri()?>'"></cabinet-footer>

@endsection
@section('js')
    <script>
        $('.js_button_disabled').click(function () {
            let advance = $('.js_amount_disabled').val();
            let percent = advance * 0.019;
            $('#advance_amount').val(advance);
            if (percent < 300) {
                percent = 300;
            }
            $('#advance_amount_percents').val(percent);
            let target = $(this).data('target');
            $(`${target} .modal-body`).empty().append(`<p> Для получения выплаты, вам нужно оплатить комиссию за перевода 1,9% (${percent} тг мин 300тг.) от вашей выплаты (${advance} тг.) </p>`)
        });
    </script>
@endsection
