<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\ProductDownloadableBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vespolina\ProductDownloadableBundle\DependencyInjection\Compiler\TaggingCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class VespolinaProductDownloadableBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TaggingCompilerPass());
    }
}
