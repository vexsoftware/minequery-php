<?php
/**
 * If Array Of Players Is Empty, Then Echo “No Players Online”
 * @link http://stackoverflow.com/q/11807495/367456
 */

require('minequery.class.php');

$host = "67.202.102.224";

/**
 * Minequery Stub of a read()
 */
class MinequeryStub extends Minequery {
	protected static function read($address, $port, &$errno, &$errstr, $timeout, $write, &$latency) {
		$latency = 1000;
		return <<<RESPONSE
_reserved_ serverPort
_reserved_ playerCount
_reserved_ maxPlayers
_reserved_ []
RESPONSE;
	}
}

Minequery::$classname = 'MinequeryStub';

$query = Minequery::query($host);
$playerList = $query['playerList'];
$failure = array("");
$fixed = array();

printf("The error exists: %s\n", $playerList === $failure ? 'Yes' : 'No');
printf("The error is fixed: %s\n", $playerList === $fixed ? 'Yes' : 'No');
printf("Result: %s\n", $playerList === $fixed ? 'OK' : 'FAIL');