<!--begin::Modal-->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('table.edit_form') }} "{{ $title }}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kt_select2_10">{{ __('table.select_month') }}</label>
                        <select class="form-control m-select2" id="kt_select2_10" name="calendar_id">
                            <option></option>
                            @foreach ($months as $month)
                                <option value="{{ $month->id }}">{{ $month->month_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="create_month_dates" class="form-control-label">{{ __('table.day') }}</label>
                        <input type="number" class="form-control" name="day_number" id="create_month_dates">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('table.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('table.save') }}</button>
                </div>
                @csrf
                @method('put')
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->
