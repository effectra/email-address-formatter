<?php

declare(strict_types=1);

namespace Effectra\EmailAddressFormatter;

/**
 * Interface AddressInterface
 *
 * Defines the contract for an email address representation.
 *
 * @package Effectra\EmailAddressFormatter
 */
interface AddressInterface
{
    /**
     * Get the name associated with the email address.
     *
     * @return string The name.
     */
    public function getName(): string;

    /**
     * Get the email address.
     *
     * @return string The email address.
     */
    public function getEmail(): string;

    /**
     * Validate the given email address.
     *
     * @param string $email The email address to validate.
     *
     * @return bool True if the email is valid, false otherwise.
     */
    public static function emailValidation(string $email): bool;

    /**
     * Get the formatted representation of the email address.
     *
     * @return string The formatted email address, including the name if available.
     */
    public function format(): string;
}