<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/datatable/css/jquery.dataTables.css">
    <style>
      .no_display{
        display: none;
      }
    </style>
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
          	<h1>Update Status</h1>
            <hr>
          	<div class="row mt">
              <div class="col-lg-12">
                <form action="<?=base_url()?>index.php/admin/search_status" method="post" class="frm_search_status_update" onsubmit="return show_loader();">
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
  <script>
    $(document).on("click", ".remarks", function(){
      $(".remark_actions, .remarks").removeClass("no_display");
      $(".txt_remark_area").addClass("no_display");

      var investor_id = $(this).data("item");
      $("#txt_"+investor_id).removeClass("no_display");
      $(this).addClass("no_display");
    });
    $(document).on("click", ".can_btn_remark", function(){
      $(".remark_actions, .txt_remark_area").addClass("no_display");
      $(".remarks").removeClass("no_display");
    });
    $(document).on("click", ".save_btn_remark", function(){
      var investor_id = $(this).data("invid");
      var new_remark = $("#txt_"+investor_id).val();
      $.ajax({
        url: "<?=base_url()?>admin/ajax_change_remark",
        type: "post",
        data: "txt_inv_id="+investor_id+"&txt_remark="+new_remark,
        success: function(response){
          if(response.status == "success"){
            alert(response.message);
            location.reload();
          }else{
            alert(response.message);
          }
        }
      });
    });
    $(document).on("click", ".update_status", function(){
      $(".actions, .status_dropdown").addClass("no_display");
      $(".update_status").removeClass("no_display");

      var el_id = $(this).data("item");
      $("#status_"+el_id+", #action_"+el_id).removeClass("no_display");
      $(this).addClass("no_display");
    });
    $(document).on("click", ".can_btn", function(){
      $(".actions, .status_dropdown").addClass("no_display");
      $(".update_status").removeClass("no_display");
    });
    $(document).on("click", ".save_btn", function(){
      var investor_id = $(this).data("invid");
      var new_status = $("#status_"+investor_id).val();
      $.ajax({
        type: "post",
        data: "txt_inv_id="+investor_id+"&txt_new_status="+new_status,
        url: "<?=base_url()?>admin/ajax_change_status",
        success: function(response){
          if(response.status == "success"){
            alert(response.message);
            location.reload();
          }else{
            alert(response.message);
          }
        }
      });
    });
  </script>
  </body>
</html>
