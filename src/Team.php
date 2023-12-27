<?php

declare(strict_types=1);

namespace Hockey;

use IteratorAggregate;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Expr\Cast\Object_;

final class Team implements \Countable, IteratorAggregate, \ArrayAccess
{
    public function __construct(private string $country, private array $players = [])
    {
        $this->country = $country;
        $this->players = $players;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPlayerByNumber(int $number): ?Player
    {
        foreach ($this->players as $player) {
            if ($player->getNumber() === $number) {
                return $player;
            }
        }

        return null;
    }

    public function count(): int
    {
        return count($this->players);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->players);
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->players[] = $value;
        } else {
            $this->players[$offset] = $value;
        }
    }

    public function offsetExists(mixed $offset): bool
    {
        foreach ($this->players as $player) {
            if ($player->getNumber() === $offset) {
                return true;
            }
        }
        return false;
    }

    public function offsetUnset($offset): void
    {
        foreach ($this->players as $key => $player) {
            if ($player->getNumber() === $offset) {
                unset($this->players[$key]);
                break;
            }
        }
    }

    public function offsetGet(mixed $offset)
    {
        foreach ($this->players as $player) {
            if ($player->getNumber() === $offset) {
                return $player;
            }
        }
        return null;
    }
}