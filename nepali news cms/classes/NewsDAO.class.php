<?php
class NewsDAO extends BaseDAO
	{
	
	function __construct()
		{
		
		}
		
	function insert($vo)
		{
		$this->sql = "INSERT INTO tbl_news VALUES('','$vo->title_en','$vo->brief_description_en','$vo->detail_description_en','$vo->title_de','$vo->brief_description_de','$vo->detail_description_de','$vo->publish','$vo->home_display','$vo->disp_order','$vo->posted_date','$vo->updated_date')";
		return $this->exec();		
		}
		
	function fetchAll($publish="all")
		{
		if($publish == "onlypublished")
			$this->sql = "SELECT * FROM tbl_news WHERE publish = 'yes' ORDER BY posted_date DESC";
		else
			$this->sql = "SELECT * FROM tbl_news ORDER BY posted_date DESC";
		
		$this->exec();//stores result in $this->result
		
		$list = array();
		if($this->result)
			{
				while($rows = $this->fetch())
					{
					$vo = new NewsVO();
					$vo->id = $rows['id'];
					$vo->title_en = $rows['title_en'];
					$vo->brief_description_en = $rows['brief_description_en'];
					$vo->detail_description_en = $rows['detail_description_en'];
					$vo->title_de = $rows['title_de'];
					$vo->brief_description_de = $rows['brief_description_de'];
					$vo->detail_description_de = $rows['detail_description_de'];
					$vo->publish = $rows['publish'];
					$vo->home_display = $rows['home_display'];
					$vo->disp_order = $rows['disp_order'];
					$vo->posted_date = $rows['posted_date'];
					$vo->updated_date = $rows['updated_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
			}
		return $list;
		}
	
	function fetchLimited($page, $perpage, $publish="all")
		{
		$from = ($page-1)*$perpage;
		if($publish == "onlypublished")
			$this->sql = "SELECT * FROM tbl_news WHERE publish = 'yes' ORDER BY posted_date DESC LIMIT $from, $perpage";
		else
			$this->sql = "SELECT * FROM tbl_news ORDER BY posted_date DESC LIMIT $from, $perpage";
		
		$this->exec();//stores result in $this->result
		
		$list = array();
		if($this->result)
			{
				while($rows = $this->fetch())
					{
					$vo = new NewsVO();
					$vo->id = $rows['id'];
					$vo->title_en = $rows['title_en'];
					$vo->brief_description_en = $rows['brief_description_en'];
					$vo->detail_description_en = $rows['detail_description_en'];
					$vo->title_de = $rows['title_de'];
					$vo->brief_description_de = $rows['brief_description_de'];
					$vo->detail_description_de = $rows['detail_description_de'];
					$vo->publish = $rows['publish'];
					$vo->home_display = $rows['home_display'];
					$vo->disp_order = $rows['disp_order'];
					$vo->posted_date = $rows['posted_date'];
					$vo->updated_date = $rows['updated_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
			}
		return $list;
		}
	
	function fetchForHomePage($num)
		{
		$from = 0;
		$this->sql = "SELECT * FROM tbl_news WHERE publish = 'yes' AND home_display='yes' AND disp_order != '0' ORDER BY posted_date DESC LIMIT $from, $num";
		
		$this->exec();//stores result in $this->result
		
		$list = array();
		if($this->result)
			{
				while($rows = $this->fetch())
					{
					$vo = new NewsVO();
					$vo->id = $rows['id'];
					$vo->title_en = $rows['title_en'];
					$vo->brief_description_en = $rows['brief_description_en'];
					$vo->detail_description_en = $rows['detail_description_en'];
					$vo->title_de = $rows['title_de'];
					$vo->brief_description_de = $rows['brief_description_de'];
					$vo->detail_description_de = $rows['detail_description_de'];
					$vo->publish = $rows['publish'];
					$vo->home_display = $rows['home_display'];
					$vo->disp_order = $rows['disp_order'];
					$vo->posted_date = $rows['posted_date'];
					$vo->updated_date = $rows['updated_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
			}
		return $list;
		}
		
	function update($vo)
		{
		$today = date("Y-m-d");
		$this->sql = "UPDATE tbl_news SET title_en = '$vo->title_en', brief_description_en = '$vo->brief_description_en', 
						detail_description_en = '$vo->detail_description_en', title_de = '$vo->title_de', 
						brief_description_de = '$vo->brief_description_de', detail_description_de = '$vo->detail_description_de', 
						publish = '$vo->publish', home_display = '$vo->home_display', disp_order = '$vo->disp_order', updated_date='$today' 
						WHERE id = '$vo->id'";
		return $this->exec();
		}
	
	function fetchDetail($id)
			{
			$this->sql = "SELECT * FROM tbl_news WHERE id = '$id'";
			$this->exec();//stores result in $this->result
			
			$vo = new NewsVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				//$vo = new NewsVO();
				$vo->id = $rows['id'];
				$vo->title_en = $rows['title_en'];
				$vo->brief_description_en = $rows['brief_description_en'];
				$vo->detail_description_en = $rows['detail_description_en'];
				$vo->title_de = $rows['title_de'];
				$vo->brief_description_de = $rows['brief_description_de'];
				$vo->detail_description_de = $rows['detail_description_de'];
				$vo->publish = $rows['publish'];
				$vo->home_display = $rows['home_display'];
				$vo->disp_order = $rows['disp_order'];
				$vo->posted_date = $rows['posted_date'];
				$vo->updated_date = $rows['updated_date'];
				
				$vo->formatFetchVariables();
				}
			return $vo;
			}
			
	function remove($id)
			{
			$vo = $this->fetchDetail($id);
			
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_news WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
				$vo->removeFile($vo->files);
					return true;
				else
					return false;
				}
			else
				return false;
			}
	
	function publishNunpublish($id, $publishflag='yes')
		{
		$vo = $this->fetchDetail($id);
		
		if($vo->id != 0)
			{
			$this->sql = "UPDATE tbl_news SET publish='$publishflag' WHERE id = '$vo->id'";
			$this->exec();
			if($this->result)
				return true;
			else
				return false;
			}
		return false;
		}	
	function __destruct()
		{
		unset($this);
		}
		
	}
?>