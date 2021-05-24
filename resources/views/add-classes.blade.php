@extends('layouts.master')
@section('title', 'Add Class')
@section('content')
    <style>
        .add-div-error{
            color: red;
        }
        .edit-div-error{
            color: red;
        }
    </style>
    {{--main Content--}}
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
    <span>
        <h4>Classes</h4>
    </span>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            {{--View Modal--}}
                            <div class="modal fade" id="viewclass" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">View Class Details</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-6">
                                                <div class="row bor-sep">
                                                    <h6 class="col-sm-12">Class Details</h6>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Name</label>
                                                        <p id="show-class-name">Seven</p><hr>
                                                    </div>
                                                    <!--<div class="form-group col-sm-6 ">-->
                                                    <!--<label class="font-weight-bolder">Numeric Name</label>-->
                                                    <!--<p>VII</p><hr>-->
                                                    <!--</div>-->
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">No of Periods</label>
                                                        <p id="show-no-of-periods">34</p><hr>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard ">
                                                        <label class="font-weight-bolder">School Section</label>
                                                        <p id="show-school-section">Middle School</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Tuition Fee</label>
                                                        <p id="show-tuition-fee">2000</p><hr>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="bor-sep">
                                                        <div class="card-header">
                                                            <h6 class="card-title">subjects</h6>
                                                            <p class="category">List of subjects taught</p>
                                                        </div>
                                                        <div class="card-content  table-full-width">
                                                            <table class="table subjects_table">
                                                                <thead>
                                                                <tr><th>#</th>
                                                                    <th>Subject</th>
                                                                </tr></thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="divider"></div>-->
                                            <div class="col-sm-6" style="overflow-y: scroll;height: 900px!important;">
                                                <div class="row bor-sep">
                                                    <h6 class="col-sm-12">Section Details</h6>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Section Name</label>
                                                        <p>Alpha</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Teacher</label>
                                                        <p>Ahmed Ali</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Strength</label>
                                                        <p>32</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Representative</label>
                                                        <p>Ali</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row bor-sep">
                                                    <h6 class="col-sm-12">Section Details</h6>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Section Name</label>
                                                        <p>Alpha</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Teacher</label>
                                                        <p>Ahmed Ali</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Strength</label>
                                                        <p>32</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Representative</label>
                                                        <p>Ali</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row bor-sep">
                                                    <h6 class="col-sm-12">Section Details</h6>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Section Name</label>
                                                        <p>Alpha</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Teacher</label>
                                                        <p>Ahmed Ali</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Strength</label>
                                                        <p>32</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">Class Representative</label>
                                                        <p>Ali</p><hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                           {{-- <div class="">
                                                <button type="submit" class="btn btn-success btn-link" data-dismiss="modal">Save</button>
                                            </div>
                                            <div class="divider"></div>--}}
                                            <div class="">
                                                <button type="button" class="btn btn-danger btn-link btn-round" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--End View Modal--}}
                            {{--Add Class Modal--}}
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                                <div class=" form-group ">
                                    <button class=" btn btn-choice btn-round pull-right " type="button" id="newclassbtn"
                                            data-toggle="modal" data-target="#newclass" aria-haspopup="true"
                                            aria-expanded="false">
                                        New class
                                    </button>
                                    <div class="modal fade " id="newclass" data-backdrop="static" tabindex="-1"
                                         role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                    <h5 class="title title-up">Add New Class</h5>
                                                </div>
                                                {{--Add class Error--}}

                                                {{--End Add class Error--}}
                                                <form id="add-new-class-form">
                                                <div class="modal-body row">
                                                    <div class="col-sm-12">
                                                        <div class="add-div-error" style="display:none">
                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                 role="alert" id="add-alert-danger">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <ul class="p-0 m-0" style="list-style: none;">
                                                                    <li></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h6 class="col-sm-12">New Class Details</h6>
                                                            <div class="form-group col-sm-6">
                                                                <label>Class Name</label>
                                                                <input type="text"  name="class_name" class="form-control" placeholder=""
                                                                       name="houseallow">
                                                                <div class="add-div-error class_name"></div>

                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>Numeric Name</label>
                                                                <input type="text" class="form-control" name="numeric_name" placeholder=""
                                                                       name="houseallow" pattern="">
                                                                <div class="add-div-error numeric_name"></div>

                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>No of Periods</label>
                                                                <input type="number" class="form-control" name="no_of_period" placeholder=""
                                                                       name="noofperiod" number="true">
                                                                <div class="add-div-error no_of_period"></div>
                                                            </div>
                                                          {{--  <div class=" col-sm-6 select-wizard">
                                                                <label>Assign Teacher</label>
                                                                <select name="teacher" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary"
                                                                        title="Select Billing Scgedule">
                                                                    <option value="" disabled selected>Select Teacher
                                                                    </option>
                                                                    <option value="1">Ahmed</option>
                                                                    <option value="2">Jaffar</option>
                                                                    <option value="3">Muneer</option>
                                                                    <option value="4">Saleem</option>
                                                                    <option value="5">Awais</option>
                                                                    <option value="6">Ahmed</option>
                                                                    <option value="7">Jaffar</option>
                                                                    <option value="8">Muneer</option>
                                                                    <option value="9">Saleem</option>
                                                                    <option value="10">Awais</option>
                                                                </select>
                                                            </div>--}}
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>School Section</label>
                                                                <select name="school_section" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary"
                                                                        title="Select Billing Scgedule">
                                                                    <option value="" disabled selected>Select Section
                                                                    </option>
                                                                    @foreach($school_sections as $school_section)
                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error school_section"></div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>Tuition Fee</label>
                                                                <input type="text" name="tuition_fee" class="form-control" placeholder=""
                                                                       name="tuitionfee" number="true">
                                                                <div class="add-div-error tuition_fee"></div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label>Assign Subjects</label>
                                                                <select name="subject[]" class="selectpicker"
                                                                        data-style="btn btn-secondary " multiple
                                                                        title="Choose Subjects" data-size="7">
                                                                    <option disabled> Choose Subjects</option>
                                                                    @foreach($subjects as $subject))
                                                                    <option value="{{$subject->sub_Id}}">{{$subject->subject}} </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error subject"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="">
                                                        <button type="submit"
                                                                class="btn btn-success btn-link btn-round" id="add-new-class-btn">Save
                                                        </button>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-danger btn-link btn-round"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                    </div>

                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--End Class Modal--}}

                            {{--edit Class Modal--}}
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                                <div class=" form-group ">
                                    <div class="modal fade " id="editclassmodal" data-backdrop="static" tabindex="-1"
                                         role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                    <h5 class="title title-up">Edit Class</h5>
                                                </div>
                                                <form id="edit-new-class-form">
                                                <div class="modal-body row">
                                                    <div class="col-sm-12">
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
                                                        <div class="row">
                                                            <input type="hidden" name="id" id="edit-class-id">
                                                            <h6 class="col-sm-12">Edit Class Details</h6>
                                                            <div class="form-group col-sm-6">
                                                                <label>Class Name</label>
                                                                <input type="text" class="form-control" placeholder=""
                                                                       name="class_name" id="edit-class-name">
                                                                <div class="edit-div-error class_name"></div>

                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>Numeric Name</label>
                                                                <input type="text" class="form-control" placeholder=""
                                                                       name="numeric_name" pattern="" id="edit-numeric-name">
                                                                <div class="edit-div-error numeric_name"></div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>No of Periods</label>
                                                                <input type="number" class="form-control" placeholder=""
                                                                       name="no_of_period" number="true" id="edit-no-of-period">
                                                                <div class="edit-div-error no_of_period"></div>
                                                            </div>
                                                            {{--<div class=" col-sm-6 select-wizard">
                                                                <label>Assign Teacher</label>
                                                                <select class="selectpicker" data-size="7" name="teacher"
                                                                        data-style="btn btn-secondary"
                                                                        title="Select Billing Scgedule" id="edit-teacher">
                                                                    <option value="" disabled selected>Select Teacher
                                                                    </option>
                                                                    <option value="1">Ahmed</option>
                                                                    <option value="2">Jaffar</option>
                                                                    <option value="3">Muneer</option>
                                                                    <option value="4">Saleem</option>
                                                                    <option value="5">Awais</option>
                                                                    <option value="6">Ahmed</option>
                                                                    <option value="7">Jaffar</option>
                                                                    <option value="8">Muneer</option>
                                                                    <option value="9">Saleem</option>
                                                                    <option value="10">Awais</option>
                                                                </select>
                                                            </div>--}}
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>School Section</label>
                                                                <select class="selectpicker" data-size="7" name="school_section"
                                                                        data-style="btn btn-secondary"
                                                                        title="Select Billing Scgedule" id="edit-school-section">
                                                                    <option value="" disabled selected>Select Section
                                                                    </option>
                                                                    @foreach($school_sections as $school_section)
                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="edit-div-error school_section"></div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>Tuition Fee</label>
                                                                <input type="text" class="form-control" placeholder=""
                                                                       name="tuition_fee" number="true" id="edit-tuition-fee">
                                                                <div class="edit-div-error tuition_fee"></div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label>Assign Subjects</label>
                                                                <select class="selectpicker edit-subject" name="subject[]"
                                                                        data-style="btn btn-secondary " multiple
                                                                        title="Choose Subjects" data-size="7" id="edit-subject">
                                                                    <option disabled> Choose Subjects</option>
                                                                    @foreach($subjects as $subject))
                                                                    <option value="{{$subject->sub_Id}}">{{$subject->subject}} </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="edit-div-error subject"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="">
                                                        <button type="submit"
                                                                class="btn btn-success btn-link btn-round" id="update-class-btn">Save
                                                        </button>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-danger btn-link btn-round"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--End Class Modal--}}
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <div class="card-header">
                                                        <h6 class="card-title">Students Record List</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="toolbar">
                                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                        </div>
                                                        {{--start success message--}}
                                                        <div class="alert alert-success" id="success-message" style="display: none">
                                                            {{--{{ session()->get('message') }}--}}
                                                        </div>
                                                        {{--end success message--}}
                                                        <table id="datatable" class="table table-striped table-bordered"
                                                               cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Class Name</th>
                                                                <th>Numeric Name</th>
                                                                <th>No Of Period</th>
                                                                <th>Tuition Fee</th>
                                                                <th class="disabled-sorting text-center">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Class Name</th>
                                                                <th>Numeric Name</th>
                                                                <th>No Of Period</th>
                                                                <th>Tuition Fee</th>
                                                                <th class="disabled-sorting text-center">Actions</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                            @php $i=1; @endphp
                                                            @foreach($classes as $class)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$class->class}}</td>
                                                                <td>{{$class->numeric_name}}</td>
                                                                <td>{{$class->no_of_period}}</td>
                                                                <td>{{$class->tuition_fee}}</td>
                                                                <td class="text-center">
                                                                    <div class="form-inline pull-right">
                                                                        <div class="">
                                                                            <button class=" btn-link btn-cus-weight show-view-class-btn"
                                                                                    type="button"
                                                                                    data-toggle="modal"
                                                                                   {{-- data-target="#viewclass"--}}
                                                                                    id="show-view-class-btn"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false" data-id="{{ $class->cls_Id }}">
                                                                                View
                                                                            </button>
                                                                        </div>
                                                                        <div class="nav-item btn-rotate dropdown pull-right ">
                                                                            <a class="nav-link dropdown-toggle pull-right"
                                                                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                                               data-toggle="dropdown"
                                                                               aria-haspopup="true"
                                                                               aria-expanded="false" data-id="{{ $class->cls_Id }}">
                                                                            </a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right"
                                                                                aria-labelledby="navbarDropdownMenuLink">
                                                                                <a class="dropdown-item editclass" href="javascript:void(0)"
                                                                                   data-toggle="modal"
                                                                                  {{-- data-target="#editclass"--}}
                                                                                   aria-haspopup="true"
                                                                                   aria-expanded="false" data-id="{{ $class->cls_Id }}">Edit</a>
                                                                                <a class="dropdown-item"
                                                                                   href="{{url('delete-class/'.$class->cls_Id)}}">Delete</a>
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
                                </div>
                            </div>


                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->

                </div>

            </div>

        </div>
    </div>
    {{--end main Content--}}
@endsection

@section('front_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('front_script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/addclass_script.js')}}"></script>
<script>
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true, tags: true });
</script>
@endsection
