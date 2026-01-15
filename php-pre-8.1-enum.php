<?php

declare(strict_types=1);

/**
 * Pre–PHP 8.1 compatible enum-like value object for plan types.
 */
final class PlanType
{
    public const FREE = 1;

    public const PRO = 2;

    /**
     * The legacy integer code for this plan type.
     */
    private int $value;

    /**
     * Private constructor to force use of named constructors.
     */
    private function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * Create a FREE plan type instance.
     */
    public static function free(): self
    {
        return new self(self::FREE);
    }

    /**
     * Create a PRO plan type instance.
     */
    public static function pro(): self
    {
        return new self(self::PRO);
    }

    /**
     * Determine whether this plan type represents a free plan.
     *
     * @return bool True if the plan type is FREE.
     */
    public function isFree(): bool
    {
        return $this->value === self::FREE;
    }

    /**
     * Determine whether this plan type represents a pro plan.
     *
     * @return bool True if the plan type is PRO.
     */
    public function isPro(): bool
    {
        return $this->value === self::PRO;
    }

    /**
     * Create a plan type instance from a string.
     *
     * The comparison is case-insensitive.
     *
     * @param  string  $planType  The string plan type (e.g. "FREE", "PRO").
     *
     * @throws \InvalidArgumentException If the string does not map to a valid plan type.
     */
    public static function fromString(string $planType): self
    {
        $planType = strtoupper($planType);

        switch ($planType) {
            case 'FREE':
                return new self(self::FREE);

            case 'PRO':
                return new self(self::PRO);

            default:
                throw new \InvalidArgumentException("Invalid plan type: $planType");
        }
    }

    /**
     * Create a plan type instance from the integer-based plan type code.
     *
     * @param  int  $planTypeCode  The legacy integer plan type code.
     *
     * @throws \InvalidArgumentException If the code does not map to a valid plan type.
     */
    public static function fromCode(int $planTypeCode): self
    {
        switch ($planTypeCode) {
            case self::FREE:
                return new self(self::FREE);

            case self::PRO:
                return new self(self::PRO);

            default:
                throw new \InvalidArgumentException("Invalid plan type code: $planTypeCode");
        }
    }

    /**
     * Return the integer-based plan type code for this instance.
     */
    public function toCode(): int
    {
        return $this->value;
    }

    /**
     * Return the string name for this plan type (e.g. "FREE").
     *
     *
     * @throws \LogicException
     */
    public function name(): string
    {
        switch ($this->value) {
            case self::FREE:
                return 'FREE';

            case self::PRO:
                return 'PRO';

            default:
                throw new \LogicException("Unknown plan type value: {$this->value}");
        }
    }
}
