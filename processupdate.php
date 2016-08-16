<?php 
header('Content-type: application/json');
include("config.php");
if($_POST['data_up']=="insert")
{
$query="INSERT INTO `workstation`(`w_data_id`,`page_id`, `cell_id`, `col`, `row`, `color`, `status`) VALUES (".$_POST['data_id'].",".$_POST['page_id'].",".$_POST['cell_id'].",".$_POST['col'].",".$_POST['row'].",'".$_POST['data_color']."',1)";

$result=mysql_query($query);
echo "Successfully Added workstation";
}
if($_POST['data_up']=="insert_cell")
{
$query_res="select * from cell where cell_name='".$_POST['data_name']."' and page_id=".$_POST['page_id']."";
$result_ex=mysql_query($query_res);
$count=mysql_num_rows($result_ex);
if($count ==0)
{
$query="INSERT INTO `cell`(`data_id`,`page_id`, `col`, `row`, `status`,`cell_name`) VALUES (".$_POST['data_id'].",".$_POST['page_id'].",".$_POST['col'].",".$_POST['row'].",1,'".$_POST['data_name']."')";

$result=mysql_query($query);
echo "Successfully Added workstation";
}
else
{
echo 1;
}
}

if($_POST['data_up']=="page_cr")
{
$query="INSERT INTO `page`(`page_name`, `status`) VALUES ('".$_POST['pagename']."',1)";
$result=mysql_query($query);
$id=mysql_insert_id();
$key="encrypt";
$action="encrypt";
$page=simple_crypt($key,$id,$action);
header('Location:page.php?page='.$page.'&mode=edit');
}
if($_POST['data_up']=="update")
{
$page_id=$_POST['page_id'];
$data_id=$_POST['id'];
$cell_id=$_POST['cell_id'];
$col=$_POST['col'];
$row=$_POST['row'];
$query="UPDATE `workstation` SET `col`=".$col.",`row`=".$row." WHERE `w_data_id`=".$data_id." and `cell_id`=".$cell_id." and `page_id`=".$page_id."";
$result=mysql_query($query) or die(mysql_error()) ;
echo "Successfully Added workstation";
}
if($_POST['data_up']=="update_cell")
{

$page_id=$_POST['page_id'];
$data_id=$_POST['id'];
$col=$_POST['col'];
$row=$_POST['row'];
$query="UPDATE `cell` SET `col`=".$col.",`row`=".$row." WHERE `data_id`=".$data_id."  and `page_id`=".$page_id."";
$result=mysql_query($query);
echo "Successfully Added workstation";

}
if($_POST['data_up']=="Delete_small")
{
	$query=mysql_query(" delete from workstation where w_data_id=".$_POST['w_cell']." and page_id=".$_POST['page_id']." and cell_id=".$_POST['cell_id']."");
$query1=mysql_query(" delete from workstation_meta where w_id=".$_POST['w_cell']." and  cell_id=".$_POST['cell_id']."");
	if(count($query) > 0)
	{
		echo "Deleted cell";
	}
	else
	{
		echo "Error";
	}


}

if($_POST['data_up']=="Delete_big")
{
	
	
	$query=mysql_query(" delete from cell where  page_id=".$_POST['page_id']." and data_id=".$_POST['cell_id']."");
        $query1=mysql_query(" delete from cell_meta where   cell_id=".$_POST['cell_id']." and page_id=".$_POST['page_id']."");
        $query2=mysql_query(" delete from workstation where   cell_id=".$_POST['cell_id']." and page_id=".$_POST['page_id']."");
        if(count($query) > 0)
	{
		echo "Deleted cell";
	}
	else
	{
		echo "Error";
	}


}


if(isset($_POST['id']))
{
	
$id=mysql_real_escape_string($_POST['id']);
$delete = "DELETE FROM `page` WHERE page_id='$id'";
$ans=mysql_query( $delete);
 if ($ans)
        {
            echo 1;
        }
        else
        {
            echo  0;
        }
 }


if($_POST['data_up']=="duplicated")
{
$query="select * from cell where cell_name='".$_POST['data_name']."' and page_id=".$_POST['page_id']."";
$result=mysql_query($query);
$count=mysql_num_rows($result);
if($count!=0)
{
echo 1;
}
else
{
echo 0;
}

}
 

 
?>
