@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('_include.message')
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ $title }}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions">
                                @can('create', App\Models\LibCompany::class)
                                    <a href="{{ route('companies.create') }}" class="btn btn-outline-brand">
                                        <i class="flaticon2-add-1"></i> {{ __('table.create') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('table.name') }}</th>
                                            <th>{{ __('table.leader') }}</th>
                                            <th>{{ __('table.registration_date') }}</th>
                                            <th>{{ __('table.bin') }}</th>
                                            <th>{{ __('table.active') }}</th>
                                            <th>{{ __('table.created_at') }}</th>
                                            <th>{{ __('table.updated_at') }}</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $n = ($items->currentPage() - 1) * $items->perPage() + 1;
                                        @endphp
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $n++ }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->director ? $item->director->full_name : 'Не найдено' }}</td>
                                                <td>{{ $item->rg_date }}</td>
                                                <td>{{ $item->bin }}</td>
                                                <td>
                                                    @if ($item->director && $item->director->verified == 1)
                                                        {{ $item->director->is_active == 1 ? 'Активный' : 'Не активен' }}
                                                        <span class="kt-badge {{ $item->director->is_active == 1 ? 'kt-badge--success' : 'kt-badge--danger' }} kt-badge--dot"></span>
                                                    @elseif(!$item->director)
                                                        Не найдено
                                                    @else
                                                        {{ __('table.mail_not_confirmed') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                <td data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('update', $item)
                                                                <a href="{{ route('companies.edit', $item) }}" class="dropdown-item">
                                                                    <i class="la la-edit"></i> {{ __('table.edit') }}
                                                                </a>
                                                                @if($item->director && $item->director->verified)
                                                                    <a href="javascript:" class="dropdown-item"
                                                                        onclick="document.getElementById('change-activity-form').submit()">
                                                                        <i class="la {{ !$item->director->is_active ? 'la-check' : 'la-times' }}"></i> {{ !$item->director->is_active ? __('table.activate') : __('table.deactivate') }}
                                                                    </a>
                                                                    <form id="change-activity-form" method="POST" action="{{ route('companies.change.activity', $item) }}">
                                                                        @csrf
                                                                    </form>
                                                                @endif
                                                            @endcan
                                                            @can('accrualAdvance', $item)
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_accrual"
                                                                        data-action="{{ route('companies.accrual.period', $item) }}">
                                                                    <i class="la la-calendar-minus-o"></i> {{ __('table.accrue_period') }}
                                                                </button>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('companies.destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        {!! $items->appends(request()->all())->links() !!}
                    </div>
                </div>
                @include('pages.company._delete')
                @include('pages.employee._accrual_period')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script src="{{ asset('admin-assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
