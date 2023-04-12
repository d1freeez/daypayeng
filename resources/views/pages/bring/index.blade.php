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
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('header.Company') }}</th>
                                            <th>{{ __('auth.employee_count') }}</th>
                                            <th>{{ __('table.actions') }}</th>
                                            <th>{{ __('table.created_at') }}</th>
                                            <th>{{ __('table.updated_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->company_name }}</td>
                                                <td>{{ $item->employees_count }}</td>
                                                <td data-field="Действие" data-autohide-disabled="false"
                                                    class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button"
                                                                class="btn btn-clean btn-icon btn-sm btn-icon-md"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('view', $item)
                                                                <a href="{{ route('brings.show', $item) }}"
                                                                   class="dropdown-item">
                                                                    <i class="la la-eye"></i> {{ __('table.details') }}
                                                                </a>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('brings.destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                            </tr>
                                        @empty
                                            <tr>
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
                        </div>
                        {!! $items->appends(request()->all())->links() !!}
                    </div>
                </div>
                @include('pages.bring._delete')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script src="{{ asset('admin-assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
