<?php

declare(strict_types = 1);

namespace BoardGame\Tests;

use BoardGame\Application\Command\BackwardToken;
use BoardGame\Application\Command\BackwardTokenHandler;
use BoardGame\Application\Command\CheckEndGame;
use BoardGame\Application\Command\CheckEndGameHandler;
use BoardGame\Application\Command\CheckToken;
use BoardGame\Application\Command\CheckTokenHandler;
use BoardGame\Application\Command\CreateGame;
use BoardGame\Application\Command\CreateGameHandler;
use BoardGame\Application\Command\CreateToken;
use BoardGame\Application\Command\CreateTokenHandler;
use BoardGame\Application\Command\ResetGame;
use BoardGame\Application\Command\ResetGameHandler;
use BoardGame\Application\CommandBus;
use BoardGame\Domain\Board;
use BoardGame\Domain\Game;
use BoardGame\Domain\TokenId;
use BoardGame\Tests\Context\CommandBusFactory;

/**
 * Class AbstractGameContext
 * @package BoardGame\Tests
 */
abstract class AbstractGameContext implements GameContext
{
    /**
     * @var Board
     */
    protected $board;

    /**
     * @var Game
     */
    protected $game;

    /**
     * @var CommandBus
     */
    protected $commandBus;

    /**
     * @return CommandBus
     */
    public function commandBus() : CommandBus
    {
        return $this->commandBus;
    }

    /**
     * @return Board
     */
    public function board(): Board
    {
        return $this->board;
    }

    /**
     * @return Game
     */
    public function game(): Game
    {
        return $this->game;
    }

    /**
     * @param string $tokenId
     */
    public function backwardToken(string $tokenId)
    {
        $command = new BackwardToken($tokenId);

        $this->commandBus->handle($command);
    }

    /**
     * @param string $tokenId
     * @return void
     */
    public function checkToken(string $tokenId)
    {
        $command = new CheckToken($tokenId);

        $this->commandBus->handle($command);
    }

    /**
     * @param \DateTime $beginTime
     * @return void
     */
    public function createGame(\DateTime $beginTime)
    {
        $tokenNumber = 0;
        $championNumber = mt_rand(0,19);
        for ($row = 0; $row < 5; $row++) {
            for($col = 0; $col < 4; $col++)
            {
                $tokenId = TokenId::generate();
                if ($championNumber === $tokenNumber) {
                    $this->createToken((string) $tokenId, $row, $col, true);
                } else {
                    $this->createToken((string) $tokenId, $row, $col, false);
                }

                $tokenNumber++;
            }
        }

        $command = new CreateGame($beginTime);

        $this->commandBus->handle($command);
    }

    /**
     * @param string $tokenId
     * @param int $row
     * @param int $col
     * @param bool $champion
     * @return void
     */
    public function createToken(string $tokenId, int $row, int $col, bool $champion)
    {
        $command = new CreateToken((string) $tokenId, $row, $col, $champion);

        $this->commandBus->handle($command);
    }

    public function resetGame()
    {
        $command = new ResetGame($this->game(), $this->board());
        $this->commandBus->handle($command);
    }

    /**
     * @param CommandBusFactory $commandBusFactory
     * @return CommandBus
     */
    protected function createCommandBus(CommandBusFactory $commandBusFactory) : CommandBus
    {
        return $commandBusFactory->create(
            [
                BackwardToken::class => new BackwardTokenHandler($this->game()),
                CheckEndGame::class  => new CheckEndGameHandler($this->game()),
                CheckToken::class    => new CheckTokenHandler($this->game()),
                CreateGame::class    => new CreateGameHandler($this->game(), $this->board()),
                CreateToken::class   => new CreateTokenHandler($this->board()),
                ResetGame::class     => new ResetGameHandler(),
            ]
        );
    }
}
