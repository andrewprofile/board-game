<?php

declare(strict_types = 1);

namespace BoardGame\Tests\SessionStorage;

use BoardGame\Domain\GameBoard;
use BoardGame\Infrastructure\SessionStorage\BoardStorage;
use BoardGame\Infrastructure\SessionStorage\GameStorage;
use BoardGame\Tests\AbstractGameContext;
use BoardGame\Tests\Context\CommandBusFactory;

/**
 * Class SessionStorageGameContext
 * @package BoardGame\Tests\SessionStorage
 */
final class SessionStorageGameContext extends AbstractGameContext
{
    /**
     * SessionStorageGameContext constructor.
     * @param CommandBusFactory $commandBusFactory
     * @param \DateTime $beginTime
     * @param array $tokens
     */
    public function __construct(CommandBusFactory $commandBusFactory, \DateTime $beginTime, array $tokens = [])
    {
        $this->board      = new BoardStorage($tokens);
        $this->game       = new GameStorage(new GameBoard($beginTime, $this->board));
        $this->commandBus = $this->createCommandBus($commandBusFactory);
    }
}
