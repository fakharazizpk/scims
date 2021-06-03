// Wait for the DOM to be ready


$(document).ready(function () {

    $('select[name="country"]').on('change',function(){
        $('select[name="state"]').empty();
        $('select[name="state"]').selectpicker("refresh");
        $('select[name="district"]').empty();
        $('select[name="district"]').selectpicker("refresh");
        $('select[name="employee_city"]').empty();
        $('select[name="employee_city"]').selectpicker("refresh");
    });
    $('select[name="state"]').on('change',function(){
        $('select[name="district"]').empty();
        $('select[name="district"]').selectpicker("refresh");
        $('select[name="employee_city"]').empty();
        $('select[name="employee_city"]').selectpicker("refresh");
    });


    /*for district ajax*/
    $('select[name="nationality"]').on('change',function(){
        var nationalityID = $(this).val();
            $.ajaxSetup({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
            });

            $.ajax({
                url : base_url +'/getdistrict/' +nationalityID,
                type : "GET",
                dataType : "json",

                success:function(data)
                {
                    $('select[name="employee_district"]').html('');
                    if(data != "") {
                   $.each(data, function(key,value){

                        $('select[name="employee_district"]').append('<option value="'+key+'">'+value+'</option>');
                        $('select[name="employee_district"]').selectpicker("refresh");
                        });
                }else{
                        $('select[name="employee_district"]').append('<option value=""></option>');
                        $('select[name="employee_district"]').selectpicker("refresh");
                    }
                }
            });
       });
    /*for district ajax*/

    /*for state ajax*/
    $('select[name="country"]').on('change',function(){
        var nationID = $(this).val();
            $.ajaxSetup({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
            });

            $.ajax({
                url : base_url +'/getstate/' +nationID,
                type : "GET",
                dataType : "json",

                success:function(data)
                {
                    $('select[name="state"]').html('');
                    if(data != "") {
                   $.each(data, function(key,value){

                        $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                        $('select[name="state"]').selectpicker("refresh");
                        });
                }else{
                        $('select[name="state"]').append('<option value=""></option>');
                        $('select[name="state"]').selectpicker("refresh");
                    }
                }
            });
       });
    /*for state ajax*/

    /*for district ajax on state*/
    $('select[name="state"]').on('change',function(){
        var stateID = $(this).val();
            $.ajaxSetup({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
            });

            $.ajax({
                url : base_url +'/get-district-by-state/' +stateID,
                type : "GET",
                dataType : "json",

                success:function(data)
                {
                    $('select[name="district"]').html('');
                    if(data != "") {
                   $.each(data, function(key,value){

                        $('select[name="district"]').append('<option value="'+key+'">'+value+'</option>');
                        $('select[name="district"]').selectpicker("refresh");
                        });
                }else{
                        $('select[name="district"]').append('<option value=""></option>');
                        $('select[name="district"]').selectpicker("refresh");
                    }
                }
            });
       });
    /*for distrrict ajax on state*/

    /*for city ajax on district*/
    $('select[name="district"]').on('change',function(){
        var districtID = $(this).val();
            $.ajaxSetup({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
            });

            $.ajax({
                url : base_url +'/get-city-by-district/' +districtID,
                type : "GET",
                dataType : "json",

                success:function(data)
                {
                    $('select[name="employee_city"]').html('');
                    if(data != "") {
                   $.each(data, function(key,value){

                        $('select[name="employee_city"]').append('<option value="'+key+'">'+value+'</option>');
                        $('select[name="employee_city"]').selectpicker("refresh");
                        });
                }else{
                        $('select[name="employee_city"]').append('<option value=""></option>');
                        $('select[name="employee_city"]').selectpicker("refresh");
                    }
                }
            });
       });
    /*for zipcode ajax on city*/

    $('select[name="employee_city"]').on('change',function(){
        var cityID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });
        $.ajax({
            url : base_url +'/getzipcode/' +cityID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                console.log(data.zip_code);
                $('[name="zip_code"]').val('');
                if(data != "") {
                        $('[name="zip_code"]').val(data);
                }else{
                    $('select[name="zip_code"]').val('');
                }
            }
        });
    });
    /*for zipcode ajax on city*/

    $(".add-academic-btn").click(function (e) {
        e.preventDefault();
         var academicHtml = '<div class="row appended_acad_qual_div" id="appended_acad_qual_div" style="margin:1px">' +
            '<div class="form-group col-sm-1">' +
            '<label>S.No</label>' +
            '<input type="text" class="form-control" placeholder="" name="qual_sno[]">' +
            '</div>' +
            '<div class="form-group col-sm-2">' +
            '<label>Title</label>' +
            '<input type="text" class="form-control" placeholder="" name="qual_title[]" >' +
            '</div>' +
            '<div class="form-group col-sm-2">' +
            '<label>Board/University</label>' +
            '<input type="text" class="form-control" placeholder="" name="qual_board[]" >' +
            '</div>' +
            '<div class="form-group col-sm-2">' +
            '<label>Subject</label>' +
            '<input type="text" class="form-control" placeholder="" name="qual_subject[]">' +
            '</div>' +
            '<div class="form-group col-sm-2">' +
            '<label>Session</label>' +
            '<input type="text" class="form-control datepicker" placeholder="" name="qual_year[]" >' +
            '</div>' +
            '<div class="form-group col-sm-1">' +
            '<label>Grade</label>' +
            '<input type="text" class="form-control" placeholder="" name="qual_grade[]" >' +
            '</div>' +
            '<div class="form-group col-sm-1">' +
            '<label>CGPA</label>' +
            '<input type="text" class="form-control" placeholder="" name="qual_gpa[]">' +
            '</div>' +
            '<div class=" col-sm-1">' +
            '<label>Action</label>' +
            '<button type="button"  class="btn btn-sm btn-outline-choice remove_academic_btn"  name="Remove"  title="Add" value=""><i class="text-center fa fa-close"></i></button>'+
            '</div>' +
            '</div>';
        //var academicHtml = '<tr  class="appended-acad-qual-div"><td>fasdgsadggsadfakjdf af</td></tr>';
        $(academicHtml).appendTo("#showacadqual");

    });

    /*remove Appended div of academic*/
    $(document).on('click', ".remove_academic_btn", function() {
        //alert('works');
        $(this).closest(".appended_acad_qual_div").remove();
    });

    $(".profession-qual-btn").click(function(e){
            alert('profession-qual-btn');
            e.preventDefault();

                var profHtml = '<div class="row appended_prof_qual_div" style="margin:1px">'+
                '<div class="form-group col-sm-1">'+
                '<label>S.No</label>'+
                '<input type="text" class="form-control" placeholder="" name="prof_qual_sno[]">'+
                '</div>'+
                '<div class="form-group col-sm-4">'+
                '<label>Title</label>'+
                '<input type="text" class="form-control" placeholder="" name="prof_qual_title[]" >'+
                '</div>'+
                '<div class="form-group col-sm-4">'+
                '<label>Board/University</label>'+
                '<input type="text" class="form-control" placeholder="" name="prof_qual_board[]" >'+
                '</div>'+
                '<div class="form-group col-sm-2">'+
                '<label>Session</label>'+
                '<input type="text" class="form-control datepicker" placeholder="" name="prof_qual_year[]" >'+
                '</div>'+
                '<div class=" col-sm-1">'+
                '<label>Action</label>'+
                '<button type="button" class="btn btn-sm btn-outline-choice remove-profession-qual-btn"  name="Add"  title="Add" value=""/><i class="text-center fa fa-close"></i></button>'+
                '</div>'+
                '</div>';
            $(profHtml).appendTo("#showprofqual");
            //$("#showprofqualdiv").clone().insertAfter("#showprofqual");
        });

    $(document).on('click', ".remove-profession-qual-btn", function() {
        //alert('works');
        $(this).closest(".appended_prof_qual_div").remove();
    });

        $(".add-experience-div-btn").click(function(e) {
            e.preventDefault();

            var emperienceHtml = '<div class="row appended-experience-div" style="margin:1px">'+
                '<div class="form-group col-sm-1">'+
                '<label>S.No</label>'+
                '<input type="text" class="form-control" placeholder="" name="experience_sno[]" >'+
                '</div>'+
                '<div class="form-group col-sm-2">'+
                '<label>Organization</label>'+
                '<input type="text" class="form-control" placeholder="" name="experience_organization[]" >'+
                '</div>'+
                '<div class="form-group col-sm-2">'+
                '<label>Position</label>'+
                '<input type="text" class="form-control" placeholder="" name="experience_position[]" >'+
                '</div>'+
                '<div class="form-group col-sm-2">'+
                '<label>Role</label>'+
                '<input type="text" class="form-control" placeholder="" name="experience_role[]">'+
                '</div>'+
                '<div class="form-group col-sm-2">'+
                '<label>From Date</label>'+
                '<input type="text" class="form-control datepicker" placeholder="" name="experience_from_date[]" >'+
                '</div>'+
                '<div class="form-group col-sm-2">'+
                '<label>To Date</label>'+
                '<input type="text" class="form-control datepicker" placeholder="" name="experience_to_date[]" >'+
                '</div>'+
                '<div class="col-sm-1">'+
                '<label>Action</label>'+
                '<button type="button" class="btn btn-outline-info btn-sm remove-experience-div-btn" name="Add"  title="Add" value=""/><i class="fa fa-close"></i></button>'+
                '</div>'+
                '</div>';

            $(emperienceHtml).appendTo("#show-experience");
        });

        $(document).on('click', ".remove-experience-div-btn", function() {
            //alert('works');
            $(this).closest(".appended-experience-div").remove();
        });


    $('#success-alert').html('');
    $('.add-employee-submit-btn').click(function (e) {
        alert('hello');
        e.preventDefault();
        $('#add-employee-form').attr('action', base_url + 'admission-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var admission_data = new FormData($('#add-employee-form')[0]);
        $.ajax({
            url: base_url + 'appointment-info',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: admission_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function (key, value) {
                        //console.log(value);
                        //$('#class-section-modal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>' + value + '</li>');

                    });
                } else {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>' + result.message + '</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    location.reload();

                }
            }
        });
    });

    $(document).on('change', '#employee-filter', function (e) {

        var value = $(this).val();
        employeeSearch(value);
    });

    function employeeSearch(value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + '/staff',
            // url    : "http://localhost/nextdaylabels_live/admin/public/template",

            type   : 'get',
            data   : {'search': value},
            success: function (data) {
                $('#datatable').empty();
                $("#datatable").html(data);


            }
        });

    }


    $("#std-date-of-birth").blur(function () {

        calculateAge();
    });

    $("#std-date-of-birth").keyup(function () {

        calculateAge();

    });

    function calculateAge() {
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


    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);








});


/*add employee form validation*/
   $("#add-employee-form").validate({

       rules:
           {
               given_name: {
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
               },

               staff_cnic: {
                   required: true
               },

               date_of_birth: {
                   required: true
               },
               religion: {
                   required: true
               },

               nationality: {
                   required: true
               },
               employee_district: {
                   required: true
               },
               staff_cast: {
                   required: true
               },

               hire_date: {
                   required: true
               },
               adjustment_date: {
                   required: true
               },
               /*employee_status: {
                   required: true
               },*/
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
               qual_sno:{
                   required: true
               },
               mailing_address: {
                   required: true
               },
               permanent_address: {
                   required: true
               },
               district: {
                   required: true
               },
               employee_city: {
                   required: true
               },
               zip_code: {
                   required: true
               },

           },
       messages:
           {
               given_name: "please enter given name",

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
               staff_cnic:{
                   required: "please enter Empoyee Cnic",
               },
               date_of_birth:{
                   required: "please enter date of birth",
               },

               religion:{
                   required: "please select religion",
               },

               //employee_image:{required: 'please upload employee image'},

               nationality:{
                   required: "please select nationality",
               },
               employee_district:{
                   required: "please select employee district",
               },
               staff_cast:{
                   required: "please select cast",
               },

               hire_date:{
                   required: "please select hire date",
               },
               adjustment_date:{
                   required: "please select adjustment date",
               },
              /* employee_status:{
                   required: "please select employee status",
               },*/
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
               district:{
                   required: "please select district",
               },
               employee_city:{
                   required: "please select employee city",
               },
               zip_code:{
                   required: "please enter zip_code",
               },


           },
       submitHandler: function (form) {
           form.submit();
       }
   });
/*add employee form validation*/

/*edit employee form validation*/
   $("#edit-employee-form").validate({
       rules:
           {
               given_name: {
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
               },

               staff_cnic: {
                   required: true
               },

               date_of_birth: {
                   required: true
               },
               religion: {
                   required: true
               },

               nationality: {
                   required: true
               },
               employee_district: {
                   required: true
               },
               staff_cast: {
                   required: true
               },

               hire_date: {
                   required: true
               },
               adjustment_date: {
                   required: true
               },
              /* employee_status: {
                   required: true
               },*/
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
               qual_sno:{
                   required: true
               },
               mailing_address: {
                   required: true
               },
               permanent_address: {
                   required: true
               },
               district: {
                   required: true
               },
               employee_city: {
                   required: true
               },
               zip_code: {
                   required: true
               },

           },
       messages:
           {
               given_name: "please enter given name",

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
               staff_cnic:{
                   required: "please enter Empoyee Cnic",
               },
               date_of_birth:{
                   required: "please enter date of birth",
               },

               religion:{
                   required: "please select religion",
               },

               //employee_image:{required: 'please upload employee image'},

               nationality:{
                   required: "please select nationality",
               },
               employee_district:{
                   required: "please select employee district",
               },
               staff_cast:{
                   required: "please select cast",
               },

               hire_date:{
                   required: "please select hire date",
               },
               adjustment_date:{
                   required: "please select adjustment date",
               },
              /* employee_status:{
                   required: "please select employee status",
               },*/
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
               district:{
                   required: "please select district",
               },
               employee_city:{
                   required: "please select employee city",
               },
               zip_code:{
                   required: "please enter zip_code",
               },


           },
       submitHandler: function (form) {
           form.submit();
       }
   });
/*edit employee form validation*/

/*start edit student Admission*/
$('.edit-employee-submit-btn').click(function (e) {
    alert('hello');
    e.preventDefault();
    $('#edit-employee-form').attr('action', base_url + 'update-appointment-info');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var edit_admission_data = new FormData($('#edit-employee-form')[0]);
    $.ajax({
        url: base_url + '/update-appointment-info',
        enctype: 'multipart/form-data',
        method: 'post',
        contentType: false,
        processData: false,
        data: edit_admission_data,
        success: function (result) {
            console.log(result);
            if (result.errors) {
                $('#add-alert-danger').html('');

                $.each(result.errors, function (key, value) {
                    //console.log(value);
                    //$('#class-section-modal').modal('show');
                    $('.add-div-error').show();
                    //$('.alert-danger').show();
                    $('#add-alert-danger').append('<li>' + value + '</li>');

                });
            } else {
                $('#success-message').html('');
                $('.add-div-error').hide();

                $('#class-section-modal').modal('hide');
                $('#success-message').show();
                $('#success-message').append('<p>' + result.message + '</p>');
                //$('#success-alert').show();
                //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                $('#success-message').delay(2000).fadeOut('slow');
                location.reload();
            }
        }
    });
});
/*start edit student Admission*/
/*});*/

/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/
