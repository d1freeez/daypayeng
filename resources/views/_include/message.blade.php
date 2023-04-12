
@if (!$errors->isEmpty())
    @foreach ($errors->all(':message') as $mess)
        <div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="flaticon2-close-cross"></i></button>
            <span>{{ $mess }}</span>
        </div>
    @endforeach
@endif

@if (Session::has('error'))
    <div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="flaticon2-close-cross"></i></button>
        <span>{{ Session::get('error') }}</span>
    </div>
@endif

@if (Session::has('success'))
    <div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="flaticon2-close-cross"></i></button>
        <span>{{ Session::get('success') }}</span>
    </div>
@endif
