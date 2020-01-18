<?php

function cetak_gambar($val)
{
	$rslt= "";
	if(($val%2) == 0)
	{
		for($i = 1;$i <= $val;$i++){
			for($x= 1;$x<= $val;$x++){
				if($i == 1 || $i == $val)
				{
					$rslt .=' + ';
				}
				else
				{
					if(($x%3) <> 0)
					{
						$rslt .=' = ';
					}
					else
					{
						$rslt .=' + ';
					}
				}
			}
			$rslt .='<br>';
		}
	}
	else
	{
		$rslt .='Parameter harus bilangan genap';
	}
	return $rslt;
}

echo cetak_gambar(8);
?>