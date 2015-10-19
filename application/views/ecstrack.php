<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title></title>
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/third_party/css/sweetalert.css">
<style type="text/css">
  .no_display{
    display: none;
  }
  /**/

.logoutRight { text-align:right;padding-right: 6px; padding-bottom:30px }
.logoutRight a {color:#fff; text-decoration:none;     font-size: 13px;}
.logoutRight a:hover {text-decoration:underline}

.customer-panel {margin-top: 0px!important;}

</style>
</head>

<body>
<!-- headerwrapper -->
<div class="headerWrapper">
  <div class="container">
    <div class="header">
      <div class="logo"><a href="https://stg.adityabirlamoneyuniverse.com/sitepages/homepage.aspx"><img src="<?=base_url()?>assets/images/myuniverse-logo.png" alt="Myuniverse Logo"></a></div>
      <div class="customer-panel">
        <div class="logoutRight"><a href="/Sitepages/logout.aspx">Logout</a></div>
        <div class="email-info"><a href="https://www.myuniverse.co.in/home.aspx"><img src="<?=base_url()?>assets/images/home-icon.png" width="20" height="20" alt="home-icon" class="email-icon home-icon"></a></div>
        <div class="email-info"><img src="<?=base_url()?>assets/images/email-icon.png" width="16" height="13" alt="email-icon" class="email-icon"> <a href="mailto:customercare@myuniverse.co.in" class="link">customercare@myuniverse.co.in</a></div>
        <div class="cell-info mobile-hide"><img src="<?=base_url()?>assets/images/mobile-icon.png" width="15" height="15" alt="email-icon" class="cell-icon"> <span class="cont-no">022-61802828</span> <span class="time-copy">(10am-7pm Mon - Sat)</span></div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

<!-- end headerwrapper -->

<!--banner -->
<div class="bannerWrapper">
  <div class="container">
    <div class="bannerPanel">
      <h1 class="h1-heading showIpad">Track your ECS mandate courier pickup</h1>
      <h2 class="h4-heading">Pick-up status for User ID ‘<?=$this->session->userdata('email_id')?>’</h2>
    </div>
    <div class="clear"></div>
  </div>
</div>

<section class="ecstrackPanel">
  <div class="container">
    <h4 class="h4-heading">ECS Mandate Successfully Activated</h4>
    <h6 class="h6-heading">Mandate Activation Date: Sep 16, 2015</h6>
    <div class="trackrecord">
      <ul class="tracklist">
        <li>
          <div class="appointment ecssprite"></div>
          <div class="statusinfo">
            <p class="status"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date">
                <?php
                  $date_1 = new DateTime(@$scheduled_date);
                  echo @$scheduled_date==""?"":$date_1->format('M j, Y');
                ?>
              </p>
              <p class="dtlstatus">Appoinment Recieved</p>
            </div>
            <?php
              $txt = "";
              $class = "";
              if(@$scheduled_status == 1){
                $txt = "Successful";
                $class = "";
              }
            ?>
            <p class="statusbtn <?=$class?>">
              <?=$txt?>
            </p>
          </div>
        </li>
        <li>
          <div class="pickup ecssprite"></div>
          <div class="statusinfo">
            <p class="status"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date">
                <?php
                  $date_2 = new DateTime(@$received_by_mu_date);
                  echo @$received_by_mu_date==""?"":$date_2->format('M j, Y');
                ?>
              </p>
              <p class="dtlstatus">Documents Pick-up</p>
            </div>
            <?php
              $txt = "";
              $class = "";
              $no_display = "";
              if(@$received_by_mu_status == 1){
                $txt = "Successful";
                $class = "";
              }
              if(@$status_num < 1){
                $txt = "Successful";
                $class = "";
              }
              if(@$status_num == 1){
                $txt = "inprogress";
                $class = "inprogress";
              }
            ?>
            <p class="statusbtn <?=$class.' '.$no_display?>"><?=$txt?></p>
          </div>
        </li>
        <li>
          <div class="verify ecssprite"></div>
          <div class="statusinfo">
            <p class="status"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date">
              <?php
                  $date_3 = new DateTime(@$in_process_date);
                  echo @$in_process_date==""?"":$date_3->format('M j, Y');
                ?>
              </p>
              <p class="dtlstatus">Documents Verification</p>
            </div>
            <?php
              $txt = "";
              $class = "";
              $no_display = "";
              if(@$in_process_status == 1){
                $txt = "inprogress";
                $class = "inprogress";
              }
              if(@$status_num < 2){
                $no_display = "no_display";
              }
              if(@$status_num == 2){
                $txt = "inprogress";
                $class = "inprogress";
              }
            ?>
            <p class="statusbtn <?=$class.' '.$no_display?>"><?=$txt?></p>
          </div>
        </li>
        <li>
          <div class="bank ecssprite"></div>
          <div class="statusinfo">
            <p class="status gray"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date">
                <?php
                  $date_4 = new DateTime(@$accepted_date);
                  echo @$accepted_date==""?"":$date_4->format('M j, Y');
                ?>
              </p>
              <p class="dtlstatus">Bank Verification</p>
            </div>
            <?php
              $txt = "";
              $class = "";
              $no_display = "";
              if(@$accepted_status == 1){
                $txt = "Successful";
                $class = "";
              }
              if(@$accepted_status == 2){
                $txt = "inprogress";
                $class = "inprogress";
              }
              if(@$status_num < 3){
                $no_display = "no_display";
              }
              if(@$in_process_status == 3){
                $txt = "inprogress";
                $class = "inprogress";
              }
            ?>
            <p class="statusbtn <?=$class.' '.$no_display?>"><?=$txt?></p>
          </div>
        </li>
        <li>
          <div class="ecsactive ecssprite"></div>
          <div class="statusinfo">
            <p class="status"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date">
                <?php
                  $date_5 = new DateTime(@$active_date);
                  echo @$active_date==""?"":$date_5->format('M j, Y');
                ?>
              </p>
              <p class="dtlstatus">ECS Activation</p>
            </div>
            <?php
              $txt = "";
              $class = "";
              $no_display = "";
              if(@$active_status == 1){
                $txt = "Successful";
                $class = "";
              }
              if(@$active_status == 2){
                $txt = "inprogress";
                $class = "inprogress";
              }
              if(@$active_status == 3){
                $txt = "rejected";
                $class = "reject";
              }
              if(@$status_num < 4){
                $no_display = "no_display";
              }
            ?>
            <div class="btn <?=$no_display?>">
              <p class="statusbtn <?=$class.' '.$no_display?>"><?=$txt?></p>
              <span class="infoicon" onclick="$('#item_1').show();"></span>
              <div class="infopanel <?=@$reject_remark==""?"no_display":""?>" id="item_1">
                <span class="closeicon"></span>
                <span class="ecscopy">ECS Activation Rejected</span>
                <?=@$reject_remark?>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div class="progressStrip"></div>
      <div class="clear"></div>
    </div>
  </div>
</section>
<div class="call clearfix desktop-hide">
  <ul>
    <li>
      <ul>
        <a href="tel:022-61802828">
        <li class="width100">Tap to Call</li>
        <li><span class="call_icon"></span></li>
        <li>022-61802828</li>
        </a>
      </ul>
    </li>
  </ul>
  <div class="clear"></div>
</div>
<div class="copy_right desktop-hide">Copyright © 2013 Aditya Birla Customer Services Ltd <span><a target="_blank" href="https://www.myuniverse.co.in/_layouts/prelogin/mobilelegalinfo.aspx?Mid=pp ">Privacy Policy</a> | <a target="_blank" href="https://www.mfjunction.co.in/StaticContent/terms/Terms_condition.pdf ">Terms &amp; Conditions</a></span></div>
<footer class="mobile-hide">
  <div class="footerCont">
    <div class="footer-ico"><a href="https://stg.adityabirlamoneyuniverse.com/sitepages/homepage.aspx"><img src="http://mutest.co.in/kiran/ECS/html/images/xfooter_abmu_logo.png.pagespeed.ic.JyOPaFsHjO.png" pagespeed_url_hash="4187608457"></a></div>
    <div id="footerContainer">
      <div id="ctl00_ABMU_Footer_id_copyright" class="footer">Copyright © 2013 Aditya Birla Customer Services Pvt Ltd.| <a onclick="fnPolicies('Legal Disclaimer','id_LegalDisclaimer');" href="Javascript:void(0);">Legal Disclaimer</a> | <a onclick="fnPolicies('Privacy Policy','id_SecurityPrivacyPolicy');" href="Javascript:void(0);">Privacy Policy</a> | <a onclick="ShowTermsAndConditionAsnyc('tandc_light','tandc_fade', 'id_TACDesc','Terms And Conditions')" href="Javascript:void(0);">Terms and Conditions</a> | <a onclick="ShowInvestTermsAndConditionAsnyc('investtandc_light','investtandc_fade', 'id_InvTACDesc','Terms And Conditions')" href="javascript:void(0);">Investment Account T &amp; C</a> <span class="iadisclaimer">* Mutual fund investments are subject to market risks. Read all scheme related documents carefully before investing.</span> <span class="iadisclaimer" style="margin-bottom:0px;">* The research based investment advice &amp; reports, stock and commodity recommendations, if any, projected/ displayed on or communicated through the www.myuniverse.co.in are provided by /created by/ sourced from Aditya Birla Money Mart Ltd, Aditya Birla Money Ltd and Aditya Birla Commodities Broking Ltd, respectively and not by ABCSPL, the owner of this website. For more details, please refer the legal disclaimer</span>
        <div id="ctl00_ABMU_Footer_id_broadcastmessage">
          <div id="id_broadcastingmessage" style="color: rgb(1, 54, 130); display: block;">Site is best viewed with Internet Explorer 11+, Firefox 30+, Chrome 30+ and Safari 5.1+ with a resolution of 1024 x 768.</div>
        </div>
      </div>
    </div>
    <!-- Footer popup Starts  here-->
    
    <div class="black_overlay" id="Footerfade"></div>
    <div id="id_LegalDisclaimer" title="Legal Disclaimer" style="display:None;"></div>
    <div id="id_SecurityPrivacyPolicy" title="Privacy Policy" style="display:None;"></div>
  </div>
</footer>

<div id="keep_alive">
  <!--<iframe src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>-->
</div>

<!--javascript--> 
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.1.min.js"></script> 
<script src="<?=base_url()?>assets/third_party/js/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {

  var keep_alive_timer = setInterval(function(){
    swal({   
      title: "Do you want to continue session?",
      text: "",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
      closeOnConfirm: true,
      closeOnCancel: true
    }, 
    function(isConfirm){
      if (isConfirm) {
        $("#keep_alive").html('<iframe height="0" src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>');
      }else{
        clearInterval(keep_alive_timer);
      }
      });
  }, 540000);

    $(".infopanel").hide();
	$(".closeicon").click(function(){
		$(".infopanel").hide();
	})
	
		
		$(document).mouseup(function (e)
{
    var container = new Array();
    container.push($('#item_1'));
    
    $.each(container, function(key, value) {
        if (!$(value).is(e.target) // if the target of the click isn't the container...
            && $(value).has(e.target).length === 0) // ... nor a descendant of the container
        {
            $(value).hide();
        }
    });
});
	
  // $(".logo a").attr("href", "https://stg.adityabirlamoneyuniverse.com/sitepages/homepage.aspx");
  	
});
</script>
</body>
</html>
