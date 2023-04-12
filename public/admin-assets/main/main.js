$(function() {
    $('.js_amount_disabled').change(function () {
        let balance = $(this).data('balance');
        let value = $(this).val();
        if (value > balance) {
            $(this).addClass('is-invalid');
            $('.invalid-feedback').html('Ваш баланс не позволяет брать такую сумму.');
            $('.js_button_disabled').attr('disabled', true);
        } else {
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html('');
            $('.js_button_disabled').attr('disabled', false);
        }
    });

    $('.table-responsive').on('show.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "inherit" );
    });

    $('.table-responsive').on('hide.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "auto" );
    });

    let row = $('.summernote').attr('rows');
    let height = row * 10;
    $('.summernote').summernote({
        height: height
    });


});
