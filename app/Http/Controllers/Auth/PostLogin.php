<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class PostLogin extends Controller {

  public function login(Request $request) {

    App::setLocale('en');

    $config = new Config();

    $accept_Provider = [
      'google',
      'ptc'
    ];
    if (!in_array($request['Factory'], $accept_Provider)) {
      abort(403);
    }
    $config->setProvider($request['Factory']);//google | ptc
    $config->setUser($request['username']);
    $config->setPassword($request['password']);
    // Create the authentication manager
    $manager = Factory::create($config);
    // Initialize the pokemon go application
    $application = new ApplicationKernel($manager);
    // Retrieve the pokemon go api instance
    $pokemonGoApi = $application->getPokemonGoApi();
    // Retrieve the profile
    $profile = $pokemonGoApi->getInventory();

    $pokemonData = $profile->getPokeBank()->getPokemons();
    // foreach ($pokemonData as $key => $value) {
    //   var_dump($value);
    // }
    return view('ivs.index',[
      'pokemonData' => $pokemonData,
    ]);
  }
}
