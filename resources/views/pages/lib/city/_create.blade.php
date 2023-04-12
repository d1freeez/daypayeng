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
                    <div class="form-group">
                        <label for="country">{{ __('table.select_region') }}</label>
                        <select class="form-control m-select2" id="kt_select2_10" name="region_id">
                            <option></option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">{{ __('table.name') }}</label>
                        <input type="text" class="form-control" name="name">
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
