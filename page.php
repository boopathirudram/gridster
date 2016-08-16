<!--Gridster js plugin code here -->
<link rel="stylesheet" type="text/css" href="assets/css/demo.css">
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="jquery.gridster.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="assets/css/jquery.gridster.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.bg-text
{
   color: #9B59B6;
font-size: 14px;
text-align: center;
margin-top: 40%;
letter-spacing: 1px;
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
<!--end of gridster js plugin code here -->
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
        <ul class="level-one" data-id="0">
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
<li style="display: list-item; position: absolute;" class="gs-w ready room player-revert" data-sizey="3" data-sizex="3" data-row="<?=$row;?>" data-col="<?=$col;?>" data-id="<?=$cell_id;?>" data-level="one">
<div class="add_settings"><ul class="setting_ul"><li class="add_cell" data-id="<?=$cell_id;?>">Add Details</li></ul></div>
<div id="background"><p class="bg-text"><?=$cell_name;?></p></div>
<div class="delete1"></div>
<ul  class="level-two">
<?php 
$work_query=mysql_query("select * from workstation where page_id=".$page_id." and cell_id=".$cell_id."");
while($res1=mysql_fetch_array($work_query))
{
$w_data=$res1['w_data_id'];
$color=$res1['color'];
$col1=$res1['col'];
$row1=$res1['row'];
 ?>
<li data-sizey="1" data-sizex="1" data-row="<?=$row1;?>" data-col="<?=$col1;?>" class="workstation type-one gs-w" style="background:<?=$color;?>; display: list-item; position: absolute;" data-id="<?=$w_data;?>" data-parrent="<?=$cell_id;?>">
<div class="delete" data-id="<?=$w_data;?>"></div></li>
<?php } ?>
</ul></li>

<?php } ?>
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
        <ul class="level-one" data-id="0">
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
<li style="display: list-item; position: absolute;cursor:pointer;" href="slide_panel.php?cell_id=<?=$cell_id?>&page_id=<?=$page_id?>" class="gs-w ready room player-revert view_cell11<?=$i?>" data-slidepanel="panel"  data-sizey="3" data-sizex="3" data-row="<?=$row;?>" data-col="<?=$col;?>" data-id="<?=$cell_id;?>" data-level="one">
<div id="background"><p class="bg-text"><?=$cell_name;?></p></div>
<ul  class="level-two">
<?php 
$work_query=mysql_query("select * from workstation where page_id=".$page_id." and cell_id=".$cell_id."");
while($res1=mysql_fetch_array($work_query))
{
$w_data=$res1['w_data_id'];
$color=$res1['color'];
$col1=$res1['col'];
$row1=$res1['row'];
 ?>
<li data-sizey="1" data-sizex="1" data-row="<?=$row1;?>" data-col="<?=$col1;?>" class="workstation type-one gs-w" style="background:<?=$color;?>; display: list-item; position: absolute;" data-id="<?=$w_data;?>" data-parrent="<?=$cell_id;?>"><div class="delete" data-id="<?=$w_data;?>"></div></li>
<?php   } ?>
</ul></li>
<script>
$(".view_cell<?=$i?>").click(function(){
        alert("hi");
        $(this).addClass("active");
    });

</script>



<?php $i++; } ?>
</ul>
    </div>
   <?php } ?>
            </div>
</div>
            <!-- END CONTENT -->
            
        </div>
       <div id="myModal" class="modal fade" role="dialog" style="top:13% !important;width: 500px;left: 60%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cell Information</h4>
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
var gridster_level_2;
var gridster_level_0;
var gridsters_holder = {};
var id_counter = <?=$next?>;
var id_counter1=1;
var id_counter0=0;
var c_id;
var page_id=<?php echo $page_id; ?>;
$(document).ready(function() {
/*room click event for active purpose */
$('#main-app ul.level-one li').click(function(event) {
event.stopPropagation();
                $('#main-app ul.level-one li').removeClass('active');
                $('#main-app ul.level-one li').droppable({
  disabled: true
});

$('#main-app ul.level-one li').removeClass('drag');
                var data_id1=$(this).attr("data-id");

                $('#main-app ul.level-one li[data-id="' + data_id1 + '"]').addClass('active');


$('#main-app ul.level-one li[data-id="' + data_id1 + '"]').attr('id',data_id1);
$('#main-app ul.level-one li[data-id="' + data_id1 + '"]').addClass(data_id1);
                $('#main-app ul.level-one li[data-id="' + data_id1 + '"]').addClass('ready');
                $('#main-app ul.level-one li[data-id="' + data_id1 + '"]').addClass('ui-droppable');
$('#main-app ul.level-one li[data-id="' + data_id1 + '"]').droppable("enable");
                $(".add").attr("data-id",$(this).attr("attr-id"));
dragable(data_id1);

            });
 /* dragable and dropable code here for add workstation */
function dragable(data_id1)
{
$( ".left_grid ul li" ).draggable({ 
                 revert: "invalid", 
		
		helper: "clone",
		cursor: "move"

 });
$('#main-app ul.level-one li.active#'+data_id1).droppable({
accept: ".left_grid ul li",
        drop: function (e, ui) {
         
     var color=$(ui.draggable).attr("data-color");
       add_room_click(data_id1,color);
           id_counter1 += 1;
          
        }
    });
}

/* this for cell information sending code */
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

/*delete a room cell */

$('.delete').click(function(event) {
var id_de=$(this).attr("data-id");
                event.stopPropagation();
                delete_workstation1($(this),id_de);
            });
/*delete a workstation */
$('.delete1').click(function(event) {
                event.stopPropagation();

                delete_room($(this));

            });
/*add a new cell code here (old one functionality button click add new workstation)*/
$('.add_cell').click(function() {
                var dom=$(this).attr("data-id");

                $('#col_id').val($(".level-one li[data-id='" + dom + "']").attr("data-col"));
                $('#row_id').val($(".level-one li[data-id='" + dom + "']").attr("data-row"));
                $('#call_id').val(dom);

                $("#myModal").removeClass("fade");
                $("#myModal").show();

                return false;
            });
           $('ul.level-one li .workstation1').click(function() {
                alert("hi");
                var data_id1=$(this).attr("attr-id");
                $('#main-app ul.level-one li[data-id="' + data_id1 + '"]').addClass('active');
                $('#main-app ul.level-one li[data-id="' + data_id1 + '"]').removeClass('player-revert');
                $(".add").attr("data-id",$(this).attr("attr-id"));
            });

    
	
 $(".close").click(function(){
        $("#myModal").addClass("fade");
        $("#myModal").hide();
        $(".popup_model").hide();
  });



    gridster_level_1 = $('#main-app ul.level-one').gridster({
        /*namespace: 'ul.level-one',*/
        widget_base_dimensions: [50, 50],
        widget_margins: [5, 5],
        widget_selector:'ul.level-one li',
        shift_larger_widgets_down:false,
        avoid_overlapped_widgets:true,
         shift_widgets_up: false,
         max_rows:20,
         max_cols:20,
       fit_to_content:{
        max_cols:4,max_rows:4
},
        resize: {
            enabled: false
        }, 
      
       draggable: {
        <?php if($_GET['mode']=="display")
        { ?>
        ignore_dragging: true,
                 <?php } else { ?>
                   
                   start: function(event, ui){
                      event.preventDefault();
                      event.stopPropagation();   
                    },
                   drag: function(event, ui){
                      event.preventDefault();
                      event.stopPropagation();
                    },
                    stop: function (e, ui, $widget) {
                    
                        e.preventDefault();
			e.stopPropagation();
                        var col=this.player_grid_data.col;
                var row=this.player_grid_data.row; 
                var cell_id=ui.$player[0].dataset.id;
                

                        var insert="update_cell";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,id:cell_id,col: col, row:row,page_id:page_id },
                            function(data) {
                                alert(data);
                            }
                        );

                    },
limit: true
      <?php } ?>
                }
    }).data('gridster');

      var small_cell_parrentid=0;
      var small_cell_id=0;
      gridster_level_2 = $('ul.level-two').gridster({
                namespace: 'ul.level-two',
                widget_base_dimensions: [30, 30],
                widget_margins: [5, 5],
                shift_larger_widgets_down: false,
                 avoid_overlapped_widgets: false,
                shift_widgets_up: false,
                max_rows:4,
                max_cols:4,
                collision:{wait_for_mouseup:true},
                resize: {
                    enabled: false
                },
                
                draggable: {
           <?php if($_GET['mode']=="display")
              { ?>
              ignore_dragging: true,
            <?php } else { ?>
                    stop: function (e, ui, $widget) {
                e.stopPropagation();
                var col=this.player_grid_data.col;
                var row=this.player_grid_data.row; 
                var small_cell_id=ui.$player[0].dataset.id;
                var small_cell_parrentid=ui.$player[0].dataset.parrent; 
                var insert="update";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,id:small_cell_id,col:col,row:row,cell_id:small_cell_parrentid,page_id:page_id },
                            function(data) {
                                alert(data);
                            }
                        );

                 
   }
<?php } ?>
                }

            }).data('gridster');
/*end of workstation code */

/* add a room code here */
    $('.add-room').click(function() {
                  
                   var cell_name=$('#cell_name').val();
                   var page_id=<?php echo $page_id; ?>;
                 
                  if(cell_name!='')
                   {


var cell_name=$("#cell_name").val();
var page_id=<?php echo $page_id; ?>;
$.ajax({
url: "processupdate.php",
data:'data_name='+cell_name+'&page_id='+page_id+'&data_up=duplicated',
type: "POST",
success:function(data){
if(data==0)
{
add_room_click_large()

}
else
{

alert("already added cell for this page,Please Change Name");

}
}
});


             }
else
{
alert("Please Enter Name for Cell");
}
    });

/* room widget append code here */
function add_room_click_large()
{
var cell_name=$('#cell_name').val();
 var id_c=id_counter
                  var html = '<li data-id="' + id_counter + '" class="room" data-level="one"><div class="add_settings"><ul class="setting_ul"><li class="add_cell" data-id="' + id_counter + '" >Add Details</li></ul></div><div id="background"><p class="bg-text">'+cell_name+'</p></div><div class="delete1"></div><ul class="level-two"></ul></li>';
                  var width = parseInt(3);
                  var height = parseInt(3);
                  /*newly edited code gridster js */
                     gridster_level_1.set_cols = 18;
        gridster_level_1.set_rows = 18;
        gridsters_holder[0] = gridster_level_1;
 var coords = get_free_coords1(gridster_level_1);
                console.log(coords);
                      //console.log(current_gridster1);
                if(coords)
{
                  /* end of Newly edited code */ 
                  var new_gridster_dom = gridster_level_1.add_widget(html, width, height, coords.col, coords.row);
}
                  var col1=coords.col;
                  var row1=coords.row;
                  var page_id=<?php echo $page_id; ?>;
                  var insert="insert_cell";
                  $.post(
                      "processupdate.php",
                       { data_up:insert,data_id:id_counter,page_id:page_id,col:col1,row:row1,data_name:cell_name },
                       function(data) {
                       
                       }
                   );


                 $('li[data-id="' + id_counter + '"] > .delete1').click(function(event) {
                  event.stopPropagation();
                  delete_room($(this),id_counter);
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
$('#main-app ul.level-one li').click(function(e) {
e.stopPropagation();
                $('.level-one li').removeClass('active');
$('.level-one li').removeClass('ui-droppable');
                var data_id1=$(this).attr("data-id");
                $('.level-one li[data-id="' + data_id1 + '"]').addClass('active');
                $('.level-one li[data-id="' + data_id1 + '"]').addClass('ready');
                $(".add").attr("data-id",$(this).attr("attr-id"));
$( ".left_grid ul li" ).draggable({ 
                 revert: "invalid", 
		
		helper: "clone",
		cursor: "move"

 });
$('ul.level-one li[data-id="' + data_id1 + '"].active').droppable({
accept: ".left_grid ul li",
        drop: function (e, ui) {
         
     var color=$(ui.draggable).attr("data-color");
 add_room_click(data_id1,color);
           id_counter1 += 1;
          
        }
    });
            });
            



                 id_counter += 1;
}


/*edit Room Click */
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


    function add_room_click(data,color) {

          var gridster_level_2 = $('li[data-id="' + data + '"] ul.level-two').gridster({
                namespace: 'ul.level-two',
                widget_base_dimensions: [30, 30],
                widget_margins: [5, 5],
shift_larger_widgets_down: false,
                avoid_overlapped_widgets: false,
                shift_widgets_up: false,
                max_rows:4,
                max_cols:4,
                collision:{wait_for_mouseup:true},
                resize: {
                    enabled: false
                },
                
                draggable: {
                    stop: function (e, ui, $widget) {
                         var col=this.player_grid_data.col;
        var row=this.player_grid_data.row; 
        var small_cell_id=ui.$player[0].dataset.id;
        var small_cell_parrentid=ui.$player[0].dataset.parrent; 
        var insert="update";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,id:small_cell_id,col:col,row:row,cell_id:small_cell_parrentid,page_id:page_id },
                            function(data) {
                                alert(data);
                            }
                        );

                    }
                }

            }).data('gridster');

                gridster_level_2.set_cols = 4;
                gridster_level_2.set_rows = 4;
                gridsters_holder[data]=gridster_level_2;
                var gridster_id = data;
                var current_gridster = gridsters_holder[gridster_id];
                var html = '<li class="workstation type-one" style="background:'+color+'" data-id="' + id_counter1 + '" data-parrent="'+data+'"><div class="delete" data-id="' + id_counter1 + '"></div></li>';
                var coords = get_free_coords(current_gridster);
                console.log(coords);
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

function get_free_coords(current_gridster) {
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
        $.each(serialized, function(index, value) {
            for (var j = 0; j < value.size_y; j++) {
                for (var k = 0; k < value.size_x; k++) {
                    gridmap[value.col - 1 + j][value.row - 1 + k] = false;
                }
            }
        });
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
    function get_free_coords1(current_gridster) {
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
        $.each(serialized, function(index, value) {
            for (var j = 0; j < value.size_y; j++) {
                for (var k = 0; k < value.size_x; k++) {
                    gridmap[value.col - 1 + j][value.row - 1 + k] = false;
                }
            }
        });
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
 function delete_workstation1(DOMobject,data) {
    var data1=$(DOMobject).parents('li[data-level="one"]').attr('data-id');
    var gridster_level_2 = $('li[data-id="' + data1 + '"]').gridster({ }).data('gridster');;
        gridster_level_2.remove_widget($(DOMobject).parent('li'));
    var insert="Delete_small";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,cell_id:data1,page_id:page_id,w_cell:data },
                            function(data) {
                                alert(data);
                            }
                        );
    }
    function delete_room(DOMobject) {
        var confirm = window.confirm('Are you sure you wish to delete this configuration?');
        if (confirm == true) {
var data1=$(DOMobject).parents('li[data-level="one"]').attr('data-id');
            delete gridsters_holder[$(DOMobject).parents('li[data-level="one"]').attr('data-id')];
            var current_widget = $(DOMobject).parent('li[data-level="one"]');
            gridster_level_1.remove_widget(current_widget);
var insert="Delete_big";
                        $.post(
                            "processupdate.php",
                            { data_up:insert,cell_id:data1,page_id:page_id },
                            function(data) {
                                alert(data);
                            }
                        );

         $("#Cell_list" ).load( "dynamic_cell.php", {"page_id":<?php echo $page_id; ?>}); 
        }
    }
});
</script>
<script type="text/javascript">
/* slide panel code for display cell information */
      $(document).ready(function(){
          $('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'push'
          });
      });
</script>



<!--footer part -->
       <?php include('footer.php'); ?>

