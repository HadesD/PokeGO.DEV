<?php

namespace App\Http\Controllers\PkmGoApi\Kernels;

use NicklasW\PkmGoApi\Kernels\ApplicationKernel as APIApplicationKernel;

class ApplicationKernel extends APIApplicationKernel {

  public function getPokeBank() {
    return $this->pokeBank;
  }


}
