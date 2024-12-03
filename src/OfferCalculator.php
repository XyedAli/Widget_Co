<?php
namespace Acme;

use Acme\interfaces\OfferInterface;

class OfferCalculator implements OfferInterface {
    public function applyOffers(array $products, float $subtotal): float {
        $redWidgetCount = count(array_filter($products, fn($product) => $product->code === 'R01'));
        if ($redWidgetCount > 1) {
            $discount = floor($redWidgetCount / 2) * 32.95 * 0.5; // Buy one, get one half-price
            $subtotal -= $discount;
        }
        return $subtotal;
    }
}
