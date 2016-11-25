<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

use BoardGame\Domain\Board;
use BoardGame\Domain\Token;
use BoardGame\Domain\TokenId;

/**
 * Class CreateTokenHandler
 * @package BoardGame\Application\Command
 */
final class CreateTokenHandler
{
    /**
     * @var Board
     */
    private $board;

    /**
     * CreateTokenHandler constructor.
     * @param Board $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    /**
     * @param CreateToken $command
     */
    public function handle(CreateToken $command)
    {
        $this->board->add(
            new Token(new TokenId($command->uuid()), $command->row(), $command->col(), $command->isChampion())
        );
    }
}
