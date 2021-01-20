<?php

declare(strict_types=1);

namespace App\Entity;

use App\Collection\EventCollection;
use Illuminate\Database\Eloquent\Model;

class EventEntity extends Model
{
    public const TABLE_NAME = 'events';

    protected $table = self::TABLE_NAME;

    /**
     * @param array $models
     *
     * @return EventCollection
     */
    public function newCollection(array $models = []): EventCollection
    {
        return new EventCollection($models);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->setAttribute('name', $name);
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        $this->getAttribute('type');
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->setAttribute('type', $type);
    }

    /**
     * @return string
     */
    public function getTargetDate(): string
    {
        return $this->getAttribute('target_date');
    }

    /**
     * @param string $targetDate
     */
    public function setTargetDate(string $targetDate): void
    {
        $this->setAttribute('target_date', $targetDate);
    }

    /**
     * @return bool
     */
    public function getIsDone(): bool
    {
        return $this->getAttribute('is_done');
    }

    /**
     * @param bool $isDone
     */
    public function setIsDone(bool $isDone): void
    {
        $this->setAttribute('is_done', $isDone);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->getAttribute('content');
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->setAttribute('content', $content);
    }

    /**
     * @return string
     */
    public function getNextCheckAt(): string
    {
        return $this->getAttribute('next_check_at');
    }

    /**
     * @param string $nextCheckAt
     */
    public function setNextCheckAt(string $nextCheckAt): void
    {
        $this->setAttribute('next_check_at', $nextCheckAt);
    }
}
