<?php
include("config.php");
$cell_id=$_GET['cell_id'];
$page_id=$_GET['page_id'];
$result=mysql_query("SELECT * FROM `cell_meta` WHERE `cell_id`=".$cell_id." and `page_id`=".$page_id."") or die(mysql_error());
$resss=mysql_fetch_array($result);
echo'<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">code of cell</h3>
<p>'.$resss["code_of_cell"].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Product Number</h3>
<p>'.$resss['product_no'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">SAP Product Number</h3>
<p>'.$resss['sap_product_no'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Description</h3>
<p>'.$resss['description'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Standard Time</h3>
<p>'.$resss['standard_time'].'</p>
</div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Final Amount</h3>
<p>'.$resss['final_amount'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Produced Amount</h3>
<p>'.$resss['produced_amount'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Expected Amount</h3>
<p>'.$resss['expected_amount'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Number of wated product</h3>
<p>'.$resss['number_of_wated_product'].'</p></div>
<div class="col-md-12" style="color:#fff;">
<h3 style="font-weight:bold;font-size:13px;margin:0px !important;">Shifted starting time</h3>
<p>'.$resss['shifted_starting_time'].'</p>
</div>';
 ?>
