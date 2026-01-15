# PHP Pre–8.1 Enum Pattern

# PHP Pre–8.1 Enum Pattern

This repository contains a small, production-style example of how enum-like
behaviour **can be implemented in environments running PHP versions prior to 8.1**.

When native enums are not available, enum behaviour can be achieved using
immutable value objects with private constructors, named constructors, and
explicit conversion methods. This approach allows type safety while still
supporting legacy string and integer representations.

---

## What this repository demonstrates

- An enum-like value object implemented in **PHP 7.4**
- Controlled instantiation via named constructors
- Explicit conversion from and to string and integer values
- Predicate methods for readable domain checks
- Prevention of invalid states by design

This repository is **not** a polyfill or a replacement for native enums.
It is a reference implementation of a pattern suitable for codebases that
cannot yet adopt PHP 8.1.

---

## Example usage

```php
$planType = PlanType::fromString('pro');

if ($planType->isPro()) {
    // Enable premium features
}

$code = $planType->toCode(); // 2

