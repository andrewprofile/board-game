<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

/**
 * Class CheckEndGame
 * @package BoardGame\Application\Command
 */
final class CheckEndGame implements Command
{
    use CommandSerialize;

    /**
     * @var \DateTime
     */
    private $currentTime;

    /**
     * CheckEndGame constructor.
     * @param \DateTime $currentTime
     */
    public function __construct(\DateTime $currentTime)
    {
        $this->currentTime = $currentTime;
    }

    /**
     * @return \DateTime
     */
    public function currentTime(): \DateTime
    {
        return $this->currentTime;
    }
}
