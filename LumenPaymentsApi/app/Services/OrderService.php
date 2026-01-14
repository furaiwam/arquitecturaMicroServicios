<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class OrderService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Order service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Order service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.orders.base_uri');
        $this->secret = config('services.orders.secret');
    }

    /**
     * Get order details from Orders Service
     * @param int $orderId
     * @return string
     */
    public function getOrder($orderId)
    {
        return $this->performRequest('GET', "/orders/{$orderId}");
    }
}
