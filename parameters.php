<?php
include('config.php');

$param = [];
$result = $con->query('SELECT name, translation FROM vice_parameters');
while($obj = $result->fetch_object()) {
    $param[] = $obj;
};
echo json_encode($param);
die();
?>
