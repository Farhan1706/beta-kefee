<?php 
    require 'vendor/autoload.php'; 
    $options['secret_api_key'] = 'xnd_development_1GWfa8I4slYylD639g8uLjVqJ1KFNQQw4AZHUxoUbFtWtoOJVynUyeobLfTW8ED=='; 
    $xenditPHPClient = new XenditClient\XenditPHPClient($options); 
    $external_id = 'demo_1475801962607';
    $payer_email = 'nori876bg@gmail.com';
    $description = 'Pemberlanjaan di KeeFe';
    $amount = 13000;
    $response = $xenditPHPClient->createInvoice($external_id, $amount, $payer_email, $description);
    print_r($response); 
?>