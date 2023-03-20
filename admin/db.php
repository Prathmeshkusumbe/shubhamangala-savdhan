<?php 

class db{

	function get($table_name, $vars){
		global $con;
		$sql = "select * from ".$table_name;
		if (isset($vars['query']) && sizeof($vars['query']) != 0){
			$sql .= " where ";
		}
		if (isset($vars['query']) && sizeof($vars['query']) > 1){
			
			foreach ($vars['query'] as $key => $value) {

				if ($key === array_key_last($vars['query'])) {
		        	$sql .= $key." = '".$value."' ";
		        	if(isset($vars['order-by'])){
						$sql .= "order by ".$vars['order-by']." ".$vars['order'];
					}
					$sql .= ';';
					echo $sql; 
		        	$res = mysqli_query($con, $sql);
					$data['data'] = mysqli_fetch_assoc($res);
					$data['no-of-rows'] = mysqli_num_rows($res); 

		        	return $data;
	   			}

	    		$sql .= $key." = '".$value."' and ";
	    	} 	
	    	
		}
	    
	    if (isset($vars['query'])){
	    	foreach ($vars['query'] as $key => $value) {
    			$sql .= $key." = '".$value."'  ";
    		}	
	    }
	     
    	if(isset($vars['order-by'])){
			$sql .= " order by ".$vars['order-by']." ".$vars['order'];
		}
		$sql .= ";";
	   	//echo $sql; die();
	    $res = mysqli_query($con, $sql);
		$data['data'] = mysqli_fetch_array($res);
		ap($data['data']) ;
		die();	
		$data['no-of-rows'] = mysqli_num_rows($res); 
    	return $data;
	}
}