<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<title></title>
<link href="<?=base_url()?>assets/css/style2.css?v=321" rel="stylesheet" type="text/css" />
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
<div class="yt-loader"></div>

<!--header-->


<!--first page-->
<div class="firstPage">
  <div class="firstPageP">
    <div class="leftRadioBx">
    <div class="innPd courierECS" id="courier_ecs">
      <div class="iconBox">
        <div class="icn01"></div>
      </div>
      <div class="textBox">i will <span>courier my ECS mandate</span> by myself and claim flipkart voucher.</div>
      <div class="radiBox"><input type="radio" name="ecsMandate" id="courier" class="css-checkbox" /><label for="courier" class="css-label radGroup2"></label></div>
      </div>
    </div>
    
    <div class="rightRadioBx">
    <div class="innPd courierSchedule" id="courierSchedule">
      <div class="iconBox">
        <div class="icn02"></div>
      </div>
      <div class="textBox">I will <span>schedule my ECS Mandate</span> courier 
pick for me. </div>
      <div class="radiBox"><input type="radio" name="ecsMandate" id="schedule" class="css-checkbox" /><label for="schedule" class="css-label radGroup2"></label></div></div>
    </div>
  </div>
</div>
<!--first page end-->




<form action="<?=base_url()?>home/pincode" method="post" id="frm_pincode">
<input type="hidden" value="firstpage" name="redirect_from" />
</form>
<!--first page-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.1.min.js"></script> 
<script src="<?=base_url()?>assets/third_party/js/sweetalert.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
$('.courierSchedule').click(function() {
		$('.courierSchedule .css-label').css('background-position', '0px -57px');
		$('.courierECS .css-label').css('background-position', '0px 0px');
    });
$('.courierECS').click(function() {
		$('.courierSchedule .css-label').css('background-position', '0px 0px');
		$('.courierECS .css-label').css('background-position', '0px -57px');
    });	
$("#courier_ecs").click(function(){
  $("#frm_pincode").submit(); 
});
$("#courierSchedule").click(function(){
 location.assign("<?=base_url()?>home/schedule_nohead"); 
});
});

</script>
<!--first page-->
</body>
</html>
