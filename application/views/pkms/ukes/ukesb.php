<?php $ukesb = $this->loadukes->mdlAnaA($id, $pkms, $date) ?>
<?php foreach($ukesb as $rowB) :?>
	<td><?=$rowB->ukes_a?></td>
	<td>$rowB->ukes_b</td>
	<td>$rowB->ukes_b</td>
	<td>$rowB->ukes_b</td>
<?php endforeach ?>
