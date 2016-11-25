<?php

declare(strict_types = 1);

namespace BoardGame\Infrastructure\Tactician;

use BoardGame\Application\Command\Command;
use League\Tactician\CommandBus as TacticianCommandBus;

/**
 * Class CommandBus
 * @package BoardGame\Infrastructure\Tactician
 */
final class CommandBus implements \BoardGame\Application\CommandBus
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * CommandBus constructor.
     *
     * @param TacticianCommandBus $commandBus
     */
    public function __construct(TacticianCommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Command $command
     */
    public function handle(Command $command)
    {
        $this->commandBus->handle($command);
    }
}
