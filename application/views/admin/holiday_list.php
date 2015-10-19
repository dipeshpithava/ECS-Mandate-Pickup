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

	<script>
	$(function() {
    $( "#holiday_date" ).datepicker({
		dateFormat: "yy-m-dd",
		minDate: 1,
		maxDate: '+6m', 
		changeMonth: true
	});
	});
  
  $(document).on("click","#delete_button",function(){
		var data = $(this).data("value");
			$.ajax({
			url:"<?=base_url()?>courier/holiday_list",
			type: "post",
			data:{
				id:data,
			},
			success:function(akhi){
				location.reload();
			}
			});
  });
  
  $(document).on("click","#insert_btn",function(){
	  var remark = $("#remark").val();
	  var date = $("#holiday_date").val();
			$.ajax({
			url:"<?=base_url()?>courier/holiday_list",
			type: "post",
			data:{
				remark:remark,
				date:date,
				val :1
			},
			success:function(akhi){
				location.reload();
				//location.reload();
			}
			});
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
        <?php include_once('includes/sidebar_couriar.php'); ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1>Holiday List</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
        				<input type="text" id="holiday_date" placeholder="YY/MM/DD"></input>
        				<input type="textarea" id="remark" placeholder="On Account Off"></input>
        				<input type="button" id="insert_btn" value="Add New Holiday"></input>
                <table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
                      <th>holiday_date</th>
                      <th>remark</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                  foreach($all_holiday as $all_holiday_row){
					  $list =  date('d F Y', strtotime($all_holiday_row->holiday_date));
                    ?>
                    <tr>
                       <td><?=$list?></td>
                      <td><?=$all_holiday_row->remark?></td>
					  <td><input type="button" id="delete_button" data-value="<?=$all_holiday_row->id?>" value="Delete"></input></td>
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
  
  </body>
</html>
