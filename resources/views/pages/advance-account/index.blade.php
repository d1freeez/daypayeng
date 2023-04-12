@extends('pages.layouts.employee')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        @include('_include.message')
        <div class="kt-portlet kt-portlet--height-fluid round">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        История выплат
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    @can('create', App\Models\AdvanceAccount::class)
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-149px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="{{ route('request-advances.create') }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon fa fa-paper-plane"></i>
                                            <span class="kt-nav__link-text">Подать заявку</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget6">
                    <div class="kt-widget6__head">
                        <div class="kt-widget6__item">
                            <span>Работник</span>
                            <span>Дата</span>
                            <span>Сумма</span>
                            <span>Статус</span>
                        </div>
                    </div>
                    <div class="kt-widget6__body">
                        @forelse($items as $item)
                            <div class="kt-widget6__item">
                                <span>{{ $item->user->full_name }}</span>
                                <span>{{ $item->created_at }}</span>
                                <span class="kt-font-success kt-font-bold">&#8376;{{ $item->amount }}</span>
                                <span>
                                     {{ $item->statusName() }}
                                    <span class="kt-badge kt-badge--{{ $item->class_name }} kt-badge--dot"></span>
                                </span>
                                <span>
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="flaticon-more"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @can('viewAny', \App\Models\RefundApplication::class)
                                                <button href="#" class="dropdown-item js_create_modal"
                                                        data-modal="#modal_create"
                                                        data-action="{{ route('refund_application_store', $item) }}">
                                                    <i class="la la-share-square-o"></i> Вернуть комиссию
                                                </button>
                                            @endcan
                                            @can('view', $item)
                                                @if ($item->status == $not_accepted_status)
                                                    <a href="{{ route('accounts.accept', $item) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                @endif
                                            @endcan
                                        </div>
                                    </div>
                                </span>
                            </div>
                        @empty
                            <div class="kt-widget6__item">
                                <span>{{ __('table.not_found') }}</span>
                                <span>{{ __('table.not_found') }}</span>
                                <span class="kt-font-success kt-font-bold">{{ __('table.not_found') }}</span>
                                <span class="kt-font-success kt-font-bold">{{ __('table.not_found') }}</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @include('pages.refund_advance._create')
    </div>
@endsection

@section('js')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
@endsection
