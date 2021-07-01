$(function() {
    $("ul.droptrue").sortable({
        connectWith: "ul",
        receive:function(event,ui){
            console.log(this.id)
            console.log(ui.item[0].id)
           
            $.ajaxSetup({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:window.location.origin + "/durumupdate/" ,
                data: { colon_id: this.id + "",
                        card_id:ui.item[0].id},
                success: function(response){console.log(response)},
                error : function (response){console.log(response)}
            });
        }
    });
    console.log(this.id)
    $("#sortable1, #sortable2, #sortable3").disableSelection();
});

// $( document ).ready(function() {
//     console.log( "ready!" );
// });