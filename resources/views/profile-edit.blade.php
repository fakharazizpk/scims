@extends('layouts.master')
@section('title', 'Admin Profile')
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
                        @if($adminprofile->user_image)
                            <img class="avatar border-gray" src="{{asset('upload/user/'.$adminprofile->user_image)}}" alt="Image">
                        @else
                            <img class="avatar border-gray" src="{{url('adminassets/img/accountant.jpg')}}" alt="Default User">
                        @endif
                        <h3 class="profile-username text-center">{{$adminprofile->name}}</h3>

                      {{--  <p class="text-muted text-center"><input type="text" class="form-control" placeholder=""
                                                                 value="{{$adminprofile->user_type}}" name="user_type"
                                                                 title="User Type"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b class="fa fa-mobile-phone pull-left ml-0"> Mobile</b> <a class="pull-right">{{$adminprofile->phone}}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="fa fa-envelope-o pull-left  ml-0"> Email</b> <a class="pull-right">{{$adminprofile->email}}</a>
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            {{--<div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Personal Information</h5>
                </div>
                <div class="card-body table-full-width table-hover">
                    <div class="table-condensed">
                        <table class="table table-hover" width="100%">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{$adminprofile->name}}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{$adminprofile->username}}</td>
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
                                <th>Domicile</th>
                                <td>Karak</td>
                            </tr>
                            <tr>
                                <th>Cast</th>
                                <td>Khattak</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>Karak</td>
                            </tr>
                            <tr>
                                <th>Emergency Contact Person</th>
                                <td>Shafiq Khan</td>
                            </tr>
                            <tr>
                                <th>Emergency Contact No</th>
                                <td>+92 111 2222 123</td>
                            </tr>
                            <tr>
                                <th>Emergency Contact Relation</th>
                                <td>Brother</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>--}}
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Personal Information</h5>
                </div>
                <div class="card-body table-full-width table-hover">
                    <div class="table-condensed">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{url('profile-update')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                        <table class="table table-hover" width="100%">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <th><input type="text" class="form-control @error('name') is-invalid @enderror" placeholder=""
                                       value="{{$adminprofile->name}}" name="name"
                                       title="Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </th>

                            </tr>
                            <tr>
                                <th>Username</th>
                                <th><input type="text" class="form-control" placeholder=""
                                       value="{{$adminprofile->username}}" name="username"
                                       title="User Name" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <th><input type="file" class="form-control" placeholder=""
                                           value="" name="user_image"
                                           title="User Image">
                                </th>
                            </tr>
                            {{--<tr>
                                <th>User Type</th>
                                <th>
                                    <select class="selectpicker" name="user_type" data-size="5"
                                        data-style="btn btn-secondary" title="Select User Type">
                                    <option value="" disabled selected>Select User Type</option>
                                    @foreach($users_types as $user_type)
                                        <option value="{{$user_type->user_type}}"
                                                @if($adminprofile->user_type==$user_type->user_type_Name)selected @endif>{{$user_type->user_type_Name}}</option>
                                    @endforeach
                                </select>
                                </th>
                            </tr>--}}
                            <tr>
                                <th>Phone</th>
                                <th><input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder=""
                                           value="{{$adminprofile->phone}}" name="phone"
                                           title="Phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th><input type="text" class="form-control @error('email') is-invalid @enderror" placeholder=""
                                           value="{{$adminprofile->email}}" name="email"
                                           title="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <th><input type="password" class="form-control @error('password') is-invalid @enderror" placeholder=""
                                            name="password"
                                           title="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th>Confirm Password</th>
                                <th><input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder=""
                                            name="password_confirmation"
                                           title="Confirm Password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th><input type='submit'
                                       class='btn btn-finish  btn-secondary btn-wd pull-right'
                                       name='finish' value='Submit'/>
                                </th>
                            </tr>

                            {{--        <th>Marital Status</th>
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
                                    <th>Domicile</th>
                                    <td>Karak</td>
                                </tr>
                                <tr>
                                    <th>Cast</th>
                                    <td>Khattak</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>Karak</td>
                                </tr>
                                <tr>
                                    <th>Emergency Contact Person</th>
                                    <td>Shafiq Khan</td>
                                </tr>
                                <tr>
                                    <th>Emergency Contact No</th>
                                    <td>+92 111 2222 123</td>
                                </tr>
                                <tr>
                                    <th>Emergency Contact Relation</th>
                                    <td>Brother</td>
                                </tr>--}}
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
           {{-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Billing Information</h5>
                </div>
                <div class="card-body table-full-width table-hover">
                    <div class="table-condensed">
                        <table class="table table-hover" width="100%">
                            <tbody>
                            <tr>
                                <th>Billing Type</th>
                                <td>Daily</td>
                            </tr>
                            <tr>
                                <th>Billing Rate</th>
                                <td>&#8360; 700</td>
                            </tr>
                            <tr>
                                <th>Billing Schedule</th>
                                <td>Monthly</td>
                            </tr>
                            <tr>
                                <th>Basic Pay</th>
                                <td>&#8360; 18,200</td>
                            </tr>
                            <tr>
                                <th>Net Pay</th>
                                <td>&#8360; 28,200</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Pension Information</h5>
                </div>
                <div class="card-body table-full-width table-hover">
                    <div class="table-condensed">
                        <table class="table table-hover" width="100%">
                            <tbody>

                            <tr>
                                <th>GFP Balance</th>
                                <td>&#8360; 24,200</td>
                            </tr>
                            <tr>
                                <th>EPS Balance</th>
                                <td>&#8360; 9,100</td>
                            </tr>
                            <tr>
                                <th>Graduity Balance</th>
                                <td>&#8360; 9,100</td>
                            </tr>
                            <tr>
                                <th>Total Balance</th>
                                <td>&#8360; 42,500</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>--}}
        </div>
        <!--<div class="col-md-8">-->
        <!--<div class="card">-->
        <!--<div class="card-header">-->
        <!--<h5 class="title">Edit Profile</h5>-->
        <!--</div>-->
        <!--<div class="card-body">-->
        <!--<form>-->
        <!--<div class="row">-->
        <!--<div class="col-md-5 pr-1">-->
        <!--<div class="form-group">-->
        <!--<label>Company (disabled)</label>-->
        <!--<input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-3 px-1">-->
        <!--<div class="form-group">-->
        <!--<label>Username</label>-->
        <!--<input type="text" class="form-control" placeholder="Username" value="michael23">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-4 pl-1">-->
        <!--<div class="form-group">-->
        <!--<label for="exampleInputEmail1">Email address</label>-->
        <!--<input type="email" class="form-control" placeholder="Email">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="row">-->
        <!--<div class="col-md-6 pr-1">-->
        <!--<div class="form-group">-->
        <!--<label>First Name</label>-->
        <!--<input type="text" class="form-control" placeholder="Company" value="Chet">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-6 pl-1">-->
        <!--<div class="form-group">-->
        <!--<label>Last Name</label>-->
        <!--<input type="text" class="form-control" placeholder="Last Name" value="Faker">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="row">-->
        <!--<div class="col-md-12">-->
        <!--<div class="form-group">-->
        <!--<label>Address</label>-->
        <!--<input type="text" class="form-control" placeholder="Home Address" value="Melbourne, Australia">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="row">-->
        <!--<div class="col-md-4 pr-1">-->
        <!--<div class="form-group">-->
        <!--<label>City</label>-->
        <!--<input type="text" class="form-control" placeholder="City" value="Melbourne">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-4 px-1">-->
        <!--<div class="form-group">-->
        <!--<label>Country</label>-->
        <!--<input type="text" class="form-control" placeholder="Country" value="Australia">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-4 pl-1">-->
        <!--<div class="form-group">-->
        <!--<label>Postal Code</label>-->
        <!--<input type="number" class="form-control" placeholder="ZIP Code">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="row">-->
        <!--<div class="col-md-12">-->
        <!--<div class="form-group">-->
        <!--<label>About Me</label>-->
        <!--<textarea rows="4" cols="80" class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</form>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
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
    <script>
        $(document).ready(function() {
            $('#expertable').DataTable({
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

            var table = $('#expertable').DataTable();

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
    <script>
        $('#showqual').on('change', function () {
            $("#showacadqual").css('display', (this.value == '1') ? 'flex' : 'none');
            $("#showprofqual").css('display', (this.value == '2') ? 'flex' : 'none');
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
@endsection