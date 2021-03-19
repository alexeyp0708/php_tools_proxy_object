<?php


namespace Alpa\ProxyObject;


interface HandlersContract
{
    public function run(string $action,object $target,?string $prop=null,$value_or_arguments=null,Proxy $proxy);
    public static  function static_run(string $action,object $target,?string $prop=null,$value_or_arguments=null,Proxy $proxy);
}