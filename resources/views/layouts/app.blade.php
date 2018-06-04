<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasklist</title>
         <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6"></div>
        </div>
    
    @include('commons.navbar')
    <div class="container">
       @include('commons.error_tasklists')
       @yield('content')
      </div>
       
    </body>
</html>