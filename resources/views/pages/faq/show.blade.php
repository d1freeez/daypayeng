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
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body row">
                                <div class="form-group col-md-12">
                                    <label for="faq_question">Вопрос <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <input class="form-control" type="text" id="faq_question" value="{{ $item->question }}" placeholder="Jhon Doe" name="full_name" disabled>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="faq_answer">Ответ <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <textarea name="answer" id="faq_answer" class="form-control summernote" rows="30" disabled >{!! $item->answer !!}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="kt-checkbox-list">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="is_legal" {{ $item->is_legal == 1 ? 'checked' : '' }} disabled> Для юридических лиц
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <a href="{{ route('faqs.index') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
