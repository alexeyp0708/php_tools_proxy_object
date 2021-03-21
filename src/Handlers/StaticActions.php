<?php


namespace Alpa\ProxyObject\Handlers;


use Alpa\ProxyObject\Proxy;

abstract class StaticActions  implements IContract
{
    use TStaticMethods {
        get as protected;
        set as protected;
        unset as protected;
        isset as protected;
        call as protected;
        iterator as protected;
    }
    protected static function getActionPrefix():string
    {
        return '';
    }
    public function run(string $action, $target, ?string $prop = null, $value_or_args = null, Proxy $proxy)
    {
        
    }
}