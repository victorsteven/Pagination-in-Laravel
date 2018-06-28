@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Pagination</div>

                <div class="card-body">

                    @include('ajax.studentPage')
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split("page=")[1];

            // console.log(page);
            readPage(page);
        })

        function readPage(page){
            $.ajax({
                url : '/student/page/ajax?page='+page
            }).done(function(data){
                // console.log(data);
                $('.card-body').html(data);
                location.hash=page;
            })
        }
    </script>

@endsection