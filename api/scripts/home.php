<?php
require_once __DIR__ . '/../src/api_consumer.php';
defined('CONTROL') or die('Acesso Invalido!');

//get all countries data
$api = new ApiConsumer();
$countries = $api->get_all_countries();

?>


<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h3>Vamos consumir uma API com PHP puro!</h3>
        </div>
            
    </div>
        
</div>
