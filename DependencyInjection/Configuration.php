<?php

/*
 * This file is part of the RuudkMollieBundle package.
 *
 * (c) Ruud Kamphuis <ruudk@mphuis.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ruudk\MollieBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ruudk_mollie');

        $rootNode
            ->children()
                ->scalarNode('partner_id')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('profile_key')
                    ->defaultNull()
                ->end()
                ->booleanNode('testmode')
                    ->defaultTrue()
                ->end()
                ->scalarNode('client')
                    ->defaultValue('file_get_contents')
                    ->validate()
                        ->ifNotInArray(array('file_get_contents', 'curl'))
                        ->thenInvalid('Client %s is not supported')
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
