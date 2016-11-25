<?php

declare(strict_types = 1);

namespace BoardGame\Domain\Exception;

use BoardGame\Domain\TokenId;

/**
 * Class TokenNotFoundException
 * @package BoardGame\Domain\Exception
 */
class TokenNotFoundException extends \Exception
{
    /**
     * @param TokenId $tokenId
     * @return TokenNotFoundException
     */
    public static function byId(TokenId $tokenId): TokenNotFoundException
    {
        return new self(sprintf('Token with id "%s" does not exists.', (string) $tokenId));
    }
}
