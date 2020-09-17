<?php
declare(strict_types=1);

namespace LarsRoettig\StorePickup\Api\Data;

use Magento\Framework\Api\ExtensionAttributesInterface;

/**
 * Represents a store and values of a store
 *
 * @api
 */
interface StoreInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    public const NAME = 'name';
    public const STREET = 'street';
    public const STREET_NUM = 'street_num';
    public const CITY = 'city';
    public const POSTCODE = 'postcode';
    public const LATITUDE = 'latitude';
    public const LONGITUDE = 'longitude';

    /**#@-*/

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getStreet(): ?string;

    public function setStreet(?string $street): void;

    public function getStreetNum(): ?int;

    public function setStreetNum(?int $streetNum): void;

    public function getCity(): ?string;

    public function setCity(?string $city): void;

    public function getPostCode(): ?int;

    public function setPostcode(?int $postCode): void;

    public function getLatitude(): ?float;

    public function setLatitude(?float $latitude): void;

    public function getLongitude(): ?float;

    public function setLongitude(?float $longitude): void;

    public function getExtensionAttributes(): ExtensionAttributesInterface;

    public function setExtensionAttributes(ExtensionAttributesInterface $extensionAttributes): void;

}
