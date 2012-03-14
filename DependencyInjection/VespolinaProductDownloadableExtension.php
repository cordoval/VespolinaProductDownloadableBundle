<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductDownloadableBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

use Vespolina\ProductDownloadableBundle\DependencyInjection\Configuration;

/**
 * @author Richard D Shank <develop@zestic.com>
 * @author Luis Cordova <cordoval@gmail.com>
 */
class VespolinaProductDownloadableExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('downloadable.xml');

        if (isset($config['product_class'])) {
            $container->setParameter('vespolina.product.downloadable.class', $config['product_class']);
        }

        if (isset($config['product_handler'])) {
            $container->setParameter('vespolina.product_handler.downloadable.class', $config['product_handler']);
        }
    }
}
