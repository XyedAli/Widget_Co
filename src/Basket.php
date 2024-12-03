<?php
namespace Acme;

use Acme\interfaces\DeliveryChargeRuleInterface;
use Acme\interfaces\OfferInterface;

class Basket {
    private array $products = [];
    private array $catalogue;
    private DeliveryChargeRuleInterface $deliveryChargeCalculator;
    private OfferInterface $offerCalculator;

    public function __construct(
        array $catalogue,
        DeliveryChargeRuleInterface $deliveryChargeCalculator,
        OfferInterface $offerCalculator
    ) {
        $this->catalogue = $catalogue;
        $this->deliveryChargeCalculator = $deliveryChargeCalculator;
        $this->offerCalculator = $offerCalculator;
    }

    public function add(string $productCode): void {
        if (!isset($this->catalogue[$productCode])) {
            throw new \InvalidArgumentException("Invalid product code: $productCode");
        }
        $this->products[] = $this->catalogue[$productCode];
    }

    public function total(): float {
        $subtotal = array_reduce($this->products, fn($sum, $product) => $sum + $product->price, 0);
        $subtotal = $this->offerCalculator->applyOffers($this->products, $subtotal);
        $deliveryCharge = $this->deliveryChargeCalculator->calculate($subtotal);
        return $subtotal + $deliveryCharge;
    }
}
