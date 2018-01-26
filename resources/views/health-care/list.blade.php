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
    <h1 class="display-4">Planos de Saúde</h1>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
        </div>
    </div>
    <div class="row col-md-6 col-md-offset-2 custyle">
        <table class="table table-striped custab" id="table">
            <thead>
            <a href="{{route('health-care/store')}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new Plano de Saúde</a>
            <tr>
                <th>Nome</th>
                <th>Logo</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <!--
            <tr>

                <td>News</td>
                <td>News Cate</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            -->
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
            localStorage.setItem('id_clinic', '');
            $.ajax({
                url: 'api/health-care',
                type: 'get',
                success: function (response) {
                    console.log(response.data);
                    $('.tr').remove();
                    for (i = 0; i < response.data.length; i++) {
                        $("#table").append(
                            "<tr class='tr'>" +
                                "<td> " + response.data[i].name + " </td>" +
                                "<td><img style='width: 50px;height: 50px' src='images/" + response.data[i].logo + "'> </td>" +
                                "<td> " + response.data[i].status + " </td>" +
                                "<td>" +
                                    "<a href='#' class='btn btn-info btn-xs' onclick= edit(" + response.data[i].id + ");> <span class='glyphicon glyphicon-edit'></span> Edit </a>  " +
                                    " | " +
                                    "<a href='#' class='btn btn-danger btn-xs'  onclick='delete_(" + response.data[i].id + ");'><span class='glyphicon glyphicon-remove'></span> Delete </a>" +
                                " </td>"+
                            "</tr>"
                        );
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
        edit = function (id) {
            localStorage.setItem('id_health_care', id);
            window.location = 'health-care/update';
        };

        delete_ = function (id) {
            $.ajax({
                url: 'api/health-care/'+id,
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