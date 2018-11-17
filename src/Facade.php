<?php
namespace FerencBalogh\Billingohu;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'billingo-request';
    }

}