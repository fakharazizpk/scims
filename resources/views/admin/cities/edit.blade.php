@extends('layouts.admin')

@section('title', 'Edit City')

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
                                <h3 class="card-title">City</h3>
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
                            <form role="form" action="{{url('admin/cities/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $city->pk_city_id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="district">Gender</label>
                                        <select name="district" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="">Select District</option>
                                            @foreach($districts as $district)
                                            <option value="{{$district->dom_Id}}" @if($city->dom_id==$district->dom_Id) selected @endif>{{$district->dom_District}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city-name">City Name</label>
                                        <input type="text" class="form-control" id="city-name" value="{{ $city->city_name}}" name="city_name" placeholder="Enter City Name"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="zip-code">Zip Code</label>
                                        <input type="text" class="form-control" id="zip-code" value="{{ $city->zip_code}}" name="zip_code" placeholder="Enter Zip Code"/>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

