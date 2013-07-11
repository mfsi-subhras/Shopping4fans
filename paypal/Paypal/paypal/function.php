<?php
function check_txnid($tnxid){
	    file_put_contents('/home/mindfire/Projects/nutricell/templates/paypal/func.txt',print_r('1-->'.$tnxid , true), FILE_APPEND);
		global $link;
		$valid_txnid = true;
	    //get result set
    //    $sql = mysql_query("SELECT * FROM `payments` WHERE txnid = '$tnxid'", $link);
//    if($row = mysql_fetch_array($sql)) {
//        $valid_txnid = false;
//	    }
	    return $valid_txnid;
	}

	function check_price($price, $id){
	    file_put_contents('/home/mindfire/Projects/nutricell/templates/paypal/func.txt',print_r('1-->'.$price , true) , FILE_APPEND);
	    file_put_contents('/home/mindfire/Projects/nutricell/templates/paypal/func.txt',print_r('1-->'.$id , true), FILE_APPEND);
	    $valid_price = false;
	    /*
	    you could use the below to check whether the correct price has been paid for the product
	    if so uncomment the below code

	    $sql = mysql_query("SELECT amount FROM `products` WHERE id = '$id'");
	    if (mysql_numrows($sql) != 0) {
	        while ($row = mysql_fetch_array($sql)) {
	            $num = (float)$row['amount'];
	            if($num == $price){
	                $valid_price = true;
	            }
	        }
	    }
	    return $valid_price;
	    */
	    return true;
    }

//	function updatePayments($data){
//	    global $link;
//	    if(is_array($data)){
//        $sql = mysql_query("INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES (
//	                '".$data['txn_id']."' ,
//	                '".$data['payment_amount']."' ,
//	                '".$data['payment_status']."' ,
//	                '".$data['item_number']."' ,
//	                '".date("Y-m-d H:i:s")."'
//	                )", $link);
//	    return mysql_insert_id($link);
//	    }
//	}
?>
