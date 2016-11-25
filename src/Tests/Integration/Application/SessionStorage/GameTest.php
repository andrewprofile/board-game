<?php

declare(strict_types = 1);

namespace BoardGame\Tests\Integration\Application\SessionStorage;

use BoardGame\Domain\TokenId;
use BoardGame\Tests\Context\Tactician\TacticianCommandFactory;
use BoardGame\Tests\Integration\Application\Generic\GameTestCase;
use BoardGame\Tests\SessionStorage\SessionStorageGameContext;

/**
 * Class GameTest
 * @package BoardGame\Tests\Integration\Application\SessionStorage
 */
final class GameTest extends GameTestCase
{
    function setUp()
    {
        $this->gameContext = new SessionStorageGameContext(new TacticianCommandFactory(), new \DateTime(), []);
        $this->tokenId = TokenId::generate();
        $this->currentTime = new \DateTime();
    }

    public function clear()
    {
        $this->gameContext->resetGame();
    }
}
