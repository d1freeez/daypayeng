<!--begin::Modal-->
<div class="modal fade" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('table.rejecting_request') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reason_rejection">{{ __('table.rejecting_desc') }}</label>
                        <textarea name="reason_rejection" class="form-control" id="reason_rejection" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('table.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('table.reject') }}</button>
                </div>
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->
