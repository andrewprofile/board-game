<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

use BoardGame\Domain\Game;
use BoardGame\Domain\TokenId;

/**
 * Class BackwardTokenHandler
 * @package BoardGame\Application\Command
 */
final class BackwardTokenHandler
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
     * @param BackwardToken $command
     */
    public function handle(BackwardToken $command)
    {
        $gameBoard = $this->game->fetchGameBoard();
        $board     = $gameBoard->board();
        $token     = $board->findById(new TokenId($command->tokenId()));

        if (!$gameBoard->isEndGame()) {
            if (!$token->isTokenBackward()) {
                $token->changeTokenBackward();
                $gameBoard->incrementMove();
            }
        }
    }
}
