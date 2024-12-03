<?php
namespace Acme\interfaces;

interface DeliveryChargeRuleInterface {
    public function calculate(float $subtotal): float;
}
