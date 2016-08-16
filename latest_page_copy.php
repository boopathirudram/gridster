
<link rel="stylesheet" type="text/css" href="assets/css/demo.css">
<!--<link rel="stylesheet" type="text/css" href="jquery.gridster.min.css">-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="jquery.gridster.min.js" type="text/javascript" charset="utf-8"></script>
<!--<script src="script.js" type="text/javascript" charset="utf-8"></script>-->
<link rel="stylesheet" type="text/css" href="assets/css/jquery.gridster.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.bg-text
{
    color:lightgrey;
    font-size:40px;
    text-align:center;
margin-top:35%;
}
#background{
    position:absolute;
    z-index:0;
    //background:white;
    display:block;
    min-height:100%; 
    min-width:100%;
    color:yellow;
}
</style>
<?php 
include('config.php');
include('header.php'); ?>
        <div class="page-container">
           <?php include('leftside.php'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
<div class="page-content">
                 <!-- BEGIN PAGE HEADER-->
                 <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><?php 
$key1="encrypt";
$action1="encrypt1";

$action2="encrypt";

$page_id=simple_crypt($key1,$_GET['page'],$action1);

$query=mysql_query("select page_name from page where page_id='".$page_id."'");

$res=mysql_fetch_array($query);
echo $page_name=ucwords($res['page_name']);

 ?></span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>

<div style="margin-top:10px;"><?php
//echo $action2;
$paged=simple_crypt($key1,$page_id,$action2);

 if($_GET['mode']=='edit')
{

?><a href="page.php?page=<?=$paged;?>&mode=edit"><button type="button" class="btn blue-madison" style="margin-right:10px;">Edit Mode</button></a><?php } else {   ?>
<a href="page.php?page=<?=$paged;?>&mode=edit"><button type="button" class="btn red-sunglo" style="margin-right:10px;">Edit Mode</button></a>
<?php } ?><?php if($_GET['mode']=='display')
{?><a href="page.php?page=<?=$paged;?>&mode=display"><button type="button" class="btn blue-madison">Display Mode</button></a>
<?php } else {   ?>
<a href="page.php?page=<?=$paged;?>&mode=display"><button type="button" class="btn red-sunglo">Display Mode</button></a>
<?php } ?>
</div>

<div >


</div>
                   
   <?php if($_GET['mode']=='edit')
{
$next=1;
?>
    <div id="main-app"  >
        <ul class="level-one">

</ul>
    </div>
<?php }else { ?>
<style>
.add_settings
{
display:none;
}
.delete1,.delete
{
display:none;
}
#main-app ul.level-two li.type-one:hover > .delete
{
display:none !important;
}
</style>
<div id="main-app">
        <ul class="level-one">
<?php 
$cell_query=mysql_query("select * from cell where page_id=".$page_id."");
$cell_count=mysql_num_rows($cell_query);
$next=$cell_count + 1;
$i=1;
while($res=mysql_fetch_array($cell_query))
{
$cell_id=$res['data_id'];
$cell_name=$res['cell_name'];
$col=$res['col'];
$row=$res['row'];
?>
<li style="display: list-item; position: absolute;" class="gs-w ready player-revert view_cell<?=$i?>"   data-sizey="5" data-sizex="5" data-row="<?=$row;?>" data-col="<?=$col;?>" data-id="<?=$cell_id;?>" data-level="one">
<div id="background"><p class="bg-text"><?=$cell_name;?></p></div>
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
<?php   } ?>
</ul></li>
<script>
$(".view_cell<?=$i?>").click(function(){
        
        $(".popup<?=$i?>").show();
    });

</script>

<div class="popup<?=$i?> popup_model" style="width: 600px;
margin: 30px auto;z-index: 10051;position: fixed;display:none;background-color: #FFF;
border: 1px solid rgba(0, 0, 0, 0.2);box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.5);top:0%;right:-2px;">

<div class="modal-header">
                                                    <button type="button" class="close clos<?=$i?>" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title"><?=$cell_name;?></h4>
                                                </div>

<div class="modal-body">
<?php
$result=mysql_query("SELECT * FROM `cell_meta` WHERE `cell_id`=".$cell_id." and `page_id`=".$page_id."");
while($resss=mysql_fetch_array($result))
{?>
<div class="col-md-6">
<h3>code of cell</h3>
<p><?=$resss['code_of_cell'];?></p>
<h3>Product Number</h3>
<p><?=$resss['product_no'];?></p>
<h3>SAP Product Number</h3>
<p><?=$resss['sap_product_no'];?></p>
<h3>Description</h3>
<p><?=$resss['description'];?></p>
<h3>Standard Time</h3>
<p><?=$resss['standard_time'];?></p>
</div>
<div class="col-md-6">
<h3>Final Amount</h3>
<p><?=$resss['final_amount'];?></p>
<h3>Produced Amount</h3>
<p><?=$resss['produced_amount'];?></p>
<h3>Expected Amount</h3>
<p><?=$resss['expected_amount'];?></p>
<h3>Number of wated product</h3>
<p><?=$resss['number_of_wated_product'];?></p>
<h3>Shifted starting time</h3>
<p><?=$resss['shifted_starting_time'];?></p>
</div>

<?php }


 ?>

</div>




</div>
<?php $i++; } ?>
</ul>
    </div>
   <?php } ?>
            </div>
</div>
            <!-- END CONTENT -->
            
        </div>
       <div id="myModal" class="modal fade" role="dialog" style="top:13% !important;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form id="contactForm" action=""  method="post">
                        <ul>
                            <input type="hidden" name="col_id" id="col_id"    />
                            <input type="hidden" name="row_id" id="row_id"    />
                            <input type="hidden" name="call_id" id="call_id"   />
 <input type="hidden" name="page_id" id="page_id" value="<?=$page_id;?>"   />

                            <li>
                                <label for="senderName">Code Of Cell</label>
                                <input type="text" name="code_of_cell"   required="required"  />
                            </li>

                            <li>
                                <label for="senderEmail">Product  Number</label>
                                <input type="text" name="product_no"   required="required"  />
                            </li>

                            <li>
                                <label for="senderName">Sap Product Number</label>
                                <input type="text" name="sap_product_no"   required="required"  />
                            </li>

                            <li>
                                <label for="senderEmail">Description</label>
                                <input type="text" name="description"   required="required"  />
                            </li>

                            <li>
                                <label for="senderName">Standard Time</label>
                                <input type="text" name="standard_time"   required="required"  />
                            </li>

                            <li>
                                <label for="senderEmail">Final Amount</label>
                                <input type="text" name="final_amount"   required="required"  />
                            </li>

                            <li>
                                <label for="senderEmail">Produced Amount</label>
                                <input type="text" name="product_amount"   required="required"  />
                            </li>

                            <li>
                                <label for="senderName">Expected Amount</label>
                                <input type="text" name="expected_amount"   required="required"  />
                            </li>

                            <li>
                                <label for="senderEmail">Number of Wasted Product</label>
                                <input type="text" name="no_wasted"   required="required"  />
                            </li>
                            <li>
                                <label for="senderEmail">Shift starting Time</label>
                                <input type="text" name="shift_starting_time"   required="required"  />
                            </li>

                        </ul>

                        <div id="formButtons">
                            <input type="button" id="sendMessage" name="sendMessage" value="Save" />

                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
<script>

var gridster_level_1;
var gridsters_holder = {};
var id_counter = <?=$next?>;
var id_counter1=1;
var page_id=<?php echo $page_id; ?>;
$(document).ready(function() {
$('#sendMessage').click(function() {
$.ajax({
   type: "POST",
   url: "process.php",
   data: $('#contactForm').serialize(),
   success: function(data){
alert(data);
 $("#myModal").addClass("fade");
        $("#myModal").hide();
$(".popup_model").hide();
}
});


});
$('.add_cell').click(function() {
                var dom=$(this).attr("data-id");

                $('#col_id').val($(".level-one li[data-id='" + dom + "']").attr("data-col"));
                $('#row_id').val($(".level-one li[data-id='" + dom + "']").attr("data-row"));
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
//alert(data_id1);
                $('.level-one li[data-id="' + data_id1 + '"]').addClass('active');
$(this).find(".dd1").html("✔");
                $(".add").attr("data-id",$(this).attr("attr-id"));
            });
    $("#Cell_list" ).load( "dynamic_cell.php", {"page_id":<?php echo $page_id; ?>}); 
	
 $(".close").click(function(){
        $("#myModal").addClass("fade");
        $("#myModal").hide();
$(".popup_model").hide();
    });

    gridster_level_1 = $('#main-app ul.level-one').gridster({
        namespace: 'ul.level-one',
        widget_base_dimensions: [50, 50],
        widget_margins: [15, 15],
       shift_larger_widgets_down: false,
        //shift_widgets_up: false,
        //shift_widgets_down: false,
        resize: {
            enabled: false
        }, serialize_params: function($w, wgd) {
                    return {id:$w.attr('data-id'),col: wgd.col, row: wgd.row,page_id:page_id }
		},
draggable: {
<?php if($_GET['mode']=="display")
{ ?>
ignore_dragging: true,
<?php } else { ?>
                    stop: function (e, ui, $widget) {
			
                        var gridData = gridster_level_1.serialize();

                        var insert="update_cell";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,data1:gridData },
                            function(data) {
                                alert(data);
                            }
                        );

                    }
<?php } ?>
                }
    }).data('gridster');
/*add workstation code */
$(".add").click(function() {
$(".dd").html("&nbsp&nbsp&nbsp");
            var data=$(this).attr("data-id");
            var color=$(this).attr("data-color");
$(this).find(".dd").html("✔");
            add_room_click(data,color);
        });
/*end of workstation code */
    $('.add-room').click(function() {
var cell_name=$('#cell_name').val();
if(cell_name!='')
{
 
            var id_c=id_counter
        var html = '<li data-id="' + id_counter + '" data-level="one"><div id="background"><p class="bg-text">'+cell_name+'</p></div><div class="delete1"></div><ul class="level-two"></ul></li>';
        var width = parseInt(4);
        var height = parseInt(4);
        var new_gridster_dom = gridster_level_1.add_widget(html, width, height, 1, 1);

 var col1=$(".level-one li[data-id='" + id_counter + "']").attr("data-col");
            var row1=$(".level-one li[data-id='" + id_counter + "']").attr("data-row");

            var page_id=<?php echo $page_id; ?>;
                var insert="insert_cell";
                $.post(
                    "processupdate.php",
                    { data_up:insert,data_id:id_counter,page_id:page_id,col:col1,row:row1,data_name:cell_name },
                    function(data) {
                        alert(data);
                    }
                );
        // subgridster
        var gridster_level_2 = $('li[data-id="' + id_counter + '"] ul.level-two').gridster({
            namespace: 'ul.level-two',
            widget_base_dimensions: [40, 40],
            widget_margins: [10, 10],
            shift_larger_widgets_down: false,
            shift_widgets_up: false,
            max_rows:6,
            max_cols:11,
            collision:{wait_for_mouseup:true},

            resize: {
                enabled: false
            },
/*serialize_params: function($w, wgd) {
                    return {id:$w.attr('data-id'),col: wgd.col, row: wgd.row,cell_id:id_c,page_id:page_id } },*/
            draggable: {
<?php if($_GET['mode']=="display")
{ ?>
ignore_dragging: true,
<?php } else { ?>
                stop: function(event) {
                    event.stopPropagation();
 var gridData = gridster_level_2.serialize();
console.log(gridData);
                        var insert="update";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,data1:gridData },
                            function(data) {
                                alert(data);
                            }
                        );
                }
<?php } ?>
            }
        }).data('gridster');

        // setting event handlers for new room
        /*$('li[data-id="' + id_counter + '"] > .delete').click(function(event) {
            event.stopPropagation();
            delete_room($(this));
        });*/
 $('li[data-id="' + id_counter + '"] > .delete1').click(function(event) {
                event.stopPropagation();
                delete_room($(this),id_counter);
            });
            $('li[data-id="' + id_counter + '"] .add_workstation').click(function() {
                $('.level-one li').removeClass('active');
                var data_id1=$(this).attr("attr-id");
                $('.level-one li[data-id="' + data_id1 + '"]').addClass('active');
                $(".add").attr("data-id",$(this).attr("attr-id"));
            });
$('li[data-id="' + id_counter + '"] .add_cell').click(function() {
                var dom=$(this).attr("data-id");

                $('#col_id').val($(".level-one li[data-id='" + dom + "']").attr("data-col"));
                $('#row_id').val($(".level-one li[data-id='" + dom + "']").attr("data-row"));
                $('#call_id').val(dom);

                $("#myModal").removeClass("fade");
                $("#myModal").show();

                return false;
            });
        //add_room_click();

        // since the built-in col and row values seem to change, we need to add fixed values for grid availability calculations - after that, add it to the gridster array
        gridster_level_2.set_cols = width;
        gridster_level_2.set_rows = height;
        gridsters_holder[id_counter] = gridster_level_2;
        id_counter += 1;
$("#Cell_list" ).load( "dynamic_cell.php", {"page_id":<?php echo $page_id; ?>}); 
}
else
{
alert("Please Enter Name for Cell");
}
    });

    // button click events - this is kind of a funky way to deal with things, but it works
    $('.add-station').click(function() {
        $('body').addClass('selecting');
        $('.add-station').addClass('hide');
        $('.cancel-station').removeClass('hide');
        $('.cancel-change-station').click();
    });
    $('.cancel-station').click(function() {
        $('body').removeClass('selecting');
        $('.add-station').removeClass('hide');
        $('.cancel-station').addClass('hide');
    });

    $('.change-station').click(function() {
        $('body').addClass('changing');
        $('.change-station').addClass('hide');
        $('.cancel-change-station').removeClass('hide');
        $('.cancel-station').click();
    });
    $('.cancel-change-station').click(function() {
        $('body').removeClass('changing');
        $('.change-station').removeClass('hide');
        $('.cancel-change-station').addClass('hide');
    });

    // this resets the click event handler on rooms, for adding workstations
    function add_room_click(data,color) {

        $('li[data-level="one"]').off();
        $('li[data-id="'+data+'"]').click(function() {
            if ($('body').hasClass('selecting')) {
                var gridster_id = data;
                var current_gridster = gridsters_holder[gridster_id];
                var html = '<li class="workstation type-one" style="background:'+color+'" data-id="' + id_counter1 + '"><div class="delete"></div></li>';
                var coords = get_free_coords(current_gridster);
                //console.log(coords);
                // if found a free spot, create the station widget and add change and delete event handlers to it
                if (coords) {
                    var new_workstation = current_gridster.add_widget(html, 1, 1, coords.col, coords.row);
                    new_workstation.click(function(event) {
                        event.stopPropagation();
                        change_station_type($(this));
                    });
var page_id=<?php echo $page_id; ?>;
                var insert="insert";
                $.post(
                    "processupdate.php",
                    { data_up:insert,data_color:color,data_id:id_counter1,cell_id:gridster_id,col:coords.col,row:coords.row,page_id:page_id },
                    function(data) {
                        alert(data);
                    }
                );
                    new_workstation.find('.delete').click(function(event) {
                        event.stopPropagation();
                        delete_workstation($(this));
                    });
                }
            }
id_counter1 += 1;
        });

    }
    // returns coordinates where there is free space
    function get_free_coords(current_gridster) {
//console.log(current_gridster);
        // first we create a usable gridmap
        var gridmap = [];
        for (var i = 0; i < current_gridster.set_cols; i++) {
            gridmap[i] = []
            for (var j = 0; j < current_gridster.set_rows; j++) {
                gridmap[i][j] = true;
            }
        }
        // setting which ones are used
        var serialized = current_gridster.serialize();
//console.log(serialized);
        $.each(serialized, function(index, value) {
            for (var j = 0; j < value.size_x; j++) {
                for (var k = 0; k < value.size_y; k++) {
                    gridmap[value.col - 1 + j][value.row - 1 + k] = false;
                }
            }
        });
//alert(gridmap.length);
        // and finally, finding an appropriate spot
        var found = false;
        for (var i = 0; i < gridmap.length; i++) {
            for (var j = 0; j < gridmap[i].length; j++) {
                if (gridmap[i][j]) {
                    return {'col': i + 1, 'row': j + 1};
                }
            }
        }
        return false;
    }
    // rotates between various station types
    function change_station_type(DOMobject) {
        if ($('body').hasClass('changing')) {
            if (DOMobject.hasClass('type-one')) {
                DOMobject.removeClass('type-one').addClass('type-two');
            } else if (DOMobject.hasClass('type-two')) {
                DOMobject.removeClass('type-two').addClass('type-three');
            } else if (DOMobject.hasClass('type-three')) {
                DOMobject.removeClass('type-three').addClass('type-one');
            }
        }
    }
    // these are kind of self-explanatory
    function delete_workstation(DOMobject) {
        var current_gridster = gridsters_holder[$(DOMobject).parents('li[data-level="one"]').attr('data-id')];
        current_gridster.remove_widget($(DOMobject).parent('li'));
    }
    function delete_room(DOMobject) {
        var confirm = window.confirm('Are you sure you wish to delete this configuration?');
        if (confirm == true) {
            delete gridsters_holder[$(DOMobject).parents('li[data-level="one"]').attr('data-id')];
            var current_widget = $(DOMobject).parent('li[data-level="one"]');
            gridster_level_1.remove_widget(current_widget);
        }
    }
});
</script>
       <?php include('footer.php'); ?>

