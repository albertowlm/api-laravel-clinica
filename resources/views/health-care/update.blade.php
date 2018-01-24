@extends('layouts.clin')
@section('content')


    <div class="container">
        <form class="form-horizontal" role="form" action="">
            <input type="hidden" id="id" name="id" value="">
            <fieldset>
                <legend>Alterar Plano de Saúde</legend>
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
                        <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo da Plano">
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
                var status = 0;
                var id = $("#id").val();
                if($('#status').is( ':checked' )){
                    status = 1
                }
                $.ajax({
                    url: '../api/health-care/'+id,
                    type: 'PUT',
                    data: {name: $("#name").val(), logo: $('#logo').val(), status: status },
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
            });

        load = function (id) {

            $.ajax({
                url: '../api/health-care/' + id,
                type: 'get',
                success: function (response) {
                    var status = false;

                    if(response.data.status == 1){
                        status = 1;
                    }
                    $("#id").val(response.data.id);
                    $("#name").val(response.data.name);
                    $("#logo").val(response.data.logo);
                    $("#status")[0].checked = status;

                },
                error: function (response) {
                    window.location = '../health-care';
                }

            });
        };
        load(localStorage.getItem('id_health_care'));




    </script>

@endsection