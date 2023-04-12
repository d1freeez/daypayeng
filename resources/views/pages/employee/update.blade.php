@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('_include.message')
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ $title }}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('employees.update', $item) }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @if(auth()->user()->type == App\Enums\UserType::ADMIN)
                                    <div class="form-group">
                                        <label for="company_id">{{ __('table.choose_company') }}</label>
                                        <select class="form-control m-select2" name="company_id" id="company_id" required>
                                            <option>{{ __('table.choose_company') }}</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ $item->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ajax_department_id">{{ __('table.choose_department') }}</label>
                                        <select class="form-control m-select2" id="ajax_department_id" name="department_id" data-item-value="{{ $item->department_id }}" required>
                                            <option>{{ __('table.choose_department') }}</option>
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="ajax_department_id">{{ __('table.choose_department') }}</label>
                                        <select class="form-control m-select2" id="ajax_department_id" name="department_id" required>
                                            <option>{{ __('table.choose_department') }}</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" {{ $item->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.full_name') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->full_name }}" placeholder="Jhon Doe" name="full_name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.email') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="email" value="{{ $item->email }}" placeholder="example@mail.ru" name="email" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('auth.password') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="password" placeholder="********" name="password">
                                        <span class="form-text text-muted">Если пароль не изменен поле оставьте пустым</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.iin') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->iin }}" placeholder="123456789101" name="iin" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.id_number') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->id_number }}" placeholder="123456789" name="id_number" maxlength="9" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.employment_contract_number') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->e_number }}" name="e_number" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.position') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" placeholder="Инженер" value="{{ $item->position }}" type="text" name="position" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.salary_month') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">&#8376;</span></div>
                                            <input type="number" value="{{ $item->m_amount }}" class="form-control" name="m_amount">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>{{ __('table.automatic_receive_payment') }}</label>
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="without_checking" {{ $item->without_checking == 1 ? 'checked' : '' }}> {{ __('table.yes') }}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @csrf
                        @method('put')
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.save') }}</button>
                                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.m-select2').select2();
        $('#company_id').on('change', function () {
            let company_id = $(this).val();
            $.ajax({
                url: '/ajax/company/' + company_id + '/departments',
                type: 'GET',
                dataType: 'json'
            }).done(function (data) {
                let select = $('#ajax_department_id');
                select.empty();
                select.append('<option>Выберите отделение</option>');
                let department_id = select.data('item-value')
                $.each(data,function(key, val) {
                    if (department_id && val.id === department_id) {
                        select.append('<option value=' + val.id + ' selected>' + val.name + '</option>');
                    } else {
                        select.append('<option value=' + val.id + '>' + val.name + '</option>');
                    }
                });
            })
        }).trigger('change');
    </script>

@endsection
