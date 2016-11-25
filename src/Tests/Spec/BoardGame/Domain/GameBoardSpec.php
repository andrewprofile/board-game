<?php

declare(strict_types = 1);

namespace Spec\BoardGame\Domain;

use BoardGame\Domain\GameBoard;
use BoardGame\Infrastructure\SessionStorage\BoardStorage;
use PhpSpec\ObjectBehavior;

/**
 * Class GameBoardSpec
 * @package Spec\BoardGame\Domain
 * @mixin GameBoard
 */
final class GameBoardSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new \DateTime(), new BoardStorage([]));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('BoardGame\Domain\GameBoard');
    }

    function it_move()
    {
        $this->incrementMove();
        $this->move()->shouldBe(1);
    }

    function it_change_end_game()
    {
        $this->changeEndGame();
        $this->isEndGame()->shouldReturn(true);
    }

    function it_check_interval_time()
    {
        $beginTime   = new \DateTime();
        $currentTime = clone $beginTime;
        $this->beConstructedWith($beginTime, new BoardStorage([]));
        $this->intervalSeconds($currentTime->modify('+61 seconds'))->shouldReturn(61);
    }
}
