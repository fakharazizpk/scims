@extends('layouts.master')
@section('title', 'Students')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <form id="RegisterValidation" action="#" method="">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">View Students</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="form-group has-label col-sm-2">
                   <span>
                       View By
                       :
                   </span>
                            </div>
                            <div class="form-group col-sm-3 select-wizard">
                                <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" required="true">
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="1">Playgroup</option>
                                    <option value="2">Kindergarten</option>
                                    <option value="3">Preparatory</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="1">Four</option>
                                    <option value="2">Five</option>
                                    <option value="3">Six</option>
                                    <option value="1">Seven</option>
                                    <option value="2">Eight</option>
                                    <option value="3">Eleven</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 select-wizard">
                                <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Section" required="true">
                                    <option value="" disabled selected>Select Section</option>
                                    <option value="1">Alpha</option>
                                    <option value="2">Bravo</option>
                                    <option value="3">Charlie</option>
                                </select>
                            </div>
                            <div class="pull-right">
                                <input type='button' class='btn  btn-fill btn-outline-choice btn-wd' name='List Studenrs' value='List Students' />
                            </div>
                            <!--<div class="category form-category">* Required fields</div>-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Students Record List</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Admission No</th>
                                                <th>Address</th>
                                                <th>Contact No</th>
                                                <th>Status</th>
                                                <th class="disabled-sorting text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Admission No</th>
                                                <th>Address</th>
                                                <th>Contact No</th>
                                                <th>Status</th>
                                                <th class="disabled-sorting text-center">Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @php $i= 1; @endphp
                                            @foreach($students as $student)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$student->std_Fname. " ".$student->std_Mname. " ".$student->std_Lname}}</td>
                                                <td>{{$student->adm_Number}}</td>
                                                <td>{{$student->pnt_pmt_Add}}</td>
                                                <td>{{$student->pnt_mob_Ph}}</td>
                                                <td>{{$student->std_Status}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline pull-right">
                                                        <div class="">
                                                            <button class=" btn-link btn-cus-weight show-view-class-btn"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    {{-- data-target="#viewclass"--}}
                                                                    id="show-subject"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $student->std_Id  }}">
                                                                View
                                                            </button>
                                                        </div>
                                                        <div
                                                                class="nav-item btn-rotate dropdown pull-right ">
                                                            <a class="nav-link dropdown-toggle pull-right"
                                                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                               data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $student->std_Id  }}">
                                                            </a>
                                                            <div
                                                                    class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="navbarDropdownMenuLink">
                                                                <a class="dropdown-item edit-subject" href="{{url('edit-admission-info/'.$student->std_Id)}}"
                                                                  {{-- data-target="#editclass"--}}
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $student->std_Id  }}">Edit</a>
                                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to Change Student Status?');"
                                                                   href="{{url('change-student/'.$student->std_Id )}}">Change Status</a>
                                                            </div>
                                                        </div>
                                                    {{--<a href="#" class="btn btn-success btn-link btn-icon btn-sm fa fa-eye" title="View Profile"><i class="fa fa-times"></i></a>
                                                    <a href="{{url('edit-admission-info/'.$student->std_Id)}}" title="Edit" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>
                                                    <a href="../../examples/pages/withdraw-student.html" class="btn btn-danger btn-link btn-icon btn-sm edit" title="withdraw"><i class="fa fa-times"></i></a>--}}
                                                </td>
                                            </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div><!-- end content-->
                                </div><!--  end card  -->
                            </div> <!-- end col-md-12 -->
                        </div> <!-- end row -->

                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
@section('front_script')
    <script>
        $(document).ready(function() {


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: {
                    twitter: {
                        via: 'CreativeTim'
                    }
                },
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });



            // Facebook Pixel Code Don't Delete
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

            try {
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            } catch (err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
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
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });
    </script>
@endsection
