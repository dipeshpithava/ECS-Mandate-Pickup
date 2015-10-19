<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/datatable/css/jquery.dataTables.css">
	 

	<script>
	
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
                <!--<a href="">Export Data</a>-->
                <table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
					  <th>Investor Id</th>
                      <th>User Email</th>
                      <th>Date Of Birth</th>
					  <th>Investor PAN</th>
					  <th>Account No</th>
					  <th>Confirmation Date</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
				if(@$courier_send_list){
                  foreach($courier_send_list as $courier_list){
						$courier_list->user_status;                   
						?>
                    <tr>
					  <td><?=$courier_list->investor_user_id?></td>
                      <td><?=$courier_list->myuniverse_email_id?></td>
                      <td><?=$courier_list->investor_dob?></td>
					  <td><?=$courier_list->investor_pan?></td>
					  <td><?=$courier_list->bank_account_no?></td>
					  <td><?=$courier_list->date_time?></td>
                    </tr>
                    <?php
                  }}
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
