// Wait for the DOM to be ready
$(document).ready(function(e){

    /*disable input field of disability*/

   /* $("select.disability-dropdown").change(function() {
        if ($(this).val() == 3) {
            $("#disability-input").attr("disabled", "disabled");
        } else {
            $("#disability-input").removeAttr("disabled");
        }
    }).trigger("change");*/

    /*disable input field of disability*/



    $('#success-alert').html('');
        $('.add-employee-submit-btn').click(function(e){
            alert('hello');
        e.preventDefault();
        $('#admission-form').attr('action', base_url +'admission-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var admission_data =    new FormData($('#admission-form')[0]);
        $.ajax({
            url: base_url + 'admission-info',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data:  admission_data,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        //$('#class-section-modal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');

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
                    //location.reload();

                }
            }});
    });

    $("#std-date-of-birth").blur(function() {

        calculateAge();
    });

    $("#std-date-of-birth").keyup(function(){

            calculateAge();

        });

        function calculateAge()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        var today = new Date();
        var birthDate = new Date($('#std-date-of-birth').val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return $('#std-age').val(age);

    }
    /*add gardian */
    $('#success-alert').html('');
    $('#show-guardian-modal-btn').click(function(e){
        $('#add-guardian-modal').modal('show');
        e.preventDefault();
    });

    $('#save-guardian-modal-btn').click(function(e){
        e.preventDefault();
        //alert('hello');
        //$('#add-guardian-form')[0].reset();
        $('#add-guardian-form').attr('action', base_url +'add-guardian');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var formData = new FormData($('#add-guardian-form')[0]);//$('#add-guardian-form').serialize();
        $.ajax({
            url: base_url + 'add-guardian',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: formData,

            success: function(result){
                //console.log(result);
                if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-guardian-modal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#add-guardian-form')[0].reset();
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#add-guardian-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    //location.reload();
                    guardianAppend();

                }
            }});
    });
    /*add gardian*/

 /*add mother */
    //$('#success-alert').html('');
    $('#mymother-modal-btn').click(function(e){
        $('#mymother-modal').modal('show');
        e.preventDefault();
    });

    $('#add-mother-save-btn').click(function(e){
        e.preventDefault();
        $('#add-mother-form').attr('action', base_url +'add-mother');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_mother_data = new FormData($('#add-mother-form')[0]);
            //$('#add-mother-form').serialize();
        $.ajax({
            url: base_url + 'add-mother',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_mother_data,
            success: function(result){
                //console.log(result);
                if(result.errors)
                {
                    $('#add-mother-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#mymother-modal').modal('show');
                        $('.add-mother-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-mother-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.add-mother-div-error').hide();

                    $('#mymother-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');

                     motherAppend();

                }
            }});
    });
   /* add mother*/

    function motherAppend()
    {
        //$('#guardian-mother-dropdown').find('option').not(':first').remove();
        //console.log('motherAppend call...');
        var studentSelect = $('#guardian-mother-dropdown');
        $.ajax({
            type: 'GET',
            url: base_url +'get-guardian-mother',
        }).then(function (data) {
            // create the option and append to Select2
            var option = new Option(data.pnt_Fname + " "+ data.pnt_Mname +" "+ data.pnt_Lname, data.pnt_Id, true, true);
            studentSelect.append(option).trigger('change');

            // manually trigger the `select2:select` event
            studentSelect.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });
    }


    /*function myAppendNow(newOption) {
        // var newOption = new Option('TEST TEST DDDDDDD www', 'myoption', false, false);
        console.log('newOption >>>>', newOption);
        $('#guardian-mother-dropdown').append(newOption).trigger('change');
    }

    function myAlert(opt) {
        alert(JSON.stringify(opt));
    }*/

    function guardianAppend()

    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var guardianFather = $('#guardian-dropdown');
        $.ajax({
            type: 'GET',
            url: base_url +'get-guardian-father',
        }).then(function (data) {
            // create the option and append to Select2
            var option = new Option(data.pnt_Fname + " "+ data.pnt_Mname +" "+ data.pnt_Lname , data.pnt_Id, true, true);
            guardianFather.append(option).trigger('change');

            // manually trigger the `select2:select` event
            guardianFather.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });
        // Department id
        //var id = $(this).val();

        // Empty the dropdown
        //$('#guardian-dropdown').find('option').not(':first').remove();

        // AJAX request
     /*   $.ajax({
            url: base_url +'get-guardian-father',
            type   : 'get',
            success: function(response){
                console.log(response);
                //$(".guardian-dropdown").empty();
                //$(".guardian-dropdown").append('<option value="">Select Guardian</option>');
                //$.each(response , function (key, value) {
                    //$("select.guardian-father-div").append(value.pnt_Id + value.pnt_Fname+ value.pnt_Mname  + value.pnt_Lname);
                //$('#guardian-dropdown').append($("<option></option>").attr("value", response.pnt_Id).text(response.pnt_Fname));
                //$('#guardian-dropdown').append($('<option>', { value : response.pnt_Id }).text(response.pnt_Fname));
                    $(".guardian-dropdown").append('<option value="' + response.pnt_Id + '">" + response.pnt_Fname + "</option>');
                    //$("#guardian-dropdown").append(new Option("option text", "value"));
                    //});
            }
        });*/
    }


  $('#guardian-dropdown').bind('ready load change', function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          // Department id
          var id = $(this).val();
          alert(id);
          // Empty the dropdown
          //$('#guardian-dropdown').find('option').not(':first').remove();

          // AJAX request
          $.ajax({
              url: base_url +'get-guardian-father-image/'+id,
              type   : 'get',
              success: function(response){
                  console.log(response);
                  $('#grdPicturePreview').attr("src", base_url+"upload/guardian/"+response.guardian_image);
              }
          });
      });
    $('#guardian-mother-dropdown').bind('ready load change', function () {
    //$('#guardian-mother-dropdown').change(function(){

        // Department id
        var id = $(this).val();
        //alert(id);
        // Empty the dropdown
        //$('#guardian-dropdown').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: base_url +'get-guardian-mother-image/'+id,
            type   : 'get',
            success: function(response){
                console.log(response);
                $('#grdMotherPreview').attr("src", base_url+"upload/guardian/"+response.guardian_image);
            }
        });
    });

   /* $('.admission-btn-save-exit-submit').click(function (e){
        $('#admission-form').attr('id', 'admission-form');
        //e.preventDefault();
        $('#admission-form').attr('action', base_url +'admission-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var admission_data =  $('#admission-form').serialize();
        $.ajax({
            url: base_url + 'admission-info',
            method: 'post',
            data:  admission_data,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        //$('#class-section-modal').modal('show');
                        //$('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    //$('.add-div-error').hide();

                    //$('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    //location.reload();

                }
            }});
    });
*/
    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);


    /*  $('.save-guardian-modal-btn').click(function(){

        });

        $('.add-mother-save-btn').click(function(){
            // Empty the dropdown

        });*/

    /*
     $('#sel_student').change(function(){
         var count = $("#sel_student :selected").length;
         $("#add-no-of-student").val(count);
     });

     /!*for edit modal *!/
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
                console.log(response);
                $("#edit_sel_student").empty();
                $("#edit_sel_student").append('<option value="">Select Student</option>');
                $.each(response , function (key, value) {
                    $("#edit_sel_student").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');

                    $("#edit-representative").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');
                });


            }
        });
    });

    $('#edit_sel_student').change(function(){
        var count = $("#edit_sel_student :selected").length;
        $("#edit-no-of-student").val(count);
    });*/



/*        $('#update-class-section-btn').click(function(e){
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
        let edit_class_section_data =  $('#edit-class-section-form').serialize();
        $.ajax({
            url: base_url + "update-class-section",
            method: 'post',
            data:  edit_class_section_data,
            success: function(result){
                //alert(result);
                if(result.errors)
                {
                    $('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#edit-class-section-modal').modal('show');
                        $('.edit-div-error').show();
                        //$('.alert-danger').show();
                        $('#edit-alert-danger').append('<li>'+value+'</li>');

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

            console.log(data.studentbyids);
            $('#edit-class-section-modal').modal('show');
            $('#class-section-id').val(data.c_section_Id);
            $('#edit-class-section-name').val(data.class_section_name);

            $('#edit-no-of-student').val(data.no_of_student);

            $("#edit_sel_class").val(data.cls_Id).trigger('change');
            $("#edit-teacher").val(data.emp_Id).trigger('change');
            $("#edit-representative").val(data.crep_Id).trigger('change');
            $("#edit_sel_student").val(data.student).trigger('change');
          /!*  $.each(data.studentbyids, function(key, val) {



            });*!/
            /!*var valoresArea = $('#edit-subject').val(data.subject);
            alert(valoresArea);*!/
            //var newvaloresArea=data.subject;

           // var values=data.subject;
           // $.each(values.split(","), function(i,e){
               // $(".edit-subject option[value='" + e + "']").prop("selected", true);
           // /});

// it has the multiple values to set separated by comma
            //var arrayArea = newvaloresArea.split(',');
            //alert(newvaloresArea);
         /!*   $.each(data.subject, function(key, value) {
                $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });*!/
            /!*$.each(newvaloresArea, function(key, value){
                //$(this).select2('val', newvaloresArea);
                $('.edit-subject').select2('val',value);
            });
*!/





        })
    });
    $('.show-view-class-section-btn').on('click', function () {
        alert('hello');
        var class_section_id = $(this).data('id');
        $.get('show-class/'+class_section_id, function (data) {
           //console.log(data);
            $('#view-class-section-modal').modal('show');
           /!* $('#show-class-name').text(data.class);
            $('#show-tuition-fee').text(data.tuition_fee);
            $('#show-no-of-periods').text(data.no_of_period);
            $('#show-school-section').text(data.sc_sec_name);*!/
           /!* $(".subjects_table tbody").empty();
            $.each(data.subjects, function(key, val) {
                var markup = "<tr><td>" + (key + 1) + "</td><td>" + val.subject + "</td></tr>";
                $(".subjects_table tbody").append(markup);
                // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });*!/

        })
    });*/
});


/*add admission form validation*/
    $("#add-employee-form").validate({

        rules:
            {
               /* given_name: {
                    required: true
                },
                surname: {
                    required: true
                },
                father: {
                    required: true
                },
                gender: {
                    required: true
                },

                marital_status: {
                    required: true
                },
                blood_group: {
                    required: true
                },*/

           /*     staff_cnic: {
                    required: true
                },

                date_of_birth: {
                    required: true
                },
                religion: {
                    required: true
                },
                employee_image: {
                    required: true
                },*/

               /* nationality: {
                    required: true
                },
                district: {
                    required: true
                },
                staff_cast: {
                    required: true
                },*/

                /*hire_date: {
                    required: true
                },
                adjustment_date: {
                    required: true
                },
                employee_status: {
                    required: true
                },
                contract_type: {
                    required: true
                },
                staff_contract_duration: {
                    required: true
                },
                employee_type: {
                    required: true
                },
                designation: {
                    required: true
                },
                mailing_address: {
                    required: true
                },
                permanent_address: {
                    required: true
                },
                employee_district: {
                    required: true
                },
                employee_city: {
                    required: true
                },
                zip_code: {
                    required: true
                },

                */
            },
        messages:
            {
               /* given_name: "please enter given name",

                surname:{
                    required: "please enter surname",
                },

                father: "please enter father name",

                gender:{
                    required: "please select gender",
                },

                martial_status:{
                    required: "please select martial status",
                },
                blood_group:{
                    required: "please select blood group",
                },
                */
              /*  staff_cnic:{
                    required: "please enter Empoyee Cnic",
                },
                date_of_birth:{
                    required: "please enter date of birth",
                },

                religion:{
                    required: "please select religion",
                },

                employee_image:{
                    required: "please select Employee Image",
                },*/

              /*  nationality:{
                    required: "please select nationality",
                },
                employee_district:{
                    required: "please select employee district",
                },
                staff_cast:{
                    required: "please select cast",
                },*/

              /*  hire_date:{
                    required: "please select hire date",
                },
                adjustment_date:{
                    required: "please select adjustment date",
                },
                employee_status:{
                    required: "please select employee status",
                },
                contract_type:{
                    required: "please select contract type",
                },
                staff_contract_duration:{
                    required: "please enter staff contract duration",
                },
                employee_type:{
                    required: "please select employee type",
                },
                designation:{
                    required: "please select designation",
                },
                mailing_address:{
                    required: "please enter mailing address",
                },
                permanent_address:{
                    required: "please enter permanent address",
                },
                employee_district:{
                    required: "please select employee district",
                },
                employee_city:{
                    required: "please select employee city",
                },
                zip_code:{
                    required: "please enter zip_code",
                },
                */


            },
        submitHandler: function (form) {
            form.submit();
        }
    });
    /*edit admission form validation*/
    $("#edit-admission-form").validate({

        rules:
            {
                admdate: {
                    required: true
                },
                admsession: {
                    required: true
                },
                regno: {
                    required: true
                },
                nadrab: {
                    required: true
                },

                class_name: {
                    required: true
                },
                stdfname: {
                    required: true
                },
                stdlname: {
                    required: true
                },
                student_gender: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                blood_group: {
                    required: true
                },
                religion: {
                    required: true
                },
                nationality: {
                    required: true
                },
                student_district: {
                    required: true
                },
                cast: {
                    required: true
                },
                student_category: {
                    required: true
                },
                disability: {
                    required: true
                },
                guardian: {
                    required: true
                },
                mother: {
                    required: true
                },
                previous_school_name: {
                    required: true
                },
                previous_school_contact: {
                    required: true
                },
                previous_school_leaving_date: {
                    required: true
                },
                previous_school_class_passed: {
                    required: true
                },
                previous_school_comment: {
                    required: true
                },
                parent_mailing_address: {
                    required: true
                },
                parent_permanent_address: {
                    required: true
                },
                parent_district: {
                    required: true
                },
                parent_city: {
                    required: true
                },
                parent_zipcode: {
                    required: true
                },
                guardian_mobile: {
                    required: true
                },
                guardian_email: {
                    required: true,
                    email:true
                },
                mother_mobile: {
                    required: true
                },
                student_emergency_name: {
                    required: true
                },
                student_emergency_phone: {
                    required: true
                },
            },
        messages:
            {
                admdate: "enter admission date",
                admsession:{
                    required: "please enter session",
                },
                regno: "please enter registration",
                gender:{
                    required: "please select gender",
                },
                martial_status:{
                    required: "please select martial status",
                },
                religion:{
                    required: "please select religion",
                },
                nationality:{
                    required: "please student last name",
                },
                district:{
                    required: "please enter date of birth",
                },
                cast:{
                    required: "please select blood group",
                },
                religion:{
                    required: "please select religion",
                },
                nationality:{
                    required: "please select nationality",
                },
                student_district:{
                    required: "please select district",
                },
                cast:{
                    required: "please select cast",
                },
                student_category:{
                    required: "please select student category",
                },
                disability:{
                    required: "please select disability",
                },
                guardian:{
                    required: "please select guardian",
                },
                mother:{
                    required: "please select mother",
                },
                previous_school_name:{
                    required: "please enter previous school name",
                },
                previous_school_contact:{
                    required: "please enter previous school contact",
                },
                previous_school_leaving_date:{
                    required: "please enter previous school leaving date",
                },
                previous_school_class_passed:{
                    required: "please enter previous class passed",
                },
                previous_school_comment:{
                    required: "please enter previous school comment",
                },
                parent_mailing_address:{
                    required: "please enter mailing address",
                },
                parent_permanent_address:{
                    required: "please enter permanent_address",
                },
                parent_district:{
                    required: "please select district",
                },
                parent_city:{
                    required: "please select city",
                },
                parent_zipcode:{
                    required: "please enter zipcode",
                },
                guardian_mobile:{
                    required: "please enter guardian mobile",
                },
                guardian_email:{
                    required: "please enter guardian email",
                },
                mother_mobile:{
                    required: "please enter guardian mobile",
                },
                student_emergency_name:{
                    required: "please enter emergency person name",
                },
                student_emergency_phone:{
                    required: "please enter emergency person name",
                },
            },
        submitHandler: function (form) {
            form.submit();
        }
    });
/*start edit student Admission*/
$('.edit-admission-btn-save-exit-submit').click(function(e){
    alert('hello');
    e.preventDefault();
    $('#edit-admission-form').attr('action', base_url +'update-admission-info');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var edit_admission_data =    new FormData($('#edit-admission-form')[0]);
    $.ajax({
        url: base_url + 'update-admission-info',
        enctype: 'multipart/form-data',
        method: 'post',
        contentType: false,
        processData: false,
        data:  edit_admission_data,
        success: function(result){
            console.log(result);
            if(result.errors)
            {
                $('#add-alert-danger').html('');

                $.each(result.errors, function(key, value){
                    //console.log(value);
                    //$('#class-section-modal').modal('show');
                    $('.add-div-error').show();
                    //$('.alert-danger').show();
                    $('#add-alert-danger').append('<li>'+value+'</li>');

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
/*start edit student Admission*/
/*});*/

/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/
