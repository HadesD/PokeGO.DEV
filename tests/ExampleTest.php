<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $pokedex = json_decode(file_get_contents(resource_path('/lang/en/pokedex.json')), true);
        // regex = :(-?\d+(\.\d+)?),

        $new_list = [];
        foreach ($pokedex['pokemon'] as $key => $value) {
          $new_list[$value['id']] = $value;
          break;
        }

        var_dump($new_list) ;
    }
}
