<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <title>Laravel</title>
</head>
<button onclick="logout();">Logout</button>
<body onload="load();">
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<div id="valid"></div>
<input type="hidden" id="id">
CNPJ <input type="text" id="cnpj" required="required" name="cnpj"><br>
Nome: <input type="text" id="name" required="required" name="name"><br>
<button onclick="submit();">Submit</button>

<table id="table" border=1>
    <tr>

        <th> Plano de Saude</th>
        <th> Edit</th>
        <th> Delete</th>
    </tr>
</table>

<script type="text/javascript">
    tokenId = localStorage.getItem('token');
    token = 'Bearer '+tokenId;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': token
        }
    });

    data = "";
    submit = function () {
        id = $('#id').val();
        if (id) {
            $.ajax({
                url: 'api/clinic/' + id,
                type: 'PUT',
                data: {cnpj: $("#cnpj").val(), name: $('#name').val()},
                success: function (response) {
                    $('#valid').empty();
                    $('#valid').prepend('<h3> Clinica Alterada </h3>');
                    load();
                },
                error: function (response) {
                    $('#valid').empty();
                    $('#valid').prepend('<h3>' + response.responseText + '</h3>');
                }
            });
        }
        else {
            $.ajax({
                url: 'api/clinic',
                type: 'POST',
                data: {cnpj: $("#cnpj").val(), name: $('#name').val()},
                success: function(){
                    $('#valid').empty();
                    $('#valid').prepend('<h3> Clinica Incluida </h3>');
                    load();
                },
                error: function (response) {
                    $('#valid').empty();
                    $('#valid').prepend('<h3>' + response.responseText + '</h3>');

                }
            });
        }
    };



    load = function () {
        $.ajax({
            url: 'api/clinic-health-care',
            type: 'get',
            success: function (response) {
                data = response.data;
                console.log(data);
                $('.tr').remove();
                for (i = 0; i < response.data.length; i++) {
                    nomePlano = showHealthCare(response.data[i].health_care_id);
                    $("#table").append("<tr class='tr'> <td id='cnpj'> " + nomePlano + " </td> " +
                        "<td> <a href='#' onclick= edit(" + response.data[i].id + ");> Edit </a>  " +
                        "</td> </td> " +
                        "<td> <a href='#' onclick='delete_(" + response.data[i].id + ");'> Delete </a>" +
                        "  </td> </tr>");
                }
            },
            error: function () {
                window.location = "login";

            }
        });
        $("#id").val('');
        $("#cnpj").val('');
        $("#name").val('');
    };


    showHealthCare = function(id){

          $.ajax({

            url: 'api/health-care/' + id,
            type: 'get',
            dataType: "json",
            success: function (response){
//              var String result;

               console.log(response.data.name);
                return this.result;
            }


        });


    };

    showClinic = function (id) {
        $.ajax({
            url: 'api/clinic/' + id,
            type: 'get',
            success: function (response) {
                $("#id").val(response.data.id);
                $("#cnpj").val(response.data.cnpj);
                $("#name").val(response.data.name);
                console.log(data);
            }


        });

    };


    delete_ = function (id) {
        $.ajax({
            url: 'api/clinic/'+id,
            type: 'DELETE',

            success: function () {
                load();
            }
        });
    }
    logout = function () {
        $.ajax({
            url: 'api/logout',
            type: 'POST',

            success: function () {
                load();
            }
        });
    }

</script>
</body>
</html>
