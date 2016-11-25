<?php

declare(strict_types = 1);

namespace BoardGame\Domain;

/**
 * Class GameBoard
 * @package BoardGame\Domain
 */
final class GameBoard
{
    /**
     * @var \DateTime
     */
    private $beginTime;

    /**
     * @var \DateTime
     */
    private $endTime;

    /**
     * @var Board
     */
    private $board;

    /**
     * @var bool
     */
    private $isEndGame;

    /**
     * @var int
     */
    private $move;

    /**
     * Game constructor.
     * @param \DateTime $beginTime
     * @param Board $board
     */
    public function __construct(\DateTime $beginTime, Board $board)
    {
        $this->beginTime = $beginTime;
        $endTime         = clone $beginTime;
        $this->endTime   = $endTime->modify('+60 seconds');
        $this->board     = $board;
        $this->isEndGame = false;
        $this->move      = 0;
    }

    /**
     * @return \DateTime
     */
    public function beginTime() : \DateTime
    {
        return $this->beginTime;
    }

    /**
     * @return Board
     */
    public function board(): Board
    {
        return $this->board;
    }

    public function changeEndGame()
    {
        $this->isEndGame = true;
    }

    /**
     * @return \DateTime
     */
    public function endTime() : \DateTime
    {
        return $this->endTime;
    }

    public function incrementMove()
    {
        $this->move++;
    }

    /**
     * @param \DateTime $currentTime
     * @return int
     */
    public function intervalSeconds(\DateTime $currentTime) : int
    {
        $intervalTime   = $this->endTime()->diff($currentTime);
        $endTimeMin     = $this->endTime()->format('i');
        $currentTimeMin = $currentTime->format('i');

        if ($endTimeMin <= $currentTimeMin) {
            return 60 * (($currentTimeMin - $endTimeMin) + 1) + $intervalTime->s;
        }

        return 60 - $intervalTime->s;
    }

    /**
     * @return boolean
     */
    public function isEndGame() : bool
    {
        return $this->isEndGame;
    }

    /**
     * @return int
     */
    public function move() : int
    {
        return $this->move;
    }
}
