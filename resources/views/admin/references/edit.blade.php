@extends('layouts.admin')
@section('sub-title','references')

@section('content')
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        Edit Record
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.references.update", [$reference->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="reference">Reference  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $reference->reference) }}" required>
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="link">Link  <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $reference->link) }}" required>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
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
