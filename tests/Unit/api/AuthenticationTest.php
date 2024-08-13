<?php

namespace Tests\Unit\api;

use Tests\TestCase;
use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;

class AuthenticationTest extends TestCase
{
    public function test_register_user_successfully()
    {
        $controller = new AuthController();

        $request = new Request([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response = $controller->register($request);

        $this->assertEquals(200, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals('User registered successfully', $responseData['message']);
    }

    public function test_login()
    {
        $controller = new AuthController();

        $request = new Request([
            'email' => 'wassim@gmail.com',
            'password' => '123456',
        ]);

        $response = $controller->login($request);

        $this->assertEquals(200, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals('User logged in successfully', $responseData['data']['message']);
    }
}
