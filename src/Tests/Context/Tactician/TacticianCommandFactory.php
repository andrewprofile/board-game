<?php

declare(strict_types = 1);

namespace BoardGame\Tests\Context\Tactician;

use BoardGame\Infrastructure\Tactician\CommandBus;
use BoardGame\Tests\Context\CommandBusFactory;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\CommandBus as TacticianCommandBus;

/**
 * Class TacticianCommandFactory
 * @package BoardGame\Tests\Context\Tactician
 */
final class TacticianCommandFactory implements CommandBusFactory
{
    /**
     * @param array $handlers
     * @return \BoardGame\Application\CommandBus
     */
    public function create(array $handlers = []) : \BoardGame\Application\CommandBus
    {
        $commandHandlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new InMemoryLocator($handlers),
            new HandleInflector()
        );

        return new CommandBus(new TacticianCommandBus([
            $commandHandlerMiddleware
        ]));
    }
}
