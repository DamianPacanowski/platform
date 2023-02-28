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
			<div style="font-size:33px;">
				<?php echo strtoupper(str_replace('/','  ',$_SERVER['REQUEST_URI']));?>
			</div>
		</div>
	</a>
	<div style="position:fixed;top:76px;left:20%;">
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
						'<style>
							.menu'.$no.'
							{
								display:inline-block;
								font-size:66px;								
								animation-name: slide_menu'.$no.';
								animation-duration: '.$no.'s;
								animation-timing-function: ease-out;
								margin-right:30px;
								margin-top:30px;
							}
							@keyframes slide_menu'.$no.' 
							{
								from 
								{
									position:fixed;
									top:-150%;
								}
								to 
								{
									top:151%;
								}
							}
						</style>
						<a href="'.$_SERVER['REQUEST_URI'].''.$hlink.'">
							<div class="menu'.$no.'">
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
</header>


