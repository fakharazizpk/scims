@extends('layouts.teacher')
@section('title', 'Teacher Dashboard')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{url('adminassets/img/bg/damir-bosnjak.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <img class="avatar border-gray" src="{{url('adminassets\img\default-avatar.png')}}" alt="...">
                            <h3 class="profile-username text-center">Nina Mcintire</h3>

                            <p class="text-muted text-center">Teacher</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b class="fa fa-mobile-phone pull-left"> Mobile</b> <a class="pull-right">+92 111 222 3333</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="fa fa-envelope-o pull-left"> Email</b> <a class="pull-right">abc@xyz.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"> Personal Information</h5>
                    </div>
                    <div class="card-body table-full-width table-hover">
                        <div class="table-condensed">
                            <table class="table table-hover" width="100%">
                                <tbody>
                                <tr>
                                    <th>Father Name</th>
                                    <td>Faiz Khan</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <th>Marital Status</th>
                                    <td>Married</td>
                                </tr>
                                <tr>
                                    <th>Blood Group</th>
                                    <td>A+</td>
                                </tr>
                                <tr>
                                    <th>National Identifier</th>
                                    <td>17301-2345673-2</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>02/12/1998</td>
                                </tr>
                                <tr>
                                    <th>Religion</th>
                                    <td>Islam</td>
                                </tr>
                                <tr>
                                    <th>Nationality</th>
                                    <td>Pakistani</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>Karak</td>
                                </tr>
                                <tr>
                                    <th>Emergency Contact No</th>
                                    <td>+92 111 2222 123</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Timetable</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Attendance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-expanded="false">Salary</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                <div class=" card-body">
                                    <div class="teacher_time_table"><div class="text-right"><a href="" class="btn btn-outline-success btn-sm m-btn mb-3">Print Timetable</a></div>				<table class="table table-bordered table-striped  m-table m-table--border-metal m-table--head-bg-metal">
                                            <thead class="text-center">
                                            <tr>
                                                <th style="width: 20%;">Monday</th>
                                                <th style="width: 20%;">Tuesday</th>
                                                <th style="width: 20%;">Wednesday</th>
                                                <th style="width: 20%;">Thursday</th>
                                                <th style="width: 20%;">Friday</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VI</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form V</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VI</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VI</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font text-center"><div class="text-center">08:40 - 09:20</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form V</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">08:40 - 09:20</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form V</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font text-center"><div class="text-center">09:20 - 10:00</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VI</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">09:20 - 10:00</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">09:20 - 10:00</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VIII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">09:20 - 10:00</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VII</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font text-center"><div class="text-center">10:00 - 10:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">10:00 - 10:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font text-center"><div class="text-center">11:40 - 12:20</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VIII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">11:00 - 11:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form V</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">11:40 - 12:20</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VIII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">11:00 - 11:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form V</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">10:20 - 11:00</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VI</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">10:20 - 11:00</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VIII</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">11:00 - 11:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VIII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center">11:00 - 11:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Form VII</div>
                                                </td>
                                                <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-expanded="false">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 card">
            </div>
        </div>

    </div>
@endsection

@section('front_script')
    {{--<script src="{{asset('js/home_script.js')}}"></script>--}}
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
    </noscript>
    <script>
        $(document).ready(function() {

            $sidebar = $('.sidebar');
            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
            //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            //         $('.fixed-plugin .dropdown').addClass('show');
            //     }
            //
            // }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-active-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('data-active-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-active-color', new_color);
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
                $body = $('body');

                $input = $(this);

                if (paperDashboard.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = false;
                } else {
                    $('body').addClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = true;
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function() {
            setFormValidation('#RegisterValidation');
            setFormValidation('#TypeValidation');
            setFormValidation('#LoginValidation');
            setFormValidation('#RangeValidation');
        });
    </script>
    <script>
        $(document).ready(function() {
            // initialise Datetimepicker and Sliders
            demo.initDateTimePicker();
            if ($('.slider').length != 0) {
                demo.initSliders();
            }
        });
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
