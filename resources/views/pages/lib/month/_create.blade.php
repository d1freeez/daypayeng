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
                        <label for="create_month_number" class="form-control-label">{{ __('table.month') }}</label>
                        <input type="month" class="form-control" name="month_number" id="create_month_number">
                    </div>
                    <div class="form-group">
                        <label for="create_month_dates" class="form-control-label">{{ __('table.month_dates') }}</label>
                        <input type="number" class="form-control" name="month_dates" id="create_month_dates">
                    </div>
                    <div class="form-group">
                        <label for="create_five_working_days" class="form-control-label">{{ __('table.w_days_five') }}</label>
                        <input type="number" class="form-control" name="five_working_days" id="create_five_working_days">
                    </div>
                    <div class="form-group">
                        <label for="create_six_working_days" class="form-control-label">{{ __('table.w_days_six') }}</label>
                        <input type="number" class="form-control" name="six_working_days" id="create_six_working_days">
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
