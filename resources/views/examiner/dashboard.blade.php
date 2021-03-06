@extends('layouts.examiner')
@section('title', 'Examiner Dashboard')
@section('content')
    <style>
        .add-div-error{
            color: red;
        }
        .edit-div-error{
            color: red;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#allexams" role="tab" aria-expanded="true">Exams</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setmarks" role="tab" aria-expanded="false">Set marks</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setgrades" role="tab" aria-expanded="false">Set grades</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setsyllabus" role="tab" aria-expanded="false">Set Syllabus</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="allexams" role="tabpanel" aria-expanded="true">
                                <div class="row">
                                    <div class="col-sm-12">
                                            <div class=" ">
                                                <div class="card-header ">
                                                    <h4 class="card-title">Examinations</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row bor-sep">

                                                        <div class="col-sm-12 pull-right">
                                                            <button class="btn btn-secondary pull-right btn-round" id="schedule-exam-btn">
                                                                Schedule Exam
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="schedule-exam" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-sm">

                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Schedule New Exam</h5>
                                                                </div>
                                                                <form id="Shedule-Exam-Form" method="post">
                                                                    @csrf
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam type</label>
                                                                                <select name="exam_Type" class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class">
                                                                                    <option value="" disabled selected>Choose type</option>
                                                                                    <option value="1">Weekly</option>
                                                                                    <option value="2">Monthly</option>
                                                                                    <option value="3">Term</option>
                                                                                    <option value="4">Other</option>
                                                                                </select>
                                                                                <div class="add-div-error exam_Type"></div>
                                                                            </div>
                                                                            <div class="col-sm-12 select-wizard">
                                                                                <label class="col-sm-12">Section</label>
                                                                                <select name="school_Section[]" multiple class="selectpicker " data-size="5" id="number-multiple" data-style="btn btn-secondary" data-container="" data-live-search="false" title="Choose sections" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                                                                    <option value="" disabled>Choose section</option>
                                                                                    @foreach($school_sections as $school_section)
                                                                                    <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error school_Section"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Exam name</label>
                                                                                <input type="text" class="form-control" placeholder="" name="exam_Name">
                                                                                <div class="add-div-error exam_Name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Start date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="exam_Start">
                                                                                <div class="add-div-error exam_Start"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>End date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="exam_End">
                                                                                <div class="add-div-error exam_End"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">
                                                                                <label>Comments</label>
                                                                                <textarea type="text" class="form-control" placeholder="" name="exam_Comment"></textarea>
                                                                                <div class="add-div-error exam_Comment"></div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-success btn-round btn-link" id="add-schedule-exam-btn">Save</button>

                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>

                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="edit-schedule-exam-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Edit Schedule Exam</h5>
                                                                </div>
                                                                <form>
                                                                    <input type="hidden" name="exam_id" value="" id="edit-exam-id">
                                                                </form>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam type</label>
                                                                                <select name="exam_Type" id="edit-exam-type" class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class">
                                                                                    <option value="" disabled selected>Choose type</option>
                                                                                    <option value="1">Weekly</option>
                                                                                    <option value="2">Monthly</option>
                                                                                    <option value="3">Term</option>
                                                                                    <option value="4">Other</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-12 select-wizard">
                                                                                <label class="col-sm-12">Section</label>
                                                                                <select name="school_Section[]" id="edit-school-section" multiple class="selectpicker " data-size="5"  data-style="btn btn-secondary" data-container="" data-live-search="false" title="Choose sections" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                                                                    <option value="" disabled>Choose section</option>
                                                                                    @foreach($school_sections as $school_section)
                                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Exam name</label>
                                                                                <input type="text" class="form-control" placeholder="" name="exam_Name" id="edit-exam-name">
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Start date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="exam_Start" id="edit-exam-start">
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>End date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="exam_End" id="edit-exam_end">
                                                                            </div>
                                                                            <div class="form-group col-sm-12">
                                                                                <label>Comments</label>
                                                                                <textarea type="text" class="form-control" placeholder="" name="exam_Comment" id="edit-exam-Comment"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-success btn-round btn-link">Save</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="viewexams" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">View Exam</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam type</label>
                                                                                <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" >
                                                                                    <option value="" disabled selected>Choose type</option>
                                                                                    <option value="1">Weekly</option>
                                                                                    <option value="2">Monthly</option>
                                                                                    <option value="3">Term</option>
                                                                                    <option value="1">Other</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-12 select-wizard">
                                                                                <label class="col-sm-12">Section</label>
                                                                                <select multiple class="selectpicker " data-size="5"  data-style="btn btn-secondary" data-container="" data-live-search="false" title="Choose sections" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                                                                    <option value="" disabled>Choose section</option>
                                                                                    <option value="1">Pre Section</option>
                                                                                    <option value="2">Junior Section</option>
                                                                                    <option value="2">Middle Section</option>
                                                                                    <option value="2">Senior Section</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Exam name</label>
                                                                                <input type="text" class="form-control" placeholder="" name="examname"  number="true" number="true">
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Start date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="houseallow">
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>End date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="houseallow">
                                                                            </div>
                                                                            <div class="form-group col-sm-12">
                                                                                <label>Comments</label>
                                                                                <textarea type="text" class="form-control" placeholder="" name="houseallow"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-success btn-round btn-link">Save</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Examinations List</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="toolbar">
                                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                </div>
                                                                <table id="diarytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Exam name</th>
                                                                        <th>Exam Type</th>
                                                                        <th>Sections</th>
                                                                        <th>Start date</th>
                                                                        <th>End date</th>
                                                                        <th>Status</th>
                                                                        <th class="disabled-sorting text-center">Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Exam name</th>
                                                                        <th>Exam Type</th>
                                                                        <th>Sections</th>
                                                                        <th>Start date</th>
                                                                        <th>End date</th>
                                                                        <th>Status</th>
                                                                        <th class="disabled-sorting text-center">Actions</th>
                                                                    </tr>
                                                                    </tfoot>
                                                                    <tbody>
                                                                    @foreach($exams as $exam)
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>{{$exam->exam_Name}}</td>
                                                                        <td>{{$exam->exm_typ_Id}}</td>
                                                                        <td>{{$exam->school_section}}</td>
                                                                        <td>{{$exam->exam_Start}}</td>
                                                                        <td>{{$exam->exam_End}}</td>
                                                                        <td>{{$exam->exam_Status}}</td>
                                                                        <td class="">
                                                                            <div class="form-inline pull-right">
                                                                                <div class="">
                                                                                    <button class=" btn-link btn-cus-weight btn-block" type="button" id="" data-id="{{ $exam->exam_Id  }}" data-target="#viewexams"  data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                                                                                        View
                                                                                    </button>
                                                                                </div>
                                                                                <div class="nav-item btn-rotate dropdown ">
                                                                                    <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" data-id="{{ $exam->exam_Id  }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    </a>
                                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                        <a class="dropdown-item edit-schedule-exam-btn" href="#"  data-toggle="modal" data-id="{{ $exam->exam_Id  }}" aria-haspopup="true" aria-expanded="false">Edit</a>
                                                                                        <a class="dropdown-item" href="#">Delete</a>
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

                            </div>
                            <div class="tab-pane" id="setmarks" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Set marks</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" data-target="#setmarksmodal">
                                                            Set marks
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="setmarksmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Set exam marks</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Exam</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose examination" >
                                                                                <option value="" disabled selected>Choose exam</option>
                                                                                <option value="1">1st Checkpoint</option>
                                                                                <option value="2">2nd Checkpoint</option>
                                                                                <option value="3">Mid term</option>
                                                                                <option value="1">3rd Checkpoint</option>
                                                                                <option value="2">4th Checkpoint</option>
                                                                                <option value="3">Final term</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Section</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose school section" >
                                                                                <option value="" disabled selected>Choose Section</option>
                                                                                <option value="1">Pre section</option>
                                                                                <option value="2">Junior section</option>
                                                                                <option value="2">Middle section</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose subject" >
                                                                                <option value="" disabled selected>Choose Subject</option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-md-9">
                                                                    <TABLE class="table table-hover" id="dataTable">
                                                                        <tr class="text-secondary">

                                                                            <th></th><th>ID</th><th>Module</th><th>Total Marks</th><th>Passing %age</th><th>Actions</th>
                                                                        </tr>
                                                                        <TR>
                                                                            <TD>
                                                                                <INPUT type="checkbox" name="chk" />
                                                                            </TD>
                                                                            <TD> 1 </TD>
                                                                            <td>
                                                                                <div class="  select-wizard">
                                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-outline-choice btn-link" title="choose module" >
                                                                                        <option value="" disabled selected>Choose module</option>
                                                                                        <option value="1">Reading</option>
                                                                                        <option value="2">Writing</option>
                                                                                        <option value="1">Listending</option>
                                                                                        <option value="2">Speaking</option>
                                                                                        <option value="2">Practical</option>
                                                                                        <option value="2">Theory</option>
                                                                                        <option value="1">Notebook marks</option>
                                                                                        <option value="2">Behaviour</option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <TD>
                                                                                <INPUT type="text" class="form-control" name="txtbox"/>
                                                                            </TD>
                                                                            <TD>
                                                                                <INPUT type="text" class="form-control" />
                                                                            </TD>
                                                                            <td class="text-center">
                                                                                <div class="form-inline pull-right">
                                                                                    <div class="">
                                                                                        <button class=" btn-icon btn btn-info btn-cus-weight " value="Add Row" onclick="addRow('dataTable')" type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                                                                            <i class="fa fa-plus"></i>
                                                                                        </button>
                                                                                    </div>

                                                                                    <div class="nav-item btn-rotate dropdown pull-right ">
                                                                                        <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#newclass" aria-haspopup="true" aria-expanded="false">Edit</a>
                                                                                            <a class="dropdown-item" href="#" value="Delete Row" onclick="deleteRow('dataTable')">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!--<a href="../../examples/pages/withdraw-student.html" class="btn btn-danger btn-link btn-icon btn-sm edit" title="withdraw"><i class="fa fa-times"></i></a>-->
                                                                            </td>
                                                                        </TR>
                                                                    </TABLE>
                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success btn-round btn-link">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="viewmaterial" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Study material Details</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" >
                                                                                <option value="" disabled selected>Select Class</option>
                                                                                <option value="1">Playgroup</option>
                                                                                <option value="2">Kindergarten</option>
                                                                                <option value="3">Preparatory</option>
                                                                                <option value="1">One</option>
                                                                                <option value="2">Two</option>
                                                                                <option value="3">Three</option>
                                                                                <option value="1">Four</option>
                                                                                <option value="2">Five</option>
                                                                                <option value="3">Six</option>
                                                                                <option value="1">Seven</option>
                                                                                <option value="2">Eight</option>
                                                                                <option value="3">Eleven</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Section</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Section</option>
                                                                                <option value="1">Alpha</option>
                                                                                <option value="2">Bravo</option>
                                                                                <option value="2">Charlie</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Subject</option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-9">
                                                                    <div class="row">

                                                                        <div class="form-group col-sm-4">
                                                                            <label>Topic</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Audience</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Please</option>
                                                                                <option value="1">Whole Class</option>
                                                                                <option value="2">Individuals</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Individuals</label>
                                                                            <select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Students" data-size="7">
                                                                                <option disabled> Choose Students</option>
                                                                                <option value="1">Ali</option>
                                                                                <option value="2">Basit</option>
                                                                                <option value="2">Kashif</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-sm-12">
                                                                            <label>Note</label>
                                                                            <textarea type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload Document</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo" class="custom-file-input form-control" id="input-document" accept="image/*">
                                                                                <label class="custom-file-label" for="input-document">Select File</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success btn-round  btn-link" data-dismiss="modal">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-round btn-link">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">Marks List</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            <table id="materialtable" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam name</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Module</th>
                                                                    <th>Total marks</th>
                                                                    <th>Passing marks</th>

                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam type</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Module</th>
                                                                    <th>Total marks</th>
                                                                    <th>Passing marks</th>

                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                <tr>

                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="">
                                                                        <div class="form-inline pull-right">
                                                                            <div class="">
                                                                                <button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-toggle="modal" data-target="#viewmaterial" aria-haspopup="true" aria-expanded="false">
                                                                                    View
                                                                                </button>
                                                                            </div>
                                                                            <div class="nav-item btn-rotate dropdown ">
                                                                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                    <a class="dropdown-item" href="#">Edit</a>
                                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="setgrades" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Set grades</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" data-target="#setgradesmodal">
                                                            Set grades
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="setgradesmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Set exam grades</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Exam</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose examination" >
                                                                                <option value="" disabled selected>Choose exam</option>
                                                                                <option value="1">1st Checkpoint</option>
                                                                                <option value="2">2nd Checkpoint</option>
                                                                                <option value="3">Mid term</option>
                                                                                <option value="1">3rd Checkpoint</option>
                                                                                <option value="2">4th Checkpoint</option>
                                                                                <option value="3">Final term</option>
                                                                            </select>
                                                                        </div>
                                                                        <!--<div class=" col-sm-12 select-wizard">-->
                                                                        <!--<label>Section</label>-->
                                                                        <!--<select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose school section" >-->
                                                                        <!--<option value="" disabled selected>Choose Section</option>-->
                                                                        <!--<option value="1">Pre section</option>-->
                                                                        <!--<option value="2">Junior section</option>-->
                                                                        <!--<option value="2">Middle section</option>-->
                                                                        <!--</select>-->
                                                                        <!--</div>-->
                                                                        <!--<div class=" col-sm-12 select-wizard">-->
                                                                        <!--<label>Subject</label>-->
                                                                        <!--<select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose subject" >-->
                                                                        <!--<option value="" disabled selected>Choose Subject</option>-->
                                                                        <!--<option value="1">English</option>-->
                                                                        <!--<option value="2">Urdu</option>-->
                                                                        <!--<option value="2">Math</option>-->
                                                                        <!--<option value="2">Science</option>-->
                                                                        <!--</select>-->
                                                                        <!--</div>-->
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-md-9">
                                                                    <table class="table table-hover" id="markstable">
                                                                        <thead class="text-secondary">
                                                                        <th class="text-center">
                                                                            #
                                                                        </th>
                                                                        <th>
                                                                            Grade
                                                                        </th>
                                                                        <th>
                                                                            Starting percentage
                                                                        </th>
                                                                        <th class="text-center">
                                                                            Ending percentage
                                                                        </th>
                                                                        <th class="text-center">
                                                                            Actions
                                                                        </th>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                1
                                                                            </td>
                                                                            <td class="">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="" name="examname"  number="true" number="true">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="" name="examname"  number="true" number="true">
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="" name="examname"  number="true" number="true">
                                                                                </div>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <div class="form-inline pull-right">
                                                                                    <div class="">
                                                                                        <button class=" btn-icon btn btn-secondary btn-cus-weight " onclick="newrow()" type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                                                                            <i class="fa fa-plus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="nav-item btn-rotate dropdown pull-right ">
                                                                                        <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#newclass" aria-haspopup="true" aria-expanded="false">Edit</a>
                                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!--<a href="../../examples/pages/withdraw-student.html" class="btn btn-danger btn-link btn-icon btn-sm edit" title="withdraw"><i class="fa fa-times"></i></a>-->
                                                                            </td>
                                                                        </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success btn-round btn-link">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="viewmaterial" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Study material Details</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" >
                                                                                <option value="" disabled selected>Select Class</option>
                                                                                <option value="1">Playgroup</option>
                                                                                <option value="2">Kindergarten</option>
                                                                                <option value="3">Preparatory</option>
                                                                                <option value="1">One</option>
                                                                                <option value="2">Two</option>
                                                                                <option value="3">Three</option>
                                                                                <option value="1">Four</option>
                                                                                <option value="2">Five</option>
                                                                                <option value="3">Six</option>
                                                                                <option value="1">Seven</option>
                                                                                <option value="2">Eight</option>
                                                                                <option value="3">Eleven</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Section</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Section</option>
                                                                                <option value="1">Alpha</option>
                                                                                <option value="2">Bravo</option>
                                                                                <option value="2">Charlie</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Subject</option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-9">
                                                                    <div class="row">

                                                                        <div class="form-group col-sm-4">
                                                                            <label>Topic</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Audience</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Please</option>
                                                                                <option value="1">Whole Class</option>
                                                                                <option value="2">Individuals</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Individuals</label>
                                                                            <select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Students" data-size="7">
                                                                                <option disabled> Choose Students</option>
                                                                                <option value="1">Ali</option>
                                                                                <option value="2">Basit</option>
                                                                                <option value="2">Kashif</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-sm-12">
                                                                            <label>Note</label>
                                                                            <textarea type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload Document</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo" class="custom-file-input form-control" id="input-document" accept="image/*">
                                                                                <label class="custom-file-label" for="input-document">Select File</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success btn-round  btn-link">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">Grades List</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            <table id="setgradestable" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam name</th>
                                                                    <th>Section</th>
                                                                    <th>Grade</th>
                                                                    <th>Starting percentage</th>
                                                                    <th>Ending percentage</th>

                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam name</th>
                                                                    <th>Section</th>
                                                                    <th>Grade</th>
                                                                    <th>Starting percentage</th>
                                                                    <th>Ending percentage</th>

                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                <tr>

                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="">
                                                                        <div class="form-inline pull-right">
                                                                            <div class="">
                                                                                <button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-toggle="modal" data-target="#viewmaterial" aria-haspopup="true" aria-expanded="false">
                                                                                    View
                                                                                </button>
                                                                            </div>
                                                                            <div class="nav-item btn-rotate dropdown ">
                                                                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                    <a class="dropdown-item" href="#">Edit</a>
                                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->
                                            <!--<div class="row">-->
                                            <!--<div class="col-md-12">-->
                                            <!--<div class="">-->
                                            <!--<div class="card-header">-->
                                            <!--<h6 class="card-title">Marks List</h6>-->
                                            <!--</div>-->
                                            <!--<div class="card-body">-->
                                            <!--<div class="toolbar">-->
                                            <!--&lt;!&ndash;        Here you can write extra buttons/actions for the toolbar              &ndash;&gt;-->
                                            <!--</div>-->
                                            <!--<table id="gradetablelist" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">-->
                                            <!--<thead>-->
                                            <!--<tr>-->
                                            <!--<th>S.No</th>-->
                                            <!--<th>Exam name</th>-->
                                            <!--<th>Section</th>-->
                                            <!--<th>Subject</th>-->
                                            <!--<th>Module</th>-->
                                            <!--<th>Starting percentage</th>-->
                                            <!--<th>Ending percentage</th>-->


                                            <!--<th class="disabled-sorting text-center">Actions</th>-->
                                            <!--</tr>-->
                                            <!--</thead>-->
                                            <!--<tfoot>-->
                                            <!--<tr>-->
                                            <!--<th>S.No</th>-->
                                            <!--<th>Exam name</th>-->
                                            <!--<th>Section</th>-->
                                            <!--<th>Subject</th>-->
                                            <!--<th>Module</th>-->
                                            <!--<th>Starting percentage</th>-->
                                            <!--<th>Ending percentage</th>-->
                                            <!--<th class="disabled-sorting text-center">Actions</th>-->
                                            <!--</tr>-->
                                            <!--</tfoot>-->
                                            <!--<tbody>-->
                                            <!--<tr>-->

                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td class="">-->
                                            <!--<div class="form-inline pull-right">-->
                                            <!--<div class="">-->
                                            <!--<button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-toggle="modal" data-target="#viewmaterial" aria-haspopup="true" aria-expanded="false">-->
                                            <!--View-->
                                            <!--</button>-->
                                            <!--</div>-->
                                            <!--<div class="nav-item btn-rotate dropdown ">-->
                                            <!--<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                            <!--</a>-->
                                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">-->
                                            <!--<a class="dropdown-item" href="#">Edit</a>-->
                                            <!--<a class="dropdown-item" href="#">Delete</a>-->
                                            <!--</div>-->
                                            <!--</div>-->
                                            <!--</div>-->

                                            <!--</td>-->
                                            <!--</tr>-->
                                            <!--</tbody>-->
                                            <!--</table>-->
                                            <!--</div>&lt;!&ndash; end content&ndash;&gt;-->
                                            <!--</div>&lt;!&ndash;  end card  &ndash;&gt;-->
                                            <!--</div> &lt;!&ndash; end col-md-12 &ndash;&gt;-->
                                            <!--</div> &lt;!&ndash; end row &ndash;&gt;-->

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="setsyllabus" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Set syllabus</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" data-target="#setsyllabusmodal">
                                                            Upload syllabus
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="setsyllabusmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Set exam syllabus</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Exam</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose examination" >
                                                                                <option value="" disabled selected>Choose exam</option>
                                                                                <option value="1">1st Checkpoint</option>
                                                                                <option value="2">2nd Checkpoint</option>
                                                                                <option value="3">Mid term</option>
                                                                                <option value="1">3rd Checkpoint</option>
                                                                                <option value="2">4th Checkpoint</option>
                                                                                <option value="3">Final term</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Section</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose school section" >
                                                                                <option value="" disabled selected>Choose Section</option>
                                                                                <option value="1">Pre section</option>
                                                                                <option value="2">Junior section</option>
                                                                                <option value="2">Middle section</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Choose subject" >
                                                                                <option value="" disabled selected>Choose Subject</option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload Document</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo" class="custom-file-input form-control" id="input-document" accept="image/*">
                                                                                <label class="custom-file-label" for="input-document">Select scanned document</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success btn-round btn-link">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="viewmaterial" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Study material Details</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" >
                                                                                <option value="" disabled selected>Select Class</option>
                                                                                <option value="1">Playgroup</option>
                                                                                <option value="2">Kindergarten</option>
                                                                                <option value="3">Preparatory</option>
                                                                                <option value="1">One</option>
                                                                                <option value="2">Two</option>
                                                                                <option value="3">Three</option>
                                                                                <option value="1">Four</option>
                                                                                <option value="2">Five</option>
                                                                                <option value="3">Six</option>
                                                                                <option value="1">Seven</option>
                                                                                <option value="2">Eight</option>
                                                                                <option value="3">Eleven</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Section</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Section</option>
                                                                                <option value="1">Alpha</option>
                                                                                <option value="2">Bravo</option>
                                                                                <option value="2">Charlie</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Subject</option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-9">
                                                                    <div class="row">

                                                                        <div class="form-group col-sm-4">
                                                                            <label>Topic</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Audience</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                                <option value="" disabled selected>Select Please</option>
                                                                                <option value="1">Whole Class</option>
                                                                                <option value="2">Individuals</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Individuals</label>
                                                                            <select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Students" data-size="7">
                                                                                <option disabled> Choose Students</option>
                                                                                <option value="1">Ali</option>
                                                                                <option value="2">Basit</option>
                                                                                <option value="2">Kashif</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-sm-12">
                                                                            <label>Note</label>
                                                                            <textarea type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload Document</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo" class="custom-file-input form-control" id="input-document" accept="image/*">
                                                                                <label class="custom-file-label" for="input-document">Select File</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success btn-round  btn-link" data-dismiss="modal">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-round btn-link">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">Grades List</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            <table id="setgradestable" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam name</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>File</th>


                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam name</th>
                                                                    <th>Section</th>
                                                                    <th>Grade</th>
                                                                    <th>File</th>

                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                <tr>

                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="">
                                                                        <div class="form-inline pull-right">
                                                                            <div class="">
                                                                                <button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-toggle="modal" data-target="#viewmaterial" aria-haspopup="true" aria-expanded="false">
                                                                                    View
                                                                                </button>
                                                                            </div>
                                                                            <div class="nav-item btn-rotate dropdown ">
                                                                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                    <a class="dropdown-item" href="#">Edit</a>
                                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->
                                            <!--<div class="row">-->
                                            <!--<div class="col-md-12">-->
                                            <!--<div class="">-->
                                            <!--<div class="card-header">-->
                                            <!--<h6 class="card-title">Marks List</h6>-->
                                            <!--</div>-->
                                            <!--<div class="card-body">-->
                                            <!--<div class="toolbar">-->
                                            <!--&lt;!&ndash;        Here you can write extra buttons/actions for the toolbar              &ndash;&gt;-->
                                            <!--</div>-->
                                            <!--<table id="gradetablelist" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">-->
                                            <!--<thead>-->
                                            <!--<tr>-->
                                            <!--<th>S.No</th>-->
                                            <!--<th>Exam name</th>-->
                                            <!--<th>Section</th>-->
                                            <!--<th>Subject</th>-->
                                            <!--<th>Module</th>-->
                                            <!--<th>Starting percentage</th>-->
                                            <!--<th>Ending percentage</th>-->


                                            <!--<th class="disabled-sorting text-center">Actions</th>-->
                                            <!--</tr>-->
                                            <!--</thead>-->
                                            <!--<tfoot>-->
                                            <!--<tr>-->
                                            <!--<th>S.No</th>-->
                                            <!--<th>Exam name</th>-->
                                            <!--<th>Section</th>-->
                                            <!--<th>Subject</th>-->
                                            <!--<th>Module</th>-->
                                            <!--<th>Starting percentage</th>-->
                                            <!--<th>Ending percentage</th>-->
                                            <!--<th class="disabled-sorting text-center">Actions</th>-->
                                            <!--</tr>-->
                                            <!--</tfoot>-->
                                            <!--<tbody>-->
                                            <!--<tr>-->

                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td></td>-->
                                            <!--<td class="">-->
                                            <!--<div class="form-inline pull-right">-->
                                            <!--<div class="">-->
                                            <!--<button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-toggle="modal" data-target="#viewmaterial" aria-haspopup="true" aria-expanded="false">-->
                                            <!--View-->
                                            <!--</button>-->
                                            <!--</div>-->
                                            <!--<div class="nav-item btn-rotate dropdown ">-->
                                            <!--<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                            <!--</a>-->
                                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">-->
                                            <!--<a class="dropdown-item" href="#">Edit</a>-->
                                            <!--<a class="dropdown-item" href="#">Delete</a>-->
                                            <!--</div>-->
                                            <!--</div>-->
                                            <!--</div>-->

                                            <!--</td>-->
                                            <!--</tr>-->
                                            <!--</tbody>-->
                                            <!--</table>-->
                                            <!--</div>&lt;!&ndash; end content&ndash;&gt;-->
                                            <!--</div>&lt;!&ndash;  end card  &ndash;&gt;-->
                                            <!--</div> &lt;!&ndash; end col-md-12 &ndash;&gt;-->
                                            <!--</div> &lt;!&ndash; end row &ndash;&gt;-->

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="#" target="_blank">SCIMS</a></li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
              <span class="copyright">
                ?? <script>
                  document.write(new Date().getFullYear())
              </script>, by Point Web Tech Pvt Ltd
              </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

@section('front_script')
    <script src="{{asset('js/examiner.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#materialtable').DataTable({
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

            var table = $('#materialtable').DataTable();

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
            $('#diarytable').DataTable({
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

            var table = $('#diarytable').DataTable();

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
            $('#checkdiarytable').DataTable({
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

            var table = $('#checkdiarytable').DataTable();

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
            $('#setgradestable').DataTable({
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

            var table = $('#checkdiarytable').DataTable();

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
        /* Formatting function for row details - modify as you need */
        function format ( d ) {
            // `d` is the original data object for the row
            return '<table cellpadding="0" cellspacing="0" border="0">'+
                '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Fees:</td>'+
                '<td>'+d.fee+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Admission Date:</td>'+
                '<td>'+d.adm_date+'</td>'+
                '</tr>'+
                '</table>';
        }

        $(document).ready(function() {
            var table = $('#example').DataTable( {
                "ajax": "../../assets/ajax/data/user-data.txt",
                "columns": [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "username" },
                    { "data": "subtype" },
                    { "data": "action" }
                ],
                "order": [[1, 'asc']]
            } );

            // Add event listener for opening and closing details
            $('#example tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );
        } );


    </script>
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
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script>
        function createOptions(number) {
            var options = [], _options;

            for (var i = 0; i < number; i++) {
                var option = '<option value="' + i + '">Option ' + i + '</option>';
                options.push(option);
            }

            _options = options.join('');

            $('#number')[0].innerHTML = _options;
            $('#number-multiple')[0].innerHTML = _options;

            $('#number2')[0].innerHTML = _options;
            $('#number2-multiple')[0].innerHTML = _options;
        }

        var mySelect = $('#first-disabled2');

        createOptions(4000);

        $('#special').on('click', function () {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
            liveSearch: true,
            maxOptions: 1
        });
    </script>
    <script>
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            if (rowCount >= 21) { // +1 for header row.
                alert("There can be no more than 20 participants per session.");
                return;
            }
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name = "chkbox[]";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            cell2.innerHTML = rowCount;

            var cell3 = row.insertCell(2);
            var element2 = document.createElement("select");
            element2.type = "select";
            element2.name = "select[]";
            cell3.appendChild(element2);

            var cell4 = row.insertCell(3);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
            cell4.appendChild(element3);

            var cell5 = row.insertCell(4);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "txtbox[]";
            cell5.appendChild(element4);

        }

        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if (null != chkbox && true == chkbox.checked) {
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }

                }
            } catch (e) {
                alert(e);
            }
        }
    </script>
@endsection
