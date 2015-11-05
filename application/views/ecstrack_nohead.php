<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title></title>
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/third_party/css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/nb_style.css?v=321">
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
 

<?php
$schedule_date = "";
$waiting_for_pickup = "";
$waiting_for_delivery = "";
$received_by_mu = "";
$in_process = "";
$rejected = "";
$accepted = "";
$mandate_active = "";
$courier_myself = "";

if($is_scheduled == 0){
  ?>
  <section class="ecstrackPanel">
  <div class="container">
    <h4 class="h4-heading">Please schedule your ECS Mandate here <a href="<?=base_url()?>home/land_nohead">Schedule My ECS Mandate Pickup</a></h4>
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
  <?php
}else{
  if(count($all_status) > 0){
    foreach($all_status as $all_status_row){
      $status_heading = "";
      if($all_status_row->status == "scheduled" || $all_status_row->status == "rescheduled"){
        $schedule_date = @$all_status_row->date_time;
        $status_heading = "Appointment Received";
      }
      if($all_status_row->status == "waiting for pickup from customer"){
        $waiting_for_pickup = @$all_status_row->date_time;
        $status_heading = "Appointment Received";
      }
      if($all_status_row->status == "waiting for delivery to mu"){
        $waiting_for_delivery = @$all_status_row->date_time;
        $status_heading = "ECS Mandate Picked up Successfully";
      }
      if($all_status_row->status == "received by mu"){
        $received_by_mu = @$all_status_row->date_time;
        $status_heading = "ECS Mandate received at MyUniverse";
      }
      if($all_status_row->status == "in process"){
        $in_process = @$all_status_row->date_time;
        $status_heading = "Review by MyUniverse is in Progress";
      }
      if($all_status_row->status == "rejected"){
        $rejected = @$all_status_row->date_time;
        $status_heading = "ECS Mandate Rejected";
      }
      if($all_status_row->status == "accepted"){
        $accepted = @$all_status_row->date_time;
        $status_heading = "ECS Mandate sent to Bank for Review";
      }
      if($all_status_row->status == "mandate active"){
        $mandate_active = @$all_status_row->date_time;
        $status_heading = "ECS Mandate Successfully Activated";
      }
      if($all_status_row->status == "courier myself"){
        $courier_myself = @$all_status_row->date_time;
        $status_heading = "Please courier your ECS Mandate for further processing";
      }
    }
  }
  ?>
  <section class="ecstrackPanel">
  <div class="container">
    <h4 class="h4-heading"><?=$status_heading?></h4>
    <!-- <h6 class="h6-heading">Mandate Activation Date: Sep 16, 2015</h6> -->
    <div class="trackrecord">
      <ul class="tracklist">
        <li>
          <div class="appointment ecssprite"></div>
          <div class="statusinfo">
            <p class="status" id="st11"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date" id="st1">
                <?php
                if($courier_myself != ""){
                  $date_1 = new DateTime(@$courier_myself);
                  echo $date_1->format('M j, Y');
                }else if($schedule_date != ""){
                  $date_1 = new DateTime(@$schedule_date);
                  echo $date_1->format('M j, Y');
                }
                ?>
              </p>
              <p class="dtlstatus">Appoinment Recieved</p>
            </div>
            <?php
            if($courier_myself != ""){
              ?>
              <p class="statusbtn">
                Successful
              </p>
              <?php
            }else if($schedule_date != ""){
              ?>
              <p class="statusbtn">
                Successful
              </p>
              <?php
            }
            ?>
          </div>
        </li>
        <li>
          <div class="pickup ecssprite"></div>
          <div class="statusinfo">
            <?php
                if($waiting_for_delivery != ""){
                  $date_2 = new DateTime(@$waiting_for_delivery);
                  $dt2 = $date_2->format('M j, Y');
                }else if($waiting_for_pickup != ""){
                  $date_2 = new DateTime(@$waiting_for_pickup);
                  $dt2 = $date_2->format('M j, Y');
                }else if($courier_myself != ""){
                  // $date_2 = new DateTime(@$courier_myself);
                  // $dt2 = $date_2->format('M j, Y');
                }else{
                  $gray_class2 = "gray";
                }
                ?>
            <p class="status <?=@$gray_class2?>" id="st22"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date" id="st2">
                <?=@$dt2?>
              </p>
              <p class="dtlstatus">Documents Pick-up</p>
            </div>
            <?php
            if($waiting_for_delivery != ""){
              ?>
              <p class="statusbtn">Successful</p>
              <?php
            }else if($waiting_for_pickup != ""){
              ?>
              <p class="statusbtn inprogress">inprogress</p>
              <?php
            }else if($courier_myself != ""){
              ?>
              <p class="statusbtn inprogress">inprogress</p>
              <?php
            }
            ?>
          </div>
        </li>
        <li>
          <div class="verify ecssprite"></div>
          <div class="statusinfo">
            <?php
              if($accepted != ""){
                $date_3 = new DateTime(@$accepted);
                $dt3 = $date_3->format('M j, Y');
              }else if($rejected != ""){
                  $date_3 = new DateTime(@$rejected);
                  $dt3 = $date_3->format('M j, Y');
              }else if($in_process != ""){
                $date_3 = new DateTime(@$in_process);
                $dt3 = $date_3->format('M j, Y');
              }else if($received_by_mu != ""){
                $date_3 = new DateTime(@$in_process);
                $dt3 = $date_3->format('M j, Y');
              }else{
                $gray_class3 = "gray";
              }
              ?>
            <p class="status <?=@$gray_class3?>" id="st33"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date" id="st3">
                <?=@$dt3?>
              </p>
              <p class="dtlstatus">Documents Verification</p>
              <?php
              if($accepted != ""){
                ?>
                <p class="statusbtn">Successful</p>
                <?php
              }else if($rejected != ""){
                ?>
                <p class="statusbtn reject">rejected</p>
                <?php
              }else if($in_process != ""){
                ?>
                <p class="statusbtn inprogress">inprogress</p>
                <?php
              }else if($received_by_mu != ""){
                ?>
                <p class="statusbtn inprogress">inprogress</p>
                <?php
              }
              ?>
            </div>
          </div>
        </li>
        <li>
          <div class="bank ecssprite"></div>
          <div class="statusinfo">
            <?php
                if($accepted != "" || $rejected != ""){
                  $date_4 = new DateTime(@$accepted);
                  $dt4 = $date_4->format('M j, Y');
                }else{
                  $gray_class4 = "gray";
                }
                ?>
            <p class="status <?=@$gray_class4?>" id="st44"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date" id="st4">
                <?=@$dt4?>
              </p>
              <p class="dtlstatus">Bank Verification</p>
            </div>
            <?php
              if($mandate_active != ""){
                ?>
                <p class="statusbtn">Successful</p>
                <?php
              }
              if($accepted != "" && $rejected != ""){
                ?>
                <p class="statusbtn reject">rejected</p>
                <?php
              }else if($accepted != "" && $mandate_active == ""){
                ?>
                <p class="statusbtn inprogress">inprogress</p>
                <?php
              }else if($rejected != ""){
                ?>
                <p class="statusbtn reject">rejected</p>
                <?php
              }
            ?>
          </div>
        </li>
        <li>
          <div class="ecsactive ecssprite"></div>
          <div class="statusinfo">
            <?php
                  if($mandate_active != ""){
                    $date_5 = new DateTime(@$mandate_active);
                    $dt5 = $date_5->format('M j, Y');
                  }else if($rejected != ""){
                    $date_5 = new DateTime(@$rejected);
                    $dt5 = $date_5->format('M j, Y');
                  }else{
                    $add_gray = "gray";
                  }
                ?>
            <p class="status <?=@$add_gray?>" id="st55"></p>
          </div>
          <div class="ecsdetails">
            <div class="datestatus">
              <p class="date" id="st5">
                <?=@$dt5?>
              </p>
              <p class="dtlstatus">ECS Activation</p>
            </div>
            <?php
              if($mandate_active != ""){
                ?>
                <div class="btn">
                  <p class="statusbtn">Successful</p>
                </div>
                <?php
              }else if($rejected != ""){
                ?>
                <div class="btn">
                  <p class="statusbtn reject">Rejected</p>
                  <span class="infoicon" onclick="$('#item_1').show();"></span>
                  <div class="infopanel" id="item_1">
                    <span class="closeicon"></span>
                    <span class="ecscopy">ECS Activation Rejected</span>
                    <?php
                      $CI =& get_instance();
                      $reject_reason = $CI->get_remark();
                      echo $reject_reason;
                    ?>
                  </div>
                  <p class="dtlstatus"><a href="<?=base_url()?>home/schedule_again">Schedule Again</a></p>
                </div>
                <?php
              }
            ?>
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
  <?php
}


?>




<div id="keep_alive">
  <!--<iframe src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>-->
</div>
<section id="keepalive_popup" class="nb-main-verlay no_display">
  <div class="nd-innerlay"></div>
  <div class="nb-datalay">
    <p class="nb-para-overlay">Due to inactivity your session will expire in <span>1 minute</span> , click on continue to remain logged  in or No to end your session </p>
<ul class="nb-align">
  <li><a id="keepalive_no" href="javascript:void(0);" class="nb-no">No</a></li>
  <li><a id="keepalive_yes" href="javascript:void(0);" class="nb-continue">Continue</a></li>
</ul>

  </div>
</section>
<!--javascript--> 
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.1.min.js"></script> 
<script src="<?=base_url()?>assets/third_party/js/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {

  $('#contact-us').click(function(event){event.stopPropagation();
    $(this).css({'background' : '#fff','color' : '#000'});
    $('.nb-absolutecon').fadeIn('slow');
  });

  $(document).click(function(){$('.nb-absolutecon').fadeOut(function(){$('#contact-us').css({'background' : 'transparent','color' : '#fff'})});});
  $('.nb-absolutecon').click(function(event){event.stopPropagation();});

  $("#keepalive_yes").click(function(){
    $("#keep_alive").html('<iframe height="0" src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>');
    $("#keepalive_popup").fadeOut();
  });

  $("#keepalive_no").click(function(){
    window.location.href = "/Sitepages/logout.aspx";
  });
  var keep_alive_timer = setInterval(function(){
    // swal({   
    //   title: "Do you want to continue session?",
    //   text: "",
    //   type: "warning",
    //   showCancelButton: true,
    //   confirmButtonColor: "#DD6B55",
    //   confirmButtonText: "Yes",
    //   cancelButtonText: "No",
    //   closeOnConfirm: true,
    //   closeOnCancel: true
    // }, 
    // function(isConfirm){
    //   if (isConfirm) {
    //     $("#keep_alive").html('<iframe height="0" src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>');
    //   }else{
    //     window.location.href = "/Sitepages/logout.aspx";
    //     clearInterval(keep_alive_timer);
    //   }
    //   });
    $("#keepalive_popup").fadeIn();
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

$(window).load(function(){
          window.history.forward();
        });

<?php
echo "console.log('".$this->benchmark->memory_usage()."');";
?>
</script>
</body>
</html>
