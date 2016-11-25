<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

/**
 * Class ResetGameHandler
 * @package BoardGame\Application\Command
 */
final class ResetGameHandler
{
    /**
     * @param ResetGame $command
     */
    public function handle(ResetGame $command)
    {
        $command->board()->clear();
        $command->game()->clear();
    }
}
