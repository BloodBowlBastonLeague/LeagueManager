<?php

function parameters($con){
  $sql_parameters = "SELECT name, translation FROM site_parameters";
  $res_parameters = $con->query($sql_parameters);
  while($data = $res_parameters->fetch_object()) {
    $parameters[] = $data;
	}
  return $parameters;
};
?>
