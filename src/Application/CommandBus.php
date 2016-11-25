<?php

declare(strict_types = 1);

namespace BoardGame\Application;

use BoardGame\Application\Command\Command;

/**
 * Interface CommandBus
 * @package BoardGame\Application
 */
interface CommandBus
{
    /**
     * @param Command $command
     */
    public function handle(Command $command);
}