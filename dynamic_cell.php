<?php include("config.php"); 
$page_id=$_POST['page_id'];
$sql_query=mysql_query("select * from cell where page_id=".$page_id."");
while($res=mysql_fetch_array($sql_query))
{
$name=$res['cell_name'];
$cell_id=$res['data_id'];
?>

<h3 class="uppercase add_workstation1" style="margin-top:10px !important;"  attr-id="<?=$cell_id;?>" ><span class="r dd1" style="color:#fff !important;">&nbsp&nbsp&nbsp</span><span class="title" >  <?=$name;?> </span> </h3>


                               <div class="add_settings"><ul class="setting_ul"><li class="add_cell" data-id="<?=$cell_id;?>" >Add Details</li></ul></div>
             <br>                   
                            
<?php } ?>
<script>
 
$('.add_cell').click(function() {
                var dom=$(this).attr("data-id");
                $('#col_id').val($(".level-one li[data-id='" + dom + "']").attr("data-col"));
                $('#row_id').val($(".level-one li[data-id='" + dom + "']").attr("data-row"));
 $('.level-one li[data-id="' + dom + '"]').addClass('active');
                $('#call_id').val(dom);

                $("#myModal").removeClass("fade");
                $("#myModal").show();

                return false;
            });
$('.add_workstation1').click(function() {
$(".dd1").html("&nbsp&nbsp&nbsp");
$(".dd").html("&nbsp&nbsp&nbsp");
                $('.level-one li').removeClass('active');
                var data_id1=$(this).attr("attr-id");

                $('.level-one li[data-id="' + data_id1 + '"]').addClass('active');
$('.level-one li[data-id="' + data_id1 + '"]').removeClass('player-revert');
$('#current_grid').val(data_id1);
$(this).find(".dd1").html("✔");
                $(".add").attr("data-id",$(this).attr("attr-id"));
            });
</script>
