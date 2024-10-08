<?php

namespace Tests\Feature\api;

use App\Models\MobileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserFollowedExpertTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_followExpert(): void
    {
        $expert_id = 1;

        $user = MobileUser::create([
            'email' => 'wassim44@gmail.com',
            'password' => '123456',
            'name' => 'wassim',
            'image' => 'https://th.bing.com/th/id/OIP.v36XBUcQei_95GjMzpAGRgHaLH?w=181&h=272&c=7&r=0&o=5&dpr=1.4&pid=1.7',
            'birth_date' => '1880-01-20',
            'it_student' => true,
            'university' => 'Damascuse University',
            'bio' => 'No bio needed',
            'verify' => true,
            'completed' => true
        ]);

        $response = $this->actingAs($user, 'sanctum')
            ->postJson("/api/followExpert", [
                'expert_id' => $expert_id
            ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(['status', 'message']);
        $response->assertJson(['status' => 'success', 'message' => 'You have followed this expert successfully.']);
    }
}
