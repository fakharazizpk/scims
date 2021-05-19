<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Per.No</th>
        <th>Full Name</th>
        <th>Surname</th>
        <th>Contact No</th>
        <th>Status</th>
        <th class="disabled-sorting text-center">Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>S.No</th>
        <th>Per.No</th>
        <th>Full Name</th>
        <th>Surname</th>
        <th>Contact No</th>
        <th>Status</th>
        <th class="disabled-sorting text-center">Actions</th>
    </tr>
    </tfoot>
    <tbody>
    @php $i=1; @endphp
    @foreach($employees as $employee)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$employee->personal_No}}</td>
        <td>{{$employee->emp_given_name}}</td>
        <td>{{$employee->emp_surname}}</td>
        <td>{{$employee->emp_mob_Ph}}</td>
        <td>{{$employee->emp_Status}}</td>
        <td class="text-center">
            <div class="form-inline pull-right">
                <div class="">
                    <button class=" btn-link btn-cus-weight show-view-class-btn"
                            type="button"
                            data-toggle="modal"
                            {{-- data-target="#viewclass"--}}
                            id="show-subject"
                            aria-haspopup="true"
                            aria-expanded="false" data-id="{{ $employee->emp_Id  }}">
                        View
                    </button>
                </div>
                <div
                    class="nav-item btn-rotate dropdown pull-right ">
                    <a class="nav-link dropdown-toggle pull-right"
                       href="javascript:void(0)" id="navbarDropdownMenuLink"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false" data-id="{{ $employee->emp_Id  }}">
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item edit-subject" href="{{url('edit-appointment-info/'.$employee->emp_Id)}}"
                           {{-- data-target="#editclass"--}}
                           aria-haspopup="true"
                           aria-expanded="false" data-id="{{ $employee->emp_Id  }}">Edit</a>
                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to Change Employee Status?');"
                           href="{{url('change-employee-status/'.$employee->emp_Id )}}">Change Status</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
