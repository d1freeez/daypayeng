@extends('pages.layouts.base')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('_include.message')
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ $title }}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions">
                                {{-- <button type="button" data-toggle="modal" data-target="#create" class="btn btn-outline-brand">
                                    <i class="flaticon2-add-1"></i> {{ __('table.create') }}
                                </button> --}}
                                @can('create', App\Models\Offer::class)
                                    <a href="{{ route('offers.create') }}" class="btn btn-outline-brand">
                                        <i class="flaticon2-add-1"></i> {{ __('table.create') }}
                                    </a>
                                @endcan
                            </div>
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
                                            <th>Название</th>
                                            @can('create', App\Models\Offer::class)
                                                <th>Опубликованность</th>
                                            @endcan
                                            <th>{{ __('table.created_at') }}</th>
                                            <th>{{ __('table.updated_at') }}</th>
                                            <th>{{ __('table.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->title }}</td>
                                                @can('update', $item)
                                                    <td>
                                                    {{ $item->is_published ? 'Опубликован' : 'Не опубликован' }}
                                                    <span class="kt-badge {{ $item->is_published ? 'kt-badge--success' : 'kt-badge--danger' }} kt-badge--dot"></span>
                                                    </td>
                                                @endcan
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('update', $item)
                                                                <a href="{{ route('offers.edit', $item) }}" class="dropdown-item">
                                                                    <i class="la la-edit"></i> {{ __('table.edit') }}
                                                                </a>
                                                                <a href="javascript:" class="dropdown-item"
                                                                    onclick="document.getElementById('offers-{{ $item->id }}-change-publishing-form').submit()">
                                                                    <i class="la {{ !$item->is_published ? 'la-check' : 'la-times' }}"></i> {{ !$item->is_published ? 'Опубликовать' : 'Убрать' }}
                                                                </a>
                                                                <form id="offers-{{ $item->id }}-change-publishing-form" action="{{ route('offers.change.publishing', $item) }}" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                </form>
                                                            @endcan
                                                            @can('view', $item)
                                                                <a href="{{ route('offers.show', $item) }}" class="dropdown-item">
                                                                    <i class="la la-eye"></i> Просмотр
                                                                </a>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('offers.destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                @can('create', App\Models\Offer::class)
                                                    <td>{{ __('table.not_found') }}</td>
                                                @endcan
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pages.lib.offer._delete')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
    <script src="{{ asset('admin-assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
