<?php
require_once "../models/connect.php";

if($_POST['functionname'] == 'fetchQues')
{

	$keyword = $_POST['keyword'];
	$questions = $quesNans->getQuestion($keyword);
	print $questions;

}

?>