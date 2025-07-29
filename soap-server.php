<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);



function Add($params) {
    return ['result' => $params->a + $params->b];
}

$server = new SoapServer('http://localhost/wsdl_soap/calculator.wsdl');
$server = new SoapServer(__DIR__.'/calculator.wsdl');
$server->addFunction('Add');
$server->handle();