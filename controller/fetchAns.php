<?php
require_once "../models/connect.php";

if($_POST['functionname'] == 'fetchAns')
{

	$qid = $_POST['qid'];
	$answers = $quesNans->getAnswer($qid);
	print $answers;

}

?>