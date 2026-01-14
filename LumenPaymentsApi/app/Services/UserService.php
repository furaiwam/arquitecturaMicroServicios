<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class UserService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the User service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the User service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users.base_uri');
        $this->secret = config('services.users.secret');
    }

    /**
     * Get user details from Users Service
     * @param int $userId
     * @return string
     */
    public function getUser($userId)
    {
        return $this->performRequest('GET', "/users/{$userId}");
    }
}
