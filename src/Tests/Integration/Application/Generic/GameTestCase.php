<?php

declare(strict_types = 1);

namespace BoardGame\Tests\Integration\Application\Generic;

use BoardGame\Domain\TokenId;
use BoardGame\Tests\GameContext;

/**
 * Class GameTestCase
 * @package BoardGame\Tests\Integration\Application\Generic
 */
abstract class GameTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GameContext
     */
    protected $gameContext;

    /**
     * @var TokenId
     */
    protected $tokenId;

    /**
     * @var \DateTime
     */
    protected $currentTime;

    /**
     * @return void
     */
    abstract public function clear();

    function test_backward_token()
    {
        $this->gameContext->createGame($this->currentTime);
        $this->gameContext->createToken((string) $this->tokenId, 0, 0, true);
        $this->gameContext->board()->findById($this->tokenId)->changeTokenBackward();

        $this->assertTrue($this->gameContext->board()->findById($this->tokenId)->isTokenBackward());
        $this->clear();
    }

    function test_check_token()
    {
        $this->gameContext->createGame($this->currentTime);
        $this->gameContext->createToken((string) $this->tokenId, 0, 0, true);
        $this->gameContext->board()->findById($this->tokenId)->changeTokenBackward();
        $this->gameContext->checkToken((string) $this->tokenId);

        $this->assertTrue($this->gameContext->board()->findById($this->tokenId)->isTokenBackward());
        $this->assertTrue($this->gameContext->board()->findById($this->tokenId)->isWin());
        $this->clear();
    }

    function test_create_game()
    {
        $this->gameContext->createGame($this->currentTime);

        $this->assertInstanceOf('BoardGame\Domain\GameBoard', $this->gameContext->game()->fetchGameBoard());
        $this->clear();
    }

    function test_create_token()
    {
        $this->gameContext->createToken((string) $this->tokenId, 0, 0, true);

        $this->assertCount(1, $this->gameContext->board()->all());
        $this->clear();
    }

    function test_reset_game()
    {
        $this->gameContext->createGame($this->currentTime);
        $this->gameContext->resetGame();

        $this->assertNull($this->gameContext->game()->all());
        $this->assertNull($this->gameContext->board()->all());
        $this->clear();
    }
}
