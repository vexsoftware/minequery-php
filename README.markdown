# Minequery PHP

A PHP class for Minequery.

## Usage

### query

    Minequery::query($address, $port = 25566, $timeout = 30);

Queries a Minequery Server.

**Parameters:**  
`$address` - The address to the Minequery server.   
`$port` - The port of the Minequery server.  
`$timeout` - The time given before the connection attempt gives up.

**Returns:**  
An array on success, FALSE on failure.

### query_json

    Minequery::query_json($address, $port = 25566, $timeout = 30);

Queries a Minequery Server using JSON.

**Parameters:**  
`$address` - The address to the Minequery server.  
`$port` - The port of the Minequery server.  
`$timeout` - The time given before the connection attempt gives up.

**Returns:**  
A stdClass object on success, FALSE on failure.

## License

Copyright (c) 2011 [Kramer Campbell](http://kramerc.com/), released under the GPL v3.