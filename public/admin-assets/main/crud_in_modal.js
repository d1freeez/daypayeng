$('.js_create_modal').click(function(){
    let modal_id = $(this).data('modal');
    let action = $(this).data("action");

    $( modal_id+" .form-control" ).each(function( index ) {
        $(this).val(null);

        $(modal_id + " form").attr("action", action);

        $(modal_id).modal('show');
    });
});

$('.js_update_modal').click(function(){
    let modal_id = $(this).data('modal');
    let action_item = $(this).data('item');
    let action = $(this).data('action');


    $.get( action_item, function( data ) {

        $( modal_id+" .form-control" ).each(function( index ) {
            let name = $(this).attr('name');


            if (data[name] == undefined || name == 'password')
                return true;

            $(this).val(data[name]);
        });

        $( modal_id+" form" ).attr('action', action);

        $(modal_id).modal('show');
    });
});

$('.js_show_modal').click(function(){
    let modal_id = $(this).data('modal');
    let action = $(this).data('action');
    $.get( action, function( data ) {
        $( modal_id+" .form-control" ).each(function( index ) {
            let name = $(this).attr('name');

            if (data[name] == undefined)
                return true;

            $(this).val(data[name]);
        });

        if ( $( modal_id+" .img-circle" ).length){
            if (data.photo != null && data.photo != undefined){
                $( modal_id+" .img-circle" ).parent().show();
                $( modal_id+" .img-circle" ).attr('src', '/'+data.photo)
            }
            else {
                $( modal_id+" .img-circle" ).parent().hide();
            }
            console.log(data);
        }


        $(modal_id).modal('show');
    });

});

$('.js_delete_modal').click(function(){
    let modal_id = $(this).data('modal');
    let action = $(this).data('action');
    console.log(modal_id);
    $( modal_id+" form" ).attr('action', action);
    $(modal_id).modal('show');
});
