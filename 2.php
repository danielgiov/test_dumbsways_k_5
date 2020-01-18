<?php


//echo $data[0][0].$data[0][0].$data[2][0]."<br>";
function quick_sort($my_array)
 {
	$loe = $gt = array();
	if(count($my_array) < 2)
	{
		return $my_array;
	}
	$pivot_key = key($my_array);
	$pivot = array_shift($my_array);
	foreach($my_array as $val)
	{
		if($val <= $pivot)
		{
			$loe[] = $val;
		}elseif ($val > $pivot)
		{
			$gt[] = $val;
		}
	}
	return array_merge(quick_sort($loe),array($pivot_key=>$pivot),quick_sort($gt));
}
 
$my_array = $data =  [ ['Keren'], ['D','W','B','T','A','S','U','M','O','Y','T','I','D'], ['Sekali'] ];
;
echo 'Original Array : '.implode(',',$my_array).'<br>';
echo 'Original Array : '.$my_array.'<br>';
$my_array = quick_sort($my_array);
echo 'Sorted Array : '.implode(',',$my_array).'<br>';
echo 'Sorted Array : '.$my_array.'<br>';
?>