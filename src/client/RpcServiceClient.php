<?php

namespace Chengyi\HyperfGrpc\client;

use Hyperf\RpcClient\ServiceClient;
use InvalidArgumentException;

class RpcServiceClient extends ServiceClient
{
    /**
     * 框架提供的不符合当前的情况，所以重写一下
     * @param string $methodName
     * @return string
     */
    protected function __generateRpcPath(string $methodName): string
    {
        if (! $this->serviceName) {
            throw new InvalidArgumentException('Parameter $serviceName missing.');
        }
        return $this->pathGenerator->generate($this->serviceName,  $methodName .'|'. $this->serviceInterface);
    }
}
