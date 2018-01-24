@extends('layouts.clin')
@section('content')


    <div class="container">
        <form class="form-horizontal" role="form" action="">
            <input type="hidden" id="id" name="id" value="">
            <fieldset>
                <legend>Alterar Clínica</legend>
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
    </div>

    <script type="text/javascript">


            tokenId = localStorage.getItem('token');
            token = 'Bearer '+tokenId;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                }
            });


            $('#btn-submit').click(function(){
                id = $("#id").val();
                $.ajax({
                    url: '../api/clinic/'+id,
                    type: 'PUT',
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

        load = function (id) {

            $.ajax({
                url: '../api/clinic/' + id,
                type: 'get',
                success: function (response) {
                    $("#id").val(response.data.id);
                    $("#cnpj").val(response.data.cnpj);
                    $("#name").val(response.data.name);

                },
                error: function (response) {
//                    window.location = '../clinic';
                }

            });
        };
        load(localStorage.getItem('id_clinic'));




    </script>

@endsection