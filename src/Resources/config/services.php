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

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Lotgd\Bundle\SoulGemBundle\OccurrenceSubscriber\SoulGemSubscriber;
use Lotgd\Core\Http\Response;
use Lotgd\Core\Lib\Settings;

return static function (ContainerConfigurator $container)
{
    $container->services()
        //-- OccurrenceSubscriber
        ->set(SoulGemSubscriber::class)
            ->args([
                new ReferenceConfigurator(Settings::class),
                new ReferenceConfigurator('lotgd.core.log'),
                new ReferenceConfigurator(Response::class),
                new ReferenceConfigurator('twig'),
            ])
            ->tag('lotgd_core.occurrence_subscriber')
    ;
};
