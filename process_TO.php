<?php 

include 'niru_collection.php';


   
echo "__AJAX-";

	$subTot =$_POST['subTot']; 
	$order_id="RR-".generateRandomCHAR_INT(5);
	
    $user_key=$_SESSION['tokenID'] ;

	$sql = "SELECT * FROM cart_master where login_key='$user_key'";
	$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
		$sql_="INSERT INTO order_master_details(oid,product_key,user_key,qty,rate,total) VALUES('$order_id','$row[product_key]','$row[login_key]','$row[qty]','$row[rate]','$row[total]')";
        if($conn->query($sql_))
		{}
		$cid=$row['id'];
		
	
	}

	$sql="INSERT INTO order_master(order_id,user_key,total,coupon,discount,shipping,grand_total,status) VALUES('$order_id','$user_key','$subTot','$couponTot','','$shippingTot','$grandTot','START')";
        if($conn->query($sql))
		{
            $_SESSION['OID']=$order_id;
            echo "Done"; 
            
		}
	else{
		echo "error";
	}										
			
	
	$sql_="update cart_master set flag='0' where login_key='$user_key'";
	if($conn->query($sql_))
	{}

	$_SESSION['order_id']=$order_id;

?> 