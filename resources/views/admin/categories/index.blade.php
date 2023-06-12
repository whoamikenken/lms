@extends('layouts.admin')
@section('sub-title','CATEGORIES')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                </div>
                <div class="col-6 text-right">
                <div class="form-group">
                    <select name="filter_year" id="filter_year" class="form-control">
                        <option value="" >FILTER BY YEAR LEVEL</option>
                        <option value="1st Year" >1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </div>
                    <a class="btn btn-success" href="{{ route("admin.categories.create") }}">
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
                            <th>Year Level</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created At</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.categories.edit', $category->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                                </form>
                            </td>
                            <td>{{ $category->year ?? '' }}</td>
                            <td>{{ $category->id ?? '' }}</td>
                            <td>{{ $category->name ?? '' }}</td>
                            <td>{{$category->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created At</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    
</div>
@endsection

@section('scripts')
<script>
     $(document).ready(function()
    {
        $('#filter_year').on('change', function () {
          var table = $('#dataTable').DataTable();
          table.columns(1).search( this.value ).draw();
        });
    }); 
</script>

@endsection