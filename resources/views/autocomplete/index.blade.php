@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

        
            <div class="panel panel-default">
                <div class="panel-heading">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search"></div>
                
                <div class="panel-body">
                    
                
                <form action="">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sex_id">Sex</label>
                        <select name="sex_id" id="sex_id" class="form-control">
                            <option value="......">........</option>
                            @foreach($sexes as $sex)
                            <option value="{{ $sex->id }}">{{ $sex->sex }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dob">DOB</label>
                        <input type="text" name="dob" id="dob" class="form-control">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    data = [
        'Tina', 'Rogue', 'Mark', 'Obi', 'Steven', 'Victor', 'Victoria', 'Mattins', 'John'
    ];
    $('#search').autocomplete({
        // source: data,
        source: "{{ URL::to('autocomplete-search') }}",
        // minLength:2,
        select:function(key, value){
            console.log(value);
            // alert(value.item.value);
            $('#first_name').val(value.item.first_name);
            $('#last_name').val(value.item.last_name);
            $('#sex_id').val(value.item.sex_id);
            alert(value.item.student_id);
        }
    });
    $('#dob').datepicker()
</script>

@endsection 

