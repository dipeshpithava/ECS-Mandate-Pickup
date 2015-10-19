<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<title></title>
<link href="<?=base_url()?>assets/third_party/css/style.css?v=asfdsddg" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/third_party/css/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/third_party/css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/nb_style.css?v=<?=date("Y-m-d-H-i-s")?>">

<link href="<?=base_url()?>assets/css/logout/font.css?v=223" type="text/css" rel="stylesheet">
<!-- <link href="<?=base_url()?>assets/css/logout/global.css?v=387" type="text/css" rel="stylesheet"> -->
<!-- <link href="<?=base_url()?>assets/css/logout/head.css?v=55" type="text/css" rel="stylesheet"> -->

<style>
  .fnt-aniver{
    font: 14px 'aniversregular' !important;
  }
  .no_display{
    display: none;
  }
  .dropdown_open_scroll{
    height: 170px !important;
    overflow-y: scroll !important;
  }
  .m-l-8px{
    margin-left: 8px !important;
  }
  .headerWrapper nav{
    margin-top: 0px;
  }
</style>
</head>
<body>
<div class="yt-loader"></div>

<?php include_once "logout_header.php"; ?>

<!--header-->
<section class="headerWrapper">
  <section class="container">
    <header class="header">
      <?php include_once "logout_head.php"; ?>
      <a href="https://stg.adityabirlamoneyuniverse.com/sitepages/homepage.aspx"><div class="logo"></div></a>
      <nav class="mobile-hide">

         <!-- <div class="logoutRight"><a href="/Sitepages/logout.aspx">Logout</a></div> -->
        <ul class="naviagationLink">
          <li><a href="tel:022-61802828"><img src="<?=base_url()?>assets/third_party/images/call.png" /> 022-61802828 (10am-7pm Mon - Sat)</a></li>
         <!-- <li class="highlighted mobile-hide desktop-hide"></li>
          <li class="highlighted"><a href="#"><img src="images/pdf.png" /> <span class="tooltip"><img src="images/up-arrow.png" style="position:absolute; top:-4px; left:40%" /> Download PDF</span></a></li>
          <li class="highlighted"> <a href="#"><img src="images/print.png" /><span class="tooltip"><img src="images/up-arrow.png" style="position:absolute; top:-4px; left:40%" /> Print</span></a></li>
          <li class="highlighted"><a href="#">View your Mutual Fund Portfolio</a></li>-->
        </ul>
      </nav>
    </header>
    <div class="clear"></div>
  </section>
</section>
<section class="bannerWrapper">
  <section class="container1">
  
  <?php 
  $all_dates = "";
  foreach($holiday_list as $holiday_date){
			$all_dates .= $holiday_date->holiday_date.",";
		}
		$all_dates = rtrim($all_dates, ",");
  ?>
    <div class="banner-text"> Couriering ECS mandate is now easy!<br />
	<input type="hidden" class="holiday_date" value="<?=$all_dates?>" id="holiday">
      <span class="date-panel">Schedule your ECS mandate Pick-up</span> </div>
      <div class="paperChart"><img src="<?=base_url()?>assets/third_party/images/kite.png" /></div>
    <div class="clear"></div>
  </section>
</section>

<section class="ecs_form_main">


    <form action="<?=base_url()?>home/save_schedule" method="post" id="frm_schedule">
      <input type="hidden" name="txt_time_of_pickup" id="txt_time_of_pickup" value="" />
	<div class="heading1">Please fill-in the details below and our representative will pick up your documents from your doorstep.</div>
    <div class="line"></div>
    <div class="ecs_inner" id="step1">
    	<div class="heading2">Enter Email Address, Pincode and Choose Location Type</div>
        <div class="form_field">
		<?php if(@$bank_details['0']->myUniverseEmailId!=""){
			 $user_email = $bank_details[0]->myUniverseEmailId;
			 }?>
        	<input type="text" name="email" class="text_box1 " id="email" required <?php if(@$user_email){echo "readonly";}?> value="<?php if(@$user_email){ echo $user_email;}?>"  placeholder="Your email ID registered with Myuniverse"/>
            <span id="email_error" class="error_message"></span>
			
        </div>
		<input type="hidden" value="<?php if(@$user_data['0']->id!=""){echo $user_data[0]->id;}?>" id="user_id"></input>
        <div class="form_field">
        	<input type="text" class="text_box1" name="pin" id="pin" value="<?php if(@$user_data['0']->pincode!=""){echo $user_data['0']->pincode;}?>" placeholder="Pincode of the pick-up location" pattern="{6,}" maxlength="6" required />
			<span id="pin_error" class="error_message"></span>
        </div>
        <div class="form_field">
		<?php if(@$user_data['0']->location_type!=""){
				$type = $user_data['0']->location_type;
			}
		?>
        	<span class="location"> Location Type &nbsp;</span>
        	<span class="location"><input type="radio" name="radiog_dark" id="home" value="home" class="css-checkbox" <?=(@$type=="home" || @$type=="")?"checked":""?> /><label for="home" class="css-label radGroup2">Home</label></span>
            <span class="location"><input type="radio" name="radiog_dark" id="office" value="office" <?=@$type=="office"?"checked":""?> class="css-checkbox" /><label for="office" class="css-label radGroup2">Office</label></span>
              <!-- <select class="custom-select1">
                    <option>Location Type</option>
                    <option>Home</option>
                    <option>Office</option>
                </select>
                <dl class="dropdown">
                    <dt><a><span>Location Type</span></a></dt>
                    <dd>
                        <ul>
                            <!--<li><a class="default">Location Type</a></li>
                            <li><a>Home</a></li>
                            <li><a>Office</a></li>
                        </ul>
                    </dd>
                </dl>-->
        </div>
        <div class="form_field">
        	<button class="btn_stye1" id="step1_next">Next <img src="<?=base_url()?>assets/third_party/images/right_arrow.png" alt="next"/></button>
        </div>
    </div>
    <div class="ecs_inner" id="step2">
    	<div class="heading2">Enter Pick-Up Address &amp; <br />Choose Date &amp; Time</div>
        <div class="form_field">
        	<input type="text" id="address" name="address" value="<?php if(@$user_data['0']->address!=""){echo $user_data['0']->address;} ?>" class="text_box1" placeholder="Address" required />
        </div>
        <div class="form_field">
        	<input type="text" id="landmark" name="landmark" value="<?php if(@$user_data['0']->landmark!=""){echo $user_data['0']->landmark;} ?>" class="text_box1" placeholder="Landmark" required />
        </div>
        <div class="form_field">
        	<input type="text" id="city" name="city" readonly value="" class="text_box1 wid1" placeholder="City" required />
			   <input type="text" id="state" name="state" readonly value="" class="text_box1 wid1 m-l-8px" style="" placeholder="State" required />
         <input type="text" id="mobile_no" name="mobile_no" placeholder="Mobile No." value="<?=@$bank_details['0']->mobileno?>" class="text_box1" />
            <!--<label>
                <dl class="dropdown state">
                    <dt><a><span id="state">State</span></a></dt>
                    <dd>
                        <ul>
                            <li><a>Maharashtra</a></li>
                            <li><a>Gujarat</a></li>
                            <li><a>Delhi</a></li>
                            <li><a>Rajasthan</a></li>
                        </ul>
                    </dd>
                </dl>
			</label>-->
        </div>
        <div class="form_field">
        	 <input size="16" name="txt_date_of_pickup" value="<?php if(@$user_data['0']->date_of_pickup!=""){echo $user_data['0']->date_of_pickup;} ?>"  type="text" data-date-format="dd/mm/yy" class="form-control add-on text_box1" placeholder="dd/mm/yy" id="datepicker" readonly="readonly" >
        </div>
        <div class="form_field">
        	<label>
                <dl class="dropdown">
                    <dt><a><span id="time"><?php if(@$user_data['0']->time_of_pickup!=""){echo $user_data['0']->time_of_pickup;}else{ ?>10.00 To 10.30<?php } ?></span></a></dt>
                    <dd>
                        <ul>
                            <li><a class="">10:00 AM To 01:00 PM</a></li>
                            <li><a>01:00 PM To 06.00 PM</a></li>
                        </ul>
                    </dd>
                </dl>
			</label>
        </div>

        <div class="form_field">
        	<button class="btn_stye1" id="step2_next">Next <img src="<?=base_url()?>assets/third_party/images/right_arrow.png" alt="next"/></button>
        </div>
        <a href="javascript:void(0)" class="back_link">Go Back to the previous screen</a>
    </div>
    <div class="ecs_inner" id="step3">
    	<div class="heading2">Check the details &amp; confirm</div>
        <div class="heading3"><img src="<?=base_url()?>assets/third_party/images/pickup_address.png" style="margin-bottom:3px;" alt="Pick-up Address"/><br />Pick-up Address</div>
        <div class="line_grey"></div>
        <p id="pick-up-address">D-301, Cello Triumph, IB patel road, Goregaon East, Mumbai, 400011 Maharastra </p>
        <div class="heading3"><img src="<?=base_url()?>assets/third_party/images/date.png" alt="Date and Time" style="margin-bottom:3px; margin-top:7px;" /><br />Date and Time</div>
        <div class="line_grey"></div>
        <p><span id="date_time" class="fnt-aniver">30th-Feb-2015</span> at <span id="pickup_time" class="fnt-aniver">10:00AM to 10:30AM</span> <span id="day" class="fnt-aniver"></span>  </p>
        <div class="form_field form_field1">
        	<button class="btn_stye1 submit" id="step3_next">Confirm</button>
        </div>
      <a href="javascript:void(0)" id="back3" class="back_link1">Go Back and Edit the details</a>
    </div>
     <div class="ecs_inner" id="step4">
    	<div class="heading2">Congratulations</div>
        <p>Your documents will be picked up by our representative.</p>
        <p class="red <?=@$bank_details['0']->bankName==""?"no_display":""?>">Please keep your ECS mandate document and a personalised cancelled cheque<br />
copy of <?php if(@$bank_details){ echo @$bank_details['0']->bankName; }?> (XXXXXXXX<?=substr(trim(@$bank_details['0']->accountNumber, " "), -3, 3)?>)</p>
        <div class="note">
        	<ol type="1">
                <li>
                  <?php
                  if(@$bank_details['0']->bankName!=""){
                    ?>
                    <a href="<?=base_url()?>invpdf" target="_blank" class="back_link2">Download your ECS mandate,</a>
                    Print and keep it handy. You can also download the same from 'My Account' section</a>.
                    <?php
                  }else{
                    ?>
                    You can also download the same from 'My Account' section</a>.
                    <?php
                  }
                  ?>
                  </li>
                <li>Before the pick-up, our agent will call you.</li>
                <li>Please call ECS Desk Number <a href="tel:022-6167565656" class="back_link2">022-6167565656</a></li>
            </ol>
		</div>
      <!--  <div class="form_field form_field1">
        	<button class="btn_stye1 submit" id="step3_next">OK</button>
        </div>-->
    </div>
    </form>

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
   
    <li>
      <ul>
        <a href="javascript:void(0)">
        <li>Download PDF</li>
        <li><span class="email_icon print"></span></li>
        <li></li>
        </a>
      </ul>
    </li>
  </ul>
  <div class="clear"></div>
</div>
<div class="copy_right desktop-hide">Copyright © 2013 Aditya Birla Customer Services Ltd <span><a target="_blank" href="https://www.myuniverse.co.in/_layouts/prelogin/mobilelegalinfo.aspx?Mid=pp ">Privacy Policy</a> | <a target="_blank" href="https://www.mfjunction.co.in/StaticContent/terms/Terms_condition.pdf ">Terms &amp; Conditions</a></span></div>
<footer class="mobile-hide">
  <div class="footerCont">
    <div class="footer-ico"><a href="https://stg.adityabirlamoneyuniverse.com/sitepages/homepage.aspx"><img src="<?=base_url()?>assets/third_party/images/footer_abmu_logo.png"></a></div>
    <div id="footerContainer">
      <div id="ctl00_ABMU_Footer_id_copyright" class="footer">Copyright © 2015 Aditya Birla Customer Services Pvt Ltd.| <a onclick="fnPolicies('Legal Disclaimer','id_LegalDisclaimer');" href="Javascript:void(0);">Legal Disclaimer</a> | <a onclick="fnPolicies('Privacy Policy','id_SecurityPrivacyPolicy');" href="Javascript:void(0);">Privacy Policy</a> | <a onclick="ShowTermsAndConditionAsnyc('tandc_light','tandc_fade', 'id_TACDesc','Terms And Conditions')" href="Javascript:void(0);">Terms and Conditions</a> | <a onclick="ShowInvestTermsAndConditionAsnyc('investtandc_light','investtandc_fade', 'id_InvTACDesc','Terms And Conditions')" href="javascript:void(0);">Investment Account T &amp; C</a> <span class="iadisclaimer">* Mutual fund investments are subject to market risks. Read all scheme related documents carefully before investing.</span> <span class="iadisclaimer" style="margin-bottom:0px;">* The research based investment advice &amp; reports, stock and commodity recommendations, if any, projected/ displayed on or communicated through the www.myuniverse.co.in are provided by /created by/ sourced from Aditya Birla Money Mart Ltd, Aditya Birla Money Ltd and Aditya Birla Commodities Broking Ltd, respectively and not by ABCSPL, the owner of this website. For more details, please refer the legal disclaimer</span>
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
<section id="reschedule_popup" class="nb-main-verlay no_display">
  <div class="nd-innerlay"></div>
  <div class="nb-datalay">
    <p class="nb-para-overlay">Do you want to Reschedule ?</p>
<ul class="nb-align">
  <li><a id="reschedule_no" href="javascript:void(0);" class="nb-no">No</a></li>
  <li><a id="reschedule_yes" href="javascript:void(0);" class="nb-continue">Yes</a></li>
</ul>

  </div>
</section>
<script type="text/javascript" src="<?=base_url()?>assets/third_party/js/jquery-1.10.2.min.js"></script> 
<script src="<?=base_url()?>assets/third_party/js/calendar.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/third_party/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/jquery.form.min.js"></script>
<script src="<?=base_url()?>assets/third_party/js/sweetalert.min.js"></script>
<script type="text/javascript">

	function check_pin(email,pin){
		if(email!=="" && pin!==""){
		$.ajax({
			url:"<?=base_url()?>home/piccheck",
			type: "post",
			data:{
				email:email,
				pin:pin
			},
			success:function(akhi){
				var js = $.parseJSON(akhi);
				var alerts = js.alert;
				var city = js.city;
				var state = js.state;
				if(alerts== "not get pin"){
					$("#pin").val("");
					window.location.href = "<?=base_url()?>home/pincode/"+pin;
				}else if(alerts=="not get email"){
					$("#email").addClass("error_class");
					$("#email_error").html("not mactched email id");
				}else if(alerts=="go ahead"){
					$("#city").val(city);
					$("#state").val(state);
					$('.yt-loader').addClass('open');
						setTimeout(function(){$('.yt-loader').removeClass('open'); 
					$('#step1').slideUp();
						$('#step2').slideDown();
						}, 3000);
				}
			}
    });
		
		}
	}

$(document).ready(function(e) {

  $('#contact-us').click(function(event){event.stopPropagation();
    $(this).css({'background' : '#fff','color' : '#000'});
    $('.nb-absolutecon').fadeIn('slow');
  });

  $(document).click(function(){$('.nb-absolutecon').fadeOut(function(){$('#contact-us').css({'background' : 'transparent','color' : '#fff'})});});
  $('.nb-absolutecon').click(function(event){event.stopPropagation();});

  $('#contact-us').click(function(){
    $(this).css({'background' : '#fff','color' : '#000'});
    $('.nb-absolutecon').fadeIn('slow');
  });

  $("#keepalive_yes").click(function(){
    $("#keep_alive").html('<iframe height="0" src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>');
    $("#keepalive_popup").fadeOut();
  });

  $("#keepalive_no").click(function(){
    window.location.href = "/Sitepages/logout.aspx";
  });

  $("#pin").keyup(function(){
    // #pin_error
    var pincode = $(this).val();
    if(pincode != ""){
      $("#pin").removeClass("error_class");
      $("#pin_error").html("");
    }
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
	
	var user_session_email = $("#email").val();	
	var user_session_pin = $("#pin").val();
	
	$('#step1_next').click(function(e) {
		e.preventDefault();
    var all_okay = 1;
		var user_id = $("#user_id").val();
		var email = $("#email").val();
		var pin = $("#pin").val();
		if(email==""){
			$("#email").addClass("error_class");
			$("#email_error").html("can not left blank");
		}else if(pin==""){
			$("#pin").addClass("error_class");
			$("#pin_error").html("can not left blank");
		}else if(pin != ""){
      $.ajax({
        url: '<?=base_url()?>home/is_valid_pincode',
        type: 'post',
        data: 'txt_pincode='+pin,
        async: false,
        success: function(response){
          if(response == "invalid"){
            $("#pin").addClass("error_class");
            $("#pin_error").html("invalid pincode");
            all_okay = 0;
          }
        }
      });
    }

    var user_status = "";
    $.ajax({
      url: '<?=base_url()?>home/get_status',
      type: 'post',
      async: false,
      success: function(response){
        user_status = response;
      }
    });

		if(user_session_email!=="" && user_session_pin!=="" && all_okay == 1 && user_status == "rescheduled"){
			swal({   
        title: "Are you sure?",   
        text: "You want to reschedule!",   
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
          check_pin(email,pin);  
        }
      });
	 }else{
    if(all_okay == 1){
      check_pin(email,pin);
    }
	 }
	});
	
	$('#step2_next').click(function(e) {
		e.preventDefault();
		var address = $("#address").val();
		var landmark = $("#landmark").val();
		var city = $("#city").val();
    var pin = $("#pin").val();
    var state = $("#state").val();
		var time = $("#time").html();
    $("#txt_time_of_pickup").val(time);
		var date_time = $("#datepicker").val();
		$("#pick-up-address").html(address+","+" "+landmark+","+" "+city+","+" "+pin+" "+state);
		$("#date_time").html(date_time);
		$("#pickup_time").html(time);
		$.ajax({
			url:"<?=base_url()?>home/get_day",
			type: "post",
			data:{
				name:date_time
			},
			success:function(akhi){
				$("#day").html(akhi);
			}
		});
		if(address!=="" && landmark!=="" && city!==""){
			$('.yt-loader').addClass('open');
			setTimeout(function(){$('.yt-loader').removeClass('open'); 
				$('.heading1').hide();
				$('.line').hide();
				$('#step2').slideUp();
				$('#step3').slideDown();
			}, 3000);
		}
		
    });
	
	$('#step3_next').click(function(e) {
	$("#frm_schedule").ajaxForm(function(response){
      // alert(response);
	  $('.yt-loader').addClass('open');
		 setTimeout(function(){$('.yt-loader').removeClass('open'); 
		  	$('#step3').slideUp();
		 	$('#step4').slideDown();
		}, 3000);
		});
    });

	$('.back_link').click(function(e) {
        $('#step2').slideUp();
		$('#step1').slideDown();
    });
	$('.back_link1').click(function(e) {
         $('#step3').slideUp();
		$('#step2').slideDown();
    });
	
	var dropdowns = $(".dropdown");

// Onclick on a dropdown, toggle visibility
dropdowns.find("dt").click(function(){
	dropdowns.find("dd ul").next().toggle();
  dropdowns.find("dd ul").addClass("dropdown_open_scroll");
	$(this).next().children().toggle();
});

// Clic handler for dropdown
dropdowns.find("dd ul li a").click(function(){
	var leSpan = $(this).parents(".dropdown").find("dt a span");
  
	// Remove selected class
	$(this).parents(".dropdown").find('dd a').each(function(){
    $(this).removeClass('selected');
  });
  
	// Update selected value
	leSpan.html($(this).html());
  
	// If back to default, remove selected class else addclass on right element
	if($(this).hasClass('default')){
    leSpan.removeClass('selected')
  }
	else{
		leSpan.addClass('selected');
		$(this).addClass('selected');
	}
  
	// Close dropdown
	$(this).parents("ul").hide();
});

// Close all dropdown onclick on another element
$(document).bind('click', function(e){
	if (! $(e.target).parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});
	

  // $(".logo a").attr("href", "https://stg.adityabirlamoneyuniverse.com/sitepages/homepage.aspx");

});

        $(window).load(function(){
          window.history.forward();
        });

        <?php
        // echo "console.log('".$this->benchmark->memory_usage()."');";
        ?>
</script>
</body>
</html>
