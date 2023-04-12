@extends('pages.layouts.employee')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-5">
                <a href="{{ route('employee_profile_cards') }}" class="kt-portlet kt-bg-primary round">
                    <div class="kt-portlet__body">
                        <div class="text-center text-white d-flex flex-column">
                            <i class="fa fa-credit-card" style="font-size: 45px; margin-bottom: 10px;"></i>
                            <h6 style="font-size: 20px; margin-bottom: 0;">Карты</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-7">
                <a href="#" class="kt-portlet round kt-portlet--height-fluid background" style="background-image: url(/admin-assets/media/bg/bg-8.jpg)">
                    <span class="text-white"></span>
                </a>
            </div>
        </div>
        <!--Begin::Section-->
        <div class="kt-portlet round">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-xl-12 d-flex justify-content-center">
                        <div class="kt-widget14">
                            <div class="kt-widget14__content">
                                <div class="kt-widget14__chart ">
                                    <div class="kt-widget14__stat text-primary" style="font-size: 40px; flex-direction: column">
                                        {{ $user->balance }}
                                        <br><span style="font-size: 15px; color: #000;">Доступная сумма</span>
                                    </div>
                                    <canvas id="kt_chart_amount" style="height: 300px; width: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <!--begin::Form-->
                        <div class="kt-portlet__body">
                            <div class="form-group col-md-12">
                                <label for="">Введите сумму <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">&#8376;</span></div>
                                    <input type="number" class="form-control amount user-balance js_amount_disabled" data-balance="{{ $user->balance }}" name="amount" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-primary js_button_disabled"
                                                disabled data-toggle="modal" data-target="#pay_modal" data-ajax-route="{{ route('ajax_amount_percent') }}"
                                                style="background-image: linear-gradient(to right, #09b3ef 0%, #1e50e2 100%); border:none;">
                                            Получить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="pay_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('request-advance-post-create') }}" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="amount" id="advance_amount">
                                            <input type="hidden" name="amount_percents" id="advance_amount_percents">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Назад</button>
                                            <button type="submit" class="btn btn-primary" style="background-image: linear-gradient(to right, #09b3ef 0%, #1e50e2 100%); border:none;">Оплатить</button>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Section-->
        <div class="kt-portlet round">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-md-12 col-lg-4">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Выплаты
                                    </h4>
                                    <span class="kt-widget24__desc">общее количество выплат за все время</span>
                                </div>
                                <span class="kt-widget24__stats" style="color: #2b3990">{{ $user->accountsCommissionPaidCount() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Активные выплаты
                                    </h4>
                                    <span class="kt-widget24__desc">количество выплат выполненных за этот месяц</span>
                                </div>
                                <span class="kt-widget24__stats" style="color: #662d91">{{ $user->accountsMonthlyCount() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Тарифный план "{{ $user->tariffName() }}"
                                    </h4>
                                    <span class="kt-widget24__desc">следующее списание произойдет</span>
                                </div>
                                <span class="kt-widget24__stats" style="color: #662d91">{{ $user->tariffExpireDate() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{ $user->available_amount }}, {{ $user->remaining_amount }}
                    ],
                    backgroundColor: [
                        '#5867dd',
                        '#dcdcdc'
                    ]
                }],
                labels: [
                    'Доступная сумма',
                    'Оставшаяся сумма',
                ]
            },
            options: {
                cutoutPercentage: 75,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Technology'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10,
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: '#5d78ff',
                    titleFontColor: '#ffffff',
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                }
            }
        };

        var ctx = $('#kt_chart_amount');
        var myDoughnut = new Chart(ctx, config);

        $('.js_button_disabled').click(function () {
            let advance = $('.js_amount_disabled').val();
            let percent = advance * 0.019;
            $('#advance_amount').val(advance);
            if (percent < 300) {
                percent = 300;
            }
            $('#advance_amount_percents').val(percent);
            let target = $(this).data('target');
            let modal = $(target);
            $(`${target} .modal-body`).empty().append(`<p> Для получения выплаты, вам нужно оплатить комиссию за перевода 1,9% (${percent} тг мин 300тг.) от вашей выплаты (${advance} тг.) </p>`)
        });
    </script>
@endsection
