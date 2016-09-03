<?php $pokedex = json_decode(file_get_contents(resource_path('/lang/en/pokedex.json')), true);

// regex = : (-?\d+(\.\d+)?),

$new_list = [];
foreach ($pokedex as $key => $value) {
  $new_list[intval($value["Number"])] = $value;
}
return $new_list;
