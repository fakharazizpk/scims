// Wait for the DOM to be ready
$(document).ready(function(){
    //alert('hello');
    $('#show-user-btn').click(function(e){
        $('#user-form')[0].reset();
        $('#user-form').attr('action', base_url +'add-user');
        $('#modal-title').html("Add New User");
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: base_url + "add-user",
            method: 'post',
            data:  $(this).serialize(),
            success: function(result){
                if(result.errors)
                {
                    $('.alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(result.errors);

                        $('#user-modal').modal('show');
                        $('.alert-danger').show();
                        $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    $('.alert-danger').hide();
                    //$('#open').hide();
                    $('#user-modal').modal('hide');
                }
            }});
    });
});

$("#user-form").validate({
    rules:
        {
            user_type: {
                required: true,
            },
            given_name: {
                required: true,
                minlength: 3,
                maxlength: 50,
                lettersonly: true
            },
            user_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 5
            },

            password_confirmation: {
                required: true,
                minlength: 5,
                equalTo: "#userPassword"
            },
         },
    messages:
        {
            user_type: "please select user type",
            given_name:{
                required: "please enter given name",
            },
            user_name: "please enter username",
            password:{
                required: "please enter password",
            },
            password_confirmation:{
                required: "please enter confirm password",
            }
        },
            submitHandler: function (form) {
                form.submit();
            }
});
$("#edit-user-form").validate({
    rules:
        {
            user_type: {
                required: true,
            },
            given_name: {
                required: true,
                minlength: 3,
                maxlength: 50,
                lettersonly: true
            },
            user_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            password: {

            },

            password_confirmation: {
                required: true,
                minlength: 5,
                equalTo: "#userPassword"
            },
         },
    messages:
        {
            user_type: "please select user type",
            given_name:{
                required: "please enter given name",
            },
            user_name: "please enter username",
            password:{

            },
            password_confirmation:{

            }
        },
            submitHandler: function (form) {
                form.submit();
            }
});
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters");

$('body').on('click', '#edit-user', function () {
    var user_id = $(this).data('id');
    $.get('edit-user/'+user_id, function (data) {
        //console.log(data);
        $('#modal-title').html("Edit User Detail");
        //$('#Save-Btn').val("Update");
        //$('#Save-Btn').prop('disabled',false);
        $('#edit-user-form').attr('action', base_url +'update-user/'+user_id);
        $('#edit-user-modal').modal('show');
        $('#edit-user-id').val(data.id);
        $('[id=edit-user-type] option').filter(function() {
            return ($(this).text() == data.user_type); //To select Green
        }).prop('selected', true);
        //$('#edit-user-type option:selected').text(user_type);
        $('#edit-name').val(data.name);
        $('#edit-username').val(data.username);
        //$('#edit-status').val(data.status === 'Active').attr("checked", "checked")

        //$('#edit-status').val(data.staus);
    })
});

$('body').on('click', '#show-user', function () {
    var user_id = $(this).data('id');
    $.get('show-user/'+user_id, function (data) {
        //console.log(data);
        $('#modal-title').html("VIEW USER DETAIL");
        $('#show-save-btn').hide();
        //$('#Save-Btn').prop('disabled',false);
        $('#show-user-modal').modal('show');
        $('#show-user-type').html(data.user_type);
        $('#show-name').html(data.name);
        $('#show-username').html(data.username);
        $('#show-status').html(data.status);

    })


});


    window.setTimeout(function () {
        $("#success-alert").alert('close');
    }, 2000);
