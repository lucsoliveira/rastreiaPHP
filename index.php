
<html>

<head>
<title>RastreiaPHP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form name="codigo" method="post">

        <label>Código de rastreio</label>

        <!--INPUT QUE USUARIO IRA COLOCAR O COD. DE RASTREIO-->
        <input type="text" name="cod" value="">

        <input type="submit" name="rastreia" value="Rastrear"/>

        </form>   
        <!--FORM INPUT E TABLE DO CÓDIGO DE RASTREIO-->
        <table id="salarios" class="display" cellspacing="0">
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>