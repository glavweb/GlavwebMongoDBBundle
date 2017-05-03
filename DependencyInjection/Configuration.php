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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 *
 * @package Glavweb\MongoDBBundle\DependencyInjection
 * @author Andrey Nilov <nilov@glavweb.ru>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('glavweb_mongo_db');

        $rootNode
            ->children()
                ->scalarNode('host')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('dbname')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('user')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
