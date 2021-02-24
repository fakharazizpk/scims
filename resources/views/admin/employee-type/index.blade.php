@extends('layouts.admin')

@section('title', 'Admin Employee Types')

@section('content')
    <div class="content-wrapper">
       <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Employee Types</h3>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{url('admin/employee-type/add-view')}}" class="btn btn-primary pull-right mb-1">Add Employee type</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Employee Type</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employee_types as $employee_type)
                                <tr>
                                    <td>{{$employee_type->emp_typ_Id}}</td>
                                    <td>{{$employee_type->emp_Type}}</td>
                                    <td>{{$employee_type->designation}}</td>
                                    <td>
                                        <a href="{{url('admin/employee-type/edit/'.$employee_type->emp_typ_Id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('admin/employee-type/delete/'.$employee_type->emp_typ_Id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Employee Type</th>
                                    <th>Designation</th>
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
