@extends('layouts.admin')
@section('sub-title','CATEGORIES')

@section('content')
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        Edit Record
    </div>

    <div class="card-body">
        <form method="POST" id="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">Category</label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ ($question->category ? $question->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="question_text">Question Text</label>
                <textarea class="form-control {{ $errors->has('question_text') ? 'is-invalid' : '' }}" name="question_text" id="question_text" required>{{ old('question_text', $question->question_text) }}</textarea>
                <input type="hidden" value="{{$question->id}}" id="question_id" readonly>
                @if($errors->has('question_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_text') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                @foreach($question->questionOptions()->get() as $option)
                    <div class="parentContainer">
                        <div class="row childrenContainer">
                            <div class="col-md-6">
                                <small>Options</small>
                                <input type="text"  name="option_text[]" id="option_text" class="form-control" value="{{$option->option_text ?? ''}}" required/>
                            </div>
                            <div class="col-md-2">
                                <small>Points</small>
                                <input type="text"  name="points[]" id="points" class="form-control" value="{{$option->points ?? ''}}" required/>
                            </div>
                            <div class="col-md-4 mt-4">
                            @if($loop->first)
                                    <button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">            
                                        <i class="fas fa-plus-circle"></i>        
                                    </button>
                            @else
                                    <button type="button" class="btn btn-danger removeParent">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </button>
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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
   
    var action_url = '{{ route("admin.questions.update", ":question") }}';
                action_url = action_url.replace(':question', $('#question_id').val());
    var type = "PUT";

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
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

