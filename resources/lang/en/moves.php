<?php $moves = json_decode(file_get_contents(resource_path('/lang/en/moves.json')), true);

// regex = : (-?\d+(\.\d+)?),

$new_list = [];
foreach ($moves as $key => $value) {
  $new_list[$value['Id']] = $value;
}
return $new_list;
