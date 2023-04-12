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
                    <form class="kt-form" action="{{ route('employee-post-update', $item) }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <h3 class="kt-section__title">1. Данные аккаунта:</h3>
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
                                        <label for="">ИИН <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->iin }}" placeholder="123456789101" name="iin" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Номер уд. лич. <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->id_number }}" placeholder="123456789" name="id_number" maxlength="9" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Номер труд. договора <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->e_number }}" name="e_number" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Должность <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" placeholder="Инженер" value="{{ $item->position }}" type="text" name="position" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Зарплата в месяц <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">&#8376;</span></div>
                                            <input type="number" value="{{ $item->m_amount }}" class="form-control" name="m_amount">
                                        </div>
                                    </div>
                                </div>
                                <h3 class="kt-section__title">2. Банковские реквезиты:</h3>
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-6">
                                        <label for="">БИК банка <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->bik }}" name="bik" autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Номер карты <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" value="{{ $item->c_number }}" name="c_number" autocomplete="off" maxlength="12" required >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Автоматом будет получать выплату</label>
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="without_checking" {{ $item->without_checking == 1 ? 'checked' : '' }}> Да
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">Если хотите чтобы этот работник проходил проверку, то не ставьте галочку!</span>
                                    </div>
                                    <div class="form-group col-md-12 mb-0">
                                        <label>Фото*</label>
                                        <input type="file" class="js_file_update_single" name="photo" accept="image/png, image/jpeg, image/gif image/svg" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        @csrf
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-success">{{ __('table.save') }}</button>
                                        <a href="{{ route('employee-list') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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
    </script>

@endsection
