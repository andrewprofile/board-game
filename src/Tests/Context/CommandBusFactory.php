<?php

declare(strict_types = 1);

namespace BoardGame\Tests\Context;

use BoardGame\Application\CommandBus;

/**
 * Interface CommandBusFactory
 * @package BoardGame\Tests\Context
 */
interface CommandBusFactory
{
    /**
     * @param array $handlers
     * @return CommandBus
     */
    public function create(array $handlers = []) : CommandBus;
}
