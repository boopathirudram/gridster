<?php
include("config.php");

$query_meta="INSERT INTO `cell_meta`(`cell_id`, `code_of_cell`, `product_no`, `sap_product_no`, `description`, `standard_time`, `final_amount`, `produced_amount`, `expected_amount`, `number_of_wated_product`, `shifted_starting_time`, `status`,`page_id`) VALUES (".$_POST['call_id'].",'".$_POST['code_of_cell']."','".$_POST['product_no']."','".$_POST['sap_product_no']."','".$_POST['description']."','".$_POST['standard_time']."','".$_POST['final_amount']."','".$_POST['product_amount']."','".$_POST['expected_amount']."','".$_POST['no_wasted']."','".$_POST['shift_starting_time']."',1,".$_POST['page_id'].")";

$result=mysql_query($query);
$result=mysql_query($query_meta);

echo "Successfully Inserted";

?>
