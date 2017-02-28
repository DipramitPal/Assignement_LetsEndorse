<?php

class QnA
	{

		private $_db;
		function __construct ($dbConn)
	      {
	        $this->_db = $dbConn;
	        
	      }

	    function getQuestion($keyword)
	    {
	    	 $prep = $this->_db->prepare("SELECT questions.id,questions.question,questions.description,answers.q_id,answers.answer FROM questions JOIN answers ON questions.id = q_id");
             $prep->execute();
             $ques = array();
             $code =-1;
             while($query=$prep->fetch(PDO::FETCH_ASSOC))
             {
             	if(array_key_exists($query['q_id'], $ques))
             		continue;
             	if (stristr($query['question'], $keyword) !== false || stristr($query['description'], $keyword) !== false || stristr($query['answer'], $keyword) !== false)
             		{
             			
             			$ques[$query['q_id']] = $query['question'];
             			if($code == -1)
             				$code = 1;
             		}
             }
            $ques['code'] = $code;
            print json_encode($ques);


	    }
	    function getAnswer($qid)
	    {
	    	$temp = $this->_db->prepare("SELECT questions.id,questions.question,questions.description,answers.q_id,answers.answer FROM questions JOIN answers ON questions.id = q_id WHERE q_id = :qid");
	    	$temp->execute(array(":qid"=>$qid));
	    	$answer = array();
	    	$answer['answers'] = array();
	    	while($query=$temp->fetch(PDO::FETCH_ASSOC))
	    	{
	    		if(!isset($answer['description']))
	    			$answer['description']=$query['description'];

	    		if(!isset($answer['ques']))
	    			$answer['ques']=$query['question'];

	    		array_push($answer['answers'], $query['answer']);
	    	}
	    	print json_encode($answer);
	    }
	
	}

?>