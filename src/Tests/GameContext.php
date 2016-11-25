<?php

declare(strict_types = 1);

namespace BoardGame\Tests;

use BoardGame\Domain\Board;
use BoardGame\Domain\Game;
use BoardGame\Tests\Context\Context;

/**
 * Interface GameContext
 * @package BoardGame\Tests
 */
interface GameContext extends Context
{
    /**
     * @return Game
     */
    public function game() : Game;

    /**
     * @return Board
     */
    public function board() : Board;

    /**
     * @param string $tokenId
     * @return mixed
     */
    public function checkToken(string $tokenId);

    /**
     * @param \DateTime $beginTime
     * @return mixed
     */
    public function createGame(\DateTime $beginTime);

    /**
     * @param string $tokenId
     * @param int $row
     * @param int $col
     * @param bool $champion
     * @return mixed
     */
    public function createToken(string $tokenId, int $row, int $col, bool $champion);

    /**
     * @return void
     */
    public function resetGame();
}
