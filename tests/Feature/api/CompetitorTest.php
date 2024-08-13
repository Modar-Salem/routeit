<?php

namespace Tests\Feature\api;

use App\Http\Controllers\api\CompetitorController;
use App\Models\MobileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class CompetitorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $competition_id = 4;

        $user = MobileUser::create([
            'email' => 'wassim11111@gmail.com',
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
            ->postJson("/api/competitor/register", [
                'competition_id' => $competition_id,
            ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(['status', 'message']);
        $response->assertJson(['status' => true, 'message' => 'You have registered to this competition successfully.']);
    }

    public function test_editProjectLink(): void
    {
        $competition_id = 4;
        $projectLink = 'https://github.com/spatie/laravel-permission';

        $user = MobileUser::create([
            'email' => 'wassim111111@gmail.com',
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
            ->postJson("/api/competitor/register", [
                'competition_id' => $competition_id,
                'project_link' => $projectLink
            ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(['status', 'message']);
        $response->assertJson(['status' => true, 'message' => 'You have registered to this competition successfully.']);
    }
}
