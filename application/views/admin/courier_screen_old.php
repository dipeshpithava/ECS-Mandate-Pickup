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
         <?php include_once('includes/sidebar_couriar.php'); ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h1>Pickups for Tomorrow</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
                      <th>Address</th>
                      <th>Landmark</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Pincode</th>
                      <th>Location Type</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                  foreach($courier_details as $courier_details_row){
                    ?>
                    <tr>
                      <td><?=$courier_details_row->address?></td>
                      <td><?=$courier_details_row->landmark?></td>
                      <td><?=$courier_details_row->city?></td>
                      <td><?=$courier_details_row->state?></td>
                      <td><?=$courier_details_row->pincode?></td>
                      <td><?=$courier_details_row->location_type?></td>
                      <td><?=$courier_details_row->status?></td>
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
