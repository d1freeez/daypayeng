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
                    <form class="kt-form" action="{{ route('faqs.store') }}" method="post">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-12">
                                        <label for="for_who">Для кого <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <select name="is_legal" id="for_who" class="form-control">
                                            <option value="x">Для кого?</option>
                                            <option value="0">For employee</option>
                                            <option value="1">For employer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 @error('parent_id') validated @enderror">
                                        <label for="faq_parent">Категория <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <select name="parent_id" id="faq_parent" class="form-control @error('parent_id') is-invalid @enderror">
                                            <option value="x">Выберите для кого</option>
                                        </select>
                                        @error('parent_id')
                                            <div class="valid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 @error('question') validated @enderror">
                                        <label for="faq_question">Вопрос <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <input class="form-control @error('question') is-invalid @enderror" type="text" id="faq_question" name="question" >
                                        @error('question')
                                            <div class="valid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 @error('answer') validated @enderror">
                                        <label for="faq_answer">Ответ <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                        <textarea name="answer" id="faq_answer" class="form-control @error('answer') is-invalid @enderror summernote" rows="30" ></textarea>
                                        @error('answer')
                                            <div class="valid-feedback">{{ $message }}</div>
                                        @enderror
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
                                        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">{{ __('table.close') }}</a>
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

        $('#for_who').change(function () {
            let value = $(this).val();
            let faq_parent = $('#faq_parent');
            $.ajax({
                type: 'GET',
                url: '{{ route('ajax_faq_parents') }}',
                data: {
                    'is_legal': value
                },
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        faq_parent.empty();

                        for (var i = 0; i < data.length; i++) {
                            faq_parent.append('<option id=faq_parent_' + data[i].id + ' value=' + data[i].id + '>' + data[i].title + '</option>');
                        }
                        faq_parent.change();
                    }
                }
            });
        })
    </script>
@endsection
