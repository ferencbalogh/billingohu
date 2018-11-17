<?php
namespace FerencBalogh\Billingohu\Contracts;

interface Request
{
    public function get($uri, $data = []);
    public function post($uri, $data = []);
    public function put($uri, $data = []);
    public function delete($uri, $data = []);
}