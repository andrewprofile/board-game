<?php

declare(strict_types = 1);

namespace BoardGame\Application\Command;

/**
 * Class CreateToken
 * @package BoardGame\Application\Command
 */
final class CreateToken implements Command
{
    use CommandSerialize;

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var int
     */
    private $row;

    /**
     * @var int
     */
    private $col;

    /**
     * @var bool
     */
    private $champion;

    /**
     * CreateToken constructor.
     * @param string $uuid
     * @param int $row
     * @param int $col
     * @param bool $champion
     */
    public function __construct(string $uuid, int $row, int $col, bool $champion)
    {
        $this->uuid = $uuid;
        $this->row = $row;
        $this->col = $col;
        $this->champion = $champion;
    }

    /**
     * @return string
     */
    public function uuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return int
     */
    public function row(): int
    {
        return $this->row;
    }

    /**
     * @return int
     */
    public function col(): int
    {
        return $this->col;
    }

    /**
     * @return boolean
     */
    public function isChampion(): bool
    {
        return $this->champion;
    }
}
