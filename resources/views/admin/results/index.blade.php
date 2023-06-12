@extends('layouts.admin')
@section('sub-title','RESPONDENTS')

@section('styles')
<style>
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0;
        display: inline-block;
        border: solid 1px #111;
        padding: 0 22px;
        padding-left: 45px;
        height: 50px;
        font-size: 16px;
        margin: 20px;
    }
    div#dataTable_wrapper {
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
                    <h6 class="m-0 font-weight-bold text-primary">Respondents</h6>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6  ml-auto">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Filter By</div>
                            <select id="filter" class="form-control">
                                <option value="">ITE</option>
                                <option value="BSIT">IT</option>
                                <option value="BSCS">CS</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
           

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student No.</th>
                            <th>Name</th>
                            <th>Yr. & Sec</th>
                            <th>Course</th>
                            <th>Total Score</th>
                            <th>Duration</th>
                            <th>Created At</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $key => $result)
                        <tr>
                            <td>{{ $result->user->student_no ?? '' }}</td>
                            <td>{{ $result->user->name ?? '' }}</td>
                            <td>{{ $result->year ?? '' }} / {{ $result->user->section ?? '' }}</td>
                            <td>{{ $result->course ?? '' }}</td>
                            <td>{{ $result->total_points ?? '' }}</td>
                            <td>{{ $result->start_time->diffInMinutes($result->end_time) }} Min(s)</td>
                            <td>{{$result->created_at}}</td>
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
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            pageLength: 100,
            bDestroy: true,
            responsive: true,
        });

        $('#dataTable:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
            });
    });

    $('#filter').on('change', function() {
        var table = $('#dataTable').DataTable();
        table.columns(3).search( this.value ).draw();
    });
</script>
@endsection