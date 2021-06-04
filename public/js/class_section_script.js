// Wait for the DOM to be ready
$(document).ready(function(e){
    TotalStudent();
    $('#success-alert').html('');
    $('#show-class-section-btn').click(function(e){
        $('#class-section-modal').modal('show');
        e.preventDefault();
    });

        $('#add-class-section-btn').click(function(e){
        e.preventDefault();
        //alert('hello');
        //$('#ClassForm')[0].reset();
        $('#add-class-section-form').attr('action', base_url +'add-class-section');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_class_section_data =  $('#add-class-section-form').serialize();
        $.ajax({
            url: base_url + 'add-class-section',
            method: 'post',
            data:  add_class_section_data,
            success: function(result){
                //console.log(result);
                $('.add-div-error').text('');
                if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#class-section-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();
                        /*$('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');*/

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    location.reload();

                }
            }});
    });


    $('#sel_class').change(function(){

        // Department id
        var id = $(this).val();

        // Empty the dropdown
        $('#sel_student').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: base_url +'get-student/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                //console.log(response);
                $("#sel_student").empty();
                $("#sel_student").append('<option value="">Select Student</option>');
                $.each(response , function (key, value) {
                    //console.log(response);
                    $("#sel_student").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');

                    $("#representative").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');

                });


            }
        });
    });
     $('#sel_student').change(function(){
         var count = $("#sel_student :selected").length;
         $("#add-no-of-student").val(count);
     });

     /*for edit modal */
    $("#edit_sel_class").bind("ready change", function(event){
    //$('#edit_sel_class').change(function(){

        // Department id
        var id = $(this).val();
        //alert(id);
        // Empty the dropdown
        $('#edit_sel_student').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: base_url +'get-student/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                //console.log(response);
                $("#edit_sel_student").empty();
                $("#edit_sel_student").append('<option value="">Select Student</option>');
                $.each(response , function (key, value) {
                    $("#edit_sel_student").append('<option value="' + value.std_Id + '" selected>' + value.std_Fname + '</option>');
                    $("#edit-representative").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');


                });
            }
        });
    });

     function TotalStudent(){
        var count = $("#edit_sel_student :selected").length;
        $("#edit-no-of-student").val(count);
    };
    /*$('#edit_sel_student').change(function(){
        var count = $("#edit_sel_student :selected").length;
        $("#edit-no-of-student").val(count);
    });*/
    /*for edit modal */
   /* $('#sel_student').change(function(){

        $('#select-meal-type option:selected').each(function() {
            alert($(this).val());
        });
        // Department id
                //var id = $(this).val();
                //console.log(response);
                //$("#representative").empty();
                //$("#sel_student").append('<option value="">Select Class Representative</option>');
                    var val = $(this).val(),

                        text = $(this).find("option:selected").html();
                    //$("#sel_student").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');
                    //$("#representative").val(val).trigger('change');
                    $("#representative").html('<option value="' + val + '">' + text + '</option>');


        });*/


        $('#update-class-section-btn').click(function(e){
        e.preventDefault();
        //alert('hello');
        //$('#SubjectForm')[0].reset();
        $('#edit-class-section-form').attr('action', base_url +'update-class-section');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_class_section_data =  $('#edit-class-section-form').serialize();
        $.ajax({
            url: base_url + "update-class-section",
            method: 'post',
            data:  edit_class_section_data,
            success: function(result){
                $('.edit-div-error').text('');
                //alert(result);
                if(result.errors)
                {
                    $('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#edit-class-section-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();
                        //$('.edit-div-error').show();
                        //$('.alert-danger').show();
                        //$('#edit-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.edit-div-error').hide();

                    $('#edit-class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    //$('#success-message').delay(2000).fadeOut('slow');
                    location.reload();

                }
            }});
    });

    $('body').on('click', '.edit-class-section-btn', function () {
        var edit_class_section_id = $(this).data('id');

        $.get('edit-class-section/'+edit_class_section_id, function (data) {

            console.log(data);
            $('#edit-class-section-modal').modal('show');
            $('#class-section-id').val(data.c_section_Id);
            $('#edit-class-section-name').val(data.class_section_name);

            $('#edit-no-of-student').val(data.no_of_student);

            $("#edit_sel_class").val(data.cls_Id).trigger('change');
            $("#edit-teacher").val(data.emp_Id).trigger('change');

            $('#edit-representative').append($("<option selected value='"+data.user.std_Id+"'>"+data.user.std_Fname+" "+data.user.std_Mname+"</option>"));
          /*  $.each(data.studentbyids, function(key, val) {



            });*/
            /*var valoresArea = $('#edit-subject').val(data.subject);
            alert(valoresArea);*/
            //var newvaloresArea=data.subject;

           // var values=data.subject;
           // $.each(values.split(","), function(i,e){
               // $(".edit-subject option[value='" + e + "']").prop("selected", true);
           // /});

// it has the multiple values to set separated by comma
            //var arrayArea = newvaloresArea.split(',');
            //alert(newvaloresArea);
         /*   $.each(data.subject, function(key, value) {
                $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });*/
            /*$.each(newvaloresArea, function(key, value){
                //$(this).select2('val', newvaloresArea);
                $('.edit-subject').select2('val',value);
            });
*/





        })
    });
    $('.show-view-class-section-btn').on('click', function () {
        //alert('hello');
        var class_section_id = $(this).data('id');
        $.get('show-class-section/'+class_section_id, function (data) {
           console.log(data);
            $('#view-class-section-modal').modal('show');
            $('#show-class-name').text(data.class);
            $('#show-class-section-name').text(data.class_section_name);
            $('#show-class-strength').text(data.no_of_student);
            $('#show-class-teacher').text(data.emp_given_name);
            $('#show-class-rep').text(data.std_Fname + " " +data.std_Mname);

        })
    });
});

/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/
    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
  /*  window.setTimeout(function () {
        $("#success-message1").alert('close');
    }, 2000);*/
