@extends('layouts.admin')
@section('sub-title','RESPONDENTS')

@section('styles')
<style>
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0;
        display: inline-block;
        width: 100%;
        border: solid 1px #111;
        padding: 0 22px;
        padding-left: 45px;
        height: 50px;
        font-size: 16px;
        margin: 20px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Item Analysis</h6>
                </div>
                <div class="col-md-12 m-2">
                <h6 class="m-0 font-weight-bold text-primary">Filter by category</h6>
                    @foreach($categories as $category)
                        <button class="btn btn-primary select_category m-1" category="{{$category->id}}">{{$category->name}}</button>
                        
                    @endforeach
                    @foreach($categoriesLS as $category)
                        <button class="btn btn-primary select_category m-1" category="{{$category->id}}">{{$category->name}}</button>
                        
                    @endforeach
                </div>
               
            </div>
           

        </div>
        <div class="card-body p-0 text-dark">
            @foreach($categories as $category)
                <div class="card mb-3 categories" id="category{{ $category->id }}">
                    <div class="card-header text-white font-weight-bold bg-primary">{{ $category->name }}</div>
                        <div class="card-body">
                            @foreach($category->categoryQuestions as $question)
                                <div class="card @if(!$loop->last)mb-3 @endif">
                                    <div class="card-header font-weight-bold">{{ $question->question_text }}</div>
                
                                    <div class="card-body">
                                        <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                            <ul class="list-group">
                                            @foreach($question->questionOptions as $option)
                                                @php
                                                    $results_option_total = App\Models\QuestionResult::where('option_id',$option->id)->count();
                                                    $results_option_correct_total = App\Models\QuestionResult::where('option_id',$option->id)->whereNot('points','0')->count();
                                                @endphp
                                                <li class="list-group-item {{$option->points != 0 ? 'bg-success text-white':''}}">{{ $option->option_text }} 
                                                    <br> {{$results_option_correct_total}} / {{$results_option_total}} Responses
                                                    
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
            @foreach($categoriesLS as $category)
                <div class="card mb-3 categories" id="category{{ $category->id }}">
                    <div class="card-header text-white font-weight-bold bg-primary">{{ $category->name }}</div>
                        <div class="card-body">
                            @foreach($category->categoryQuestions as $question)
                                <div class="card @if(!$loop->last)mb-3 @endif">
                                    <div class="card-header font-weight-bold">{{ $question->question_text }}</div>
                
                                    <div class="card-body">
                                        <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                            <ul class="list-group">
                                            @foreach($question->questionOptions as $option)
                                                @php
                                                    $response = App\Models\LearningStyleResult::where('question_id',$question->id)
                                                                    ->where('answer',$option->value_learning_style)->count();
                                                    
                                                @endphp
                                                <li class="list-group-item">{{ $option->option_text }} 
                                                    <br> {{$response}} Responses
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
            <input type="hidden" readonly id="first_category_id" value="{{$category_first->id}}">

        </div>
    </div>

    
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function()
    {
        $('.categories').hide();
        $('#category'+$('#first_category_id').val()).show();
        
        
        $('.select_category').on('click', function() {
           var id = $(this).attr('category');
           $('.categories').hide();
           $('#category'+id).show();
        });
    }); 
</script>
@endsection