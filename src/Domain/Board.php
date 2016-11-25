<?php

declare(strict_types = 1);

namespace BoardGame\Domain;

/**
 * Interface Board
 * @package BoardGame\Domain
 */
interface Board
{
    public function all();

    /**
     * @param Token $token
     */
    public function add(Token $token);

    public function clear();

    /**
     * @param TokenId $tokenId
     * @return bool
     */
    public function exists(TokenId $tokenId) : bool;

    /**
     * @param TokenId $tokenId
     * @return Token
     */
    public function findById(TokenId $tokenId) : Token;


}
