<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

/**
 * Class BackwardToken
 * @package BoardGame\Application\Command
 */
final class BackwardToken implements Command
{
    use CommandSerialize;

    /**
     * @var string
     */
    private $tokenId;

    /**
     * TurnToken constructor.
     * @param string $tokenId
     */
    public function __construct($tokenId)
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
