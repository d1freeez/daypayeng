<!--begin::Modal-->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('table.create_form') }} "{{ $title }}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @can('create', \App\Models\LibCompany::class)
                        <div class="form-group">
                            <label for="kt_select2_10">{{ __('header.Company') }} *</label>
                            <select class="form-control m-select2" id="kt_select2_10" name="company_id" required>
                                <option></option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    <div class="form-group">
                        <label for="kt_select2_10">{{ __('table.appointed_manager') }} *</label>
                        <select class="form-control m-select2" id="kt_select2_10" name="manager_id" required>
                            <option></option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="create_name" class="form-control-label">{{ __('table.name') }} *</label>
                        <input type="text" class="form-control" name="name" id="create_name" required>
                    </div>
                    <div class="form-group">
                        <label for="create_description" class="form-control-label">{{ __('table.description') }}</label>
                        <textarea name="description" class="form-control" id="create_description" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('table.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('table.create') }}</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->
