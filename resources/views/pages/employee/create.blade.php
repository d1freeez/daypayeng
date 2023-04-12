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
                    <form class="kt-form" action="{{ route('employees.store') }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @if(auth()->user()->type == App\Enums\UserType::ADMIN)
                                    <div class="form-group">
                                        <label for="company_id">{{ __('header.Company') }}</label>
                                        <select class="form-control m-select2" id="company_id" name="company_id" required>
                                            <option>{{ __('table.choose_company') }}</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ajax_department_id">{{ __('titles.Departments') }}</label>
                                        <select class="form-control m-select2" id="ajax_department_id" name="department_id" required>
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="ajax_department_id">{{ __('titles.Departments') }}</label>
                                        <select class="form-control m-select2" id="ajax_department_id" name="department_id" required>
                                            @foreach($departments as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.full_name') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" placeholder="Jhon Doe" name="full_name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.email') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="email" placeholder="example@mail.ru" name="email" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.iin') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" placeholder="123456789101" name="iin" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.id_number') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" placeholder="123456789" name="id_number" maxlength="9" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">{{ __('table.employment_contract_number') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" name="e_number" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.position') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" placeholder="Engineer" type="text" name="position" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('table.salary_month') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">&#8376;</span></div>
                                            <input type="number" class="form-control" name="m_amount">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>{{ __('table.automatic_receive_payment') }}</label>
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="without_checking"> {{ __('table.yes') }}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @csrf
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.create') }}</button>
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
        $('.m-select2').select2({
            placeholder: "Выберите отделение",
            allowClear: true
        });
        $('#company_id').on('change', function () {
            let company_id = $(this).val();
            $.ajax({
                url: '/ajax/company/' + company_id + '/departments',
                type: 'GET',
                dataType: 'json'
            }).done(function (data) {
                let select = $('#ajax_department_id');
                select.empty();
                // select.append('<option>Выберите отделение</option>');
                $.each(data,function(key, val) {
                    select.append('<option value=' + val.id + '>' + val.name + '</option>');
                });
            })
        });
        $('#card_input_mask').inputmask('9999 9999 9999 9999');
    </script>

@endsection
