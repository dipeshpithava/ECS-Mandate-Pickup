<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/datatable/css/jquery.dataTables.css">
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
          	<h1>Transaction Details for <?=$investor_id?></h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <table cellspacing="0" id="display_table">
                    <tr>
					<?php if(@$investor_screen){?>
						<td>Investor Id</td>
						<td><?=$investor_screen->investor_id?></td>
					</tr>
					<tr>
						<td>User Email</td>
						<td><?=$investor_screen->email_id?></td>
					</tr>
					<tr>
						<td>Pin</td>
						<td><?=$investor_screen->pincode?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><?=$investor_screen->address?></td>
					</tr>
					<tr>
						<td>City</td>
						<td><?=$investor_screen->city?></td>
					</tr>
					<tr>
						<td>state</td>
						<td><?=$investor_screen->state?></td>
					</tr>
					<tr>
						<td>Date of Pickup</td>
						<td><?=$investor_screen->date_of_pickup?></td>
					</tr>
					  
						<?php } ?>
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
