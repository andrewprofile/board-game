<?php

declare(strict_types = 1);

namespace BoardGame\Tests\Context;

use BoardGame\Application\CommandBus;

/**
 * Interface Context
 * @package BoardGame\Tests\Context
 */
interface Context
{
    /**
     * @return CommandBus
     */
    public function commandBus() : CommandBus;
}