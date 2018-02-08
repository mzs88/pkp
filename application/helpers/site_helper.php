<?php
	if (!function_exists('monthToName'))
	{
		function monthToName($value)
		{
			$bulan = array('1' => 'Januari','2' => 'Februari','3' => 'Maret','4' => 'April','5' => 'Mei','6' => 'Juni','7' => 'Juli','8' => 'Agustus','9' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');
			return $bulan[$value];
		}
		# code...
	}

	if(!function_exists('monthToNumber'))
	{
		function monthToNumber($value)
		{
			$blnName = array('January' => '1' , 'February' => '2', 'March' => '3', 'April' => '4', 'May' => '5', 'June' => '6', 'July' => '7', 'August' => '8', 'September' => '9', 'October' => '10', 'November' => '11', 'December' => '12' );
			return $blnName[$value];
		}
	}
?>