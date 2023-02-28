<?php
	if(($_GET)||($_POST)||($_FILES))
	{
		if($_GET)
		{
			$array[]=array($_GET);			
		}
		if($_POST)
		{
			$array[]=array($_POST);			
		}
		if($_FILES)
		{
			$array[]=array($_FILES);			
		}
		if(isset($array))
		{
			foreach($array as $no => $array2)
			{
				if(isset($array2))
				{
					foreach($array2[$no] as $element1 => $element2)
					{
						if(($element1!=null)&&($element1!='search'))
						{
							$dir1=$_SERVER['DOCUMENT_ROOT'].'/'.$element1;
							if(is_dir($dir1))
							{
								$_ARRAY[] = array($dir1);
							}
							if(file_exists($dir1.'.php'))
							{	
								include($dir1.'.php');						
							}
						}
						if($element2!=null)
						{
							$dir2=$_SERVER['DOCUMENT_ROOT'].'/'.$element2;
							if(is_dir($dir2))
							{
								$_ARRAY[] = array($dir2);
							}
							if(file_exists($dir2.'.php'))
							{
								include($dir2.'.php');
							}
						}
					}
					foreach($array2[$no] as $element1 => $element2)
					{
						if(($element1!=null)&&($element2!=null))
						{
							$dir1=$_SERVER['DOCUMENT_ROOT'].'/'.$element1.'/'.$element2;				
							$dir2=$_SERVER['DOCUMENT_ROOT'].'/'.$element2.'/'.$element1;
							if((is_dir($dir1))||(is_dir($dir2)))
							{
								if(is_dir($dir1))
								{
									$_ARRAY[] = array($dir1);
								}
								if(is_dir($dir2))
								{
									$_ARRAY[] = array($dir2);					
								}
							}
							if((file_exists($dir1.'.php'))||(file_exists($dir2.'.php')))
							{						
								if(file_exists($dir1.'.php'))
								{
									include($dir1.'.php');
								}
								if(file_exists($dir2.'.php'))
								{
									include($dir2.'.php');					
								}
							}
						}
					}	
				}
				
			}
		}		
		if(isset($_ARRAY))
		{
			foreach($_ARRAY as $_null => $_array_n)
			{
				if(isset($_array_n[$_null]))
				{
					if(is_array($_array_n[$_null]))
					{
						foreach($_array_n[$_null] as $element1 => $element2)
						{
							$dir1=$_SERVER['DOCUMENT_ROOT'].$element1.'/'.$element2;
							if(is_dir($dir1))
							{
								$ARRAY[] = array($dir1);
							}
						}
					}
					else
					{
						if(is_dir($_array_n[$_null]))
						{
							$ARRAY[] = array($_array_n[$_null]);
						}
					}
				}
			}
		}
		if((isset($_ARRAY))&&(isset($ARRAY)))
		{
			if($_ARRAY==$ARRAY)
			{
				$F=array($_ARRAY,$ARRAY);
			}
			else
			{
				if(isset($_ARRAY))
				{
					$F[]=array($_ARRAY);
				}
				if(isset($ARRAY))
				{
					$F[]=array($ARRAY);
				}
			}
		}
			
		
		
		if(isset($F))
		{			
			foreach($F as $Fn => $Fv)
			{
				foreach($F[$Fn] as $Fn2 => $Fv2)
				{
					if(is_array($Fv2[$Fn2]))
					{
						header('location:/'.str_replace($_SERVER['DOCUMENT_ROOT'].'/','',$Fv2[$Fn2][0]));
						
					}
					else
					{
						header('location:/'.str_replace($_SERVER['DOCUMENT_ROOT'].'/','',$Fv2[$Fn2]));
					}
						
				}
			}
		}
		else
		{
			header('location:/');
		}
		
	}
	
?>
