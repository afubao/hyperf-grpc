<?php

namespace Chengyi\HyperfGrpc\client;

use Hyperf\Rpc\Contract\PathGeneratorInterface;
use Hyperf\Stringable\Str;

class PathGenerator implements PathGeneratorInterface
{

    public function generate(string $service, string $method): string
    {
        $handledNamespace = explode('\\', $service);
        $handledNamespace = Str::replaceLast('Service', '', end($handledNamespace));

        if ($handledNamespace[0] !== '/') {
            $handledNamespace = '/' . $handledNamespace;
        }
        $methodArr = explode('|', $method);
        $interfaceNamespace = '';
        if (isset($methodArr[1])) {
            // 去掉 Interface后缀
            $interfaceNamespace = explode('\\', $methodArr[1]);
            $interfaceNamespace = Str::replaceLast('Interface', '', end($interfaceNamespace)) . '/';
        }
        return $handledNamespace . '.' . $interfaceNamespace . $methodArr[0];
    }
}
