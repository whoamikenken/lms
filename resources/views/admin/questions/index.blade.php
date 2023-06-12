@extends('layouts.admin')
@section('sub-title','QUESTIONS')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Questions</h6>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Filter by category</div>
                            <select id="filter" class="form-control">
                                <option value="">Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->name ?? ''}}">{{$cat->name ?? ''}}</option>
                                @endforeach
                            </select>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Filter by year level</div>
                                <select name="filter_year" id="filter_year" class="form-control">
                                    <option value="1st Year" >1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                </select>
                                                </div>
                    </div>
                   
                </div>
                <div class="col-md-6 text-right mt-2">
                    <a class="btn btn-success" href="{{ route("admin.questions.create") }}">
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
                            <th>ID</th>
                            <th>Year Level</th>
                            <th>Category</th>
                            <th>Questions</th>
                            <th>Options</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $key => $question)
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.questions.edit', $question->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                                </form>
                            </td>
                            <td>{{ $question->id ?? '' }}</td>
                            <td>{{ $question->category->year ?? '' }}</td>
                            <td>{{ $question->category->name ?? '' }}</td>
                            <td>{{ $question->question_text ?? '' }}</td>
                            <td>
                                @foreach($question->questionOptions()->get() as $option)
                                    <span class="badge badge-primary">{{$option->option_text}}</span>
                                    @if($option->points != '0')
                                    <i class="fa-solid fa-check text-success"></i>
                                    @endif
                                    <br>
                                @endforeach
                            </td>

                            <td>{{ $question->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</div>
@endsection
@section('scripts')
<script>
    $('#filter').on('change', function() {
        var table = $('#dataTable').DataTable();
        table.columns(3).search( this.value ).draw();
    });

    $('#filter_year').on('change', function() {
        var table = $('#dataTable').DataTable();
        table.columns(2).search( this.value ).draw();
    });
</script>
@endsection
