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
                                @can('create', App\Model\SuperManager\SuperManager::class)
                                    <a href="{{ route('user_tariff_create') }}" class="btn btn-outline-brand">
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
                                            <th>{{ __('table.user') }}</th>
                                            <th>{{ __('table.tariff') }}</th>
                                            <th>{{ __('table.expires') }}</th>
                                            <th>{{ __('table.expired') }}</th>
                                            <th>{{ __('table.paid') }}</th>
                                            @can('delete', new \App\Model\Tariff\Tariff())
                                                <th>{{ __('table.actions') }}</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $n = ($items->currentPage() - 1) * $items->perPage() + 1;
                                        @endphp
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $n++ }}</th>
                                                <td>{{ $item->user->full_name }}</td>
                                                <td>{{ $item->tariff ? $item->tariff->title : '' }}</td>
                                                <td>{{ $item->expire_date }}</td>
                                                <td>
                                                    {{ $item->isExpired() ? 'Да' : 'Нет' }}
                                                    <span class="kt-badge {{ $item->isExpired() ? 'kt-badge--success' : 'kt-badge--danger' }} kt-badge--dot"></span>
                                                </td>
                                                <td>
                                                    {{ $item->isPaid() ? 'Да' : 'Нет' }}
                                                    <span class="kt-badge {{ $item->isPaid() ? 'kt-badge--success' : 'kt-badge--danger' }} kt-badge--dot"></span>
                                                </td>
                                                @can('delete', new \App\Model\Tariff\Tariff())
                                                    <td>
                                                        <div class="dropdown dropdown-inline">
                                                            <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="flaticon-more"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('user_tariff_edit', $item) }}">
                                                                    <i class="fa fa-pen"></i> {{ __('table.edit') }}
                                                                </a>
                                                                <button class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('user_tariff_destroy', $item) }}">
                                                                    <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $items->appends($request->all())->links() !!}
                    </div>
                </div>
                <!--begin::Modal-->
                <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('table.destroy_form') }} "{{ $title }}"</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body text-center">
                                    <h4>{{ __('table.destroy_modal_answer') }}</h4>
                                    <p>{{ __('table.destroy_modal_undo') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('table.close') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ __('table.destroy') }}</button>
                                </div>
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <!--end::Modal-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
@endsection
