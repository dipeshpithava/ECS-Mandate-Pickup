<?php
	//If Admin then Client, if other than Admin then Agency Logged In.
	$CI =& get_instance();
	$CI->load->library('ion_auth');
	$is_admin = $CI->ion_auth->is_admin();
	//1 for admin 0 for non-admin.
	//print_r($group_name);
?>
          <div id="sidebar" sytle="z-index:99;" class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="javascript:void(0);"><img src="<?=base_url()?>assets/images/logo.png" class="" width="90px"></a></p>
                  <li>
                      <a href="<?=base_url()?>admin/investors">
                          <i class="fa fa-dashboard"></i>
                          <span>Master Detail</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?=base_url()?>admin/status_update">
                          <i class="fa fa-dashboard"></i>
                          <span>Status Update</span>
                      </a>
                  </li>
				  <li>
                      <a href="<?=base_url()?>admin/holiday_list">
                          <i class="fa fa-dashboard"></i>
                          <span>Holiday List</span>
                      </a>
                  </li>
				  <li>
                      <a href="<?=base_url()?>admin/send_courier">
                          <i class="fa fa-dashboard"></i>
                          <span>Courier Myself</span>
                      </a>
                  </li>
				  <li>
                      <a href="<?=base_url()?>admin/master">
                          <i class="fa fa-dashboard"></i>
                          <span>Master Screen</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
          
          <script>
            $('.sidebar-menu li a').removeClass('active');
            $('#menu_<?=strtolower($this->uri->segment(2, 0))?>').addClass('active');
          </script>