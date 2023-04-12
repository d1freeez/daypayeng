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
                    <form class="kt-form" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-12">
                                        <label for="faq_question">Фамилия <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" id="faq_question" value="{{ $item->author ? $item->author->s_name : $item->s_name }}" placeholder="Jhon Doe" name="full_name" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="faq_question">Имя <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control" type="text" id="faq_question" value="{{ $item->author ? $item->author->name : $item->name }}" placeholder="Jhon Doe" name="full_name" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="faq_question">Отчество</label>
                                        <input class="form-control" type="text" id="faq_question" value="{{ $item->author ? $item->author->p_name : $item->p_name }}" placeholder="Jhon Doe" name="full_name" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="faq_answer">Описание <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <textarea name="answer" id="faq_answer" class="form-control" data-provide="markdown" rows="10" disabled>{!! $item->description !!}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="kt-checkbox-list">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="answered" {{ $item->answered == 1 ? 'checked' : '' }} disabled> Отвечено
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($item->file_path)
                                        <div class="form-group col-md-12">
                                            <a href="{{ $item->file_path_url }}">{{ $item->file_path_url }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @csrf
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <a href="{{ route('feedback_list') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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
