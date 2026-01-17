# PHP Pre–8.1 Enum Pattern

This repository contains a small, production-style example of how enum-like
behaviour **can be implemented in environments running PHP versions prior to 8.1**.

---
## Purpose

A simple enum-like value object that works in PHP versions prior to 8.1

Using named constructors to control how instances are created

Converting cleanly between strings, integers, and a domain value

Small helper methods for readable checks in calling code

Keeping invalid states out of the system by design

This isn’t a polyfill or a drop-in replacement for native enums.
It’s a small reference example of an approach you can use in codebases that aren’t yet on PHP 8.1.
This repository is **not** a polyfill or a replacement for native enums.
It is a reference implementation of a pattern suitable for codebases that
cannot yet use PHP 8.1.

---

## Example usage

```php
$planType = PlanType::fromString('pro');

if ($planType->isPro()) {
    // Enable premium features
}

$code = $planType->toCode(); // 2


**Note**  
This example uses simple `free` / `pro` values for clarity.  
In a real codebase you would adapt the allowed values, constructors, and helpers to match your own domain concepts.


