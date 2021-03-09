@extends('layouts.master')
@section('title', 'Add School')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">School</h4>
                    </div>
                    <div class="card-body">

                        {{--Start Edit School Modal--}}
                        <div class="modal fade" id="edit-School-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">Edit School</h5>
                                        </div>

                                        <div class="modal-body row">
                                            <form id="editschoolform">
                                            <div class="col-sm-12">
                                                {{--show error in form--}}
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
                                                {{--end  error in form--}}
                                                <div class="row">
                                                    <h6 class="col-sm-12">Edit School Details</h6>
                                                    <input type="hidden" id="edit-school-id" name="id">
                                                    <div class="form-group col-sm-6">
                                                        <label>School Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-school-name" name="school_Name"/>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Principal Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-principal-name" name="principal_Name"/>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Affiliation No</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-affiliation" name="affiliation_No"/>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Board</label>
                                                        <select class="selectpicker" data-size="5"
                                                                data-style="btn btn-secondary"
                                                                title="Select Billing Scgedule"name="board" id="edit-board">
                                                            <option value="" disabled selected>Select Teacher</option>
                                                            @foreach($boards as $board)
                                                                <option
                                                                    value="{{$board->pk_board_Id}}">{{$board->board_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Registration No</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-registration" name="registration" number="true" number="true">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Registered With</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-registered-with" name="registered_with" number="true" number="true">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Primary Contact</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-primary-contact" name="primary_Contact" number="true" number="true">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Secondary Contact</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               id="edit-secondary-contact"  name="secondary_Contact" number="true" number="true">
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>District</label>
                                                        <select class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary"
                                                                title="Select Billing Scgedule" name="district" id="edit-district">
                                                            <option value="" disabled selected>Select District</option>
                                                            @foreach($districts as $district)
                                                                <option
                                                                    value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>City</label>
                                                        <select class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary"
                                                                title="Select Billing Scgedule" name="city" id="edit-city">
                                                            <option value="" disabled selected>Select City</option>
                                                            @foreach($cities as $city)
                                                                <option
                                                                    value="{{$city->pk_city_id}}">{{$city->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                        <div class="select-wizard col-sm-12">
                                                            <label>School Address</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   id="edit-school-address" name="school_address"  number="true" number="true">
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="button" class="btn btn-success btn-link"
                                                        id="update-school-btn">Save
                                                </button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="">
                                                <button type="button" data-dismiss="modal"
                                                        class="btn btn-danger btn-link">Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>

                        </div>
                    </div>
                    {{--End Edit School Modal--}}

                    {{--view School Modal--}}
                    <div class="modal fade" id="view-school-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-sm">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <h5 class="title title-up">View School Details</h5>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-6">
                                        <h6 class="col-sm-6">School Details</h6>
                                        <div class="row">
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">School Name</label>
                                                <p id="show-school-name"></p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Principal Name</label>
                                                <p id="show-principal-name"></p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Affiliation No</label>
                                                <p id="show-affiliation-no">Affiliation No</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Board</label>
                                                <p id="show-board">Board</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Registration</label>
                                                <p id="show-registration">Registration</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Registered With</label>
                                                <p id="show-registered-with">Registered With</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>

                                    <div class="col-sm-6">
                                        <h6 class="col-sm-6">Contact Details</h6>
                                        <div class="row">
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Primary Contact</label>
                                                <p id="show-primary-contact">Primary Contact</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Secondary Contact</label>
                                                <p id="show-secondary-contact">Secondary Contact</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">District</label>
                                                <p id="show-district">District</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">City</label>
                                                <p id="show-city">City</p>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 select-wizard">
                                                <label class="font-weight-bolder">Address</label>
                                                <p id="show-address">Address</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="divider"></div>-->
                                </div>

                                <div class="modal-footer">
                                    <div class="">
                                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--End view Schhool Modal--}}
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
                                {{--start success Mesage--}}
                                <div class="alert alert-success" id="success-message" style="display: none">
                                    {{--{{ session()->get('message') }}--}}
                                </div>
                                {{--end success Mesage--}}
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>School</th>
                                        <th>Reg No</th>
                                        <th>Board</th>
                                        <th>Principal</th>
                                        <th>District</th>
                                        <th>City</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>School</th>
                                        <th>Reg No</th>
                                        <th>Board</th>
                                        <th>Principal</th>
                                        <th>District</th>
                                        <th>City</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 0 @endphp
                                    @foreach($schools as  $school)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$school->school_Name}}</td>
                                            <td>{{$school->registration}}</td>
                                            <td>{{$school->board_Name}}</td>
                                            <td>{{$school->principal_Name}}</td>
                                            <td>{{$school->dom_District}}</td>
                                            <td>{{$school->city_name}}</td>
                                            <td class="text-center">
                                                <div class="form-inline pull-right">
                                                    <div class="">
                                                        <button class=" btn-link btn-cus-weight show-view-class-btn"
                                                                type="button"
                                                                data-toggle="modal"
                                                                {{-- data-target="#viewclass"--}}
                                                                id="view-school-btn"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                data-id="{{ $school->pk_school_Id }}">
                                                            View
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="nav-item btn-rotate dropdown pull-right ">
                                                        <a class="nav-link dropdown-toggle pull-right"
                                                           href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                           data-toggle="dropdown"
                                                           aria-haspopup="true"
                                                           aria-expanded="false" data-id="{{ $school->pk_school_Id }}">
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                            <a class="dropdown-item edit-school-btn"
                                                               href="javascript:void(0)"
                                                               data-toggle="modal"
                                                               {{-- data-target="#editclass"--}}
                                                               aria-haspopup="true"
                                                               aria-expanded="false"
                                                               data-id="{{ $school->pk_school_Id }}">Edit</a>
                                                            {{-- <a class="dropdown-item"
                                                                href="{{url('delete-school/'.$school->pk_school_Id)}}">Delete</a>--}}
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

            <!--<div class="card-footer text-right">-->
            <!--<div class="form-check pull-left">-->
            <!--<label class="form-check-label">-->
            <!--<input class="form-check-input" type="checkbox" name="optionCheckboxes" required>-->
            <!--<span class="form-check-sign"></span>-->
            <!--Subscribe to newsletter-->
            <!--</label>-->
            <!--</div>-->
            <!--<button type="submit" class="btn btn-primary">Register</button>-->
            <!--</div>-->
        </div>
    </div>

    </div>

@endsection


@section('front_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('front_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/school_script.js')}}"></script>
    <script>
        $('select').select2({width: '100%', placeholder: "Select an Option", allowClear: true, tags: true});
    </script>
    <script>
        $(document).ready(function () {


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function (api, options) {
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
                click: function (api, options) {
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
                click: function (api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });


            // Facebook Pixel Code Don't Delete
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
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
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"/>
    </noscript>
    <script>
        $(document).ready(function () {

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

            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function () {
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

            $('.fixed-plugin .background-color span').click(function () {
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

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function () {
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

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function () {
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


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function () {
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
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function (error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function () {
            setFormValidation('#RegisterValidation');
            setFormValidation('#TypeValidation');
            setFormValidation('#LoginValidation');
            setFormValidation('#RangeValidation');
        });
    </script>
    <script>
        $(document).ready(function () {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function () {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        $(document).ready(function () {
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
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
@endsection
