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

                            <form role="form" action="{{url('admin/school/update')}}" method="post">
                                <input type="hidden" name="id" value="{{ $school->pk_school_Id}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="school-name">School Name</label>
                                                <input type="text" class="form-control @error('school_Name') is-invalid @enderror" id="school-name" value="{{ $school->school_Name}}" name="school_Name" placeholder="Enter School Name"/>
                                                @error('school_Name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="principal-name">Principal Name</label>
                                                <input type="text" class="form-control @error('principal_Name') is-invalid @enderror" id="principal-name" id="principal-name" value="{{ $school->principal_Name}}" name="principal_Name" placeholder="Enter Principal Name"/>
                                                @error('principal_Name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="affiliation">Affiliation No</label>
                                                <input type="text" class="form-control @error('affiliation_No') is-invalid @enderror" id="affiliation" value="{{ $school->affiliation_No}}" name="affiliation_No" placeholder="Enter Affiliation No"/>
                                                @error('affiliation_No')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="board">Board</label>
                                            <select name="board" id="board" class="form-control @error('board') is-invalid select2 @enderror" style="width: 100%;">

                                                @error('board')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <option selected="selected"  value="">Select Board</option>
                                                @foreach($boards as $board)
                                                <option value="{{$board->pk_board_Id}}" @if($school->board_Id==$board->pk_board_Id) selected  @endif>{{$board->board_Name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="registration">Registration No</label>
                                                <input type="text" class="form-control @error('registration') is-invalid @enderror" id="registration" value="{{ $school->registration}}" name="registration" placeholder="Enter Registration No"/>
                                                @error('registration')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="registered-with">Registered With</label>
                                                <input type="text" class="form-control @error('registered_with') is-invalid @enderror" id="registered-with" value="{{ $school->registered_with}}" name="registered_with" placeholder="Enter Education Department"/>
                                                @error('registered_with')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="primary-contact">Primary Contact</label>
                                                <input type="text" class="form-control @error('primary_Contact') is-invalid @enderror"" id="primary-contact" value="{{ $school->primary_Contact}}" name="primary_Contact" placeholder="Enter Primary Contact"/>
                                                @error('primary_Contact')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="secondary-contact">Secondary Contact</label>
                                                <input type="text" class="form-control @error('secondary_Contact') is-invalid @enderror" id="secondary-contact" value="{{ $school->secondary_Contact}}" name="secondary_Contact" placeholder="Enter Secondary Contact"/>
                                                @error('secondary_Contact')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select name="district" id="district" class="form-control @error('district') is-invalid select2 @enderror" style="width: 100%;">
                                                    @error('district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <option selected="selected" value="">Select District</option>
                                                    @foreach($districts as $district)
                                                        <option value="{{$district->dom_Id}}" @if($school->dom_Id==$district->dom_Id) selected  @endif>{{$district->dom_District}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <select name="city" id="city" class="form-control @error('city') is-invalid select2 @enderror" style="width: 100%;">
                                                    @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <option selected="selected" >Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->pk_city_id}}" @if($school->city_Id==$city->pk_city_id) selected  @endif>{{$city->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="school-address">School Address</label>
                                                <input type="text" class="form-control @error('school_address') is-invalid @enderror" id="school-address" value="{{ $school->school_Add}}" name="school_address" placeholder="Enter School Address"/>
                                                @error('school_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/school')}}" class="btn btn-warning">Cancel</a>
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
    {{-- <script src="{{asset('js/admin_common_script.js')}}"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection

