<?php

declare(strict_types = 1);

namespace BoardGame\Domain;

/**
 * Interface Game
 * @package BoardGame\Domain
 */
interface Game
{
    public function all();

    public function clear();

    public function count();

    /**
     * @return GameBoard
     */
    public function fetchGameBoard() : GameBoard;

    /**
     * @param GameBoard $gameBoard
     */
    public function save(GameBoard $gameBoard);
}