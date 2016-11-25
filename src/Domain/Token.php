<?php

declare(strict_types = 1);

namespace BoardGame\Domain;

/**
 * Class Token
 * @package BoardGame\Domain
 */
final class Token
{
    /**
     * @var TokenId
     */
    private $id;

    /**
     * @var int
     */
    private $tokenRow;

    /**
     * @var int
     */
    private $tokenCol;

    /**
     * @var bool
     */
    private $tokenForward;

    /**
     * @var bool
     */
    private $tokenBackward;

    /**
     * @var bool
     */
    private $isChampion;

    /**
     * @var bool
     */
    private $isWin;

    /**
     * Token constructor.
     * @param TokenId $id
     * @param int $tokenRow
     * @param int $tokenCol
     * @param bool $isChampion
     */
    public function __construct(TokenId $id, int $tokenRow, int $tokenCol, bool $isChampion)
    {
        $this->id           = $id;
        $this->tokenRow     = $tokenRow;
        $this->tokenCol     = $tokenCol;
        $this->isChampion   = $isChampion;
        $this->tokenForward = true;
        $this->isWin        = false;
    }


    /**
     * @return TokenId
     */
    public function id() : TokenId
    {
        return $this->id;
    }

    public function changeTokenBackward()
    {
        if ($this->isTokenForward()) {
            $this->tokenForward  = false;
            $this->tokenBackward = true;
        }
    }

    public function changeTokenWin()
    {
        $this->isWin = true;
    }

    /**
     * @return bool
     */
    public function isTokenForward() : bool
    {
        return $this->tokenForward;
    }

    /**
     * @return bool
     */
    public function isTokenBackward() : bool
    {
        return $this->tokenBackward;
    }

    /**
     * @return bool
     */
    public function isChampion() : bool
    {
        return $this->isChampion;
    }

    /**
     * @return boolean
     */
    public function isWin(): bool
    {
        return $this->isWin;
    }
}
