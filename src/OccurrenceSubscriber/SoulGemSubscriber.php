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

namespace Lotgd\Bundle\SoulGemBundle\OccurrenceSubscriber;

use Lotgd\Bundle\SoulGemBundle\LotgdSoulGemBundle;
use Lotgd\Core\Http\Response;
use Lotgd\Core\Lib\Settings;
use Lotgd\Core\Log;
use Lotgd\CoreBundle\OccurrenceBundle\OccurrenceSubscriberInterface;
use Twig\Environment;

class SoulGemSubscriber implements OccurrenceSubscriberInterface
{
    public const TRANSLATION_DOMAIN = LotgdSoulGemBundle::TRANSLATION_DOMAIN;

    private $settings;
    private $log;
    private $response;
    private $twig;

    public function __construct(
        Settings $settings,
        Log $log,
        Response $response,
        Environment $twig
    ) {
        $this->settings = $settings;
        $this->log      = $log;
        $this->response = $response;
        $this->twig     = $twig;
    }

    public function findSoulGem()
    {
        global $session;

        ++$session['user']['gravefights'];
        $session['user']['deathpower'] += mt_rand(1, 5);

        $params = [
            'translation_domain' => self::TRANSLATION_DOMAIN,
            'death_overlord'     => $this->settings->getSetting('deathoverlord', '`$Ramius`0'),
        ];

        $this->log->debug('found a sould gem in graveyard');

        $this->response->pageAddContent($this->twig->render('@LotgdSoulGem/soul_gem.html.twig', $params));
    }

    public static function getSubscribedOccurrences()
    {
        return [
            'forest' => ['findSoulGem', 10000, OccurrenceSubscriberInterface::PRIORITY_INFO],
            'graveyard' => ['findSoulGem', 10000, OccurrenceSubscriberInterface::PRIORITY_INFO],
        ];
    }
}
