<?php 

include 'niru_collection.php';


   
echo "__AJAX-";

	$product_key = $_POST['product_key'];
	$login_key=$_POST['login_key'];
    $qty=1;
   
	$url_id=givedataMulti($conn,"cart_master"," product_key='$product_key' AND login_key='$login_key'","qty");;
  
	if($url_id=="")
	{
        $rate=givedata($conn,"products","p_key",$product_key,"price");
      
        $total=$rate*$qty;
		$sql="INSERT INTO cart_master(product_key,login_key,qty,rate,total) VALUES('$product_key','$login_key','$qty','$rate','$total')";
        if($conn->query($sql))
		{
            echo "Done"; 
		}
	}else{
		echo "error";
	}										
			


?>