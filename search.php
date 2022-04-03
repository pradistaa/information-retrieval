<?php
include 'fungsi.php';
$keyword = $_POST["keyword"];
	if ($keyword) {
	$keyword = preproses($keyword);
	print('Hasil retrieval untuk <font color=blue><b>' .
	$_POST["keyword"] . '</b></font> (<font color=blue><b>'
	. $keyword . '</b></font>) adalah <hr />');
	ambilcache($keyword);
}
 ?>