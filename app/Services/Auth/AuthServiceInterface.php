<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    /**
     * Login.
     *
     * @param array $credentials
     * @param $device
     * @return array
     */
    public function login(array $credentials, $device): array;

    /**
     * Inherited document
     *
     * @return void
     */
    public function logout(): void;
}
