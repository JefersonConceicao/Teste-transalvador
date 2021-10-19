<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{csrf_token()}}"> 
    <title> Transalvador | Avaliação  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous"
    >
    <link  rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
        crossorigin="anonymous"
    >

    <link rel="stylesheet" href={{asset("css/app.css")}} />
    <link rel="stylesheet" href="{{asset("vendor/font-awesome/css/all.css")}}"/>
</head>
<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            @yield('modal')
        </div>
    </div>
    {{-- HEADER NAVBAR  --}}
    <div class="container"> 
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button 
                        type="button" 
                        class="navbar-toggle collapsed" 
                        data-toggle="collapse" 
                        data-target="#menu-mobile"
                    >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#"> 
                        <div class="img">
                            <img src="http://www.transalvador.salvador.ba.gov.br/templates/transalvador/img/logo_transalvador.png"/>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="menu-mobile">
                    <ul class="nav navbar-nav"> 
                        <li> <a href="/empresas/"> Empresas </a> </li>
                        <li> <a href="/documentos/"> Documentos </a> </li>
                        <li> <a href="/documentosTipos/"> Tipos de Documentos </a> </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- CONTENT PAGE --}}
        @yield('content')
        {{-- END CONTENT PAGE --}}
    </div>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <script 
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"
    >
    </script>
    <script src="{{asset("js/app.js")}}"> </script>
</body>
</html>