<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Videogame;
use App\Models\Console;
use App\Models\Rating;
use App\Models\User;
use Tests\TestCase;

class ListVideogamesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_videogames()
    {
        //$this->withoutExceptionHandling();

        //Setup 
        $rating = Rating::factory()->create();

        $console = Console::factory()->create();

        $videogame = Videogame::factory()->count(4)->for($rating)->for($console)->create();

        $videogame->toArray();

        //Acción
        $response = $this->get(route('videogames.index'));

        //Asserts
        $response->assertStatus(200);

        $response->assertViewIs('videogames.index');

        $response->assertViewHas('videogames');
        
        //$response->assertSee($videogame->title);
    }

    
}
