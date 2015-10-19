<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/datatable/css/jquery.dataTables.css">
    <style>
      .no_display{
        display: none;
      }
    </style>
  </head>
  <body>
  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="javascript:void(0);" class="logo"><b>Menu</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                   
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=base_url()?>index.php/auth/logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
        <?php include_once('includes/sidebar.php'); ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1>Update Status</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
                      <th>Investor ID</th>
                      <th>MU Email ID</th>
                      <th>Full Address</th>
                      <th>Location Type</th>
                      <th>Date &amp; Time of Pickup</th>
                      <th>Status</th>
                      <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                  foreach($all_status as $all_status_row){
                    ?>
                    <tr>
                      <td><?=$all_status_row->investor_id?></td>
                      <td><?=$all_status_row->email_id?></td>
                      <td><?=$all_status_row->address?> <?=$all_status_row->landmark?> <?=$all_status_row->city?> <?=$all_status_row->state?> <?=$all_status_row->pincode?> </td>
                      <td><?=$all_status_row->location_type?></td>
                      <td><?=$all_status_row->date_of_pickup?> <?=$all_status_row->time_of_pickup?></td>
                      <td>
                        <a href="javascript:void(0);" data-item="<?=$all_status_row->investor_id?>" class="update_status"><?=$all_status_row->status?></a>
						<select name="" id="status_<?=$all_status_row->investor_id?>" class="no_display status_dropdown">
						<?php if($all_status_row->status==strtolower("courier myself")){?>
							<option value="scheduled">scheduled</option>
							<option value="scheduled">rescheduled</option>
						<?php }else if($all_status_row->status==strtolower("scheduled")){?>
							<option value="rescheduled">rescheduled</option>
							<option value="waiting for pickup from customer">waiting for pickup from customer</option>
						<?php }else if($all_status_row->status==strtolower("rescheduled")){?>
							<option value="rescheduled">rescheduled</option>
							<option value="waiting for pickup from customer">waiting for pickup from customer</option>
						<?php }else if($all_status_row->status==strtolower("waiting for pickup from customer")){?>
							<option value="rescheduled">rescheduled</option>
							<option value="waiting for delivery to mu">waiting for delivery to mu</option>
						<?php }else if($all_status_row->status==strtolower("waiting for delivery to mu")){?>
							<option value="received by mu">received by mu</option>
						<?php }else if($all_status_row->status==strtolower("received by mu")){?>
							<option value="in process">in process</option>
						<?php }else if($all_status_row->status==strtolower("in process")){?>
							<option value="rejected">rejected</option>
						<?php }else if($all_status_row->status==strtolower("rejected")){?>
							<option value="scheduled">scheduled</option>
							<option value="unscheduled">unscheduled</option>
						<?php }else if($all_status_row->status==strtolower("accepted")){?>
							<option value="mandate active">mandate active</option>
							<option value="rescheduled">rescheduled</option>
						<?php }else if($all_status_row->status==strtolower("mandate active")){?>
							<option value="mandate active">mandate active</option>
						<?php }?>
						</select>
                        <!--<select name="" id="status_<?=$all_status_row->investor_id?>" class="no_display status_dropdown">
                          <option <?=$all_status_row->status==strtolower("Unscheduled")?"selected":""?> value="Unscheduled">Unscheduled</option>
                          <option <?=$all_status_row->status==strtolower("Scheduled")?"selected":""?> value="Scheduled">Scheduled</option>
                          <option <?=$all_status_row->status==strtolower("Rescheduled")?"selected":""?> value="Rescheduled">Rescheduled</option>
                          <option <?=$all_status_row->status==strtolower("Waiting for Pickup from Customer")?"selected":""?> value="Waiting for Pickup from Customer">Waiting for Pickup from Customer</option>
                          <option <?=$all_status_row->status==strtolower("Waiting for Delivery to MU")?"selected":""?> value="Waiting for Delivery to MU">Waiting for Delivery to MU</option>
                          <option <?=$all_status_row->status==strtolower("Received by MU")?"selected":""?> value="Received by MU">Received by MU</option>
                          <option <?=$all_status_row->status==strtolower("In Process")?"selected":""?> value="In Process">In Process</option>
                          <option <?=$all_status_row->status==strtolower("Rejected")?"selected":""?> value="Rejected">Rejected</option>
                          <option <?=$all_status_row->status==strtolower("Accepted")?"selected":""?> value="Accepted">Accepted</option>
                          <option <?=$all_status_row->status==strtolower("Mandate Active")?"selected":""?> value="Mandate Active">Mandate Active</option>
                        </select>-->
                        <span id="action_<?=$all_status_row->investor_id?>" class="actions no_display">
                          <a href="javascript:void(0);" class="can_btn">Cancel</a>
                           | 
                          <a href="javascript:void(0);" data-invid="<?=$all_status_row->investor_id?>" class="save_btn">Save</a>
                        </span>
                        
                      </td>
                      <td>
                        <a href="javascript:void(0);" data-item="<?=$all_status_row->investor_id?>" class="remarks"><?=$all_status_row->remark==""?"No Remark":$all_status_row->remark?></a>
                        <textarea name="" id="txt_<?=$all_status_row->investor_id?>" cols="30" rows="5" class="txt_remark_area no_display"><?=$all_status_row->remark?></textarea>
                        <span id="remark_action_<?=$all_status_row->investor_id?>" class="remark_actions no_display">
                          <a href="javascript:void(0);" class="can_btn_remark">Cancel</a>
                           | 
                          <a href="javascript:void(0);" data-invid="<?=$all_status_row->investor_id?>" class="save_btn_remark">Save</a>
                        </span>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                </tbody>
                </table>
              </div>
          	</div>
			
		</section><!-- /wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

  <?php include_once('includes/site_bottom_scripts.php'); ?>
  <script>
    $(document).on("click", ".remarks", function(){
      $(".remark_actions, .remarks").removeClass("no_display");
      $(".txt_remark_area").addClass("no_display");

      var investor_id = $(this).data("item");
      $("#txt_"+investor_id).removeClass("no_display");
      $(this).addClass("no_display");
    });
    $(document).on("click", ".can_btn_remark", function(){
      $(".remark_actions, .txt_remark_area").addClass("no_display");
      $(".remarks").removeClass("no_display");
    });
    $(document).on("click", ".save_btn_remark", function(){
      var investor_id = $(this).data("invid");
      var new_remark = $("#txt_"+investor_id).val();
      $.ajax({
        url: "<?=base_url()?>admin/ajax_change_remark",
        type: "post",
        data: "txt_inv_id="+investor_id+"&txt_remark="+new_remark,
        success: function(response){
          if(response.status == "success"){
            alert(response.message);
            location.reload();
          }else{
            alert(response.message);
          }
        }
      });
    });
    $(document).on("click", ".update_status", function(){
      $(".actions, .status_dropdown").addClass("no_display");
      $(".update_status").removeClass("no_display");

      var el_id = $(this).data("item");
      $("#status_"+el_id+", #action_"+el_id).removeClass("no_display");
      $(this).addClass("no_display");
    });
    $(document).on("click", ".can_btn", function(){
      $(".actions, .status_dropdown").addClass("no_display");
      $(".update_status").removeClass("no_display");
    });
    $(document).on("click", ".save_btn", function(){
      var investor_id = $(this).data("invid");
      var new_status = $("#status_"+investor_id).val();
      $.ajax({
        type: "post",
        data: "txt_inv_id="+investor_id+"&txt_new_status="+new_status,
        url: "<?=base_url()?>admin/ajax_change_status",
        success: function(response){
          if(response.status == "success"){
            alert(response.message);
            location.reload();
          }else{
            alert(response.message);
          }
        }
      });
    });
  </script>
  </body>
</html>
