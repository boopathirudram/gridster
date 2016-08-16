<?php 
$cell_query=mysql_query("select * from cell where page_id=".$page_id."");
$cell_count=mysql_num_rows($cell_query);
$next=$cell_count + 1;
while($res=mysql_fetch_array($cell_query))
{
$cell_id=$res['data_id'];
$cell_name=$res['cell_name'];
$col=$res['col'];
$row=$res['row'];
?>
<li style="display: list-item; position: absolute;" class="gs-w ready player-revert" data-sizey="5" data-sizex="5" data-row="<?=$row;?>" data-col="<?=$col;?>" data-id="<?=$cell_id;?>" data-level="one">
<div id="background"><p class="bg-text"><?=$cell_name;?></p></div>
<div class="add_settings"><ul class="setting_ul"><li class="add_cell active" data-id="<?=$cell_id;?>">Add Details</li><li class="add_workstation" attr-id="<?=$cell_id;?>">Add Workstation</li></ul></div><div class="delete1"></div>
<ul style="width: 185px; position: relative; height: 230px;" class="level-two">
<?php 
$work_query=mysql_query("select * from workstation where page_id=".$page_id." and cell_id=".$cell_id."");
while($res1=mysql_fetch_array($work_query))
{
$w_data=$res1['w_data_id'];
$color=$res1['color'];
$col1=$res1['col'];
$row1=$res1['row'];
 ?>
<li data-sizey="1" data-sizex="1" data-row="<?=$row1;?>" data-col="<?=$col1;?>" class="workstation type-one gs-w" style="background:<?=$color;?>; display: list-item; position: absolute;" data-id="<?=$w_data;?>"><div class="delete"></div></li>
<?php } ?>
</ul></li>

<?php } ?>
