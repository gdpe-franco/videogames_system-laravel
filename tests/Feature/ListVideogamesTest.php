<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Videogame;
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
        $rating = Rating::factory()->state(new Sequence(
            ['name' => 'Everyone'],
            ['name' => 'Everyone 10+'],
            ['name' => 'Teen'],
            ['name' => 'Mature 17+'],
        ))->create();

        $videogame = Videogame::factory()->count(4)->state(new Sequence(
            ['console' => 'Nintendo Switch'],
            ['console' => 'PlayStation 4'],
            ['console' => 'PlayStation 5'],
            ['console' => 'Xbox Series X|S'],
        ))->for($rating)->create();

            dd($videogame->toArray());

        //Acción
        $response = $this->get(route('videogames.index'));

        //Asserts
        $response->assertStatus(200);

        $response->assertViewIs('videogames.index');

        $response->assertViewHas('videogames');
        
        $response->assertSee($videogame);
    }

    
}
