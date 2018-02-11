<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <meta name="google-signin-client_id" content="477452226023-av7nuntrm3lm48onh4kgrvln75hlj6hn.apps.googleusercontent.com">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <script src="https://apis.google.com/js/platform.js" async defer></script>   
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>     
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Login Via Google</div>
                <div class="g-signin2" data-onsuccess="onSignIn"></div>  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">              
            </div>
        </div>
    </body>
</html>

<script>
    function onSignIn(googleUser) {
        var response=googleUser.getAuthResponse().id_token;
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        console.log(response);

        //send ajax post request with token to authenticate with a backend server
        var token=response;

        $.ajax({
            url:'ajax/authenticateData',
            method:'POST',
            data:{token:token},

            success:function(data){
                alert(data);
            }
        });
}
</script>
