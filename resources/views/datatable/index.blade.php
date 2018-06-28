@extends('layouts.app')

@section('content')

{{-- @include('ajax.addStudent')
@include('ajax.updateStudent') --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
    
                </div>

                <div class="card-body">
                        <table class="table_id table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Full Name </th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="student-info">
                                @foreach($students as $value)

                                <tr id="{{ $value->id }}">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->first_name }}</td>
                                    <td>{{ $value->last_name }}</td>
                                    <td>{{ $value->full_name }}</td>
                                    <td>{{ $value->sex }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-xs" id="view" data-id="{{ $value->id }}">View</a>
                                        <a href="#" class="btn btn-success btn-xs" id="edit" data-id="{{ $value->id }}">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs" id="del" data-id="{{ $value->id }}">Delete</a>
                                    </td>
                            
                                </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    
    $(document).ready(function(){
        $('.table_id').DataTable({
            dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
        });
    });
</script>

@endsection