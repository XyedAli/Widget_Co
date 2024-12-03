<?php
namespace Acme;

use Acme\interfaces\DeliveryChargeRuleInterface;

class DeliveryChargeCalculator implements DeliveryChargeRuleInterface {
    public function calculate(float $subtotal): float {
        if ($subtotal >= 90) {
            return 0;
        } elseif ($subtotal >= 50) {
            return 2.95;
        }
        return 4.95;
    }
}
