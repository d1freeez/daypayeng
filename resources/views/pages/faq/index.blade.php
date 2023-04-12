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
                                @can('create', App\Models\Faq::class)
                                    <a href="{{ route('faqs.create') }}" class="btn btn-outline-brand js_create_modal">
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
                                            <th>Вопрос</th>
                                            <th>Для кого</th>
                                            <th>Категория</th>
                                            <th>{{ __('table.created_at') }}</th>
                                            <th>{{ __('table.updated_at') }}</th>
                                            <th>{{ __('table.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $n = ($items->currentPage() - 1) * $items->perPage() + 1;
                                        @endphp
                                        @forelse ($items as $item)
                                            <tr>
                                                <th scope="row">{{ $n++ }}</th>
                                                <td>{{ $item->question }}</td>
                                                <td>
                                                    {{ $item->is_legal ? 'Для работодателей' : 'Для работников' }}
                                                    <span class="kt-badge {{ $item->is_legal ? 'kt-badge--success' : 'kt-badge--danger' }} kt-badge--dot"></span>
                                                </td>
                                                <td>{{ $item->parent ? $item->parent->title : __('table.not_found') }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                    <div class="dropdown dropdown-inline">
                                                        <button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('update', $item)
                                                                <a href="{{ route('faqs.edit', $item) }}" class="dropdown-item">
                                                                    <i class="la la-edit"></i> {{ __('table.edit') }}
                                                                </a>
                                                                <a href="{{ route('faqs.show', $item) }}" class="dropdown-item">
                                                                    <i class="la la-eye"></i> Посмотреть
                                                                </a>
                                                                <a href="{{ route('faqs.change.legal', $item) }}" class="dropdown-item">
                                                                    <i class="la {{ $item->is_legal ? 'la-check' : 'la-times' }}"></i> Сделать {{ $item->is_legal ? 'Для юридических лиц' : 'Для физических лиц' }}
                                                                </a>
                                                            @endcan
                                                            @can('delete', $item)
                                                                <div class="dropdown-divider"></div>
                                                                <button href="#" class="dropdown-item js_delete_modal"
                                                                        data-modal="#modal_delete"
                                                                        data-action="{{ route('faqs.destroy', $item) }}">
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
                @include('pages.faq._delete')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/main/crud_in_modal.js') }}"></script>
@endsection
