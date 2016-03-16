<?php
    //Aqui o script pega o código de rastreio fornecido pelo usuario
    //no metodo POST, pelo INPUT "cod"
    $codRastreio = $_POST['cod'];

    //COLOCA COMO DEFINIÇÃO UTF-8 PARA CARACTERES ESPECIAIS
    ini_set('default_charset', 'UTF-8');

    //O SCRIPT TEM COMO BASE O GERADOR DE XML DO SITE AGENCIAIDEIAS, QUE É DISPONIBILIZADO GRATUITAMENTE
    $xml = simplexml_load_file('http://developers.agenciaideias.com.br/correios/rastreamento/xml/'.$codRastreio.'');

    //faz uma verificação simples se o código de rastreio fornecido foi encontrado nos correios
    //se retornar vazio, ira aperecer uma mensagem de erro
    if($xml == ''){

        echo '<div class="alert alert-danger" role="alert"><strong>Opsss!</strong> Código de rastreio com formato incorreto ou ainda não foi cadastrado no sistema dos correios.</div>';

    }else{ 

        //o script ira criar uma tabela com dados do rastreio
        echo '<center><h3>Rastreio: '.$codRastreio.'</h3></center>';
        echo '<div class="row"><div class="col-md"><table class="table">';
        //divisão da tabela
        echo "<thead> <tr> <th>Data</th> <th>Local</th> <th>Ação</th> <th>Detalhes</th> </tr> </thead> <tbody>";

        //Aqui o codigo faz um loop de dados se houver mais de uma informação recebida pelo XML dos correios
        foreach ($xml->evento as $rastreio) {
            echo '<tr>';
            echo '<td>'; echo $rastreio->data.'</td>'; echo '<td>'; echo $rastreio->local.'</td>'; 
            echo '<td>'; echo $rastreio->acao.'</td>'; echo '<td>'; echo $rastreio->detalhes.'</td>';
            echo '</tr>';
        }

        //aqui é fechado o loop de dados recebidos
        echo "</tbody></table>";        
    } 
?>