<?php

/**
* Query a Minecraft server running hMod with Minequery
*/

// new line constant
define("NL", "\n");

class Minequery
{
	
	// create the socket and establish a connection
	// with the minecraft server
	function __construct($server, $port = 25566)
	{
		$this->socket = fsockopen($server, $port, $erno, $erst, 5);
		if ($this->socket == FALSE) {
			// error out and die if we cant connect
			trigger_error("Could not connect to the remote server", E_USER_ERROR);
			die();
		}
		else {
			$this->query();
		}
		
	}
	
	// send the request and store the result for later
	// processing by the class
	private function query()
	{
		$query = "QUERY" . NL ;
		$buffer = "";
		fwrite($this->socket, $query);
		while (!feof($this->socket)) {
			$buffer .= fgets($this->socket, 1024);
		}
		$this->query = explode(NL, $buffer);
	}
	
	
	// these functions split the line into 2 sections 
	// and return the second section
	
	// SERVERPORT ####
	public function port()
	{
		$port = explode(' ', $this->query[0]);
		return $port[1];
	}
	
	// PLAYERCOUNT ####
	public function player_count()
	{
		$count = explode(' ', $this->query[1]);
		return $count[1];
	}
	
	// MAXPLAYERS ####
	public function max_players()
	{
		$max = explode(' ', $this->query[2]);
		return $max[1];
	}
	
	
	// this function splits the line into two sections
	// then trims off the [ ] then explodes it by the 
	// "," then we loop through the results and trim
	// any whitespace that might be left
	
	// PLAYERLIST [ABCD,EFGH,etc]
	public function player_list()
	{
		$list = explode(' ', $this->query[3], 2 );
		$list = trim($list[1], '[]');
		$list = explode(',', $list);
		foreach ($list as $player) {
			$player_list[] = trim($player);
		}
		return $player_list;
	}
	
}

/* End of file minequery.class.php */