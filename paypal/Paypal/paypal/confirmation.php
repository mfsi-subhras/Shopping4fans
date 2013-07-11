<?

	$arrLandingPage = Prop( "LandingRecord"  );
	$pid = RQ( "rush_product" );
	$arrProduct = get_product_by_id($pid);

	$offers = Prop( "Offers" );
	$arrDefaultOffer = $offers[0];
	$fRushShippingCostAdd = 10;	
	
?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<?	display_std_header() ?>
	<link rel="stylesheet" type='text/css' href="/g/c/Orderpagestylesheet.css" />
	<link rel="stylesheet" type='text/css' href="/g/c/ThickBox.css" />
	<SCRIPT type='text/JavaScript' src="/g/c/common.js" ></SCRIPT>
<link REL="SHORTCUT ICON" HREF="/g/ti/nutricell.png">


</head>
<body id="rushbody">
<script type="text/javascript" src="/g/c/jquery.1.4.2.min.js"></script>
<script type="text/javascript" src="/g/scripts/rushorder.js"></script>
<SCRIPT type='text/JavaScript' src="/g/scripts/thickbox.js" ></SCRIPT>

<script  src="/makeSublist.js"      language="javascript" type="text/javascript" charset="utf-8"></script>
<script type="text/JavaScript">

$(document).ready(function()
{
   makeSublist('country','state', '');
});

bOfferSelected = false;

function chk_reg() {

	if( !bOfferSelected ) {
		alert( 'Please select your offer!' );
		return false;
	}

	var f = document.frmreg;
<?
 	js_demand( "f.FName",   "Please Enter First Name");
 	js_demand( "f.LName",    "Please Enter Last Name");
 	js_demand_email( "f.EmailAddress",  "Please Enter Valid Email Address");
	js_demand( "f.Phone1",   "Please Enter Your Phone");
 	js_demand( "f.Address1", "Please Enter Billing Address");
 	js_demand( "f.City",    "Please Enter Billing City");
 	js_demand( "f.State",   "Please Enter Billing State");
 	js_demand( "f.ZipCode",     "Please Enter Billing Zip Code");
?>	
<?	//js_demand( "f.cc_holder", 	"Please Enter Valid Cardholder's name!" ) ?>
<?	js_demand( "f.cc_type", "Please select your credit card type" ) ?>
<?	js_demand( "f.cc_num", 	"Please Enter Valid Credit Card Number" ) ?>
<?	js_demand_numeric( "f.cc_num", "Credit card number must contain only digits" ) ?>
<?	js_demand( "f.cc_cvv2", 	"Please Enter Valid CVV2" ) ?>
<?	js_demand_numeric( "f.cc_cvv2","CVV2 must contain only digits" ) ?>

	Smart();
	
	/* cho(
		"<?php echo $arrDefaultOffer['prod_offer_explanation']; ?>",
		"<?php echo $arrDefaultOffer['prod_offer_id'] ?>",
		"<?php echo $arrDefaultOffer['prod_offer_sku'] ?>",
		"<?php echo $arrDefaultOffer['prod_offer_sku_oo'] ?>",
		"<?php echo $arrProduct['prodpg_title'] ?>" 
	); */
}


<?php
	echo 'rush_shipping_add = ' . sprintf( '%.2f', $fRushShippingCostAdd ) . ';';
?>

isImageTopSrc = '/g/c/insureship/navy_top.gif';
isImageBottomSrc = '/g/c/insureship/navy_bottom.gif';
isImgPreload1 = new Image();
isImgPreload1.src = isImageTopSrc;
isImgPreload2 = new Image();
isImgPreload2.src = isImageBottomSrc;
	
	
$(document).ready(function() {
	var default_offer = $("div.offer[sku='<?php  $default_sku?>']");
	calculate(default_offer);
	
	$("#insureship_div_box").hover(
		function() {
			$('#insureship_div').append("<div style='position:absolute;margin-top: -85px;' id='insureship_wrapper'><div><img src='" + isImageTopSrc + "' width='300' height='195'  border='0'/><br /><img src='" + isImageBottomSrc + "' width='300' height='31' border='0'/></div></div>");
			$("#insureship_wrapper img:eq(1)").click(
				function() {
					window.open('https://www.insureship.com/terms-policy.php?template=_popup_template','',		'height=450,width=550,scrollbars=yes,toolbars=yes,resizeable=yes');
				}
			);
		},
		function() {
			$('#insureship_wrapper').remove();
		}
	);
	
	$('#btn_place_order_modify').click( switchUserInfoModify);
	
});

function chk_reg() {
	var f = document.frmreg;
<?
 	js_demand( "f.FName",   "Please enter first name" );
 	js_demand( "f.LName",   "Please enter last name" );
 	js_demand_email( "f.EmailAddress",  "Please enter valid e-mail address" );
	js_demand( "f.Phone1",   "Please enter your phone" );
 	js_demand( "f.Address1", "Please enter billing Address" );
 	js_demand( "f.City",    "Please enter billing City" );
 	js_demand( "f.State",   "Please enter billing State" );
 	js_demand( "f.ZipCode", "Please enter billing Zip Code" );
?>	
<?	//js_demand( "f.cc_holder", 	"Please Enter Valid Cardholder's name!" ) ?>
<?	//js_demand( "f.cc_type", "Please select your credit card type" ) ?>
<?	js_demand( "f.cc_num", 	"Please enter valid credit card number" ) ?>
<?	js_demand_numeric( "f.cc_num", "Credit card number must contain only digits" ) ?>
<?	js_demand( "f.cc_cvv2", 	"Please enter valid CVV2" ) ?>
<?	js_demand_numeric( "f.cc_cvv2","CVV2 must contain only digits" ) ?>

	f.submit();
}


</script>


<!-- Offer Popup-->
<? display("promo/popup") ?>
<!-- End of Offer Popup -->

<div id="wrap">
	<form name='frmreg' action='<?php  $_SERVER['REQUEST_URI'] ?>' onsubmit="chk_reg(); return false;" method='post' style='display:inline;'>
		
	<?php	
	//echo "POST";
	//dbg($_POST);
	foreach( $_POST as $strKey => $strVal ) {
				if( preg_match( '/^(rush_|product_)/', $strKey )) {
					echo "<input type='hidden' name='$strKey' value='$strVal' />";
				}
			}
	?>
	<div id="header">
		<div id="header_img">
			<img src="/g/ti/rush/<?php echo $arrProduct['prodpg_link']; ?>.png" />
		</div>
<?php
	$strTitle = $arrProduct['prodpg_title'];
	$strTitleStyle = strstr( $strTitle, ' ' ) ? 'font-size: 36px' : '';
	//$strTitle = str_replace( ' ', '<br />', $strTitle );
?>
		<h1 style="width:340px;line-height: 1.1em;<?php echo $strTitleStyle; ?>"><?php echo $strTitle; ?></h1>

		<div id="steps" class="step2"></div>
		
		<div class="clr"></div>
	</div>
	
	<div id="rush_content">
		<div id="customer_info" class="readonly" style="display: block">
			<a name="updateinfo"></a>
			<table> 
				
				<tr>
					<td colspan="3">
						You have selected:
						<h3 style="color: #090"><?php echo RQf('rush_offer_title'); ?> for 
						<span style="color: #d00"><?php echo show_cost( RQ('rush_price')); ?></span><br />
						<small style="color:#555">Shipping cost: $<?php 
								if (RQ('rush_price') < 0.10) {
						        $total = 0.00;
						    } elseif (RQ('rush_price') < 49.00) {
						        $total = 7.95;
						    } elseif (RQ('rush_price') < 79.00) {
						        $total = 12.95;
						    } else {
						     $total = 0.00;
    						} 
								echo $total;
								SessWriteLog( "SHIPPING_CONFIRMATION=RushPrice-".RQ('rush_price')." Shipping=".$total );
						
						 ?></small>
						<?php if( !SessVar('ShippingInsuranceDisabled')) {
							echo show_cost( SessVar('ShippingInsuranceRate'));
						}
						?>
						</h3>
					</td>
					<td>
						<a  style="font-size: 1.2em; color: blue"
							href="javascript:$('#cc_num').attr('disabled','1');$('form[name=frmreg]').submit();void(0)">&laquo; change offer</a>
					</td>
				</tr>
				
				<tr>
					<td colspan="4">
						<hr color="#999" width="90%" size="1" noshade="noshade" style="margin:.3em auto" />
					</td>
				</tr>
				
				<tr>
					<td colspan="4">
						<h3 >Your billing information:</h3>
					</td>
				</tr>
				<tr>
					<td width="90">First Name:</td>
					<td width="180"><input type="text" readonly="1"  value="<?php echo RQ('FName'); ?>" class='tb' name="FName" /></td>
					<td>City:</td>
					<td><input type="text" readonly="1"  class='tb' value="<?php echo RQ('City'); ?>" name="City" /></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" readonly="1"  class='tb' value="<?php echo RQ('LName'); ?>" name="LName" /></td>
                    <td>Country:</td>
                    <td>
                        <?php echo getCountrySelect2('Country',RQf('Country)'),'country','txtbox'); ?>
                    </td>
				</tr>
				<tr>
					<td>Your E-mail:</td>
					<td><input type="text" readonly="1"  class='tb' value="<?php echo RQ('EmailAddress'); ?>" name="EmailAddress" /></td>
                    <td>State:</td>
                    <td>
                        <?php echo getStateSelect2('State',RQ('State'),'state','txtbox'); ?></td>
                    </td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" readonly="1"  class='tb' value="<?php echo RQ('Phone1'); ?>"  name="Phone1" /></td>
					<td>Zip Code:</td>
					<td><input type="text" readonly="1"  class='tb' value="<?php echo RQ('ZipCode'); ?>" name="ZipCode" /></td>
				</tr>
			
				<tr>
					<td>Billing Address:</td>
					<td><textarea name="Address1" class='tb'><?php echo RQ('Address1'); ?></textarea></td>
					<td colspan="2"></td>
				</tr>
				
				<tr>
					<td colspan="4">
						<hr color="#999" width="90%" size="1" noshade="noshade" style="margin:.3em auto" />
					</td>
				</tr>

				<tr>
					<td colspan="4">
						<h3 >Credit Card Information:</h3>
					</td>
				</tr>
				
				<tr>
					<td>Credit Card Number:</td>
					<td><input 	type="text" readonly="1"  class='tb' id="cc_num" style="display:none" 
								value="<?php echo RQ( 'cc_num' ); ?>"  name="cc_num" />
						<strong id="cc_num_view"><?php echo 'xxxxxx' . substr( RQ('cc_num'), -4 ); ?></strong>
					</td>
					<td colspan="2"></td>
				</tr>
				
				<tr>
					<td>Credit Card Expiration Date:</td>
					<td>
						<div id="exp_edit" style="display:none">
							<select name='cc_expmo' style='width:50px'>
							<?php	
									$strExpiration = '';
									foreach( get_months_list() as $nMonth ) {
										$strSelected = '';
										if( (int) RQ('cc_expmo') == $nMonth ) {
											$strSelected = ' selected ';
											$strExpiration .= $nMonth;
										}
										echo "<option value='$nMonth' $strSelected>$nMonth</option>";
									}						
							?>
							</select>&nbsp;
							<select name='cc_expyear' style='width:60px' id="expyear_edit">
								<?php	
									foreach( get_nearest_years() as $nYear ) {
										$strSelected = '';
										if( (int) RQ('cc_expyear') == $nYear ) {
											$strSelected = ' selected ';
											$strExpiration .= '/' . $nYear;
										}
										echo "<option value='$nYear' $strSelected>$nYear</option>";
									}					
							?>
							</select>
						</div>
						<strong id="exp_view"><?php echo $strExpiration; ?></strong>
						
					</td>
					<td colspan="2"></td>
				</tr>
				
				<tr>
					<td>Credit Card CVV2:</td>
					<td><input type="text" readonly="1"  class='tb' style="width: 60px" value="<?php echo RQ('cc_cvv2'); ?>"  name="cc_cvv2" /></td>
					<td colspan="2"></td>
				</tr>
				
				<tr>
					<td colspan='4'>
						<table align="center">
							<tr>
								<td style="text-align: right; padding: .5em; width: 50%">
									<input type="button" id="btn_place_order_modify" value="" />
								</td>
								<td style="text-align: left; padding: .5em">
									<input type="submit" id="btn_place_order_confirm" value="" />
								</td>
							</tr>
						</table>
					</td>
			</table>
		</div>
		
		</div>
		<?php if( RQx('insureship_option')) { ?>
			<input type="hidden" name="insureship_option" value="1" />
		<?php } 
			if( RQx('shipping_options')) { ?>
			<input type="hidden" name="shipping_options" value="1" />
		<?php } ?>
	

	
	<div id="content_bottom"></div>
	
	<div id="footer_links">
		<a style="color: #0066cc; " href="/info/terms/">Terms &amp; Conditions</a> |
		<a href="/info/privacy/" style="color: #0066cc" >Privacy Policy</a>
	</div>
	</form>
	
	
</div> <!-- endof #wrap -->


<?php   trim($arrLandingPage['land_footer']) == '' ? '' : $arrLandingPage['land_footer'] ?>
<?php	display( 'sys/insureship_tracking_pixel' ); ?>
<?php   display ("sys/counter" ); ?>
<?php
/*
echo '<pre style="text-align:left">';
 printf('%s', print_r(get_defined_vars(), 1)); 
echo '</pre><br>';
*/
?>
</body>
</html>