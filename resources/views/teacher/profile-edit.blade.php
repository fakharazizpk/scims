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
                            @if($teacherprofile->user_image)
                                <img class="avatar border-gray" src="{{asset('upload/user/'.$teacherprofile->user_image)}}" alt="Image">
                            @else
                                <img class="avatar border-gray" src="{{url('adminassets/img/accountant.jpg')}}" alt="Default User">
                            @endif
                            <h3 class="profile-username text-center ">{{ $teacherprofile->emp_given_name }}</h3>

                            <p class="text-muted text-center font-weight-bold">{{ $teacherprofile->user_type }}</p>
                            <form action="{{url('teacher/profile-update')}}" method="Post" enctype="multipart/form-data">
                                @csrf
                                <div><input type="file" class="form-control" placeholder=""
                                           value="" name="user_image"
                                           title="User Image">
                                </div>
                                <br>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Mobile</label>
                                <input type="text" class="form-control col-sm-6 @error('phone') is-invalid @enderror" placeholder=""
                                       value="{{$teacherprofile->emp_mob_Ph}}" name="phone"
                                       title="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Email</label>
                                    <input type="text" class="form-control col-sm-6 @error('email') is-invalid @enderror" placeholder=""
                                           value="{{$teacherprofile->emp_Email}}" name="email"
                                           title="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"> Personal Information</h5>
                    </div>
                    <div class="card-body table-full-width table-hover">
                        <div class="table-condensed">

{{--                            @if ($errors->any())--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <div>{{$error}}</div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <table class="table table-hover" width="100%">
                                <tbody>
                                <tr>
                                    <th>Father Name</th>
                                    <td><input type="text" class="form-control" name="emp_cont_id" hidden>
                                        <input type="text" class="form-control @error('fath_name') is-invalid @enderror" placeholder=""
                                               value="{{$teacherprofile->emp_fat_Name}}" name="fath_name"
                                               title="fath_name">
                                        @error('fath_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <select class="form-select form-control form-select-lg mb-3" name="gender" @error('gender') is-invalid @enderror aria-label=".form-select-lg example">
                                            <option selected>Select Gender</option>
                                            @foreach($gender as $gender)
                                                <option value="{{$gender->gnd_Id}}" @if($gender->gnd_Id == $teacherprofile->gnd_Id) selected @endif> {{ $gender->gender }} </option>
                                            @endforeach
                                        </select>
{{--                                        <input type="text" class="form-control @error('gender') is-invalid @enderror" placeholder=""--}}
{{--                                               value="{{$teacherprofile->gender}}" name="gender"--}}
{{--                                               title="gender">--}}
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <th>Marital Status</th>
                                    <td>
                                        <select class="form-select form-control form-select-lg mb-3" name="marital_status" aria-label=".form-select-lg example">
{{--                                            <option >Select Marital Status</option>--}}
                                            @foreach($maritalstatus as $marit_stat)
                                            <option value="{{$marit_stat->marital_status}}" @if($marit_stat->marital_status == $teacherprofile->emp_marital_Status) selected @endif >{{$marit_stat->marital_status}}</option>
                                            @endforeach
                                        </select>
{{--                                        <input type="text" class="form-control @error('marital_status') is-invalid @enderror" placeholder=""--}}
{{--                                               value="{{$teacherprofile->emp_marital_Status}}" name="marital_status"--}}
{{--                                               title="marital_status">--}}
                                        @error('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <th>Blood Group</th>
                                    <td>
                                        <select class="form-select form-control form-select-lg mb-3" name="blood_group" @error('blood_group') is-invalid @enderror aria-label=".form-select-lg example">
                                            <option >Select Blood Group</option>
                                            @foreach($bloodgroup as $blod_group)
                                            <option value="{{$blod_group->bg_Id}}" @if($blod_group->bg_Id == $teacherprofile->bg_Id) selected @endif>{{$blod_group->blood_group}}</option>
                                            @endforeach
                                        </select>
{{--                                        <input type="text" class="form-control @error('blood_group') is-invalid @enderror" placeholder=""--}}
{{--                                               value="{{$teacherprofile->blood_group}}" name="blood_group"--}}
{{--                                               title="blood_group">--}}
                                        @error('blood_group')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>National Identifier</th>
                                    <td><input type="text" class="form-control @error('nationality') is-invalid @enderror" placeholder=""
                                               value="{{$teacherprofile->emp_Cnic}}" name="nationality"
                                               title="nationality">
                                        @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td><input type="text" class="form-control datepicker" @error('dob') is-invalid @enderror placeholder=""
                                               value="{{$teacherprofile->emp_Dob}}" name="dob"
                                               title="dob">
                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <th>Religion</th>
                                    <td>
                                        <select class="form-select form-control form-select-lg mb-3" name="religion" @error('religion') is-invalid @enderror aria-label=".form-select-lg example">
                                            <option selected>Select Religion</option>
                                            @foreach ($religion as $religion)
                                                <option value="{{$religion->relig_Id}}" @if($religion->relig_Id == $teacherprofile->relig_Id) selected @endif> {{ $religion->religion }} </option>
                                            @endforeach
                                        </select>
                                        @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <th>Nationality</th>
                                    <td>
                                        <select class="form-select form-control form-select-lg mb-3" name="nationality" @error('nationality') is-invalid @enderror aria-label=".form-select-lg example">
                                            <option >Select Nationality</option>
                                            @foreach ($nationalities as $nationality)
                                                <option value="{{$nationality->nation_Id}}" @if($nationality->nation_Id == $teacherprofile->nation_Id) selected @endif> {{ $nationality->nationality }} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>Domicile</th>--}}
{{--                                    <td><input type="text" class="form-control @error('domicile') is-invalid @enderror" placeholder=""--}}
{{--                                               value="{{$teacherprofile->dom_District}}" name="domicile"--}}
{{--                                               title="domicile">--}}
{{--                                        @error('domicile')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @enderror</td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>Cast</th>
                                    <td>
                                        <select class="form-select form-control form-select-lg mb-3" name="cast" @error('cast') is-invalid @enderror aria-label=".form-select-lg example">
                                            <option >Select Nationality</option>
                                            @foreach ($cast as $cast)
                                                <option value="{{$cast->cast_Id}}" @if($cast->cast_Id == $teacherprofile->cast_Id) selected @endif> {{ $cast->cast }} </option>
                                            @endforeach
                                        </select>
                                        @error('cast')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>City</th>--}}
{{--                                    <td><input type="text" class="form-control @error('city') is-invalid @enderror" placeholder=""--}}
{{--                                               value="{{$teacherprofile->emp_City}}" name="city"--}}
{{--                                               title="city">--}}
{{--                                        @error('city')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @enderror</td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>Emergency Contact Person</th>
                                        <td>
                                        <input type="text" class="form-control" @error('emer_cont_name') is-invalid @enderror placeholder=""
                                               value="{{$teacherprofile->emer_cont_Name}}" name="emer_cont_name"
                                               title="emer_cont_per">
                                        @error('emer_cont_per')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </td>
                                </tr>
                                <tr>
                                    <th>Emergency Contact No</th>
                                    <td><input type="text" class="form-control @error('emer_contact') is-invalid @enderror placeholder=""
                                               value="{{$teacherprofile->emer_cont_No}}" name="emer_contact"
                                               title="emer_contact">
                                        @error('emer_contact')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <th>Emergency Contact Relation</th>
                                    <td><input type="hidden" name="e_id"  value="{{$teacherprofile->emer_cnt_Id}}">
                                        <select class="form-select form-control form-select-lg mb-3" name="emer_contact_rel" @error('em_contact_rel') is-invalid @enderror aria-label=".form-select-lg example">
                                            <option >Select Emergency Contact Relation</option>
                                            @foreach ($relationship as $rel)
                                                <option value="{{$rel->pk_relat_Id}}" @if($rel->pk_relat_Id == $teacherprofile->fk_emer_relat_Id) selected @endif> {{ $rel->relation_Name }} </option>
                                            @endforeach
                                        </select>
                                        @error('em_contact_rel')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror</td>
                                </tr>
                                </tbody>
                            </table>
                            <input type='submit'
                                   class='btn btn-finish  btn-secondary btn-wd pull-right'
                                   name='finish' value='Submit'/>
                            </form>
                        </div>
                    </div>
                </div>
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