<?php

namespace Tests\Feature;

use App\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function should_show_recent_recipes()
    {
        $recipes = factory(Recipe::class, 10)->create();

        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSee('Recent Recipes')
            ->assertSeeInOrder($recipes->pluck('title')->toArray())
            ->assertSeeInOrder($recipes->pluck('steps')->toArray());
    }
}
