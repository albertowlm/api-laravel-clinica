@extends('layouts.clin')
@section('content')

    <div class="container">
        <form class="form-horizontal" role="form" action="">
            <fieldset>
                <legend>Novo Plano para Clínica</legend>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="plano">Plano de Saúde</label>
                    <div class="col-sm-9">
                        <select class="selectpicker form-control" id="select_planos">
                            <option id="" selected>SELECIONE UM PLANO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="button" class="btn btn-success" id="btn-submit">Incluir</button>
                        <a type="button" href="{{route('clinic-health-care/list')}}" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            tokenId = localStorage.getItem('token');
            token = 'Bearer ' + tokenId;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                }
            });
            $.ajax({
                url: '../api/health-care',
                type: 'get',
                success: function (response) {
                    console.log(response.data);
                    $('.option').remove();
                    for (i = 0; i < response.data.length; i++) {
                        if (response.data[i].status == 1) {
                            $("#select_planos").append(
                                "<option value='" + response.data[i].id + "'>" +
                                response.data[i].name +
                                "</option>"
                            );
                        }
                    }
                },
                error: function () {
                    window.location = "../clinic-health-care";

                }
            });


            $('#btn-submit').click(function () {
                idClinic = localStorage.getItem('id_clinic_plan')
                $.ajax({
                    url: '../api/clinic-health-care',
                    type: 'POST',
                    data: {clinic_id: idClinic, health_care_id: $('#select_planos option:selected').val()},
                    success: function () {
//                    $('#valid').empty();
//                    $('#error-messages').prepend('<p> Clinica Incluida </p>');
                        window.location = '../clinic-health-care';
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