<?php

$url = 'https://cv.microservices.credy.com/v1';
$unixTimestamp = time();
$signature = sha1($unixTimestamp . 'credy');

$bio = "Passionate Junior Software Developer with 1.5 years of experience in web development using JavaScript,
        Vue.js, and Yii2, and working with databases like MySQL and PostgreSQL. Currently a student at Kood/Jõhvi,
        set to graduate this year. Committed to continuous learning and staying updated on industry advancements.
        Open to new challenges andseeking opportunities to contribute to innovative projects.
        Let's connect and explore potential collaborations!";

$data = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<json:object xsi:schemaLocation="http://www.datapower.com/schemas/json jsonx.xsd"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:json="http://www.ibm.com/xmlns/prod/2009/jsonx">
  <json:string name="first_name">Timo</json:string>
  <json:string name="last_name">Otsing</json:string>
  <json:string name="email">timo.otsing@gmail.com</json:string>
  <json:string name="bio">$bio</json:string>
  <json:array name="technologies">
    <json:string>Yii2</json:string>
    <json:string>PHP</json:string>
    <json:string>Symfony</json:string>
    <json:string>Geoserver</json:string>
    <json:string>Openlayers</json:string>
    <json:string>MySQL</json:string>
    <json:string>PostgreSQL</json:string>
    <json:string>Vue.js</json:string>
    <json:string>Javascript</json:string>
    <json:string>HTML</json:string>
    <json:string>CSS</json:string>
    <json:string>Docker</json:string>
    <json:string>GO</json:string>
  </json:array>
  <json:number name="timestamp">$unixTimestamp</json:number>
  <json:string name="signature">$signature</json:string>
  <json:string name="vcs_uri">https://github.com/timootsing/credy.git</json:string>
</json:object>
XML;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/xml',
        'Content-Length: ' . strlen($data))
);

$response = curl_exec($ch);

curl_close($ch);

echo $response;
