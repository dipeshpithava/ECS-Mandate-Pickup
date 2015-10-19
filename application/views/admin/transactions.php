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
                  <thead>
                  <tr>
                      <th>Transaction Id</th>
                      <th>Investor Id</th>
                      <th>Investor Name</th>
                      <th>Folio No</th>
                      <th>Investor id1</th>
                      <th>Amc Name</th>
                      <th>Amfi Scheme Code</th>
                      <th>Scheme Name</th>
                      <th>Transaction Amount</th>
                      <th>Transaction Quantity</th>
                      <th>Transaction Price</th>
                      <th>Transaction Status</th>
                      <th>Transaction Type</th>
                      <th>Transaction Subtype</th>
                      <th>T cre Time</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                  foreach($investor_transaction as $all_transactions_row){
                    ?>
                    <tr>
                      <td><?=$all_transactions_row->transactionId?></td>
                      <td><?=$all_transactions_row->investorId?></td>
                      <td><?=$all_transactions_row->InvestorName?></td>
                      <td><?=$all_transactions_row->folioNo?></td>
                      <td><?=$all_transactions_row->investor_id1?></td>
                      <td><?=$all_transactions_row->amc_Name?></td>
                      <td><?=$all_transactions_row->amfiSchemeCode?></td>
                      <td><?=$all_transactions_row->scheme_Name?></td>
                      <td><?=$all_transactions_row->transactionAmount?></td>
                      <td><?=$all_transactions_row->transactionQuantity?></td>
                      <td><?=$all_transactions_row->transactionPrice?></td>
                      <td><?=$all_transactions_row->transactionStatus?></td>
                      <td><?=$all_transactions_row->transactionType?></td>
                      <td><?=$all_transactions_row->transaction_Subtype?></td>
                      <td><?=$all_transactions_row->t_cre_time?></td>
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
