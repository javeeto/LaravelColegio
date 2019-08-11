<html>
    <head>
        <title>Formulario</title>
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/alumnoFormulario.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
         <script src="{{asset('plugin/jquery/js/jquery-3.4.1.js')}}"></script>
         <script src="{{asset('plugin/jquery/js/jquery.validate.js')}}"></script>
         <script src="{{asset('plugin/jquery/js/localization/messages_es.js')}}"></script>
         <script src="{{asset('plugin/jquery/js/additional-methods.js')}}"></script>
         <script src="{{asset('js/alumnoFormulario.js')}}"></script>
    </head>
    <body> 
        @yield('alertmessage')
        <div class="container">
            @yield('content')

        </div>
    </body>
</html>