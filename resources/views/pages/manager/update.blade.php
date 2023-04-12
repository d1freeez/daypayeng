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
                    <form class="kt-form" action="{{ route('managers.update', $item) }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @can('create', 'App\Model\Lib\Company\Company')
                                    <div class="form-group">
                                        <label>{{ __('table.choose_company') }}</label>
                                        <select class="form-control m-select2" name="company_id" required>
                                            <option>{{ __('table.choose_company') }}</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ $item->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
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
                                        <span class="form-text text-muted">{{ __('auth.if_dont_want_change_password') }}</span>
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
                                        <a href="{{ route('managers.index') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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
