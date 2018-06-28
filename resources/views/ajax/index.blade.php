@extends('layouts.app')

@section('content')

@include('ajax.addStudent')
@include('ajax.updateStudent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-student">+ Student</button>

                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-student">update Student</button> --}}
                
                <button class="btn btn-info pull-right" id="read-data">Load Data By Ajax</button>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                    <table class="table table-bordered table-striped table-condensed">
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
                             <tr>

                             </tr>
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
    $('#read-data').on('click', function(){
        // alert('test code');

        $.get("{{ URL::to('students/read-data') }}", function(data){

            $('#student-info').empty().html(data);
            // console.log(data);
            
            // console.log(data);
            // $('#student-info').empty();
            // $.each(data, function(i, value){
            //     var tr = $("<tr/>");
            //     tr.append($("<td/>", {
            //         text: value.id
            //     })).append($("<td/>", {
            //         text: value.first_name
            //     })).append($("<td/>", {
            //         text: value.last_name
            //     })).append($("<td/>", {
            //         text: value.full_name
            //     })).append($("<td/>", {
            //         html: "<a href='#'>View</a> <a href='#'>Edit</a> <a href='#'>Delete</a>"
            //     }))
            //     $('#student-info').append(tr);

            //     // alert(value.first_name);
            // });
        });
    });
////////////add student//////////////
$('#frm-insert').on('submit', function(e){
    e.preventDefault();
    var data = $(this).serialize();
    // console.log(data);
    var url = $(this).attr('action');
    
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        success:function(data){
            // console.log(data);
            var tr = $('<tr/>', {
                id: data.id
            });
            tr.append($("<td/>", {
                text: data.id
            })).append($("<td/>", {
                text: data.first_name
            })).append($("<td/>", {
                text: data.last_name
            })).append($("<td/>", {
                text: data.full_name
            })).append($("<td/>", {
                text: data.sex
            })).append($("<td/>", {
                html: "<a href='#' data-id='"+ data.id +"' class='btn btn-info btn-xs' id='view' >View</a>" + 
                "<a href='#' data-id='"+ data.id +"' class='btn btn-success btn-xs' id='edit'>Edit</a>" + 
                "<a href='#' data-id='"+ data.id +"' class='btn btn-danger btn-xs' id='del'>Delete</a>"
            })) 
            $('#student-info').append(tr);
        }
 
    })
});

$('body').delegate('#student-info tr #del', 'click', function(e){
     var id = $(this).data('id');
    //  alert(id);
    $.post('{{ URL::to("student/destroy") }}', {id:id}, function(data){
        // console.log(data);
        $('tr#' +id).remove();
    })
 });

//-------------edit student---------------
 $('body').delegate('#student-info #edit', 'click', function(e){
     var id = $(this).data('id');
     $.get("{{ URL::to('student/edit') }}", {id:id}, function(data){
        $('#frm-update').find('#first_name').val(data.first_name);
        $('#frm-update').find('#last_name').val(data.last_name);
        $('#frm-update').find('#sex_id').val(data.sex_id);
        $('#frm-update').find('#id').val(data.id);
        $('#update-student').modal('show');
        // console.log(data);
     })
     
 })

 //-----------update student--------------
 $('#frm-update').on('submit', function(e){
     e.preventDefault();
     var data = $(this).serialize();
     var url = $(this).attr('action');
     $.post(url, data, function(data){
         console.log(data);
         $('#frm-update').trigger('reset');

         var tr = $('<tr/>', {
                id: data.id
            });
            tr.append($("<td/>", {
                text: data.id
            })).append($("<td/>", {
                text: data.first_name
            })).append($("<td/>", {
                text: data.last_name
            })).append($("<td/>", {
                text: data.full_name
            })).append($("<td/>", {
                text: data.sex
            })).append($("<td/>", {
                html: "<a href='#' data-id='"+ data.id +"' class='btn btn-info btn-xs' id='view' >View</a>" + 
                "<a href='#' data-id='"+ data.id +"' class='btn btn-success btn-xs' id='edit'>Edit</a>" + 
                "<a href='#' data-id='"+ data.id +"' class='btn btn-danger btn-xs' id='del'>Delete</a>"
            })) 
            $('#student-info tr#' + data.id).replaceWith(tr);
         
     })
    //  $('#update-student').modal('hide');
 })
 
</script>

@endsection
