<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ingredient;
use App\Models\User;

class IngredientApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_fetch_all_ingredients()
    {
        $ingredients = Ingredient::factory()->count(5)->create();

        $response = $this->getJson('/api/ingredients');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    /** @test */
    public function can_fetch_a_single_ingredient()
    {
        $ingredient = Ingredient::factory()->create();

        $response = $this->getJson("/api/ingredients/{$ingredient->id}");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $ingredient->id,
                    // Add more assertions as necessary
                ]
            ]);
    }

    /** @test */
    public function can_create_an_ingredient()
    {
        $user = User::factory()->create();
        $formData = [
            'name' => $this->faker->word,
            'type' => $this->faker->word,
            'unit_of_measurement' => $this->faker->randomElement(['teaspoon', 'cup', 'gram']),
        ];

        $response = $this->actingAs($user)->postJson('/api/ingredients', $formData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('ingredients', $formData);
    }

    /** @test */
    public function can_update_an_ingredient()
    {
        $user = User::factory()->create();
        $ingredient = Ingredient::factory()->create();
        $updateData = [
            'name' => 'Updated Name',
            'type' => 'Updated Type',
            'unit_of_measurement' => 'Updated Unit',
        ];

        $response = $this->actingAs($user)->putJson("/api/ingredients/{$ingredient->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('ingredients', [
            'id' => $ingredient->id,
            ...$updateData,
        ]);
    }

    /** @test */
    public function can_delete_an_ingredient()
    {
        $user = User::factory()->create();
        $ingredient = Ingredient::factory()->create();

        $response = $this->actingAs($user)->deleteJson("/api/ingredients/{$ingredient->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('ingredients', ['id' => $ingredient->id]);
    }
}
