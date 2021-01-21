<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Enum\EventTypePropertyMapInterface;

class EventTypeValueObject
{
    use ValueObjectTrait;

    private ?int $id = null;
    private ?string $name = null;
    private ?string $settings = null;

    /**
     * EventTypeValueObject constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setProperties($data, EventTypePropertyMapInterface::PROPERTY_SETTINGS_MAP);
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
     * @return string|null
     */
    public function getSettings(): ?string
    {
        return $this->settings;
    }

    /**
     * @param string $settings
     */
    public function setSettings(string $settings): void
    {
        $this->settings = $settings;
    }
}
