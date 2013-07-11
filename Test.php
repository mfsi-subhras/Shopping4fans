<?php
// $httpResponse = "REFUNDTRANSACTIONID=2X748497XD9696905&FEEREFUNDAMT=0%2e98&GROSSREFUNDAMT=28%2e95&NETREFUNDAMT=27%2e97&CURRENCYCODE=GBP&TIMESTAMP=2013%2d07%2d04T11%3a48%3a13Z&CORRELATIONID=5d7841267fc58&ACK=Success&VERSION=51%2e0&BUILD=6680107";
// $param1 = array();
// $param  = array();
// $result1 = urldecode ( $httpResponse );
// echo $result1.'<br/>';
// foreach (explode('&', $result1) as $chunk) {
    // $param = explode("=", $chunk);
	// $param1[$param[0]] = $param[1];
	// }
// $result = explode("&" ,$httpResponse );
// print_r( $param1 );

		// $field = 'item_name_1';
		// $value = 'Hogwarts Pen Collection - Gryffindor x3';
		// $i = 0;
		// $item_name = 'item_name';
		// $quantity = 'quantity';
		
			// if(0 === strpos($field, $item_name)){
				// print_r($field."--->".$value."<br/>");
				// $result = explode("x",$value);
				// print_r($result );
				// $quantity[$i] = $result[1];
				// $i++;
			// }
			// if(0 === strpos($field, $quantity)){
				// if(!is_null($quantity[$i-1])){
					// $value = $quantity[$i-1];
				// }
			// }
			$number = 21.68;
			 echo  number_format(21.68, 1);
			 echo round( 21.68, 1);
?>