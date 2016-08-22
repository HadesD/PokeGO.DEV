<?php $pokedex = json_decode(file_get_contents(resource_path('/lang/en/pokedex.json')), true);

// regex = : (-?\d+(\.\d+)?),

$new_list = [];
foreach ($pokedex['pokemon'] as $key => $value) {
  $new_list[$value['id']] = $value;
}
return $new_list;
