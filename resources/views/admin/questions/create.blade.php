@extends('layouts.admin')
@section('sub-title','QUESTIONS')

@section('content')
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        New Record
    </div>

    <div class="card-body">
        <form method="POST" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">Category <span class="text-danger">*</span></label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="question_text">Question <span class="text-danger">*</span></label>
                <textarea class="form-control {{ $errors->has('question_text') ? 'is-invalid' : '' }}" name="question_text" id="question_text" required>{{ old('question_text') }}</textarea>
                @if($errors->has('question_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_text') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="parentContainer">
                    <div class="row childrenContainer">
                        <div class="col-md-6">
                            <small>Options</small>
                            <input type="text"  name="option_text[]" id="option_text" class="form-control" required/>
                        </div>
                        <div class="col-md-2">
                            <small>Points</small>
                            <input type="text"  name="points[]" id="points" value="0" class="form-control" required/>
                        </div>
                        <div class="col-md-4 mt-4">
                                <button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">            
                                    <i class="fas fa-plus-circle"></i>        
                                </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-wd text-uppercase" type="submit" id="action_button">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

    
</div>
@endsection
@section('scripts')
<script>
$(document).on('click', '.addParent', function () {
  var html = '';
  html += '<div class="parentContainer">';
    html += '<div class="row childrenContainer">';

        html += '<div class="col-md-6">'
        html +=     '<small>Options</small>'
        html +=     '<input type="text"  name="option_text[]" id="option_text" class="form-control" required/>'
        html += '</div>'
        html += '<div class="col-md-2">'
        html +=     '<small>Points</small>'
        html +=     '<input type="text"  name="points[]" id="points"  value="0" class="form-control" required/>'
        html += '</div>'

        html += '<div class="col-md-4 mt-4">';
            html += '<button type="button" class="btn btn-danger removeParent">';
                html += '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
            html += '</button>';
        html += '</div>';
    html += '</div>';
  html += '</div>';

  $(this)
    .parent()
    .parent()
    .parent()
    .parent()
    .append(html);
    
});

$(document).on('click', '.removeParent', function () {
  $(this).closest('#inputFormRow').remove();
  $(this).parent().parent().parent().remove();
});


$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.questions.store') }}";
    var type = "POST";

    $.ajax({
        url: action_url,
        method:type,
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);

           if(data.success){
                $.confirm({
                    title: data.success,
                    content: "",
                    type: 'green',
                    buttons: {
                        confirm: {
                            text: '',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                location.reload();
                            }
                        },
                    }
                });
            }
           
        }
    });
});

</script>
@endsection
