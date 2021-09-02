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

namespace Lotgd\Bundle\SoulGemBundle;

use Lotgd\Bundle\Contract\LotgdBundleInterface;
use Lotgd\Bundle\Contract\LotgdBundleTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class LotgdSoulGemBundle extends Bundle implements LotgdBundleInterface
{
    use LotgdBundleTrait;

    public const TRANSLATION_DOMAIN = 'lodge_soul_gem';

    /**
     * {@inheritDoc}
     */
    public function getLotgdName(): string
    {
        return 'Soul Gem';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdVersion(): string
    {
        return '0.1.0';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdIcon(): ?string
    {
        return 'gem';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdDescription(): string
    {
        return 'Special event that you can find soul gem in Graveyard.';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdDownload(): ?string
    {
        return 'https://github.com/lotgd-core/soul-gem-bundle';
    }
}
