@if (!$errors->isEmpty())
    @foreach ($errors->all(':message') as $mess)
        @php
            toastError($mess)
        @endphp
    @endforeach
@endif
