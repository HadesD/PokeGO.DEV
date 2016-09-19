<?php
$moves = json_decode(file_get_contents(resource_path('lang/en/moves.json')), true);
$moveRate = json_decode(file_get_contents(resource_path('lang/en/movesRate.json')), true);
// regex = : (-?\d+(\.\d+)?),
//
$newMovesRateList = [];
foreach ($moveRate as $rateK => $rateV) {
  $rateK = str_replace([' ', '-'], '_', $rateK);
  $newMovesRateList[$rateK] = $rateV;
}

$newMoveList = [];
foreach ($moves as $moveK => $moveV) {
  $moveV['VfxName'] = str_replace('_fast', '', $moveV['VfxName']);
  $moveV['Name'] = str_replace('_FAST', '', $moveV['Name']);
  if (isset($newMovesRateList[strtoupper($moveV['Name'])])) {
    $moveV['DPS'] = $newMovesRateList[strtoupper($moveV['Name'])]['DPS'];
  }
  $newMoveList[$moveV['Name']] = $newMoveList[$moveV['Id']] = $moveV;
}
return $newMoveList;
