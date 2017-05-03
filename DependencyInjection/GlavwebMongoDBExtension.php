<?php

/*
* This file is part of the "GlavwebMongoDBBundle" package.
*
* (c) Andrey Nilov <nilov@glavweb.ru>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Glavweb\MongoDBBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class GlavwebMongoDBExtension
 *
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 *
 * @package Glavweb\MongoDBBundle\DependencyInjection
 * @author Andrey Nilov <nilov@glavweb.ru>
 */
class GlavwebMongoDBExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('mongodb.host', $config['host']);
        $container->setParameter('mongodb.dbname', $config['dbname']);
        $container->setParameter('mongodb.user', $config['user']);
        $container->setParameter('mongodb.password', $config['password']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
