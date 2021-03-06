@extends('layouts.clin')
@section('content')
<style>
    .form-signin
    {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading, .form-signin .checkbox
    {
        margin-bottom: 10px;
    }
    .form-signin .checkbox
    {
        font-weight: normal;
    }
    .form-signin .form-control
    {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .form-signin .form-control:focus
    {
        z-index: 2;
    }
    .form-signin input[type="text"]
    {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"]
    {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .account-wall
    {
        margin-top: 20px;
        padding: 40px 0px 20px 0px;
        background-color: #f7f7f7;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
    .login-title
    {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
    }
    .profile-img
    {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    .new-account
    {
        display: block;
        margin-top: 10px;
    }
</style>



<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" id="error-messages">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Logar Sistema Clinicas</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">
                <form class="form-signin" id="form" action="">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" placeholder="Email" required autofocus name="email">
                    <input type="password" class="form-control" placeholder="Password" required name="password">
                    <button class="btn btn-lg btn-primary btn-block" type="button" id="btn-logar">Sign in</button>
                </form>
            </div>
            <a href="{{route('login/store')}}" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-logar').click(function(){
            console.log('aqui');
            $.ajax({
                url: 'api/login',
                type: 'POST',
                data:$('#form').serialize(),
                success: function (response) {
                    localStorage.setItem('token', response.token);
                    window.location.href = '/clinic';
                },
                error: function (response) {
                    var result = JSON.parse(response.responseText);
                    //console.log(result);
                    $('#error-messages').html(result.error);
                }
            });
        });
    });

</script>
@endsection





