@extends('layouts.master')
@section('title', 'Add Class Section')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Add Class Section</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                <button class="btn btn-secondary pull-right" data-toggle="modal" id="show-class-section-btn">
                                    Add Class Section
                                </button>
                            </div>
                        </div>
                        {{--add class section Modal--}}
                        <div class="modal fade" id="class-section-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up">Add Class Section</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <form id="add-class-section-form">
                                            @csrf
                                        <div class="col-sm-12">
                                            <div class="add-div-error" style="display:none">
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                     role="alert" id="add-alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <ul class="p-0 m-0" style="list-style: none;">
                                                        <li></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h6 class="col-sm-12 text-center">Add Section</h6>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>For Class</label>
                                                    <select class="selectpicker" id="sel_class" name="class_name" data-size="5" data-style="btn btn-secondary" title="Select Class" >
                                                        <option value="" disabled selected>Select Class</option>
                                                        @foreach($nameofclasses as $nameofclass)
                                                        <option value="{{$nameofclass->cls_Id}}">{{$nameofclass->class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Section Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="class_section_name"  number="true" number="true">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Add Students</label>
                                                    <select class="selectpicker" id="sel_student" name="students[]" data-style="btn btn-secondary " multiple title="Choose Students" data-size="5">
                                                        <option disabled> Choose Students</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>No of Students Added</label>
                                                    <input type="text" class="form-control" placeholder="" id="add-no-of-student" name="no_of_student"  number="true" number="true">
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>Assign Class Rep</label>
                                                    <select class="selectpicker" id="representative" name="representative" data-size="5"  data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                        <option value="" disabled selected>Select Student</option>
                                                    </select>
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>Teacher</label>
                                                    <select class="selectpicker" id="" name="teacher" data-size="5" data-style="btn btn-secondary" title="Select Class" >
                                                        <option value="" disabled selected>Select Teacher</option>
                                                        @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->emp_Id }}">{{$teacher->emp_Fname . " " .$teacher->emp_Mname . " " .$teacher->emp_Lname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" class="btn btn-success btn-link" id="add-class-section-btn">Save</button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-link">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end class section Modal--}}
                        {{--edit class section Modal--}}
                        <div class="modal fade" id="edit-class-section-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up">Edit Class Section</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <form id="edit-class-section-form">
                                            @csrf
                                        <input type="hidden" name="id" id="class-section-id">
                                        <div class="col-sm-12">
                                            <div class="edit-div-error" style="display:none">
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                     role="alert" id="edit-alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <ul class="p-0 m-0" style="list-style: none;">
                                                        <li></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h6 class="col-sm-12 text-center">Edit Section</h6>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>For Class</label>
                                                    <select class="selectpicker" id="edit_sel_class" name="class_name" data-size="5" data-style="btn btn-secondary" title="Select Class" >
                                                        <option value="" disabled selected>Select Class</option>
                                                        @foreach($nameofclasses as $nameofclass)
                                                        <option value="{{$nameofclass->cls_Id}}">{{$nameofclass->class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Section Name</label>
                                                    <input type="text" class="form-control" placeholder="" id="edit-class-section-name" name="class_section_name"  number="true" number="true">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Add Students</label>
                                                    <select class="selectpicker edit_sel_student" id="edit_sel_student" name="students[]" data-style="btn btn-secondary " multiple title="Choose Students" data-size="5">
                                                        <option disabled> Choose Students</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>No of Students Added</label>
                                                    <input type="text" class="form-control" placeholder="" id="edit-no-of-student" name="no_of_student"  number="true" number="true">
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>Assign Class Rep</label>
                                                    <select class="selectpicker" id="edit-representative" name="representative" data-size="5"  data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                        <option value="" disabled selected>Select Student</option>
                                                    </select>
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>Teacher</label>
                                                    <select class="selectpicker" id="edit-teacher" name="teacher" data-size="5" data-style="btn btn-secondary" title="Select Class" >
                                                        <option value="" disabled selected>Select Teacher</option>
                                                        @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->emp_Id }}">{{$teacher->emp_Fname . " " .$teacher->emp_Mname . " " .$teacher->emp_Lname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" class="btn btn-success btn-link" id="update-class-section-btn">Save</button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-link">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end class section Modal--}}


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Students Record List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="alert alert-success" id="success-message" style="display: none">
                                        {{--{{ session()->get('message') }}--}}
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Class Name</th>
                                            <th>Section</th>
                                            <th>Total Students</th>
                                            <th>Teacher</th>
                                            <th>Class Rep</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Total Students</th>
                                            <th>Teacher</th>
                                            <th>Class Rep</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($class_sections as $class_section)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$class_section->class}}</td>
                                            <td>{{$class_section->class_section_name}}</td>
                                            <td>{{$class_section->no_of_student}}</td>
                                            <td>{{$class_section->emp_Fname. $class_section->emp_Mname ." ".$class_section->emp_Lname }}</td>
                                            <td>Class Rep</td>
                                            <td class="text-center">
                                                <div class="form-inline pull-right">
                                                    <div class="">
                                                        <button class=" btn-link btn-cus-weight show-view-class-section-btn"
                                                                type="button"
                                                                data-toggle="modal"
                                                                 data-target="#viewclass"
                                                                id="show-view-class-section-btn"
                                                                aria-haspopup="true"
                                                                aria-expanded="false" data-id="{{ $class_section->c_section_Id  }}">
                                                            View
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="nav-item btn-rotate dropdown pull-right ">
                                                        <a class="nav-link dropdown-toggle pull-right"
                                                           href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                           data-toggle="dropdown"
                                                           aria-haspopup="true"
                                                           aria-expanded="false" data-id="{{ $class_section->c_section_Id  }}">
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                            <a class="dropdown-item edit-class-section-btn" href="javascript:void(0)"
                                                               data-toggle="modal"
                                                               {{-- data-target="#editclass"--}}
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $class_section->c_section_Id  }}">Edit</a>
                                                            <a class="dropdown-item"
                                                               href="{{url('delete-class-section/'.$class_section->c_section_Id )}}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
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

    </div>

</div>

@endsection
@section('front_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('front_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/class_section_script.js')}}"></script>
    <script>
        $('select').select2({width: '100%', placeholder: "Select an Option", allowClear: true, tags: true});
    </script>
  {{--  <script>
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
    </script>--}}
@endsection
