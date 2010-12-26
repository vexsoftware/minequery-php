<?php
/**
 * Query a Minecraft server running hMod with Minequery
 */
class Minequery
{
	
	function __construct($server, $port = 25566)
	{
		$this->socket = fsockopen($server, $port, $erno, $erst, 5);
		$this->query();
	}
	
	private function query()
	{
		$query = "QUERY" . PHP_EOL ;
		$buffer = "";
		fwrite($this->socket, $query);
		while (!feof($this->socket)) {
			$buffer .= fgets($this->socket, 1024);
		}
		$this->query = explode(PHP_EOL, $buffer);
	}
	
	public function port()
	{
		$port = explode(' ', $this->query[0]);
		return $port[1];
	}
	
	public function player_count()
	{
		$count = explode(' ', $this->query[1]);
		return $count[1];
	}
	
	public function max_players()
	{
		$max = explode(' ', $this->query[2]);
		return $max[1];
	}
	
	public function player_list()
	{
		$list = explode(' ', $this->query[3]);
		$list = trim($list[1], '[]');
		$list = explode(',', $list);
		return $list;
	}
	
}