<?php
	if($_SERVER['REQUEST_URI']=='/')
	{
		$body=
			''		
		;
	}
	else
	{
		$body_file_url='body.php';
		if(file_exists($body_file_url))
		{
			include($body_file_url);
		}
	}
	if(isset($body))
	{
		echo$body;
	}
	
?>

