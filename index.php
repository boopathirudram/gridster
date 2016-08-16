<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
$(".deletepage").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;

if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "processupdate.php",
   data: info,
   success: function(data){
   	
   	 if (data == 1) {
                $(".message").html("<style='width:30px;height:25px;color:red'/>Record Deleted");
                
                   }
                   else {
                          
                          $(".message").html(" Delete Error");
                            }
 }
});
 
 }
return false;
});
});
</script>
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
                                <span>Dashboard</span>
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
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 
                    </h3>
   <div class="portfolio-content portfolio-1">
                        
                        <div style="height: 921px;" id="js-grid-juicy-projects" class="cbp cbp-caption-active cbp-caption-overlayBottomReveal cbp-ready"><div class="cbp-wrapper-outer"><div class="cbp-wrapper">
<?php 
$pagequery="select * from page where status=1";
$result=mysql_query($pagequery);
$pagecount=mysql_num_rows($result);
if($pagecount!=0)
{
?>
<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                               
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                  <a href="newpage.php">  <button class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button></a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                  
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                         <p class="message"></p>
                                        <thead>
                                            <tr>
                                                <th> PageId </th>
                                                <th> PageName </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>                                  														                                  
                                        
                                        <tbody>
                                        <?php 
																				
														$pagequery="select * from page where status=1";
														$result=mysql_query($pagequery);
														 while($row = mysql_fetch_array($result)) 
														{
															$key="encrypt";
$action="encrypt";

$page=simple_crypt($key,$row['page_id'],$action);
														?>    
                                            <tr>
                                                <td> <?php echo $row['page_id'];?> </td>
                                                <td> <?php echo $row['page_name'];?>  </td>
                                                                                   
                                                <td>
                                                    <span class="action"><a href="#" id="<?php echo $row['page_id']; ?>" class="deletepage" title="deletepage"> Delete </a></span>
                                                </td>
                                                
                                                <td>
                                                    <span class="action"><a href="page.php?page=<?php echo $page; ?>&mode=edit" id="<?php echo $row['page_id']; ?>" class="viewpage" title="viewpage"> view </a></span>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
            <?php } else { ?>
<div class="note note-success">
                                <h4 class="block">No Page Available Here.</h4>
                                <p class="paddingbottom40px"> Bootbox.js is a small JavaScript library which allows you to create programmatic dialog boxes using Twitter’s Bootstrap modals, without having to worry about creating, managing or removing any of the required DOM elements
                                    or JS event handlers. </p>

                                


                            </div>

<div class="portlet light bordered" style="margin:0 auto;width:50%;">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Page Settings</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body form">
                                    <form action="processupdate.php" class="form-horizontal" method="post">
<div class="form-body">
<div class="form-group">
                                                <input type="hidden" name="data_up" value="page_cr" />
                                                <div class="col-md-12">
                                                    <input class="form-control" placeholder="Please Enter Page Name " name="pagename" type="text">
                                                   
                                                </div>
                                            </div>

</div>
<div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            
                                        </div>

</form>
                                </div>
                            </div>



<h3 align='center'></h3>

 <?php } ?> 
    
            </div>
</div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
<div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body"> Modal body goes here </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

       <?php include('footer.php'); ?>

