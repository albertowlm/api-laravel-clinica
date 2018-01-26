@extends('layouts.clin')
@section('content')

<div class="container">
    <form class="form-horizontal" role="form" action="">
        <fieldset>
            <legend>Novo Plano de Saúde</legend>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="name">Nome</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Plano">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="logo">Logo</label>
                <div class="col-sm-9">
                    <input type="file"  name="logo" id="logo" placeholder="Logo da Plano">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="status">Status</label>
                <div class="col-sm-9">
                    <input type="checkbox" class="checkbox" id="status" name="status">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-success" id="btn-submit">Incluir</button>
                    <a type="button" href="{{route('health-care/list')}}" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        tokenId = localStorage.getItem('token');
        token = 'Bearer '+tokenId;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': token
            }
        });

            $('#btn-submit').click(function(){
                var img = document.getElementById("logo").files[0];
                var fd = new FormData();
                console.log('aaa');

                var statusForm = $("#status");


                var status = 0;
                if(statusForm.is( ':checked' )){
                    status = 1;
                }

                fd.append("name",$("#name").val());
                fd.append("logo",img);
                fd.append("status",status);


                $.ajax({
                    url: '../api/health-care',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data:fd,
                    dataType: 'json',
                    success: function () {
//                    $('#valid').empty();
//                    $('#error-messages').prepend('<p> Clinica Incluida </p>');
                        window.location = '../health-care';
                    },
                    error: function (response) {
                        $('#error-messages').empty();
                        $('#error-messages').prepend('<p>' + response.responseText + '</p>');

                    }

                });


              /*

               var settings = {
               "async": true,
               "crossDomain": true,
               "url": "http://localhost:8000/api/health-care",
               "method": "POST",
               "headers": {
               "accept": "application/json",
               "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTE2NzM3MzYzLCJleHAiOjE1MTY5NTMzNjMsIm5iZiI6MTUxNjczNzM2MywianRpIjoiMTBkNGZhOGVjZDcxNzEzYmJmODFjYmI5MjliZDExMjMifQ.PT4D_VLtpLfPbNFMqbD9Oo-D2rIWiGAj-70flnkNX2Y",
               "cache-control": "no-cache",
               "postman-token": "adc4b978-ccc9-71cb-93cf-3dd6a8401eac"
               },
               "processData": false,
               "contentType": false,
               "mimeType": "multipart/form-data",
               "data": fd
               }

               $.ajax(settings).done(function (response) {
               console.log(response);
               });
                */
            });
        });




</script>
@endsection