@extends('layouts.admin')

@section('title', 'Create School')

@section('content')
    <div class="content-wrapper">
     <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- center column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">School</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(count($errors) > 0 )
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul class="p-0 m-0" style="list-style: none;">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" action="{{url('admin/school/add')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="school-name">School Name</label>
                                                <input type="text" class="form-control" id="school-name" value="{{ old('school_Name')}}" name="school_Name" placeholder="Enter School Name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="principal-name">Principal Name</label>
                                                <input type="text" class="form-control" id="principal-name" value="{{ old('principal_Name')}}" name="principal_Name" placeholder="Enter Principal Name"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="affiliation">Affiliation No</label>
                                                <input type="text" class="form-control" id="affiliation" value="{{ old('affiliation_No')}}" name="affiliation_No" placeholder="Enter Affiliation No"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Board</label>
                                            <select name="board" class="form-control select2" style="width: 100%;">
                                                <option selected="selected" value="">Select Board</option>
                                                @foreach($boards as $board)
                                                    <option value="{{$board->pk_board_id}}">{{$board->board_Name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="registration">Registration No</label>
                                                <input type="text" class="form-control" id="registration" value="{{ old('registration')}}" name="registration" placeholder="Enter Registration No"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="registered-with">Registered With</label>
                                                <input type="text" class="form-control" id="registered-with" value="{{ old('registered_with')}}" name="registered_with" placeholder="Enter Education Department"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="primary-contact">Primary Contact</label>
                                                <input type="text" class="form-control" id="primary-contact" value="{{ old('primary_Contact')}}" name="primary_Contact" placeholder="Enter Primary Contact"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="secondary-contact">Secondary Contact</label>
                                                <input type="text" class="form-control" id="secondary-contact" value="{{ old('secondary_Contact')}}" name="secondary_Contact" placeholder="Enter Secondary Contact"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select name="district" class="form-control select2" style="width: 100%;">
                                                    <option selected="selected" value="">Select District</option>
                                                    @foreach($districts as $district)
                                                    <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select name="city" class="form-control select2" style="width: 100%;">
                                                    <option selected="selected" value="">Select City</option>
                                                     @foreach($cities as $city)
                                                    <option value="{{$city->pk_city_id}}">{{$city->city_name}}</option>
                                                     @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="school-address">School Address</label>
                                                <input type="text" class="form-control" id="school-address" value="{{ old('school_address')}}" name="school_address" placeholder="Enter School Address"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{url('admin/school')}}" class="btn btn-warning">Back</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (center) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom_css')
    <!-- DataTables css File-->
    {{--<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">--}}
@endsection

@section('custom_script')
    <!-- DataTables Js Files -->
   {{-- <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>--}}
   {{-- <script src="{{asset('js/nationality_script.js')}}"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection

