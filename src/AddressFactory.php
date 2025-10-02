<?php

declare(strict_types=1);

namespace Effectra\EmailAddressFormatter;

/**
 * Class Address
 *
 * Factory class for creating Address instances.
 *
 * @package Effectra\Mail\Components
 */
class AddressFactory {

    /**
     * Create a new Address instance.
     * @param string $email
     * @param string $name
     * @return AddressInterface
     */
    public static function create(string $email, string $name = ''): AddressInterface {
        return new Address($email, $name);
    }

    /**
     * Create multiple Address instances from an array of data.
     * @param array $data
     * @return AddressInterface[]
     */
    public static function createFromArray(array $data): array
    {
        $addresses = [];
        foreach ($data as $item) {
            if (is_array($item)) {
                $email = $item['email'] ?? '';
                $name = $item['name'] ?? '';
                if ($email) {
                    $addresses[] = self::create($email, $name);
                }
            } elseif (is_string($item)) {
                $addresses[] = self::create($item);
            }
        }
        return $addresses;
    }
}