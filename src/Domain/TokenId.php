<?php

declare(strict_types = 1);

namespace BoardGame\Domain;

use BoardGame\Domain\Exception\InvalidUUIDFormatException;
use Ramsey\Uuid\Uuid as UUID;

/**
 * Class TokenId
 * @package BoardGame\Domain
 */
final class TokenId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $value
     *
     * @throws InvalidUUIDFormatException
     */
    public function __construct(string $value)
    {
        $pattern = '/'.UUID::VALID_PATTERN.'/';
        if (!preg_match($pattern, $value)) {
            throw new InvalidUUIDFormatException();
        }

        $this->id = (string) $value;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->id;
    }

    /**
     * @param TokenId $tokenId
     * @return bool
     */
    public function isEqual(TokenId $tokenId) : bool
    {
        return $this->id === $tokenId->id;
    }

    /**
     * @return TokenId
     */
    public static function generate() : TokenId
    {
        return new self((string) UUID::uuid4());
    }
}
