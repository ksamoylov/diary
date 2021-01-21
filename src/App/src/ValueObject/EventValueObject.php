<?php

declare(strict_types=1);

namespace App\ValueObject;

class EventValueObject
{
    use ValueObjectTrait;

    private const PROPERTY_SETTINGS_MAP = [
        'id' => 'setId',
        'name' => 'setName',
        'type' => 'setType',
        'target_date' => 'setTargetDate',
        'is_done' => 'setIsDone',
        'content' => 'setContent',
        'next_check_at' => 'setNextCheckAt',
    ];

    private ?int $id;
    private ?string $name;
    private ?int $type;
    private ?string $targetDate;
    private ?bool $isDone;
    private ?string $content;
    private ?string $nextCheckAt;

    /**
     * EventValueObject constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setProperties($data, self::PROPERTY_SETTINGS_MAP);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getTargetDate(): ?string
    {
        return $this->targetDate;
    }

    /**
     * @param string $targetDate
     */
    public function setTargetDate(string $targetDate): void
    {
        $this->targetDate = $targetDate;
    }

    /**
     * @return bool|null
     */
    public function getIsDone(): ?bool
    {
        return $this->isDone;
    }

    /**
     * @param bool $isDone
     */
    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getNextCheckAt(): ?string
    {
        return $this->nextCheckAt;
    }

    /**
     * @param string $nextCheckAt
     */
    public function setNextCheckAt(string $nextCheckAt): void
    {
        $this->nextCheckAt = $nextCheckAt;
    }
}
