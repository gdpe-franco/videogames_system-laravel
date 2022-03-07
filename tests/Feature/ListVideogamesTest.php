<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Videogame;
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
        $this->withoutExceptionHandling();

        
        $response = $this->get(route('videogames.index'));

        $response->assertStatus(200);

        $response->assertViewIs('videogames.index');

        $response->assertViewHas('videogames');
        
        //$response->assertSee($videogame->title);
    }

    
}
