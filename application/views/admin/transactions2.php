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
          	<h1>Transactions</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <table cellspacing="0" border="1" id="display_table">
                  <tbody>
                    <tr>
                      <td>Transaction Id</td>
                      <td><?=$investor_transaction->transactionId?></td>
                    </tr>
                    <tr>
                      <td>Investor Id</td>
                      <td><?=$investor_transaction->investorId?></td>
                    </tr>
                    <tr>
                      <td>Investor Name</td>
                      <td><?=$investor_transaction->InvestorName?></td>
                    </tr>
                    <tr>
                      <td>Folio No</td>
                      <td><?=$investor_transaction->folioNo?></td>
                    </tr>
                    <tr>
                      <td>Investor ID1</td>
                      <td><?=$investor_transaction->investor_id1?></td>
                    </tr>
                    <tr>
                      <td>amc Name</td>
                      <td><?=$investor_transaction->amc_Name?></td>
                    </tr>
                    <tr>
                      <td>amfi Scheme Code</td>
                      <td><?=$investor_transaction->amfiSchemeCode?></td>
                    </tr>
                    <tr>
                      <td>scheme Name</td>
                      <td><?=$investor_transaction->scheme_Name?></td>
                    </tr>
                    <tr>
                      <td>Transaction Amount</td>
                      <td><?=$investor_transaction->transactionAmount?></td>
                    </tr>
                    <tr>
                      <td>Transaction Quantity</td>
                      <td><?=$investor_transaction->transactionQuantity?></td>
                    </tr>
                    <tr>
                      <td>Transaction Price</td>
                      <td><?=$investor_transaction->transactionPrice?></td>
                    </tr>
                    <tr>
                      <td>Transaction Status</td>
                      <td><?=$investor_transaction->transactionStatus?></td>
                    </tr>
                    <tr>
                      <td>Transaction Type</td>
                      <td><?=$investor_transaction->transactionType?></td>
                    </tr>
                    <tr>
                      <td>Transaction Sub Type</td>
                      <td><?=$investor_transaction->transaction_Subtype?></td>
                    </tr>
                    <tr>
                      <td>Date Time</td>
                      <td><?=$investor_transaction->t_cre_time?></td>
                    </tr>
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
