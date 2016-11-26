<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

/**
 * Class CheckToken
 * @package BoardGame\Application\Command
 */
final class CheckToken implements Command
{
    use CommandSerialize;

    /**
     * @var string
     */
    private $tokenId;

    /**
     * ForwardToken constructor.
     * @param string $tokenId
     */
    public function __construct(string $tokenId)
    {
        $this->tokenId = $tokenId;
    }

    /**
     * @return string
     */
    public function tokenId(): string
    {
        return $this->tokenId;
    }
}
