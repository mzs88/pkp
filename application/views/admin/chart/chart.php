<?php

	$sum = 0;
	$smnj = 0;
	$smt = 0;
	$data = array();

	$pkms = $this->data->pkmsRekap();
	foreach($pkms as $rwPkms)
	{

		$a = $this->data->ukesRkpA($rwPkms->id_pkms,$bln,$thn);
		foreach($a as $rowA)
		{

			$b = $this->data->ukesRkpB($rowA->idukes_a,$rwPkms->id_pkms,$bln,$thn);
			foreach ($b as $rowB)
			{

				$sum += $rowB->program;

			}

		}

		$mnj = $this->data->mnjRekap($rwPkms->id_pkms,$bln,$thn);
		foreach($mnj as $rowMnj)
		{

			$program = $rowMnj->total * $rowMnj->bobot;
			$smnj += round(($program / count($mnj))/100,2);

		}

		$mt = $this->data->mtRekap($rwPkms->id_pkms,$bln,$thn);
		foreach($mt as $rowMt)
		{

			$rt = $rowMt->total_var * $rowMt->bobot;
			$smt = round(($rt / count($mt))/100,2);

		}
		//$json_decoded = json_decode($rwPkms);

		$tot = round($sum + $smnj + $smt);
		//$data = $rwPkms->nm_pkms;
		#echo "{pkms:".$rwPkms->nm_pkms.",tot:".$tot."}";
		$data[] = array('x'=>$rwPkms->nm_pkms, 'y'=>$tot);
		#echo json_encode($data);
		#print_r($data);
	}

	echo json_encode($data);

?>