<?php

use App\Http\Controller\Front\SoldItemsController;

header('Content-type: application/json; charset=UTF-8');

// foreach ($sold_i as $data) {
//   $x = 100;
//   $y = time();
// }
//
// $ret = array($x, $y);
// echo json_encode($ret);


foreach($sold_i as $row) {
  $data[] = gmdate('Y,m,d', strtotime($row['added_at']));
}
echo json_encode($data);


// $arrdata  = array();
// foreach ($sold_i as $data) {
//   array_push(
//     $arrdata, array(
//       'x'       => $data['item_quantity'],
//       'area'    => $data['added_at']
//     )
//   );
// }
// echo json_encode($arrdata);

?>