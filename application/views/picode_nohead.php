<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<title></title>
<link href="<?=base_url()?>assets/third_party/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/third_party/css/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="<?=base_url()?>assets/css/nb_style.css?v=321" rel="stylesheet">
<style type="text/css">
.no_display{
  display: none;
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




<section class="ecs_form_main">
<?php
  if(@$redirect_from == ""){
    ?>
    <div class="heading1 black_text">OOPS!</div>
    <p class="big_text">We have <span class="red">no courier service</span> at the pincode <span class="black_text1">‘<?php echo @$pin;?>’</span></p>
    <div class="line"></div>
    <?php
  }
?>
  <div class="ecs_inner1">
    	<div class="heading2 mar0">Courier it YourselF &amp; win a Flipkart voucher </div>
        <p class="big_text">Send your documents within 3 working days at the below mentioned address and win a Flipkart gift voucher worth <span class="black_text1">Rs. 100</span></p>
        <div class="flipkart_coupon"><img src="<?=base_url()?>assets/third_party/images/coupon.png" alt="Cooupoon"/> </div>
        <div class="heading2 text_lowercase mar0">Mutual Fund Desk Address</div>
         <p class="big_text">Aditya Birla Customer Services Limited, Unit No: 506, B-wing,  Cello Triumph,
I B Patel Road, Off W.E Highway, Goregaon (East), Mumbai - 400 063 501,</p>
   		<div class="form_field text_center">
        	<button class="btn_stye1 small_btn" id="step1_next">I will courier the documents</button>
        </div>
        <?php
        if(@$redirect_from != ""){
          ?>
          <a href="<?=base_url()?>home/land" class="back_link">Go Back to ECS mandate Home page</a>
          <?php
        }else{
          ?>
          <a href="<?=base_url()?>home/schedule" class="back_link">Go Back and edit the pincode</a>
          <?php
        }
        ?>
		<p id="confirm_msg"></p>
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
<script type="text/javascript" src="<?=base_url()?>assets/third_party/js/jquery-1.10.2.min.js"></script> 
<script src="<?=base_url()?>assets/third_party/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/jquery.form.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
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
	$("#step1_next").click(function(){
		$.ajax({
					url:"<?=base_url()?>home/save_couriour",
					type: "post",
					data:{
					name:"",
					pass:""
					},
					success:function(akhi){
            location.assign("<?=base_url()?>home/thankyou");
						// $(".back_link").html("");
						// $("#confirm_msg").html("You have confirmed your order");
						//alert(akhi);
				}});
		
	});
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
