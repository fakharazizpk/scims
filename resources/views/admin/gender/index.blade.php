@extends('layouts.admin')

@section('title', 'Gender')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Dashboard</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard v1</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>--}}
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Gender</h3>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{url('admin/gender/add-view')}}" class="btn btn-primary pull-right mb-1">Add Gender</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($genders as $gender)
                                <tr>
                                    <td>{{$gender->gnd_Id}}</td>
                                    <td>{{$gender->gender}}</td>
                                    <td>
                                        <a href="{{url('admin/gender/edit/'.$gender->gnd_Id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('admin/gender/delete/'.$gender->gnd_Id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom_css')
<!-- DataTables css File-->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('custom_script')
<!-- DataTables Js Files -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('js/nationality_script.js')}}"></script>
@endsection
