 <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                  
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        
                       
                        <li class="heading">
                            <h3 class="uppercase">Page List</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="index.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Page</span>
                                <span class="arrow"></span>
                            </a>
                            
                        </li>
                       
<?php if(isset($_GET['page'])){ ?>
<?php if($_GET['mode']=="display")
{ } else { ?>
                        <li class="nav-item  " style="margin-top: 20px;
padding-top: 20px;
border-top: 1px solid #f1f1f1;padding-left:10px;padding-right:10px;">

                            <p style="color:#fff;font-weight:bold;">Please Enter Cell Name<p>
                                 <input type="text" id="cell_name" maxlength="8" value="" placeholder="(8 Character Limit)" style="width:100%;margin-bottom: 5px;" />

                                <div class="add-room" style="border:1px solid #ccc;padding:10px;color:#fff;text-align:center;">Create a New Cell</div>
                               </li>

<li class="heading" id="Cell_list" >
<div class="left_grid">
<ul  class="level-two1">
<li  class="" style="background:#32c5d2;" data-color="#32c5d2" data-id="3" data-parrent="2">
</li>
<li   class="" style="background:#8e44ad;" data-color="#8e44ad" data-id="4" data-parrent="2">
</li>
<li  class="" style="background:#e7505a;" data-color="#e7505a" data-id="5" data-parrent="2">
</li>
</ul>
</div>
</li>


<li class="heading">

<h3 class="uppercase add-compactor add" style="margin-top:10px !important;" data-color="#32c5d2" ><span class="r dd" style="color:#fff !important;">&nbsp&nbsp&nbsp</span><span class="title " >  Compactor </span> </h3>
                                       </li>

<li class="heading">

<h3 class="uppercase add-clamper add" style="margin-top:10px !important;" data-color="#8e44ad"><span class="b dd" style="color:#fff !important;">&nbsp&nbsp&nbsp</span> <span class="title ">  Clamper </span>
                                        <span class="selected"></span> </h3></li>

<li class="heading">

<h3 class="uppercase add-examiner add" style="margin-top:10px !important;" data-color="#e7505a"><span class="o dd" style="color:#fff !important;">&nbsp&nbsp&nbsp</span> <span class="title" >  Examiner </span>
                                        <span class="selected"></span> </h3></li>







                               
<?php } } ?>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->


