<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// echo file_get_contents("http://localhost/wsdl_soap/calculator.wsdl");

// $client = new SoapClient('http://localhost/wsdl_soap/calculator.wsdl', ['trace' => 1]);
$client = new SoapClient(__DIR__ . '/calculator.wsdl', ['trace' => 1]);

try {
    // $response = $client->__soapCall('Add', [[
    //     'a' => 5,
    //     'b' => 20,
    // ]]);
    
    $response = $client->Add( [
        'a' => 3,
        'b' => 7,
    ]);
    echo "Result: " . $response->result . "\n";
    echo "Request: " . $client->__getLastRequest() . "\n";
    echo "Response: " . $client->__getLastResponse() . "\n";
} catch (SoapFault $e) {
    echo "SOAP Fault: " . $e->getMessage() . "\n";
    echo $client->__getLastResponse();
}