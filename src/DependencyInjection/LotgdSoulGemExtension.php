<?php

/**
 * This file is part of "LoTGD Bundle Soul Gem".
 *
 * @see https://github.com/lotgd-core/soul-gem-bundle
 *
 * @license https://github.com/lotgd-core/soul-gem-bundle/blob/master/LICENSE.txt
 * @author IDMarinas
 *
 * @since 0.1.0
 */

namespace Lotgd\Bundle\SoulGemBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class LotgdSoulGemExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new PhpFileLoader($container, new FileLocator(\dirname(__DIR__).'/Resources/config'));

        $loader->load('services.php');
    }
}
