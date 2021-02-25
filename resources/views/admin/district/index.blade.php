@extends('layouts.admin')

@section('title', 'District')

@section('content')
    <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">District</h3>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{url('admin/district/add-view')}}" class="btn btn-primary pull-right mb-1">Add District</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>District</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($districts as $district)
                                <tr>
                                    <td>{{$district->dom_Id}}</td>
                                    <td>{{$district->dom_District}}</td>
                                    <td>
                                        <a href="{{url('admin/district/edit/'.$district->dom_Id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('admin/district/delete/'.$district->dom_Id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>District</th>
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
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="{{asset('js/admin_common_script.js')}}"></script>
@endsection
