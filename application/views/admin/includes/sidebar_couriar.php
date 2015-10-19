<?php
	//If Admin then Client, if other than Admin then Agency Logged In.
	$CI =& get_instance();
	$CI->load->library('ion_auth');
	$is_admin = $CI->ion_auth->is_admin();
	//1 for admin 0 for non-admin.
	//print_r($group_name);
?>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="javascript:void(0);"><img src="<?=base_url()?>assets/images/logo.png" class="" width="90px"></a></p>
				          <li>
                      <a href="<?=base_url()?>courier/holiday_list">
                          <i class="fa fa-dashboard"></i>
                          <span>Holiday List</span>
                      </a>
                  </li>
				          <li>
                      <a href="<?=base_url()?>courier/dump_data">
                          <i class="fa fa-dashboard"></i>
                          <span>Upload Pickup Data</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?=base_url()?>courier/down_excel">
                          <i class="fa fa-dashboard"></i>
                          <span>Download Pickup Data</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
          
          <script>
            $('.sidebar-menu li a').removeClass('active');
            $('#menu_<?=strtolower($this->uri->segment(2, 0))?>').addClass('active');
          </script>