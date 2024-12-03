<?php
namespace Acme\interfaces;

interface OfferInterface {
    public function applyOffers(array $products, float $subtotal): float;
}
