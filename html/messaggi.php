<?php
//scriviDB ($jsonSkype);
$arMessaggi = $jsonSkype ['conversations'] [$IDConversazione] ['MessageList'];//Array Desiderato
 //array_reverse -->Itera sull'array partendo dall'ultimo elemento
    foreach (array_reverse ($arMessaggi) as $Key => $Value):
    //Lavoro solo con testo normale, rimuovo le videochiamate
    //if (is_array($Value) && $Value['messagetype']=='RichText'):
    if (is_array($Value)):
        $From = $Value['from'];

?>
<div class="<?php autorePost($From, $UserID) ?> post">
    <div>
        <h6>
            <?php stampa_info($Value ['displayName']);?>
            <?php stampa_info(converti_data ($Value ['originalarrivaltime']));?>
        </h6>

        <p>
            <?php print_r($Value ['content']);?>
        </p>
    </div>
</div>
<?php endif; endforeach;?>