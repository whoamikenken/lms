
@extends('layouts.student')
@section('sub-title','ASSESSMENT')

@section('content')
<style>
    body{
        background-image: url('{{ asset('assets/img/bg.jpg') }}');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .bg-light {
        background: linear-gradient(180deg, #0e3ba0 0%, #2c2f7c 100%);
        background-color: transparent !important;
    }
   
</style>
<section class="py-5 mt-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-2 mb-2 ml-2 ">
                <div class="card position-fixed" style="margin-left: -7%;">
                    <h3 class="m-3">Category of Questions</h3>
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item select_category {{$loop->first ? 'active':''}}" category="{{$category->id}}" style="cursor: pointer;">{{$category->name ?? ''}}</li>
                                
                            @endforeach
                        </ul>
                </div>
            </div>
            <div class="col-md-10">
                
                <div class="card">
                    <h3 class="m-3">Freshmen Assessment</h3>
                    <p class="m-3">
                    PRIVACY POLICY: <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus. 
                    <br><br>
                    DIRECTIONS: <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus.  
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus. 

                    </p>
                    <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.student.assessment.store') }}">
                        @csrf
                        @foreach($categories as $category)
                            <div class="card mb-3 categories" id="category{{ $category->id }}">
                                <div class="card-header bg-primary text-white">{{ $category->name }}</div>
                                <div class="card-body">
                                    @foreach($category->categoryQuestions as $question)
                                        <div class="card @if(!$loop->last)mb-3 @endif">
                                            <div class="card-header text-white font-weight-bold bg-success">{{ $question->question_text }}</div>
                        
                                            <div class="card-body">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                <ul class="list-group">
                                                    @foreach($question->questionOptions as $option)
                                                            <li class="list-group-item"> 
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                                                    <label class="form-check-label" style="width: 100%; cursor: pointer;"for="option-{{ $option->id }}">
                                                                        {{ $option->option_text }}
                                                                    </label>
                                                                </div>
                                                            </li>
                                                    @endforeach
                                                </ul>
                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6  mx-auto">
                            <input type="hidden" readonly id="first_category_id" value="{{$category_first->id}}">
                                <button type="button" class="btn btn-success btn-md btn-wd text-uppercase form-control" id="nextCatAsses">
                                    NEXT
                                </button>
                                <button type="submit" class="btn btn-info btn-md btn-wd text-uppercase form-control" id="submitAsses">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
     $(document).ready(function()
    {
        
        $('.categories').hide();
        $("#submitAsses").hide();
        $('#category'+$('#first_category_id').val()).show();
        
        
        $('.select_category').on('click', function() {
           var id = $(this).attr('category');
           $('.categories').hide();
           $('#category'+id).show();
           $(this).addClass('active');
        });
    }); 

    $('#nextCatAsses').on('click', function() {
        var iscomplete = true;
        $(".select_category").each(function() {
            if (!$(this).hasClass("active")) {
                foundActive = true;
                $(this).click();
                document.documentElement.scrollTo(0, 0);
                return false;
            }
        });

        $(".select_category").each(function() {
            if (!$(this).hasClass("active")) {
                iscomplete = false;
            }
        });

        if(iscomplete){
            $("#submitAsses").show();
            $('#nextCatAsses').hide();
        }
    });
</script>

@endsection