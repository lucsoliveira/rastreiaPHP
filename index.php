<!DOCTYPE html>
<html>
<head>
    <!--Tema BOOTSTRAP-->
    <title>RastreiaPHP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--script que pega o código de rastreio e mostra a div com o resultado-->
    <script type="text/javascript">                
        jQuery(document).ready(function(){
            jQuery('#ajax_form').submit(function(){
                var dados = jQuery( this ).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "rastreia.php",
                    data: dados,
                    success: function( data )
                    {   
                        //oculta a div do formulario
                        $( ".solicite" ).fadeOut( "fast");
                        $( ".carregando" ).fadeIn( "fast");
                        $( ".carregando" ).fadeOut( "slow");
                        //exibe a div dos dados
                        $( ".resultado" ).show( "slow", function showNext() {
                            $( this ).html(data).show( 4000);
                        });
                    }
                });
            return false;
            });
        });
    </script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS do Site -->
    <link href="tema.css" rel="stylesheet">

</head>

<body>
    <!--inicio do body-->
    <body role="document">
    <!-- Fixed menu -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Navegar</span>
          </button>
          <a class="navbar-brand" href="#">RastreiaPHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#">Cadastrar</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!--fim do menu-->

    <div class="container theme-showcase" role="main">
    <!--  -->
      <div class="jumbotron">
        <br/>
        <p>Adicione o seu código de rastreio CORREIOS/PAC abaixo.</p>

        <form name="codigo" method="post" id="ajax_form">
        <label>Código de rastreio:</label>

        <!--INPUT QUE USUARIO IRA COLOCAR O COD. DE RASTREIO-->
        <input type="text" name="cod" value="" required>
        <button type="submit" class="btn btn-sm btn-primary" name="rastreia">Rastrear</button>
        <div class="carregando" style="display: none;">Carregando...</div>

        </form> 

      </div>

        <!--DIV que mostra o resultado via jQuery-->
        <div class="resultado" style="display: none;"></div>

    </div> <!-- /conteudo -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>