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

  <?php include_once('includes/site_bottom_scripts.php'); ?>
  </body>
</html>
