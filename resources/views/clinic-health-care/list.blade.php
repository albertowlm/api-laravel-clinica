@extends('layouts.clin')
@section('content')
<style>
    .custab{
        border: 1px solid #ccc;
        padding: 5px;
        margin: 5% 0;
        box-shadow: 3px 3px 2px #ccc;
        transition: 0.5s;
    }
    .custab:hover{
        box-shadow: 3px 3px 0px transparent;
        transition: 0.5s;
    }
</style>

<div class="container">
    <h1 class="display-4">Planos de Saúde da Clinica</h1>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
        </div>
    </div>
    <div class="row col-md-6 col-md-offset-2 custyle">
        <table class="table table-striped custab" id="table">
            <thead>
            <a href="{{route('clinic-health-care/store')}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new plano de saúde na Clínica</a>
            <tr>
                <th>Nome</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>

        </table>
    </div>
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

        load = function () {
            id = localStorage.getItem('id_clinic_plan');
            $.ajax({
                url: 'api/clinic-health-care?clinic_id='+id+'&include=healthCares',
                type: 'get',
                success: function (response) {
//                    console.log(response.data[0].id);
                    $('.tr').remove();
                    for (i = 0; i < response.data.length; i++) {
//                        console.log(response.data[i].health_cares.data.status);
                       if(response.data[i].health_cares.data.status == 1){
                        $("#table").append(
                            "<tr class='tr'>" +
                                "<td class='text-center'> " + response.data[i].health_cares.data.name + " </td>" +
                                "<td>" +
                                    "<a href='#' class='btn btn-danger btn-xs'  onclick='delete_(" + response.data[i].id + ");'><span class='glyphicon glyphicon-remove'></span> Delete </a>" +
                                " </td>"+
                            "</tr>"
                        );
                       }
                    }
                },
                error: function () {
                    window.location = "login";

                }
            });
            //$("#id").val('');
            //$("#cnpj").val('');
            //$("#name").val('');
        };


        delete_ = function (id) {
            $.ajax({
                url: 'api/clinic-health-care/'+id,
                type: 'DELETE',

                success: function () {
                    load();
                },
                error: function (response) {
                    $('#error-messages').empty();
                    $('#error-messages').prepend('<p>' + response.responseText + '</p>');
                }
            });
        }
        load();



    });
</script>

@endsection