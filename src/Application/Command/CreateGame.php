<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

/**
 * Class CreateGame
 * @package BoardGame\Application\Command
 */
final class CreateGame implements Command
{
    use CommandSerialize;

    /**
     * @var \DateTime
     */
    private $beginTime;

    /**
     * CreateGame constructor.
     * @param \DateTime $beginTime
     */
    public function __construct(\DateTime $beginTime)
    {
        $this->beginTime = $beginTime;
    }

    /**
     * @return \DateTime
     */
    public function beginTime(): \DateTime
    {
        return $this->beginTime;
    }
}
