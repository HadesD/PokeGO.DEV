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

        // regex = : (-?\d+(\.\d+)?),

        $new_list = [];
        foreach ($pokedex as $key => $value) {
          $value['fast_move'] = $value['Fast Attack(s)'];
          $value['charge_move'] = $value['Special Attack(s)'];
          unset($value['Fast Attack(s)'], $value['Special Attack(s)']);
          foreach ($value['fast_move'] as $fmK => $fmV) {
              if (isset($fmV['Name'])) {
                    $value['fast_move'][$fmK]['Name'] = strtoupper($fmV['Name']);
                    $value['fast_move'][$fmK]['Name'] = str_replace(' ', '_', $value['fast_move'][$fmK]['Name']);
              }
          }
          foreach ($value['charge_move'] as $cmK => $cmV) {
              if (isset($cmV['Name'])) {
                    $value['charge_move'][$cmK]['Name'] = strtoupper($cmV['Name']);
                    $value['charge_move'][$cmK]['Name'] = str_replace(' ', '_', $value['charge_move'][$cmK]['Name']);
              }
          }
          $new_list[intval($value["Number"])] = $value;
        }
        #var_dump($new_list);
        return $new_list;

    }
}
