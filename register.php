<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lukas
 * Date: 15.05.13
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */
function register($mobileNumber, $messege){
    $responseMessage = "";
    // +--------------------------------------------+
    // | Copyright (c) 2007-2009 by SMSTRADE.DE     |
    // +--------------------------------------------+

    $url = "http://gateway.smstrade.de"; // URL des Gateways
    $request = ""; // Request Variable initialisieren
    $param["key"] = "YufJJ5Zed0013c4amJUqTCg"; // Gateway Key
    $param["to"] = $mobileNumber; // Empfänger der SMS
    $param["message"] = $messege; // Inhalt der Nachricht
    $param["route"] = "basic";// Nutzung der Goldroute
    $param["from"] = "SMSTRADE";// Absender der SMS
    $param["debug"] = "1";// SMS wird nicht versendet - Testmodus

    foreach($param as $key=>$val) // Alle Parameter durchlaufen
    {
        $request.= $key."=".urlencode($val); // Werte müssen url-encoded sein
        $request.= "&"; // Trennung der Parameter mit &
    }

    // SMS kann jetzt versendet werden
    $response = @file($url."?".$request); // Request absetzen

    $response_code = intval($response[0]); // Responsecode auslesen

    if ($response_code != 100){
        $responseMessage = "Error! - Error code: " . $response_code;
    } else {
        $responseMessage = "SMS sent successfully. Debug modus: " . $param["debug"];
    }

    return $responseMessage;
}