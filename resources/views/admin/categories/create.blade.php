@extends('layouts.admin')
@section('sub-title','CATEGORIES')

@section('content')
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        New Record
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label" >Year: <span class="text-danger">*</span></label>
                <select name="year" id="year" class="form-control">
                    <option value="1st Year" >1st Year</option>
                    <option value="2nd Year" >2nd Year</option>
                    <option value="3rd Year" >3rd Year</option>
                    <option value="4th Year" >4th Year</option>                                            
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
