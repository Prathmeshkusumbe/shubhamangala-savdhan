<title>users</title>
<?php  
require("header.php");
if(isset($_GET['type']) && $_GET['type'] != ''){
	/*if(get_safe_value($con, $_GET['type']) == 'status'){
		$operation = get_safe_value($con, $_GET['operation']);
		if($operation == 'active'){
			$status = 1;
		} 
		else{
			$status = 0;
		}
		$id = get_safe_value($con, $_GET['id']);
		$sql = "update users set status = '$status' where id = $id";
		mysqli_query($con, $sql);
	}
	if(get_safe_value($con, $_GET['type']) == 'delete'){
		$id = get_safe_value($con, $_GET['id']);
		$sql = "delete from users where id = $id";
		mysqli_query($con, $sql);
		header('location:users.php?deleted');
		die();
	}*/
	$id = $_GET['id'];
	$operation = $_GET['operation'];
	if($operation == 'active'){
		$status = 1;
	} 
	else{
		$status = 0;
	}
	$where_col = 'id';
	$query = array('where_col' => $where_col, 'where_col_value'=>$id, 'col'=>'status', 'value'=>$status);
	$test = $db -> update('users', $query);
}

//$sql = "select * from users order by id desc";
$query = array('order-by'=>'id','order'=>'desc','limit'=>10);
if(isset($_GET['search-string']) && $_GET['search-string'] != ''){
	$like = '%'. $_GET['search-string'].'%';
	$query = array('order-by'=>'id','order'=>'desc','limit'=>10, 'like'=> $_GET['search-string']);
}
$test = $db->get('users', $query);
//ap($test);

?>
<div class="admin-content">
<div class="blogs">
	<h1 class="admin-page-headline">blogs</h1>
<form class="search-form wp-clearfix" method="get">
<p class="search-box float-right">
	<input type="search" id="tag-search-input" name="search-string" value="">
	<input type="submit" id="search-submit" class="blue-notfilled" value="Search blogs">
</p>
</form>

<div class="admin-container">
	<div class="">
	<div class="table-container">
		<div class="actions">
			<div class="actions-left float-left">
				<select>
					<option value="-1">Bulk actions</option>
					<option value="-1">delete</option>
				</select>
				<input class="blue-notfilled" type="submit" value="Apply">
			</div>
			<div class="actions-right float-right">
				item
			</div>
		</div>
		<table class="fixed widefat striped">
			<thead>
				<tr>
					<td class="check-column"><input type="checkbox"></td>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">name</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">email</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">sex</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">phone</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">no of mathes</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">date</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">status</a></th>
				</tr>
				<tbody>
					<?php 
					foreach($test['record'] as $row){ ?>
					<tr>
						<th class="check-column"></th>
						<td class="row-title admin-blue-color"><?php echo $row['name'].' '.$row['last_name']; ?></td>
						<td class="row-title admin-blue-color"><?php echo $row['email']; ?></td>
						<td class="row-title admin-blue-color"><?php echo $row['sex']; ?></td>
						<td class="row-title admin-blue-color"><?php echo $row['phone']; ?></td>
						<td class="row-title admin-blue-color"><?php echo $row['no_of_mathes']; ?></td>
						<td class="row-title admin-blue-color"><?php echo $row['date']; ?></td>
						<td><?php echo ($row['status']==1) ?  "<a href='?type=status&operation=deactive&id=".$row['id']."'>click to deactive</a>&nbsp;" : 
						"<a href='?type=status&operation=active&id=".$row['id']."'>click to active</a>&nbsp;"; ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
				<tr>
					<td class="check-column"><input type="checkbox"></td>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">name</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">email</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">sex</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">phone</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">no of mathes</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">date</a></th>
					<th scope="col" class="sortable"><a class="admin-blue-color font-weight-400" href="">status</a></th>
				</tr>
				</tfoot>
			</thead>
		</table>
	</div>
	</div>
</div>
</div>
</div>
</body>
</html>