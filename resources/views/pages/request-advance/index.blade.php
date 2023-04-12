@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('_include.message')
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label w-100">
                            <h3 class="kt-portlet__head-title">
                                {{ $title }}
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('table.user') }}</th>
                                            <th>{{ __('header.Company') }}</th>
                                            @can('viewFromUser', App\Models\AdvanceAccount::class)
                                                <th>{{ __('table.endorsed') }}</th>
                                            @endcan
                                            <th>{{ __('table.amount') }}</th>
                                            <th>{{ __('table.actions') }}</th>
                                            <th>{{ __('table.created_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->user->full_name }}</td>
                                                <td>{{ $item->user->company->name }}</td>
                                                @can('viewFromUser', 'App\Models\AdvanceAccount')
                                                    <td>
                                                        @if ($item->fromUser)
                                                            {{ $item->fromUser->full_name }}
                                                        @elseif ($item->is_company_accepted == 0)
                                                            Не одобрена
                                                        @else
                                                            Автоматический
                                                        @endif
                                                    </td>
                                                @endcan
                                                <td>{{ $item->amount }}</td>
                                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('activate', $item)
                                                                <a class="dropdown-item" href="javascript:"
                                                                    onclick="document.getElementById('request-advance-{{ $item->id }}-credit').submit()">
                                                                    <i class="la la-check"></i> Зачислить
                                                                </a>
                                                                <form id="request-advance-{{ $item->id }}-credit" action="{{ route('request-advances.credit', $item) }}" method="post">
                                                                    @csrf
                                                                </form>
                                                            @endcan
                                                            @can('companyAccept', App\Models\AdvanceAccount::class)
                                                                @if (!$item->is_company_accepted)
                                                                    <a class="dropdown-item" href="javascript:"
                                                                        onclick="document.getElementById('company-accept-form').submit()">
                                                                        <i class="la la-check"></i> Одобрить
                                                                    </a>
                                                                    <form id="company-accept-form" action="{{ route('request-advances.company.accept', $item) }}" method="post">
                                                                        @csrf
                                                                    </form>
                                                                    <button class="dropdown-item js_delete_modal"
                                                                            data-modal="#modal_reject"
                                                                            data-action="{{ route('request-advances.company.reject', $item) }}">
                                                                        <i class="la la-times"></i> Отклонить
                                                                    </button>
                                                                @endif
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('accounts.destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                @can('viewFromUser', App\Models\AdvanceAccount::class)
                                                    <td>{{ __('table.not_found') }}</td>
                                                @endcan
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $items->appends(request()->all())->links() !!}
                    </div>
                </div>
                @include('pages.request-advance._delete')
                @include('pages.request-advance._reject')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script src="{{ asset('admin-assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
