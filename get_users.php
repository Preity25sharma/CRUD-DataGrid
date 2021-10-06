<?php

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';
	
	$rs = mysqli_query($conn,"select count(*) from users");
	$row = mysqli_fetch_all($rs, MYSQLI_ASSOC);
	$result["total"] = $row[0];
	$rs = mysqli_query($sconn,"select * from users limit $offset,$rows");
	
	$items = array();
	while($row = mysqli_fetch_all($rs, MYSQLI_ASSOC)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>