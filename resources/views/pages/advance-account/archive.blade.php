@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">{{ __('table.filtering') }}</h3>
                        </div>
                    </div>
                    <form class="kt-form" action="" method="get">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-4">
                                        <label for="kt_select2_3">{{ __('table.filter_by_employee_name') }}</label>
                                        <select class="form-control m-select2" id="kt_select2_3" name="user_id">
                                            <option value="x">{{ __('table.choose_employee') }}</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ $employee->id == request()->get('employee_id') ? 'selected' : '' }}>{{ $employee->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="created_at_from">{{ __('table.from') }}</label>
                                        <input id="created_at_from" class="form-control" value="{{ request()->get('created_at_from') }}" type="date" name="created_at_from">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="created_at_to">{{ __('table.to') }}</label>
                                        <input id="created_at_to" class="form-control" value="{{ request()->get('created_at_to') }}" type="date" name="created_at_to">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.filter') }}</button>
                                        <a href="?" class="btn btn-secondary">{{ __('table.clear') }}</a>
                                        @if ($items->count())
                                            <button type="submit" name="export" value="1" class="btn btn-brand"><i class="la la-download"></i> Скачать</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                            @can('create', \App\Models\LibCompany::class)
                                <form action="" method="get" id="filter_form">
                                    <select class="form-control ml-2" name="company_id" id="company_id" style="display: flex;min-width: 200px;">
                                        <option value="x">{{ __('header.Company') }}</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ request()->get('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
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
                                            <th>{{ __('table.employee') }}</th>
                                            <th>{{ __('header.Company') }}</th>
                                            <th>{{ __('table.date') }}</th>
                                            <th>{{ __('table.amount') }}</th>
                                            <th>{{ __('table.commission') }}</th>
                                            <th>{{ __('table.status') }}</th>
                                            @can('delete', App\Models\AdvanceAccount::class)
                                            <th>{{ __('table.actions') }}</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $n = ($items->currentPage() - 1) * $items->perPage() + 1;
                                        @endphp
                                        @forelse ($items as $item)
                                        <tr>
                                                <th scope="row">{{ $n++ }}</th>
                                                <td>{{ $item->user ? $item->user->full_name : 'Пользователь не найден' }}</td>
                                                <td>{{ $item->user ? $item->user->company->name : 'Пользователь не найден' }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->fee }}</td>
                                                <td>
                                                    {{ $item->status }}
                                                    <span class="kt-badge kt-badge--{{ $item->class_name }} kt-badge--dot"></span>
                                                </td>
                                                @can('delete', $item)
                                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <button class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('accounts.destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            </div>
                                                    </div>
                                                </td>
                                                @endcan
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
                                                @can('delete', App\Models\AdvanceAccount::class)
                                                    <td>{{ __('table.not_found') }}</td>
                                                @endcan
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
                <!--begin::Modal-->
                <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('table.destroy_form') }} "{{ $title }}"</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body text-center">
                                    <h4>{{ __('table.destroy_modal_answer') }}</h4>
                                    <p>{{ __('table.destroy_modal_undo') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('table.close') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ __('table.destroy') }}</button>
                                </div>
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <!--end::Modal-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script>
        $('#company_id').change(function () {
            $('#filter_form').submit();
        })
    </script>
@endsection
