<table id="salarios" class="display" cellspacing="0">
    <?php

    ini_set('default_charset', 'UTF-8');

    $xml = simplexml_load_file('http://developers.agenciaideias.com.br/correios/rastreamento/xml/PJ040873655BR');
?>
    <thead>
        <tr>
            <th>data</th>
            <th>local</th>
            <th>acao</th>
            <th>detalhes</th>
        </tr>
    </thead>
        <tfoot>
            <tr>
            <th>data</th>
            <th>local</th>
            <th>acao</th>
            <th>detalhes</th>
            </tr>
        </tfoot>
        <tbody>
 <?php

    foreach ($xml->evento as $pessoa) {
        echo '<tr>';
        echo '<td>'; echo $pessoa->data.'</td>';
        echo '<td>'; echo $pessoa->local.'</td>';
        echo '<td>'; echo $pessoa->acao.'</td>';
        echo '<td>'; echo $pessoa->detalhes.'</td>';
         echo '</tr>';
    }

?>
        </tbody>
    </table>

</div>