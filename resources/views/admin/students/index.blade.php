@extends('layouts.admin')
@section('sub-title','CATEGORIES')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">All Registered Student</h6>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-success" href="{{ route("admin.students.create") }}">
                        New Record
                    </a>
                </div>
            </div>
           

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Learning Style?</th>
                            <th>Student No.</th>
                            <th>Name</th>
                            <th>Username/Email</th>
                            <th>Contact Number</th>
                            <th>Gender</th>
                            <th>Year</th>
                            <th>Course</th>
                            <th>Section</th>
                            <th>Created At</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info " href="{{ route('admin.students.edit', $student->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                                </form>
                            </td>
                            <td>{{ $student->isTakeLearningStyle == true ? '✔':'❌' }}</td>
                            <td>{{ $student->student_no ?? '' }}</td>
                            <td>{{ $student->name ?? '' }}</td>
                            <td>{{ $student->email ?? '' }}</td>
                            <td>{{ $student->contact_number ?? '' }}</td>
                            <td>{{ $student->gender ?? '' }}</td>
                            <td>{{ $student->year ?? '' }}</td>
                            <td>{{ $student->course ?? '' }}</td>
                            <td>{{ $student->section ?? '' }}</td>
                            <td>{{$student->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</div>
@endsection
