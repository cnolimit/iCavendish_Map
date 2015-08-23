//collect and post key as user types
$('#search').keyup(function(){
	var searchterm = $('#search').val();

	if($('#search').val() != " " && $('#search').val() != "" ){

		//posting search term value entered by user
		$.post('search.php', {searchterm :searchterm},
			function(data)
			{
				//display the data retirved from the database
				$('#results').html(data);
			});

	}else {
		//clear div if no data available
		$('#results').html(' ');
	}

});
