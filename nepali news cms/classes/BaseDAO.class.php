<?PHP
class BaseDAO
{
private $user;
private $password;
private $database;
private $server;
private $connection;

public $error;
public $sql;
public $result;

const CONNECTION_ERROR = 1;
const SQL_EXECUTION_ERROR = 2;
	
	
	function __construct($server, $user, $password, $database)
		{
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		}
		
	function dbConnect()
		{
		if(!$this->connection=mysql_connect($this->server,$this->user,$this->password))
			throw new Exception('<font color="red">ERROR :: COULD NOT ESTABLISH A CONNECTION: '.mysql_error().'</font>', self::CONNECTION_ERROR);
		else
			{	
			if(!mysql_select_db($this->database))
				throw new Exception('<font color="red">ERROR :: COULD NOT FIND A DATABASE : '.mysql_error().'</font>', self::CONNECTION_ERROR);
			}
		}

	function exec()
		{
			$this->result=mysql_query($this->sql);
			if($this->result)
				{
				return $this->result;
				}
			else{
			//echo "<br>".mysql_error()."<br>";
				$this->error = mysql_error();
			return false;
			}
		}
	function fetch()
		{
		return mysql_fetch_array($this->result);
		}

	function row_count($result)
		{
		return mysql_num_rows($result);
		}

	function insert_id()
		{
		return mysql_insert_id();
		}

	function close()
		{
		mysql_close($this->connection);
		}
	
	function free_resource($rs)
		{
		mysql_free_result($rs);
		}
	
	function preventInjection($var)
		{
		if(get_magic_quotes_gpc())
			$var = stripslashes($var);
		
		return mysql_real_escape_string($var, $this->connection);
		}
		
		function GetPages($numC,$limit,$page_no,$ac){
	if($numC > $limit){
		//echo "Page(s) :: ";
		if($numC > $limit){
			$rmax = ceil($numC / $limit);
		}
		else{
			$rmax = 1;
		}
			if($page_no != 1){
			$prevpage = (int)$page_no-1;
			echo " <a  href=$_SERVER[PHP_SELF]?page=$prevpage>&laquo; Previous</a>";
		}
		for($i = 1; $i <= $rmax; $i++){
			if($page_no == $i){
				echo "&nbsp;" . "<font size=1 >" . $i . "</font>";
			}
			else{
				echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?page=$i>" . $i . "</a>";
			}
		}
	
		if($page_no < $rmax){
			$nextpage = (int)$page_no+1;
			echo " | <a  href=$_SERVER[PHP_SELF]?page=$nextpage>Next &raquo;</a>";
		}			
	}
	}	
		
	function __destruct()
		{
		unset($this->user);
		unset($this->password);
		unset($this->database);
		unset($this->server);
		unset($this->connection);
		unset($this->error);
		unset($this->sql);
		unset($this->result);
		
		unset($this);
		}


}



?>