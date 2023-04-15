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
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body row">
                                <div class="form-group col-md-4">
                                    <label for="full_name">{{ __('table.full_name') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <input id="full_name" class="form-control" type="text" value="{{ $item->user->full_name }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="user_email">{{ __('table.email') }} <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <input id="user_email" class="form-control" type="text" value="{{ $item->user->email }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <input id="phone" class="form-control" type="text" value="{{ $item->phone }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_iin">ИИН <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <input id="user_iin" class="form-control" type="text" value="{{ $item->user->iin }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_card_hash">Карта <span class="kt-badge kt-badge--danger kt-badge--dot"></span></label>
                                    <input id="user_card_hash" class="form-control" type="text" value="{{ $item->user->cards()->first()->card_hash }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
