<?php


namespace Alpa\Tools\ProxyObject\Handlers;


use Alpa\Tools\ProxyObject\ProxyInterface;

abstract class InstanceActions implements ActionsInterface
{
    use TInstanceMethods {
        TInstanceMethods::get as protected;
        TInstanceMethods::set as protected;
        TInstanceMethods::unset as protected;
        TInstanceMethods::isset as protected;
        TInstanceMethods::call as protected;
        TInstanceMethods::invoke as protected;
        TInstanceMethods::toString as protected;
        TInstanceMethods::iterator as protected;
    }

    public static function &static_run(string $action, $target, ?string $prop, $value_or_args, ProxyInterface $proxy)
    {

    }
}