<?php

declare(strict_types = 1);

namespace BoardGame\Infrastructure\SessionStorage;

use BoardGame\Domain\Game;
use BoardGame\Domain\GameBoard;

/**
 * Class GameStorage
 * @package BoardGame\Infrastructure\SessionStorage
 */
final class GameStorage implements Game
{
    /**
     * GameStorage constructor.
     * @param GameBoard $gameBoard
     */
    public function __construct(GameBoard $gameBoard)
    {
        if (!isset($_SESSION['game_board'])) {
            $_SESSION['game_board'] = null;
        }

        $this->save($gameBoard);
    }

    /**
     * @return array|null
     */
    public function all()
    {
        return isset($_SESSION['game_board']) ? $_SESSION['game_board'] : null;
    }

    public function clear()
    {
        unset($_SESSION['game_board']);
    }

    /**
     * @return int
     */
    public function count()
    {
       return count($_SESSION['game_board']);
    }

    /**
     * @return GameBoard
     */
    public function fetchGameBoard(): GameBoard
    {
        return $_SESSION['game_board'];
    }

    /**
     * @param GameBoard $gameBoard
     */
    public function save(GameBoard $gameBoard)
    {
        $_SESSION['game_board'] = $gameBoard;
    }
}
