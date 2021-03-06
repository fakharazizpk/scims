// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $('#show-subject-btn').click(function(e){
        e.preventDefault();
        $('#SubjectModal').modal('show');
    });

    $('#add-subject-Btn').click(function(e){
        e.preventDefault();
        console.log('subject Modal');
        //$('#SubjectForm')[0].reset();
        $('#SubjectForm').attr('action', base_url +'add-subject');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        let classdata =  $('#SubjectForm').serialize();
        $.ajax({
            url: base_url + 'add-subject',
            method: 'post',
            data:  classdata,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#SubjectModal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#SubjectModal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    //location.reload();

                }
            }});
    });
        $('#update-Btn').click(function(e){
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        //$('#EditSubjectForm').attr('action', base_url +'update-subject');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        let editsubjectdata =  $('#EditSubjectForm').serialize();
        $.ajax({
            url: base_url + "update-subject",
            method: 'post',
            data:  editsubjectdata,
            success: function(result){
                //alert(response.message);
                if(result.errors)
                {
                    $('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#EditSubjectModal').modal('show');
                        $('.edit-div-error').show();
                        //$('.alert-danger').show();
                        $('#edit-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.edit-div-error').hide();

                    $('#EditSubjectModal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    location.reload();

                }
            }});
    });
});

/*
$("#SubjectForm").validate({
    rules:
        {
            name: {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            code: {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            theory_marks: {
                required: true,
            },
            practical_marks: {
                required: true,
            },
            total_marks: {
                required: true,
            },
            passing_marks: {
                required: true,
            },
        },
    messages:
        {
            name: "please enter name",
            code:{
                required: "please enter code",
            },
            theory_marks: "please enter theory marks",
            practical_marks:{
                required: "please retype practical marks",
            },
            total_marks: "please enter total marks",
            passing_marks:{
                required: "please retype passing marks",
            }
        },
            submitHandler: function (form) {
                form.submit();
            }
});
*/

$('body').on('click', '#edit-subject', function () {
    var subject_id = $(this).data('id');
    $.get('edit-subject/'+subject_id, function (data) {
        $('#EditSubjectForm')[0].reset();
        $('#EditSubjectForm').attr('action', base_url +'update-subject');
        $('#EditSubjectModal').modal('show');
        $('#sub_id').val(data.sub_Id);
        $('#sub_name').val(data.subject);
        $('#sub_code').val(data.sub_Code);
        $('#theory_marks').val(data.sub_th_Mks);
        $('#practical_marks').val(data.sub_prac_Mks);
        $('#total_marks').val(data.sub_tot_Mks);
        $('#passing_marks').val(data.sub_pass_Mks);

    })
});

$('body').on('click', '#show-subject', function () {
    alert('fdgfsg');
    var subject_id = $(this).data('id');
    $.get('show-subject/'+subject_id, function (data) {
        $('#Show-Btn').hide();
        $('#ShowSubjectModal').modal('show');
        $('#show_sub_name').html(data.subject);
        $('#show_sub_code').html(data.sub_Code);
        $('#show_theory_marks').html(data.sub_th_Mks);
        $('#show_practical_marks').html(data.sub_prac_Mks);
        $('#show_total_marks').html(data.sub_tot_Mks);
        $('#show_passing_marks').html(data.sub_pass_Mks);

    })


});


    window.setTimeout(function () {
        $("#success-alert1").alert('close');
    }, 5000);
    /*window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
*/
