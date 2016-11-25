<?php

declare(strict_types = 1);

namespace BoardGame\Infrastructure\SessionStorage;

use BoardGame\Domain\Board;
use BoardGame\Domain\Exception\TokenNotFoundException;
use BoardGame\Domain\Token;
use BoardGame\Domain\TokenId;

/**
 * Class BoardStorage
 * @package BoardGame\Infrastructure\SessionStorage
 */
final class BoardStorage implements Board
{
    /**
     * BoardStorage constructor.
     * @param array $tokens
     */
    public function __construct(array $tokens = [])
    {
        if (!isset($_SESSION['board'])) {
            $_SESSION['board'] = [];
        }

        foreach ($tokens as $token) {
            $this->add($token);
        }
    }

    /**
     * @return array|null
     */
    public function all()
    {
        return isset($_SESSION['board']) ? $_SESSION['board'] : null;
    }

    /**
     * @param Token $token
     */
    public function add(Token $token)
    {
        $_SESSION['board'][(string) $token->id()] = $token;
    }

    public function clear()
    {
        unset($_SESSION['board']);
    }

    /**
     * @param TokenId $tokenId
     * @return bool
     */
    public function exists(TokenId $tokenId): bool
    {
        return array_key_exists((string) $tokenId, $_SESSION['board']);
    }

    /**
     * @param TokenId $tokenId
     * @return Token
     * @throws TokenNotFoundException
     */
    public function findById(TokenId $tokenId): Token
    {
        if (!$this->exists($tokenId)) {
            throw TokenNotFoundException::byId($tokenId);
        }

        return $_SESSION['board'][(string) $tokenId];
    }
}
