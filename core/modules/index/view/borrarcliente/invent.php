<?php

$client = Entidad::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=clientes");

?>
