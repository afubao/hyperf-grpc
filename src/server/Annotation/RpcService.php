<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Chengyi\HyperfGrpc\server\Annotation;

use Attribute;
use Hyperf\Di\Annotation\AbstractAnnotation;

#[Attribute(Attribute::TARGET_CLASS)]
class RpcService extends AbstractAnnotation
{
    public function __construct(
        public string $name = '',
        public string $server = 'grpc',
        public string $protocol = 'grpc',
        public string $publishTo = 'nacos'
    ) {
    }
}
