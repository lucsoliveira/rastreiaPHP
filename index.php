<!DOCTYPE html>
<html>
<head>
    <!--Tema BOOTSTRAP-->
    <title>RastreiaPHP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="tema.css" rel="stylesheet">
</head>

<body>
    <!--inicio do body-->
     <body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
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
    <div class="container theme-showcase" role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1></h1>

        <p>Adicione o seu código de rastreio abaixo</p>
        <form name="codigo" method="post">

        <label>Código de rastreio</label>

        <!--INPUT QUE USUARIO IRA COLOCAR O COD. DE RASTREIO-->
        <input type="text" name="cod" value="">

        <button type="submit" class="btn btn-sm btn-primary" name="rastreia">Rastrear</button>

        </form>   
      </div>
        <!--FORM INPUT E TABLE DO CÓDIGO DE RASTREIO-->
        <?php

        //Verifica se o usuario clicou no botão de rastrear
        if(isset($_POST['rastreia'])){
        //Aqui o script pega o código de rastreio fornecido pelo usuario
        //no metodo POST, pelo INPUT "cod"
        $codRastreio = $_POST['cod'];
        //COLOCA COMO DEFINIÇÃO UTF-8 PARA CARACTERES ESPECIAIS
        ini_set('default_charset', 'UTF-8');

        //O SCRIPT TEM COMO BASE O GERADOR DE XML DO SITE AGENCIAIDEIAS, QUE É DISPONIBILIZADO GRATUITAMENTE
        $xml = simplexml_load_file('http://developers.agenciaideias.com.br/correios/rastreamento/xml/'.$codRastreio.'');
        //Se houver post, o script ira criar uma tabela com dados do rastreio
        echo '<h1>Rastreio: '.$codRastreio.'</h1>';
        echo '
        <div class="row">
        <div class="col-md-6">
          <table class="table">';

        echo "<thead>
            <tr>
            <th>Data</th>
            <th>Local</th>
            <th>Ação</th>
            <th>Detalhes</th>
            </tr>
            </thead>
            <tbody>";
        //Aqui o codigo faz um loop de dados se houver mais de uma informação recebida pelo XML dos correios
        foreach ($xml->evento as $rastreio) {
        echo '<tr>';
        echo '<td>'; echo $rastreio->data.'</td>';
        echo '<td>'; echo $rastreio->local.'</td>';
        echo '<td>'; echo $rastreio->acao.'</td>';
        echo '<td>'; echo $rastreio->detalhes.'</td>';
         echo '</tr>';
        }
        //aqui é fechado o loop de dados recebidos
        echo "
        </tbody>
        </table>";

        //se ainda nao houve post do código de rastreio, não aparece nada 
        //aonde ficaria a tabela de dados do rastreio
        }else{

        }

        ?>
    </div> <!-- /conteudo -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>