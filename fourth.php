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

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getItems(): array
    {
        return $this->items;
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
        // Fake shipping: $10
        return 10.00;
    }
}

// Create customer + addresses
$address1 = new Address('123 Main St', null, 'New York', 'NY', '10001');
$address2 = new Address('456 Second Ave', 'Apt 2B', 'Brooklyn', 'NY', '11201');

$customer = new Customer('Jane', 'Doe');
$customer->addAddress($address1);
$customer->addAddress($address2);

// Create cart
$cart = new Cart($customer);

// Add items
$cart->addItem(new Item(1, 'T-shirt', 2, 25.00));
$cart->addItem(new Item(2, 'Shoes', 1, 80.00));
$cart->addItem(new Item(3, 'Hat', 1, 15.00));

// Set shipping address
$cart->setShippingAddress($address2);

// Console output
echo "Customer: " . $cart->getCustomer()->getFullName() . "\n";

echo "Addresses:\n";
foreach ($cart->getCustomer()->getAddresses() as $addr) {
    echo " - {$addr}\n";
}

echo "\nShipping to: " . $cart->getShippingAddress() . "\n";

echo "\nCart Items:\n";
foreach ($cart->getItems() as $item) {
    echo "- {$item->quantity} x {$item->name} @ \${$item->price} = \$" . number_format($item->getTotal(), 2) . "\n";
}

echo "\nSubtotal: $" . number_format($cart->getSubtotal(), 2) . "\n";
echo "Tax (7%): $" . number_format($cart->getTax(), 2) . "\n";
echo "Shipping: $" . number_format($cart->getShippingCost(), 2) . "\n";
echo "Total: $" . number_format($cart->getTotal(), 2) . "\n";
