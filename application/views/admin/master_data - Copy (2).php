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
          	<h1>Investor Master Data</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
                      <th>
                          Investor user id
                      </th>
                      <th>
                          Investor PAN
                      </th>
                      <th>
                          Investor Name
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                  foreach($all_investors as $all_investors_row){
                    ?>
                    <tr>
                      <td><a href="<?=base_url()?>admin/transactions/<?=$all_investors_row->investor_user_id?>"><?=$all_investors_row->investor_user_id?></a></td>
                      <td><?=$all_investors_row->investor_pan?></td>
                      <td><?=$all_investors_row->investor_name?></td>
                      <td><a href="#">View</a> | <a href="#">Inbox</a> | <a href="<?=base_url()?>admin/pdf/<?=$all_investors_row->investor_user_id?>" target="_blank">PDF</a></td>
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
