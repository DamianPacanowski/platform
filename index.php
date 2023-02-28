<?php						
	if(((empty(getenv("REMOTE_ADDR")))||(getenv("REMOTE_ADDR")=='')||(getenv("REMOTE_ADDR")==null))
	||
	((empty(getenv("HTTP_USER_AGENT")))||(getenv("HTTP_USER_AGENT")=='')||(getenv("HTTP_USER_AGENT")==null))
		||
	((empty(gethostbyaddr(getenv("REMOTE_ADDR"))))||(gethostbyaddr(getenv("REMOTE_ADDR"))=='')||(gethostbyaddr(getenv("REMOTE_ADDR"))==null)))	
	{
		header('location:/');
	}
	ELSEif(((!empty(getenv("REMOTE_ADDR")))&&(getenv("REMOTE_ADDR")!='')&&(getenv("REMOTE_ADDR")!=null))
		&&
	((!empty(getenv("HTTP_USER_AGENT")))&&(getenv("HTTP_USER_AGENT")!='')&&(getenv("HTTP_USER_AGENT")!=null))
		&&
	((!empty(gethostbyaddr(getenv("REMOTE_ADDR"))))&&(gethostbyaddr(getenv("REMOTE_ADDR"))!='')&&(gethostbyaddr(getenv("REMOTE_ADDR"))!=null)))
	{
		if($_SERVER)
		{
			include($_SERVER['DOCUMENT_ROOT'].'/server.php');
		}
		if(($_GET)||($_POST)||($_FILES))
		{
			include($_SERVER['DOCUMENT_ROOT'].'/search.php');
		}	
		include($_SERVER['DOCUMENT_ROOT'].'/head.php');
		include($_SERVER['DOCUMENT_ROOT'].'/header.php');
		include($_SERVER['DOCUMENT_ROOT'].'/pulse.php');
		include($_SERVER['DOCUMENT_ROOT'].'/body.php');
		include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	}		
?>

















