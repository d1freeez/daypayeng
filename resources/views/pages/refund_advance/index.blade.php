@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Фильтрация</h3>
                        </div>
                    </div>
                    <form class="kt-form" action="" method="get">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-4">
                                        <label for="employee_select">По имени работника</label>
                                        <select class="form-control m-select2" id="employee_select" name="employee_id">
                                            <option value="x">Выберите сотрдуника</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ $employee->id == request()->get('employee_id') ? 'selected' : '' }}>{{ $employee->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="company_select">ПAbout us работника</label>
                                        <select class="form-control m-select2" id="company_select" name="company_id">
                                            <option value="x">Выберите компанию</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ $company->id == request()->get('company_id') ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="is_finished">По статусу</label>
                                        <select name="is_finished" class="form-control" id="is_finished">
                                            <option value="x"></option>
                                            <option value="1" {{ request()->get('is_finished') == 1 ? 'selected' : '' }}>Возвращенные</option>
                                            <option value="2" {{ request()->get('is_finished') == 2 ? 'selected' : '' }}>Не возвращенные</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">Фильтровать</button>
                                        <a href="?" class="btn btn-secondary">Очистить</a>
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
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ФИО работника</th>
                                            <th>Компания работника</th>
                                            <th>Phone Number</th>
                                            <th>Причина</th>
                                            <th>Возвратил</th>
                                            <th>{{ __('table.actions') }}</th>
                                            <th>{{ __('table.created_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->userName() }}</td>
                                                <td>{{ $item->userCompany() }}</td>
                                                <td>{{ $item->phone() }}</td>
                                                <td>{!! $item->content() !!}</td>
                                                <td>{{ $item->fromUser ? $item->fromUserName() : '' }}</td>
                                                <td data-field="Действие" data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('update', $item)
                                                                <a href="{{ route('refund_application_refund', $item) }}" class="dropdown-item">
                                                                    <i class="la la-send"></i> Вернуть комиссию
                                                                </a>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('backend_bring_destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->created_date }}</td>
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
                @include('pages.refund_advance._delete')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script src="{{ asset('admin-assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
    <script>
        $('#employee_select').select2();
        $('#company_select').select2();
    </script>
@endsection
