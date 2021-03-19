<?php
namespace Alpa\ProxyObject;

class Proxy implements \IteratorAggregate
{
    protected object $target;
    /**
     * @var Handlers|string  if type string then Handlers class name 
     */
    protected  $handlers;

    /**
     * Proxy constructor.
     * @param object|callable $target
     * @param Handlers|string $handlers if type string then Handlers class name
     */
    public function __construct($target, $handlers)
    {
        $this->target=$target;
        if(
            is_object($handlers) && $handlers instanceof HandlersContract  ||
            is_string($handlers) && is_subclass_of($handlers,HandlersContract::class)
        ) {
            $this->handlers=$handlers;
        } else {
            throw new \Exception('arguments[2]: the object must implement interface'. HandlersContract::class.
                ', or if class name, then the class must implement interface '.HandlersContract::class);
        } 
    }
    protected function run(string $action,?string $prop=null,$value_or_arguments=null)
    {
        if(is_string($this->handlers)){
            return $this->handlers::static_run($action,$this->target,$prop,$value_or_arguments,$this);
        } else {
            return $this->handlers->run($action,$this->target,$prop,$value_or_arguments,$this);
        }
    }
    public function __get(string $name)
    {
        return $this->run('get',$name);
    }
    public function __set(string $name,$value)
    {
        $this->run('set',$name,$value);
    }
    public function __isset(string $name) :bool
    {
        return $this->run('isset',$name);
    }
    public function __unset(string $name):void
    {
         $this->run('unset',$name);
    }
    public function __call($name,$arguments )
    {
        return $this->run('call',$name,$arguments);
    }
    public function getIterator(): \Traversable
    {
        return $this->run('iterator');
    }
}