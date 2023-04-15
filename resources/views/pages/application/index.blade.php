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
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('table.full_name') }}</th>
                                            <th>Электронная почта</th>
                                            <th>Phone Number</th>
                                            <th>{{ __('table.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->user->full_name }}</td>
                                                <td>{{ $item->user->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('view', $item)
                                                                <a href="{{ route('applications.show', $item) }}" class="dropdown-item">
                                                                    <i class="la la-eye"></i> Просмотр
                                                                </a>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <form method="POST" action="{{ route('applications.card.destroy', $item) }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="la la-check"></i> Удалить карту
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <form method="POST" action="{{ route('applications.destroy', $item) }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="la la-trash"></i> {{ __('table.destroy') }}
                                                                    </button>
                                                                </form>
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
                                                <td>{{ __('table.not_found') }}</td>
                                                <td>{{ __('table.not_found') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $items->appends(request()->all())->links() !!}
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
