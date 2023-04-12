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
                        <div class="kt-portlet__head-toolbar">
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                                {{ __('auth.back') }}
                            </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body row">
                                    <div class="form-group col-md-12">
                                        <div class="calendar-component">
                                            <ul class="row p-0">
                                                @foreach($date_period as $date)
                                                    @php
                                                        $advance = $employee->accruedAdvances()->where('date', $date)->first();
                                                    @endphp
                                                    <li class="col-md-2 list-group-item">
                                                        @if ($advance)
                                                            <button class="btn btn-secondary w-100 js_delete_modal"
                                                                    data-modal="#modal_delete"
                                                                    data-action="{{ route('employees.accrued.calendar.destroy', ['employee' => $employee, 'advance' => $advance]) }}">
                                                                <p>{{$date->format('d.m.yy')}}</p>
                                                                <p>{{ $date->locale('ru')->dayName }}</p>
                                                                <p>{{ $advance->amount }}₸</p>
                                                            </button>
                                                        @else
                                                            <a href="javascript:" class="btn btn-secondary w-100">
                                                                <p>{{$date->format('d.m.yy')}}</p>
                                                                <p>{{ $date->locale('ru')->dayName }}</p>
                                                                <p>--</p>
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('pages.employee._delete')
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
