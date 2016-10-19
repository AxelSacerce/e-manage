<?php


header('Content-type: application/json; charset=UTF-8');

// foreach ($sold_i as $data) {
//   $x = 100;
//   $y = time();
// }
//
// $ret = array($x, $y);
// echo json_encode($ret);


foreach ($sold_i as $row) {
    $qty = $row['item_quantity'];
    $datetime = $row['added_at'];
    $added_at = strtotime($datetime) * 1000;
    $data[] = [$added_at, $qty];
}
echo json_encode($data, JSON_NUMERIC_CHECK);


// $arrdata  = array();
// foreach ($sold_i as $data) {
//   array_push(
//     $arrdata, array(
//       'x'       => $data['item_quantity'],
//       'area'    => $data['added_at']
//     )
//   );
// }
// echo json_encode($arrdata);;
