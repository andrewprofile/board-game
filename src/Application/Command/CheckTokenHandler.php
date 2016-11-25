<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

use BoardGame\Domain\Game;
use BoardGame\Domain\TokenId;

/**
 * Class CheckTokenHandler
 * @package BoardGame\Application\Command
 */
final class CheckTokenHandler
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
     * @param CheckToken $command
     */
    public function handle(CheckToken $command)
    {
        $gameBoard = $this->game->fetchGameBoard();
        $board     = $gameBoard->board();
        $token     = $board->findById(new TokenId($command->tokenId()));

        if (!$gameBoard->isEndGame()) {
            if ($token->isTokenBackward() && $token->isChampion()) {
                $token->changeTokenWin();
                $gameBoard->changeEndGame();
            }
        }
    }
}
