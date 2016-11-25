<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

use BoardGame\Domain\Board;
use BoardGame\Domain\Game;
use BoardGame\Domain\GameBoard;

/**
 * Class CreateGameHandler
 * @package BoardGame\Application\Command
 */
final class CreateGameHandler
{
    /**
     * @var Game
     */
    private $game;

    /**
     * @var Board
     */
    private $board;

    /**
     * CreateGameHandler constructor.
     * @param Game $game
     * @param Board $board
     */
    public function __construct(Game $game, Board $board)
    {
        $this->game  = $game;
        $this->board = $board;
    }

    /**
     * @param CreateGame $command
     */
    public function handle(CreateGame $command)
    {
        $this->game->save(new GameBoard($command->beginTime(), $this->board));
    }
}
