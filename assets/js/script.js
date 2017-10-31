$(document).ready(function(){
	
	function QuesSearch(keyword,source)
	{
		
		$.ajax({
				url: "controller/fetchQues.php",
				data : {functionname:"fetchQues",keyword:keyword},
				type: "POST",
				datatype: "JSON",
				success:function(result)
				{	              
                	console.log(result);
					
					var i;
					obj= JSON.parse(result);
					if(obj['code'] == 1)
					{
						var keys = Object.keys(obj);
						$('.questions').html(''); /* For Removing the Questions */

						for(i=0; i<keys.length-1;i++)
						{
							$('.questions').append('<div  class="row panel" data-qid="'+ keys[i] +'"> Q.' + obj[keys[i]] + '</div>');
						}
					}

					else
					{
						
						if(source==1)
							relatedWordSearch(keyword);
					}



				}
					
			});
	}

	function relatedWordSearch(keyword)
	{
		var baseUrl = 'http://words.bighugelabs.com/api/2/2ad676cac16fb69db605d6d883ea77ee/'+ keyword + '/json';

		$.ajax({
			url: baseUrl,
			type: 'GET',
			datatype: 'json',
			success: function(data) {
				
				// obj = JSON.parse(data);
				// var keys = Object.keys(obj);
				// var i;
				// for(i=0; i<obj[keys[0]]['sim'].length;i++)
				// {
				// 	QuesSearch(obj[keys[0]]['sim'][i],2)
				// }
				

			},
			error: function(data) {
				
			 var keys = Object.keys(data);
				 var i;

				 if(data[keys[18]])
				 {
				 var obj = JSON.parse(data[keys[18]]);
						 
				 console.log(obj);
				 keys = Object.keys(obj)
				 console.log(obj[keys[0]]['sim']);
				 if(obj[keys[0]]['sim'].length != 'undefined')
				 {	
					 for(i=0; i<obj[keys[0]]['sim'].length;i++)
					 {
					 	QuesSearch(obj[keys[0]]['sim'][i],2)
					}
				}
				if(obj[keys[0]]['syn'].length != 'undefined')
				 {	
					 for(i=0; i<obj[keys[0]]['syn'].length;i++)
					 {
					 	QuesSearch(obj[keys[0]]['syn'][i],2)
					}
				}
			}
			
		}
		});
	}

	$('.search-go').click(function(){

		$('.questions').html('');
		var keyword = $('.search-keyword').val();
		var source = 1;
		QuesSearch(keyword,source);
		

	});	


	$('.questions').on('click','.panel',function(){

		var qid = $(this).data('qid');
		$.ajax({
			url: 'controller/fetchAns.php',
			data : {functionname:"fetchAns",qid:qid},
			type: 'POST',
			datatype: 'JSON',
			success: function(data) {
				console.log(data);
				var obj = JSON.parse(data);
				var desc = obj['description'];
				var ans = obj['answers'];
				var ques = obj['ques'];
				$('.modal-title').html(ques);
				$('.modal-body').html('Description:<br>' + desc + '<br>');
				var i;
				for(i=0;i<ans.length;i++)
				{
					$('.modal-body').append('A: ' + ans[i] + '<br>');
				}
				$('#answerModal').modal('show');
			}


		});

	});


	$('.modal-close').click(function(){

		$('#answerModal').modal('hide');
		$('.modal-title').html('');
		$('.modal-body').html('');
	});



});