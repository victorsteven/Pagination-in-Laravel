@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Insert Student with Validation
        </div>
        
        <div class="panel-body">
            <div class="alert alert-danger print-error-msg col-md-6 offset-md-3" style="display:none">
                <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg col-md-6 offset-md-3" style="display:none">
              <ul></ul>  
            </div>
            <form action="{{ url('/insert-student-validation') }}" method="POST">
            @csrf
            <div class="row">
             <div class="col-md-6 offset-md-3">
                 <div class="form-group">
                     <label for="first_name">First Name</label>
                     <input type="text" name="first_name" id="first_name" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>
                
                
                <div class="form-group">
                    <label for="sex_id" class="col-form-label">Sex</label>
                    <select class="form-control" name="sex_id" id="sex_id">
                        <option value="">..........</option>
                        @foreach($sexes as $sex)
                        <option value="{{ $sex->id }}">{{ $sex->sex }}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="form-group">
                    
                    <input type="submit" value="Save"  class="form-control btn btn-primary">
                </div>
             </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection

@section('script')

    <script>
        $('form').on('submit', function(e){
            e.preventDefault();
            var data = $(this).serialize();
             url= $(this).attr('action');
             $.ajax({
                 url: url,
                 type: 'POST',
                 data: data,
                 success: function(data){
                     console.log(data);
                     
                     if($.isEmptyObject(data.error)){
                         $('.print-success-msg').find('ul').empty().append("<li>" + data.success + "</li>");
                         $('.print-success-msg').css('display', 'block');
                         $('.print-error-msg').css('display', 'none');

                         console.log(data.success);
                     }else{
                        printMessageErrors(data.error);
                     }
                 }
             })
             $(this).trigger('reset');
        })

        function printMessageErrors(msg){
            $('.print-error-msg').find('ul').empty();
            $('.print-error-msg').css('display', 'block');
            $('.print-success-msg').css('display', 'none');

            $.each(msg, function(key, value){
                
                $('.print-error-msg').find('ul').append("<li>" + value + "</li>");
                
            });
            
        }
    </script>
@endsection