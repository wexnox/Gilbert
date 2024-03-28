<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Recipe;

class RecipeApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_create_a_recipe()
    {
        $user = User::factory()->create();
        $formData = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'preparation_steps' => $this->faker->paragraph,
            'serving_size' => $this->faker->randomDigitNotZero(),
            'cooking_time' => $this->faker->numberBetween(10, 60)
        ];

        $response = $this->actingAs($user)->postJson('/api/recipes', $formData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('recipes', [
            'title' => $formData['title'],
            'description' => $formData['description'],
            // Validate other fields as necessary
        ]);
    }

    /** @test */
    public function can_update_a_recipe()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();
        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            // Add other fields to update as necessary
        ];

        $response = $this->actingAs($user)->putJson("/api/recipes/{$recipe->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'title' => $updateData['title'],
            'description' => $updateData['description'],
            // Validate other updated fields as necessary
        ]);
    }

    /** @test */
    public function can_delete_a_recipe()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();

        $response = $this->actingAs($user)->deleteJson("/api/recipes/{$recipe->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('recipes', ['id' => $recipe->id]);
    }
}
