<?php

 $data =  [ ['Keren'], ['D','W','B','T','A','S','U','D','M','O','Y','T','I','D'], ['Sekali'] ];

 echo $data[1][0].$data[1][6].$data[1][8].$data[1][1].$data[1][4].$data[1][10].$data[1][5].$data[1][7].$data[1][9].$data[1][11].$data[1][12].$data[1][13]." ".$data[0][0]." ".$data[2][0];

// function quick_sort($my_array)
//  {
// 	$loe = $gt = array();
// 	if(count($my_array) < 2)
// 	{
// 		return $my_array;
// 	}
// 	$pivot_key = key($my_array);
// 	$pivot = array_shift($my_array);
// 	foreach($my_array as $val)
// 	{
// 		if($val <= $pivot)
// 		{
// 			$loe[] = $val;
// 		}elseif ($val > $pivot)
// 		{
// 			$gt[] = $val;
// 		}
// 	}
// 	return array_merge(quick_sort($loe),array($pivot_key=>$pivot),quick_sort($gt));
// }
 
// $my_array = array(3, 0, 2, 5, -1, 4, 1);
// echo 'Original Array : '.implode(',',$my_array).'<br>';
// $my_array = quick_sort($my_array);
// echo 'Sorted Array : '.implode(',',$my_array);

?>