@extends('layouts.clin')
@section('content')
<div class="container">
    <form class="form-horizontal" role="form">
        <fieldset>
            <legend>Novo Usuário</legend>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="name">Nome</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome do usuário">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="email">E-Mail</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail do usuário">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label" for="password">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password do usuário">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-success" id="btn-submit">Incluir</button>
                    <a type="button" href="{{route('login')}}" class="btn btn-danger">Voltar</a>
                </div>
            </div>


        </fieldset>
    </form>
</div>
<script type="text/javascript">
    $('#btn-submit').click(function(){
        $.ajax({
            url: '../api/user',
            type: 'POST',
            data: {name: $("#name").val(),email: $("#email").val(), password: $('#password').val()},
            success: function () {
//                    $('#valid').empty();
//                    $('#error-messages').prepend('<p> Clinica Incluida </p>');
                window.location = '../login';
            },
            error: function (response) {
                $('#error-messages').empty();
                $('#error-messages').prepend('<p>' + response.responseText + '</p>');

            }
        });
    });

</script>
@endsection
