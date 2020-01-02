<?php
    foreach ($jsonSkype  as $Chiave => $Valore):
        if ($Valore && is_array($Valore)):
            foreach ($Valore as $Key =>$Value):
            
?>
<h5>
    <a href="<?php echo stampa_info ($Key)?>"> 
        <?php echo stampa_info($Value ['displayName'])?>
    </a>
</h5>

<?php
                endforeach;
            endif;
    endforeach;
?>

<pre>
    <?php //print_r ($Key);//print_r($Valore) ?>
</pre>