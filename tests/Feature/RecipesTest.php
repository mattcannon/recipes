<?php

namespace Tests\Feature;

use App\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function should_show_no_recipes_message()
    {
        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSee('Recent Recipes')
            ->assertSee('No recent recipes');
    }

    /** @test */
    public function should_show_recent_recipes_on_homepage()
    {
        $recipes = factory(Recipe::class, 5)->create();
        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSee('Recent Recipes')
            ->assertSeeInOrder($recipes->pluck('title')->toArray())
            ->assertSeeInOrder($recipes->pluck('abstract')->toArray())
            ->assertSeeInOrder($recipes->pluck('id')->map([$this, 'toShowLink'])->toArray());
    }

    /** @test */
    public function should_show_recipe()
    {
        $this->withoutExceptionHandling();
        $md = new \Parsedown();
        $recipe = factory(Recipe::class)->create();
        $this->get(route('recipe.show', [$recipe]))
            ->assertSuccessful()
            ->assertSee($recipe->title)
            ->assertSee($md->text($recipe->abstract))
            ->assertSee($md->text($recipe->steps));
    }

    public function toShowLink($item)
    {
        return route('recipe.show', $item);
    }
}
