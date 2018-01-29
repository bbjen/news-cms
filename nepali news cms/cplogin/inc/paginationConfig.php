<?php
		$perpage = 50;
		$total = count($list);
		$totalpages = ceil($total/$perpage);
		
		if($totalpages > 1)
			{
			
			$dopagination = true;
			
			if(isset($_GET['pg']) && intval($_GET['pg'])!=0)
				{
				$page = intval($_GET['pg']);
				if($page > $totalpages)
					{
					$sn = 0;
					$page = 1;
					}
				elseif($page < 1)
					{
					$sn = 0;
					$page = 1;
					}
				else
					$sn = ($page-1)*$perpage;
				}
			else
				{
				$page = 1;
				$sn = 0;
				}
			}
		else
			$dopagination = false;
?>