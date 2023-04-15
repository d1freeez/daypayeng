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
                            @can('create', App\Models\Manager::class)
                                <a href="{{ route('managers.create') }}" class="btn btn-outline-brand js_create_modal">
                                    <i class="flaticon2-add-1"></i> {{ __('table.create') }}
                                </a>
                            @endcan
                            @can('create', App\Models\LibCompany::class)
                                <form action="" method="get" id="filter_form">
                                    <select class="form-control ml-2" name="company_id" id="company_id" style="display: flex;min-width: 200px;">
                                        <option value="x">{{ __('header.Company') }}</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ request()->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            @endcan
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
                                            <th>{{ __('table.full_name') }}</th>
                                            <th>{{ __('table.email') }}</th>
                                            @can('create', App\Models\LibCompany::class)
                                                <th>{{ __('header.Company') }}</th>
                                            @endcan
                                            <th>{{ __('table.active') }}</th>
                                            <th>{{ __('table.created_at') }}</th>
                                            <th>{{ __('table.updated_at') }}</th>
                                            <th>{{ __('table.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $n = ($items->currentPage() - 1) * $items->perPage() + 1;
                                        @endphp
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $n++ }}</th>
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                @can('create', App\Models\LibCompany::class)
                                                    <td>{{ $item->company->name }}</td>
                                                @endcan
                                                <td>
                                                    {{ $item->is_active == 1 ? 'Active' : 'Не активен' }}
                                                    <span class="kt-badge {{ $item->is_active == 1 ? 'kt-badge--success' : 'kt-badge--danger' }} kt-badge--dot"></span>
                                                </td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('update', $item)
                                                                <a href="{{ route('managers.edit', $item) }}" class="dropdown-item">
                                                                    <i class="la la-edit"></i> {{ __('table.edit') }}
                                                                </a>
                                                                <a href="{{ route('managers.change.activity', $item) }}" class="dropdown-item">
                                                                    <i class="la {{ $item->is_active == 0 ? 'la-check' : 'la-times' }}"></i> {{ $item->is_active == 0 ? __('table.activate') : __('table.deactivate') }}
                                                                </a>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('managers.destroy', $item) }}">
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
                                                @can('create', 'App\Model\Lib\Company\Company')
                                                    <td>{{ __('table.not_found') }}</td>
                                                @endcan
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
                @include('pages.employee._delete')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script src="{{ asset('admin-assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
    <script>
        $('#company_id').change(function () {
            $('#filter_form').submit();
        })
    </script>
@endsection
