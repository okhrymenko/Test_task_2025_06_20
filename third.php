<?php

class Address
{
    public string $line1;
    public ?string $line2;
    public string $city;
    public string $state;
    public string $zip;

    public function __construct(string $line1, ?string $line2, string $city, string $state, string $zip)
    {
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }

    public function __toString(): string
    {
        return "{$this->line1} " . ($this->line2 ? "{$this->line2} " : "") .
               "{$this->city}, {$this->state} {$this->zip}";
    }
}

class Customer
{
    public string $firstName;
    public string $lastName;
    /** @var Address[] */
    public array $addresses = [];

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function addAddress(Address $address): void
    {
        $this->addresses[] = $address;
    }

    public function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function getAddresses(): array
    {
        return $this->addresses;
    }
}

class Item
{
    public int $id;
    public string $name;
    public int $quantity;
    public float $price;

    public function __construct(int $id, string $name, int $quantity, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getTotal(): float
    {
        return $this->quantity * $this->price;
    }
}

class Cart
{
    private Customer $customer;
    /** @var Item[] */
    private array $items = [];
    private Address $shippingAddress;

    const TAX_RATE = 0.07; // 7%

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function setShippingAddress(Address $address): void
    {
        $this->shippingAddress = $address;
    }

    public function getSubtotal(): float
    {
        $subtotal = 0;
        foreach ($this->items as $item) {
            $subtotal += $item->getTotal();
        }
        return $subtotal;
    }

    public function getTax(): float
    {
        return $this->getSubtotal() * self::TAX_RATE;
    }

    public function getShippingCost(): float
    {
        return ShippingService::getRate($this->shippingAddress);
    }

    public function getTotal(): float
    {
        return $this->getSubtotal() + $this->getTax() + $this->getShippingCost();
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }
}

class ShippingService
{
    public static function getRate(Address $address): float
    {
        // Fake: always $10 shipping
        return 10.00;
    }
}

echo "\nSubtotal: $" . number_format($cart->getSubtotal(), 2) . "\n";
echo "Tax (7%): $" . number_format($cart->getTax(), 2) . "\n";
echo "Shipping: $" . number_format($cart->getShippingCost(), 2) . "\n";
echo "Total: $" . number_format($cart->getTotal(), 2) . "\n";

/*
########################################## Console Output ####################################################
Customer: Alice Smith
Addresses:
 - 123 Main St New York, NY 10001
 - 987 Second Ave Apt 5B New York, NY 10002

Shipping to: 123 Main St New York, NY 10001

Cart Items:
- 3 x Book @ $12 = $36.00
- 1 x Laptop @ $950 = $950.00

Subtotal: $986.00
Tax (7%): $69.02
Shipping: $10.00
Total: $1065.02
*/
    
