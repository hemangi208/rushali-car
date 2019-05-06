<?php 
	//http://localhost/Walkpay_ws/ws/addcomplain.php?title=3rdComplain&detail=productisnotgood&rating=1
	
		require_once("../inc/connection.php");
		
		if(isset($_REQUEST['title'])==false || isset($_REQUEST['detail'])==false || isset($_REQUEST['rating'])==false)
		{
			ReturnError("input is missing");
		}
		else 
		{
			extract($_REQUEST);
			$datee="2019-02-13";
			$datee=date('Y-m-d');
			$sql = "insert into complain(title,detail,complaindate,rating) values('$title','$detail','$datee','$rating')";
			//mysqli_query($link,$sql) or die(ReturnError(null,__LINE__));
			mysqli_query($link,$sql) or die(ReturnError(null,__LINE__));
			array_push($response,array("success"=>"yes"));
			array_push($response,array("message"=>"Complain added Successfully"));
		}
	array_unshift($response,array("error"=>"no error"));
echo json_encode($response);
?>