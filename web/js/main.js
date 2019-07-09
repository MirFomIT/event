

$('td').on('click', function () {
    var id = $(this).attr("id");
    var text = $(this).text();
    //alert(text);
    if(text>0){
        var text = $(this).text()-1;
        $(this).text(text);
        //console.log(id);
     //   alert(text);
    }else{
        var text = "no places!!"
        //alert(text);
    }

});

$(document).ready(function () {
   $('#basicExample').timepicker();

    //button "go"
    $('.go').click(function () {
        //the 'id' is all elements for this 'tr'
        var id = $(this).attr('id').match(/\d+/);

        // var free_places = $('.free_places').attr('class');
        var id_free_places = 'id_'+id+'_modal_free_places';
        var td_event_id = 'id_'+id+'_modal_event_title';
        var td_place_id = 'id_'+id+'_modal_event_places';
        var td_date_time_id = 'id_'+id+'_modal_event_date_time';
       // var id_button_go = 'go_'+id;
       // var id_button_delete ='delete_'+id;
        //alert(td_event_id);

        var text_free_places = $("#"+id_free_places).text();
        var text_modal_event = $("#"+td_event_id).text();
        var text_modal_place = $("#"+td_place_id).text();
        var text_date_time = $("#"+td_date_time_id).text();
        if(text_free_places > 0){
            $('#modal-text').text("You reserved ");
            //$('#modal_event').text();
            text_free_places --;
            $("#"+id_free_places).text(text_free_places);
            $("#modal_event").text(text_modal_event);
            $("#modal_place").text("1");
            $("#modal_address").text(text_modal_place);
            $("#modal_time").text(text_date_time);
            //$("#"+id_free_places).text($('#datepicker').val());
//$('#modal-text').text('add');
        }else{
            alert("no places!!");
        }
    });
    //button "delete"
    $('.delete').click(function () {
        var id = $(this).attr('id').match(/\d+/);

        // var free_places = $('.free_places').attr('class');
        var id_free_places = 'id_'+id+'_modal_free_places';
        var td_event_id = 'id_'+id+'_modal_event_title';
        var td_place_id = 'id_'+id+'_modal_event_places';
        var td_date_time_id = 'id_'+id+'_modal_event_date_time';
        // var id_button_go = 'go_'+id;
        // var id_button_delete ='delete_'+id;
        //alert(td_event_id);

        var text_free_places = $("#"+id_free_places).text();
        var text_modal_event = $("#"+td_event_id).text();
        var text_modal_place = $("#"+td_place_id).text();
        var text_date_time = $("#"+td_date_time_id).text();
        if(text_free_places>0){
            $('#modal-text').text("You deleted ");
            //$('#modal_event').text();
            text_free_places ++;
            $("#"+id_free_places).text(text_free_places);
            $("#modal_event").text(text_modal_event);
            $("#modal_place").text("-1");
            $("#modal_address").text(text_modal_place);
            $("#modal_time").text(text_date_time);
        }else{
            alert("no places!!");

        }
    });

    $('#btn_submit').click(function(){
        var tmp = $('#event_title').text();
        //$('#event_count_places').text(tmp);
       // console.log(tmp);
    });

    $(".center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 5,
            slidesToScroll: 3
        });
    //$('.btn_add_new_events').css('visibility' ,'hidden');
    if($("a[href$='/site/logout']")){
        $('.btn_add_new_events').css('visibility' ,'visible');
    }

    $( "#select_category_id" ).change(function() {
       // $('#input_new_category').css('display','none');

    });
    $('#input_new_category ').css('display','none');
    $('form-group field-input_new_category required has-error').css('display','none');
    $( "select" )
        .change(function () {

            $( "select#select_category_id option:selected" ).each(function() {
                var text = $( "select#select_category_id option:selected" ).text();;
                //alert(text);
                if(text == 'new category') {
                   var w =  $('#select_category_id').width();
                   var h = $('#select_category_id').html();
                    $('#input_new_category').show();
                    $('form-group field-input_new_category required has-error').show();
                    $('#input_new_category').width(w);
                    $('#input_new_category').height(h);
                  //  $('#input_new_category').css('width','50%');
                }else{
                    $('#input_new_category').hide();
                    $('form-group field-input_new_category required has-error').hide();
                    //$('#select_category_id').css('width','100%');
                }
            });
            //$( "div" ).text( str );
        })
// .change();
    $(function()
    {
        $('#event_image').on('change',function ()
        {
            var filePath = $(this).val();

           // blabla.replace("/s","+")
            //var res = s.split('=').pop();
            filePath = filePath.replace(/[[\]\\]/g, "/");
            //filePath = filePath.split('/').pop();
//alert(filePath);
            $('#update_img').attr('src',filePath.replace(/[[\]\\]/g, "/"));
        });
    });

});


