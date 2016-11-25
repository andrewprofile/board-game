<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

use BoardGame\Domain\Game;

/**
 * Class CheckEndGameHandler
 * @package BoardGame\Application\Command
 */
final class CheckEndGameHandler
{
    /**
     * @var Game
     */
    private $game;

    /**
     * BackwardTokenHandler constructor.
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * @param CheckEndGame $command
     */
    public function handle(CheckEndGame $command)
    {
        $gameBoard = $this->game->fetchGameBoard();

        if ($gameBoard->move() > 5 || $gameBoard->intervalSeconds($command->currentTime()) > 60) {
            $gameBoard->changeEndGame();
        }
    }
}
