<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

use BoardGame\Domain\Board;
use BoardGame\Domain\Game;

/**
 * Class ResetGame
 * @package BoardGame\Application\Command
 */
final class ResetGame implements Command
{
    use CommandSerialize;

    /**
     * @var Game
     */
    private $game;

    /**
     * @var Board
     */
    private $board;

    /**
     * ResetGame constructor.
     * @param Game $game
     * @param Board $board
     */
    public function __construct(Game $game, Board $board)
    {
        $this->game = $game;
        $this->board = $board;
    }

    /**
     * @return Game
     */
    public function game(): Game
    {
        return $this->game;
    }

    /**
     * @return Board
     */
    public function board(): Board
    {
        return $this->board;
    }
}
