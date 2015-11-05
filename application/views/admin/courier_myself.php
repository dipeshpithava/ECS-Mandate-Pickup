<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/datatable/css/jquery.dataTables.css">
	   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<script>
  

  $(document).on("click","#cross, .close_sch",function(){
    $(".overlay-form").fadeOut();
    $("#forms")[0].reset();
    
  });

	 $(document).on("click","#scheduleds",function(){
    var emailss = $(this).data("emails");
    var user_ids = $(this).data("user_id");
    var data = "courier myself";
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
          	<h1>Courier Myself</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <form action="<?=base_url()?>index.php/admin/search_courier_myself" method="post" class="frm_search_master_data">
                  Investor ID:
                  <input type="text" name="txt_investor_id" />
                  Investor Name:
                  <input type="text" name="txt_investor_name" />
                  Investor Email ID:
                  <input type="text" name="txt_investor_emailid" />
                  Investor PAN:
                  <input type="text" name="txt_investor_pan" />
                  <input type="submit" value="Search" />
                </form>
                <br>
                <br>
                <div id="data_container">
                  <!-- Data will come dynamically. -->
                </div>
              </div>
          	</div>
			
		</section><!-- /wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

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

  <?php include_once('includes/site_bottom_scripts.php'); ?>
  <script type="text/javascript">
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
      maxDate: '1m', 
      changeMonth: true,
      beforeShowDay: disabledays
    });
  });
  </script>
  </body>
</html>
