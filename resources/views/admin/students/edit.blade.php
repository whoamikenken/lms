@extends('layouts.admin')
@section('sub-title','STUDENTS')

@section('content')
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        Edit Record
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.update", [$student->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="student_no">Student No.  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('student_no') ? 'is-invalid' : '' }}" type="text" name="student_no" id="student_no" value="{{ old('student_no',$student->student_no) }}" >
                @if($errors->has('student_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_no') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="name">Name  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $student->name) }}" >
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="email">Email/Username  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $student->email) }}" >
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
          
            <div class="form-group">
                <label class="control-label" >Gender <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control">
                    <option value="MALE" {{$student->gender == 'MALE' ? 'selected' : '' }}>MALE</option>
                    <option value="FEMALE" {{$student->gender == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Year: <span class="text-danger">*</span></label>
                <select name="year" id="year" class="form-control">
                    <option value="1st Year" {{$student->year == '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{$student->year == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{$student->year == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="4th Year" {{$student->year == '4th Year' ? 'selected' : '' }}>4th Year</option>                                            
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Course: <span class="text-danger">*</span></label>
                <select name="course" id="course" class="form-control">
                    <option value="BSIT"  {{$student->course == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                    <option value="BSCS"  {{$student->course == 'BSCS' ? 'selected' : '' }}>BSCS</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Section: <span class="text-danger">*</span></label>
                <select name="section" id="section" class="form-control">
                    <option value="A" {{$student->section == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{$student->section == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{$student->section == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{$student->section == 'D' ? 'selected' : '' }}>D</option>
                    <option value="Irregular" {{$student->section == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" >Password: <span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
