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

