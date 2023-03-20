<?php 

class db{
	
	public function __construct($dbuser, $dbpassword, $dbname, $dbhost){
		$this->dbh = mysqli_connect($dbhost,$dbuser,$dbpassword);
		if ( ! $this->dbh )
		{
			echo "Error establishing a database connection!";
		}

		$this->dbname = $dbname;
		$this->select( $this->dbname, $this->dbh );
	}
	function select($db, $dbh = null){
		$success = mysqli_select_db( $dbh, $db );
		if(!$success){
			echo "error establishing selection databse may be database name is incorrect";
		}
	}
	function query($table_name, $vars){
		$sql ="";
		$sql .= "select * from ".$table_name;
		if((isset($vars['cols']) && sizeof($vars['cols']) !=0) || isset($vars['like'])){
			$sql .= " where ";
		}
		if((isset($vars['cols']) && sizeof($vars['cols']) !=0)){
			$sql .= " where ";
			
			foreach ($vars['cols'] as $key => $value) {

				if ($key === array_key_last($vars['cols'])) {
					$sql .= $key." = '".$value."' ";
					break;
				}

				$sql .= $key." = '".$value."' and ";
			} 
		}
		
		if(isset($vars['like'])){
			$sql .= "CONCAT(name, last_name, email, sex, no_of_mathes) like '%".$vars['like']."%'";
		}
		
		if(isset($vars['order-by'])){
			$sql .= " order by ".$vars['order-by']." ".$vars['order'];
		}
		if(isset($vars['limit'])){
			if(!isset($_GET['page'])){
				//$offset = 0;
			}
			$offset = isset($_GET['page']) ? $_GET['page'] : 0;
			$offset = $offset * $vars['limit'];
			$sql .= ' limit '.$vars['limit'].' offset '. $offset;
			//$sql .= ' limit 2 offset 1';
		}

		$sql .= ';';
		//echo $sql; die();
		return $sql;	; 
		
	}
	
	public function get($table_name, $vars = null){
		if(isset($vars['query_type'])){
			$query = $vars['query_string'];// die();
		}
		else{
			$query = $this->query($table_name, $vars);
		}
		
		$res = mysqli_query($this->dbh, $query);
		
		if(!isset($vars['query_type'])){
			
			while($row = mysqli_fetch_assoc($res)){
				$data['record'][] = $row;
			}
			
			$data['no-of-rows'] = mysqli_num_rows($res);
			//ap($data) ; 
			return $data;
		}
		
	}
	
	public function update($table_name, $vars){
		$sql = "update ".$table_name." set ".$vars['col']. " = '". $vars['value']. "' where ".$vars['where_col']." = '".$vars['where_col_value']."';" ;
		$vars['query_type'] ='update';
		$vars['query_string'] = $sql;
		//echo $sql; //die();
		$this->get($table_name,$vars);
		
	}

	
}
$db = new db($dbuser, $dbpassword, $dbname, $dbhost);





