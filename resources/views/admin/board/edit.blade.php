@extends('layouts.admin')

@section('title', 'Edit Board')

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
                                <h3 class="card-title">Board</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
{{--                            @if(count($errors) > 0 )--}}
{{--                                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                    <ul class="p-0 m-0" style="list-style: none;">--}}
{{--                                        @foreach($errors->all() as $error)--}}
{{--                                            <li>{{$error}}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                            <form role="form" action="{{url('admin/board/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $board->pk_board_Id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="board">Board Name</label>
                                        <input type="text" class="form-control @error('board_Name') is-invalid @enderror" id="board" value="{{ $board->board_Name}}" name="board_Name" placeholder="Enter Board Name"/>
                                        @error('board_Name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/board')}}" class="btn btn-warning cancel" data-title=" ">Cancel</a>
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

