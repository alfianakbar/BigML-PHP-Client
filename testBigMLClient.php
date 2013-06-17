<?php

include ("BigMLClient.php");

$client = new BigMLClient('<your username>','<your password>');

$file = "data/iris.csv";
$result = $client->create_source($file);

$resource = $result->resource;

sleep(1);

$result = $client->create_dataset($resource);
$resource = $result->resource;

sleep(1);

$result  = $client->create_model($resource);
$resource = $result->resource;

sleep(1);

$data = array(
    '000000' => 1.2,
    '000001' => 5
);
$result = $client->create_prediction($resource,$data);
$key = $result->objective_fields[0];
echo "<h2>Prediction:" . $result->prediction->$key . "</h2>";

?>
