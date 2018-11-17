<?php
namespace FerencBalogh\Billingohu\HTTP;

use Billingo\Config;

class Route
{
	private $host;
    private $uri;

	public function __construct(Config $config, $uri = '',$host=null)
	{
        if($host == null) $host = $config->host;
		$this->host = rtrim($host, '/');
        $this->uri = $uri;
    }

	public function path($params=[], $absolute=false)
	{
		$paramsString = implode('/', (array)$params);
		$path = rtrim($this->uri, '/') . '/' . $paramsString;
		if($absolute) return $path;
		return $this->host . '/' . $path;
	}
}