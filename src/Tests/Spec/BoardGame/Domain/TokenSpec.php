<?php

declare(strict_types = 1);

namespace Spec\BoardGame\Domain;

use BoardGame\Domain\Token;
use BoardGame\Domain\TokenId;
use PhpSpec\ObjectBehavior;

/**
 * Class TokenSpec
 * @package Spec\BoardGame\Domain
 * @mixin Token
 */
final class TokenSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(TokenId::generate(), 0, 0, false);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('BoardGame\Domain\Token');
    }

    function it_change_token_backward()
    {
        $this->changeTokenBackward();
        $this->isTokenBackward()->shouldReturn(true);
    }

    function it_change_token_win()
    {
        $this->changeTokenWin();
        $this->isWin()->shouldReturn(true);
    }
}
