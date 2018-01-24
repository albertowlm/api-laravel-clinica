@extends('layouts.clin')
@section('content')

<div class="container">
    <form class="form-horizontal" role="form" action="">
        <fieldset>
            <legend>Nova Clínica</legend>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="cnpj">CNPJ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ da Clínica">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="name">Nome</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome da Clínica">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-success" id="btn-submit">Incluir</button>
                    <a type="button" href="{{route('clinic/list')}}" class="btn btn-danger">Voltar</a>
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
                console.log('aqui');
                $.ajax({
                    url: '../api/clinic',
                    type: 'POST',
                    data: {cnpj: $("#cnpj").val(), name: $('#name').val()},
                    success: function () {
//                    $('#valid').empty();
//                    $('#error-messages').prepend('<p> Clinica Incluida </p>');
                        window.location = '../clinic';
                    },
                    error: function (response) {
                        $('#error-messages').empty();
                        $('#error-messages').prepend('<p>' + response.responseText + '</p>');

                    }
                });
            });
        });




</script>
@endsection