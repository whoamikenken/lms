@extends('layouts.admin')
@section('sub-title','STUDENTS')

@section('content')
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        New Record
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="student_no">Student No.  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('student_no') ? 'is-invalid' : '' }}" type="text" name="student_no" id="student_no" value="{{ old('student_no','') }}" >
                @if($errors->has('student_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_no') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="name">Name  <span class="text-danger">*</span></label>
                <input class="form-control text-uppercase {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" >
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="email">Email/Username  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" >
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label class="control-label" >Gender <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control">
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Year: <span class="text-danger">*</span></label>
                <select name="year" id="year" class="form-control">
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>                                                
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Course: <span class="text-danger">*</span></label>
                <select name="course" id="course" class="form-control">
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Section: <span class="text-danger">*</span></label>
                <select name="section" id="section" class="form-control">
                    <option value="A" >A</option>
                    <option value="B" >B</option>
                    <option value="C" >C</option>
                    <option value="D" >D</option>
                    <option value="Irregular" >Irregular</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-wd text-uppercase" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

    
</div>
@endsection
