@extends('layouts.admin')
@section('sub-title','references')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">references</h6>
                </div>
                <div class="col-6 text-right">
                
                    <a class="btn btn-success" href="{{ route("admin.references.create") }}">
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
                            <th>Reference</th>
                            <th>Link</th>
                            <th>Created At</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($references as $reference)
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.references.edit', $reference->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.references.destroy', $reference->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                                </form>
                            </td>
                            <td>{{ $reference->reference ?? '' }}</td>
                            <td>{{ $reference->link ?? '' }}</td>
                            <td>{{$reference->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Reference</th>
                            <th>Link</th>
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

</script>

@endsection