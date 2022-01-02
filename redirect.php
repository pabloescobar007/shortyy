<?php
require_once('autoload.php');
if($_GET['query']) {
    $respons = $Killbot->redirect( $config['apikey'] , $_GET['query']);
    $json    = $Killbot->json($respons);
    if($json['data']['block_access'] == true){
        $Killbot->error($json['data']['direct_url']);
    }
    if(empty($json['data']['direct_url'])){
        $Killbot->error('self_404');
    }
    die(header("Location: ".$json['data']['direct_url']));
} else {
    $Killbot->error('self_404');
}