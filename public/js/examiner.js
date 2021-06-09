$(document).ready(function(){
    $('#success-alert').html('');
    $('#schedule-exam-btn').click(function(e){

        e.preventDefault();
        $('#schedule-exam').modal('show');
    });

    $('#add-schedule-exam-btn').click(function(e){
        e.preventDefault();
        alert('hhurturtuh');
        console.log('Shedule Exam Modal');
        //$('#SubjectForm')[0].reset();
        $('#Shedule-Exam-Form').attr('action', base_url +'examiner/add-schedule-exam');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var examdata =  $('#Shedule-Exam-Form').serialize();
        $.ajax({
            url: base_url + 'examiner/add-schedule-exam',
            method: 'post',
            data:  examdata,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#schedule-exam').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();
                        //$('.add-div-error').show();
                        //$('.alert-danger').show();
                        //$('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#schedule-exam').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    location.reload();
                }
            }});
    });

    $('body').on('click', '.edit-schedule-exam-btn', function () {
        var exam_id = $(this).data('id');

        $.get('edit-schedule-exam/'+exam_id, function (data) {

            console.log(data);
            $('#edit-schedule-exam-modal').modal('show');

                        $('#edit-exam-id').val(data.exam_Id);
                        $('#edit-exam-name').val(data.exam_Name);
                        $('#edit-exam-start').val(data.exam_Start);
                        $('#edit-exam_end').val(data.exam_End);
                        $('#edit-exam-Comment').text(data.exam_Comment);

                    /*    var num = data.sc_sec_Id;
                        $("#edit-school-section").val(data.sc_sec_Id).trigger('change');
                        $("#edit-subject").val(data.selectedSubjectIds).trigger('change');*/

        })
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
        var editsubjectdata =  $('#EditSubjectForm').serialize();
        $.ajax({
            url: base_url + "update-subject",
            method: 'post',
            data:  editsubjectdata,
            success: function(result){
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#EditSubjectModal').modal('show');
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