<!--begin::Modal-->
<div class="modal fade" id="modal_accrual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="start_date">{{ __('table.from') }}</label>
                        <input type="date" class="form-control" name="start_date" id="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">{{ __('table.to') }}</label>
                        <input type="date" class="form-control" name="end_date" id="end_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('table.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('table.accrue') }}</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->
