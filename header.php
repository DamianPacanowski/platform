<?php	
	if($_SERVER['REQUEST_URI']=='/')
	{
		$dir='../'.$_SERVER['SERVER_NAME'];
	}
	else
	{
		$dir='..'.$_SERVER['REQUEST_URI'];
	}
	if(is_dir($dir))
	{
		$scandir=scandir($dir);
		foreach($scandir as $_dir)
		{
			if(is_dir($dir.'/'.$_dir))
			{
				$array_hlinks[]=array($_dir);
			}
		}
	}
	else
	{
		$explode_uri=explode('/',$_SERVER['REQUEST_URI']);		
		foreach($explode_uri as $uri)
		{
			if($uri!='')
			{
				$dir='../'.$uri;
			}
		}		
		if(is_dir($dir))
		{
			$scandir=scandir($dir);
			foreach($scandir as $_dir)
			{
				if(is_dir($dir.'/'.$_dir))
				{
					$array_hlinks[]=array($_dir);
				}
			}
		}
	}	
?>
<header>
	<a href="/">
		<div class="icon">
			<div>
				<?php echo str_replace('.pl','',$_SERVER['SERVER_NAME']);?>
			</div>
		</div>
	</a>	
	<a href="<?php echo$_SERVER['REQUEST_URI'];?>">
		<div class="menu">
			<div>
				<?php echo strtoupper(str_replace('/',' ',$_SERVER['REQUEST_URI']));?>
			</div>
		</div>
	</a>
<?php
	if(isset($array_hlinks))
	{
		foreach($array_hlinks as $no =>$null)
		{
			foreach($array_hlinks[$no] as $hlink)
			{
				if(strpos($hlink,'.')===false)
				{
					echo
						'<a href="'.$_SERVER['REQUEST_URI'].$hlink.'">
							<div class="menu">
								<div>
									'.$hlink.'
								</div>
							</div>
						</a>'
					;
				}
			}
		}
	}
?>
<div class="search">
	<form>
		<input type="text" name="search" placeholder="... .. .">
		<input type="submit" value="szukaj">
	</form>
</div>
</header>
