<?php
error_reporting(E_ALL);

require('minequery.class.php');

$status = new Minequery('mc1.rewiredhost.com');

echo "Server Port: ";
echo $status->port();
echo "<br />";

echo "Currently Online: ";
echo $status->player_count();
echo "<br />";

echo "Max Players: ";
echo $status->max_players();
echo "<br />";

echo "<pre>";
print_r($status->player_list());
echo "</pre>";