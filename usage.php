<?php

// turn on error reporting so we know if something is wrong
error_reporting(E_ALL);

require('minequery.class.php');

$status = new Minequery('localhost');

echo "Server Port: ";
echo $status->port();
echo "<br />";

echo "Max Players: ";
echo $status->max_players();
echo "<br />";

echo "Currently Online: ";
echo $status->player_count();
echo "<br />";

echo "<pre>";
print_r($status->player_list());
echo "</pre>";

/* End of usage.php */