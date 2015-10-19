<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/datatable/css/jquery.dataTables.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<style type="text/css">
	.error{
		color:#f00 !important;
	}
	#pin_error{
		color:"red";
	}
	</style>
	<script>
	function apply_filter(){
		// console.log("called");
		$("#display_table_container").html("<img src='<?=base_url()?>assets/images/loader.gif' style='display: block; margin: 0 auto;' />");
		var valuess= $("#select_status").val();
		var inv_id = $("#txt_investor_id").val();
		var inv_name = $("#txt_investor_name").val();
		var inv_email = $("#txt_investor_email_id").val();
		var inv_pan = $("#txt_investor_pan").val();
		$.ajax({
			url:"<?=base_url()?>admin/master/status",
			type: "post",
			data: "txt_investor_id="+inv_id+"&txt_investor_email_id="+inv_email+"&txt_investor_pan="+inv_pan+"&filter="+valuess+"&txt_investor_name="+inv_name,
			success:function(response){
				$("#display_table_container").html(response);
				$("#display_table").dataTable();
			}
		});
	}

	<?php
	$dates = "";
	foreach($disabled_dates as $disabled_dates_row){
		$dates .= date("d-m-Y", strtotime($disabled_dates_row->holiday_date)).',';
		// $dates .= '"'.$disabled_dates_row->holiday_date.'",';
	}
	$dates = rtrim($dates, ",");
	?>
	var arr = "<?=$dates?>";

	function disabledays(date) {
	    var ymd = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
	        //if u have to disable a list of day
			
	        var list = arr.split(",");
	         if ($.inArray(ymd, list) >= 0) {
	        return [false];
	    } else {
	        //Show accept sundays
	        var day = date.getDay();
	        return [(day == 1 || day == 2 || day == 3 || day == 4 ||day == 5 ||day == 6 )];
	    }
	}

	$(function() {
	    $( "#pickup_date" ).datepicker({
			dateFormat: "yy-m-dd",
			minDate: 1,
			maxDate: '7', 
			changeMonth: true,
			beforeShowDay: disabledays
		});
	});

	$(document).on("click",".send_msg",function(){
		var txt_inv_id = $(this).data("invid");
		$.ajax({
			url: '<?=base_url()?>admin/send_msg',
			data: 'txt_inv_id='+txt_inv_id,
			type: 'post',
			success: function(response){
				if(response == "sent"){
					alert("Message sent.");
				}else{
					alert(response);
				}
			}
		});
	});
	
	$(document).on("change", "#select_priority", function(){
		var priority = $(this).val();
		$.ajax({
			url: "<?=base_url()?>admin/master/priority/"+priority,
			type: "post",
			success: function(response){
				console.log(response);
				//$("#display_table_container").html(response);
				//$('#display_table').dataTable();
			}
		});
	});

	$(document).on("click", "#apply_filter", function(){
		apply_filter();
	});

	$(document).on("change","#select_status",function(){
		//apply_filter();
	});
	
	$(document).on("click","#cross, .close_sch",function(){
		$(".overlay-form").fadeOut();
		$("#forms")[0].reset();
		
	});
	
	$(document).on("focus","input",function(){
		var pin_val= $("#pin").val();
		if(pin_val!=""){
			$.ajax({
				url:"<?=base_url()?>admin/pincheck",
				type: "post",
				data:{
					filter:pin_val
				},
				success:function(akhi){
					var js = $.parseJSON(akhi);
					var alerts = js.alert;
					var city = js.city;
					var state = js.state;
					if(alerts=="go ahead"){
						$("#city").val(city);
						$("#state").val(state);
					}else if(alerts == "not get pin"){
						//alert("Enter correct pin no");
						$("#pin_error").html("Enter correct pin no");
						setTimeout(function(){$('#pin_error').html(''); 
						}, 5000);
					}
				}
			});
		}
	});
	
	$(document).on("click","#scheduleds",function(){
		var data = $(this).data("schedule");
		var emailss = $(this).data("emails");
		var user_ids = $(this).data("user_id");
		$("#email").val(emailss);
		$("#current_user_id").val(user_ids);
		$("#current_schedule").val(data);
		if(data!=""){
			$.ajax({
				url:"<?=base_url()?>admin/user_data",
				type: "post",
				data:{
					user_val:user_ids
				},
				success:function(akhi){
					var js = $.parseJSON(akhi);
					var pincode = js.pincode;
					var address = js.address;
					var landmark = js.landmark;
					var city = js.city;
					var state = js.state;
					var date_of_pickup = js.date_of_pickup;
					var time_of_pickup = js.time_of_pickup;
					$("#pin").val(pincode);
					$("#address").val(address);
					$("#landmark").val(landmark);
					$("#city").val(city);
					$("#state").val(state);
					$("#pickup_date").val(date_of_pickup);
					
					}
			});
		}
		$(".overlay-form").fadeIn();
		
	});
	
	$(document).on("click","#submitt",function(){
		pin_val = $("#pin").val();
		if(pin_val==""){
			$("#pin_error").html("cant left blank");
		}
		else if(pin_val!=""){
			$.ajax({
				url:"<?=base_url()?>admin/pincheck",
				type: "post",
				data:{
					filter:pin_val
				},
				success:function(akhi){
					var js = $.parseJSON(akhi);
					var alerts = js.alert;
					var city = js.city;
					var state = js.state;
					if(alerts=="go ahead"){
						$("#city").val(city);
						$("#state").val(state);
						$.ajax({
							url:"<?=base_url()?>admin/submit_data",
							type: "post",
							data: $('#forms').serialize(),
							success:function(akhi){
								if(akhi!=""){
									//alert(akhi);
									location.reload();
								}
							}
						});
					}else if(alerts == "not get pin"){
						//alert("Enter correct pin no");
						$("#pin_error").html("Enter correct pin no");
					}
		}

	});
		}
		});
	</script>
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
          	<h1>Courier Master</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                
                Investor ID: <input type="text" id="txt_investor_id" />
                Investor Name: <input type="text" id="txt_investor_name" />
                Investor EmailID: <input type="text" id="txt_investor_email_id" />
                Investor PAN: <input type="text" id="txt_investor_pan" />

                <br>
                <br>
			
				<select name="select_status" id="select_status">
					<option value="">Select Status</option>
					<option value="scheduled">Scheduled</option>
					<option value="rescheduled">Rescheduled</option>
					<option value="unscheduled">Unscheduled</option>
					<option value="waiting for pickup from customer">Waiting for Pickup from Customer</option>
					<option value="waiting for delivery to MU">Waiting for Delivery to MU</option>
					<option value="received by MU">Received by MU</option>
					<option value="in Process">In Process</option>
					<option value="rejected">Rejected</option>
					<option value="accepted">Accepted</option>
					<option value="mandate active">mandate active</option>
				</select>
				<select disabled name="select_KYC" id="select_status">
					<option>Select KYC</option>
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
				<select disabled name='select_priority' id="select_priority">
					<option value="">Select Priority</option>
					<option value="high">High</option>
					<option value="medium">Medium</option>
					<option value="low">Low</option>
				</select>
				<input type="button" id="apply_filter" value="Search" />

				<br>
				<br>

				<div class="overlay-form" style="display:none">
				<div class="col-md-12">
					<a href="javascript:void(0);" class="cross-btn"><i class="glyphicon glyphicon-remove" id="cross"></i></a>
				</div>
				<div class="col-md-8 col-center">
				<div id="pop_up">
				<form id="forms" class="form-horizontal" name="form" onsubmit="return show_loader();">
				<input type="hidden" name="current_schedule" id="current_schedule" value=""></input>
				<input type="hidden" name="current_user_id" id="current_user_id" value=""></input>
				<div class="form-group">
    <label class="control-label col-sm-2 text-center1" for="email">Email:</label>
    <div class="col-sm-5">
		<input type="text" name="email" class="form-control" readonly id="email" value=""></input>
		<span class="error" id="email_error"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-sm-2 text-center1" for="email">Pin:</label>
    <div class="col-sm-5">
		<input type="text" name="pin" class="form-control" id="pin"></input>
		<span class="error" id="pin_error"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-sm-2 text-center1" for="email">Address:</label>
    <div class="col-sm-5">
		<input type="text" name="address" class="form-control" id="address"></input>
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-sm-2 text-center1" for="email">Landmark:</label>
    <div class="col-sm-5">
		<input type="text" name="landmark" class="form-control" id="landmark"></input>
    </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2 text-center1" for="email">City:</label>
    <div class="col-sm-5">
	<input type="text" name="city" class="form-control" readonly id="city"></input>
    </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2 text-center1" for="email">State:</label>
    <div class="col-sm-5">
	<input type="text" name="state" class="form-control" readonly id="state"></input>
    </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2 text-center1" for="email">Pickup Date:</label>
    <div class="col-sm-5">
	<input type="text" name="pickup_date" class="form-control" id="pickup_date"></input>
    </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2 text-center1" for="email">Pickup Time:</label>
    <div class="col-sm-5">
	<select name="select_time" id="select_time" class="form-control">
	<option value="">select</option>
	<option value="10:00 AM To 01:00 PM">10:00 AM To 01:00 PM</option>
	<option value="01.00 PM To 06.00 PM">01.00 PM To 06.00 PM</option>
	</select>
    </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2 text-center1" for="email"></label>
    <div class="col-sm-5">
	<input type="button" id="submitt" class="btn btn-success form-control" value="Confirm">
	<br/>
	<br/>
	<input type="button" id="submitt" class="btn btn-success form-control close_sch" value="Cancel">
    </div>
  </div>
				</div>
				
				
			
					
					
				</form>
				</div>
				</div><!--endoverlay-->
				<div id="display_table_container">
                <!-- Data will come dynamically. -->
                </div>
              </div>
          	</div>
			
		</section><!-- /wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

  <?php include_once('includes/site_bottom_scripts.php'); ?>
  </body>
</html>
