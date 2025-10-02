# Effectra Email Address Formatter

A lightweight PHP package for representing and formatting email addresses with optional names.  
It provides validation, parsing, and factory methods to work with email addresses in a clean and consistent way.

---

## Features

- Represent an email address with an optional name.
- Create an `Address` object from a raw string (e.g., `"John Doe <john@example.com>"`).
- Validate email addresses.
- Format email addresses in a standard string format.
- Create multiple `Address` instances from an array of data.
- Follows SOLID principles with `AddressInterface`.

---

## Installation

```bash
composer require effectra/email-address-formatter
````

---

## Usage

### Basic Example

```php
use Effectra\EmailAddressFormatter\Address;

$address = new Address("john@example.com", "John Doe");

echo $address->getEmail(); // john@example.com
echo $address->getName();  // John Doe
echo $address->format();   // John Doe <john@example.com>
```

### Create from String

```php
use Effectra\EmailAddressFormatter\Address;

$address = Address::createFrom("Jane Doe <jane@example.com>");

echo $address->getEmail(); // jane@example.com
echo $address->getName();  // Jane Doe
```

### Using AddressFactory

```php
use Effectra\EmailAddressFormatter\AddressFactory;

// Single address
$address = AddressFactory::create("mike@example.com", "Mike");

// Multiple addresses
$addresses = AddressFactory::createFromArray([
    "susan@example.com",
    ["email" => "david@example.com", "name" => "David"],
    ["email" => "emma@example.com"] // name is optional
]);

foreach ($addresses as $addr) {
    echo $addr->format() . PHP_EOL;
}
// Output:
// susan@example.com <susan@example.com>
// David <david@example.com>
// emma@example.com <emma@example.com>
```

### Validation

```php
use Effectra\EmailAddressFormatter\Address;

if (Address::emailValidation("valid@example.com")) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}
```

---

## API Reference

### `Address` class

* `__construct(string $email, string $name = '')`
* `static createFrom(string $addressText): static`
* `getName(): string`
* `getEmail(): string`
* `static emailValidation(string $email): bool`
* `format(): string`
* `__toString(): string`

### `AddressFactory` class

* `static create(string $email, string $name = ''): AddressInterface`
* `static createFromArray(array $data): AddressInterface[]`

### `AddressInterface`

* `getName(): string`
* `getEmail(): string`
* `static emailValidation(string $email): bool`
* `format(): string`

---

## Example Output

```php
$address = new Address("alex@example.com", "Alex");

echo $address; 
// Output: Alex <alex@example.com>
```

---

## License

This package is open-source and available under the **MIT License**.
