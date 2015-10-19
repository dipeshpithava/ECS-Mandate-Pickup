<div class="small_note">INV User ID: <?=$this->session->userdata("investor_id")?> \ Version no: <?=$investor_details->version_no?></div>
<div class="logo_wrapper">
<!--     <img src="assets/images/ABM_MyUniverse_Logo.jpg" style="width:200px; vertical align">
    <img src="assets/images/ABM_LOGO.jpg" style="width:200px;float:right;"> -->
    <img src="<?=base_url()?>assets/images/logo_banner.png" style="width:100%;">
</div>
<div class="red_spacer"></div>

<div class="first_panel_wrapper panel">
    <table width="100%">
        <tr>
            <td>Customer Code: <input type="text" name="" value="&nbsp;" class="w-80"></td>
            <td>ARN Code: <input type="text" name="" value="&nbsp;" class="w-70"></td>
        </tr>

        <tr>
            <td>Ledger No/Ledger Folio No.(For Office Use Only): <input type="text" value="&nbsp;" name="" class="w-60"></td>
            <td>Sub Broker Code: <input type="text" value="&nbsp;" name="" class="w-60"></td>
        </tr>

    </table>
</div>

<div class="red_header_box panel">
    <p>Electronic Clearing Service ( debit) Clearing/Direct Debit</p>
</div>

<div style="line-height:10px;" class="helpful_tips panel margin_b_3">
	<div class="sub1">
		<p class="font_red margin_b_2">HelpFul Tips for Quick Activation:</p>
		<p class="margin_b_1">1. Please ensure signatures at the places marked with(X).</p>
		<p class="margin_b_1">2. Please send the ESC application form along with a cancelled cheque</p>
	</div>

	<div class="sub2">
		<p class="margin_b_2 font_b">Mailing Address</p>
		<p class="margin_b_1">Aditya Birla Customer Services Pvt.Ltd<br>501,Cello Triumph<br>I.B Patel Road,off W.E. Highway<br>Goregaon(East),Mumbai-400063 </p>
	</div>
</div>

<div class="investor panel margin_b_3">
	<div class="red_header_box">
		<p>Investor Information</p>
	</div>
	<div class="panel">
		<table width="100%">
			<tr>
				<td class="font_b">Investor ID: <input type="text" value="<?=$investor_details->investor_user_id?>" class="w-80"></td>
				<td class="font_b">Contact Email Id: <input type="text" value="<?=$investor_details->myuniverse_email_id?>" name="" class="w-80"></td>
			</tr>
	
			<tr>
				<td class="font_b">Investor Name: <input type="text" value="<?=$investor_details->investor_name?>" name="" class="w-70"></td>
				<td class="font_b">PAN No: <input type="text" name="" value="<?=$investor_details->investor_pan?>" class="w-80"></td>
			</tr>
		</table>
	</div>
</div>

<div class="panel">
	<p class="margin_b_2">To,</p>
	<p style="line-height:12px;" class="margin_b_2">I/We, <input type="text" value="&nbsp;" name="" class="w-30"> hereby authorize Aditya Birla Customer Service Pvt.Ltd.( ABCSPL) a sub distributor of Aditya Birla Money  Mart Ltd. to debit my account through ECS(Debit) clearing / Direct Debit account as per the details  given below for making payment to Mutual fund companies for the  Systematic Investment Plan (SIP) transctions scheduled by myself on Aditya Birla Customer Services Pvt.Ltd. The debit transction will be processed by an authorised Service Provider on behalf of ABCSPL. </p>
</div>

<div class="red_header_box panel">
    <p>Bank Information</p>
</div>

<div class="bank_info panel">

	<table width="100%">
		<tr style="width:100%;">
			<td colspan="3" class="">First Applicant Account Holder Name: <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-80"><?=$investor_details->bank_account_holder_name?> Amartendraeditya Singh</span></td>
			
		</tr>
	
		<tr >
			<td colspan="2" class="">Bank Name: <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-80"><?=$investor_details->bank_name?></span></td>
			<td class="">Account No: <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-70"><?=$investor_details->bank_account_no?></span></td>
		</tr>
		
		<tr>
			<td class="">Account Type: <span  style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-60"><?=$investor_details->bank_account_type?></span></td>
			<td class="">IFSC Code: <span  style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;"  class="w-60"><?=$investor_details->ifsc_code?></span></td>
			<td class="">MICR Code: <span  style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;"  class="w-70"><?=$investor_details->micr_code?></span></td>
		</tr>
		
		<tr>
			<td colspan="3" class="">Branch address: <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-90"> <?=$investor_details->bank_address?></span></td>
		</tr>
		
		<tr>
			<td colspan="3" class="">Effective Date of Mandates: <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-80">&nbsp;</span></td>
		</tr>
		
		<tr>
			<td colspan="3" class="">Expiry Date of the Mandates: <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-80">&nbsp;</span></td>
		</tr>
		
		<tr>
			<td colspan="3" class="">Maximum Amount Limit per Transaction (Rs.): <span style="display:inline-block; margin-left:5px; border-bottom:1px solid black; font-size:8px;" class="w-80">&nbsp;</span></td>
		</tr>
	</table>
</div>

<div class="red_header_box panel">
    <p>Terms and Conditions :</p>
</div>

<div class="terms margin_b_3 panel">
	<p style="line-height:15px;">I/We hereby declare that the perticulars  given above are correct  and express  my willingness  to  make  payment reffered above through
	participation in ECS/Standing  Instruction/Direct debit. if the 
	transction is delayed or not effected at all for reasons of incomplete or incorrect information,I/We would not hold the user institution
	and its Service Provider resposible.I/We will also inform [ Distributor], about any changes in my  bank account. I/We have read and undertood the scheme information document/Key Information Memorandum of the scheme.I/We apply for the units of the scheme  and I/We
	agree to abide by  the terms, conditions,rules and regulations of the sscheme.this is to inform I/We  have registered for the electronic Clearing service( debit Clearing) and that my payment towords my investment in mutual fund companies shall we made  form my/our below  mention bank account with your bank.I/We authorize to representive carry this ECS mandate From to get it to verified & executed.I/We authorize the bank to honor the instructions as mentioned in  the application form.I/We also hereby authorize  bank to debit changes towords verfication of this mandate,if any.I/We undertake to keep sufficient fund in the funding account on the date of execution of ECS/Standing institution/Direct Debit.I/We hereby declare that the perticulars given above are correct and complete.if the transction is delayed or not effected at all  for reasons of incomplete or incorrect information,I/We would not hold the mutual fund ,distributor Service Provider or the baank resposible.if the date of debit to  my/our account happens to be a non banking/business day as defined in the scheme information document of the said schema of AMC,Execution of the debit will happen as  per the normal prectice
	of the bank mandated by the investor and allootment of the units will happen as per the term and conditions listed in the schema information document of the  mutual fund .I/We hereby agree to avail the facility for SIP and authorize my bank  to execute the ECS/Standing Instruction/Direct debit for a further increase in installment from  my designated account.I/We agree that
	Distributor/AMC/Mutual fund(including  its affiliates)/Service Provider, and  any of its officers directors,personnel and employees,shall not be held resposible for  anydelay / wrong debit on the part of the bank for executing the standing instructionsof the additional sum on a specified date  from my account.if the transction is not effected at all for reasons of incomplete or incorrect information,the user institution would not be held resposible.I/We confirm to have undertood the introduction of this facility and agree to abide by  the terms,conditions,rules and regulations of this facility.</p>
</div>

<div class="red_header_box panel">
    <p>Signatures(s) of the account holders(s).(As per Bank's record)</p>
</div>

<div class="sign panel">
	<div class="signature w-100">
		<p class="sig_sub margin_b_2" >(X)</p>
		<p class="sign_text margin_b_2">Specimen Signature of PARAG REMESHWAR MOREY</p>
	</div>
	<div class="signature w-100">
		<table width="100%">
			<tr>
				<td class="font_b">Date: <input type="text" value="&nbsp;" class="w-10"></td>
			</tr>
			<tr>
				<td class="font_b">Place: <input type="text" value="&nbsp;" name="" class="w-10"></td>
			</tr>
		</table>
	</div>
</div>

<div style="height:40px; background:#c51c2c;" class="red_header_box panel">
    <center><img src="<?=base_url()?>assets/images/band.jpg" style="width:80%;" alt="" /></center>
</div>

<div class="panel">
	<p style="text-align:center;">the services of MyUniverse are being provided through Aditya Birla Customer Services.Pvt.Ltd.(ABCSPL).
 For detailed terms and conditions please log on to www.myuniiverse.co.in</p>
</div>

<style>
    html {background: #dadada;}
    body {width:960px;background: #fff; margin: 0 auto; max-width:100%; font-size:8px;}
    * { margin: 0; padding:0; font-family: Arial, sans-serif; }
    .small_note {font-size: 10px; width: 95%; text-align: right; padding: 5px 10px;}
    .red_spacer {height:5px; background: #C51D2E; width:95%; margin: 0 auto; margin-top: 3px;}
    .panel {width: 95%;margin: 0 auto; margin-top: 5px;}
	table{font-size:8px;}
    .w-90 {width:90%;}
    .w-80 {width:80%;}
    .w-70 {width:70%;}
    .w-60 {width:60%;}
    .w-40 {width:40%;}
    .w-50 {width:50%;}
    .w-30 {width:30%;}
    .w-10 {width:10%;}
    .w-35 {width:35%;}
    .w-100 {width:100%;}
	.font_red {color:#C51D2E;}
	.margin_b_3 {margin-bottom:10px;}
	.margin_b_2 {margin-bottom:5px;}
	.margin_b_1 {margin-bottom:3px;}
	.font_b {font-weight:bold;}
	
	.sign_text{
		text-align:right;
	}
	
    input {
        outline: none !important;
        border: none !important;
        background: none;
        border-bottom: 1px solid #000 !important;
        padding: 0px 2px;
        font-size: 8px;
    }
	
	.sig_sub{
		border-bottom: 1px solid #000;
		text-align: left;
		width: 25%;
		margin-left: 75%;
		margin-top:30px;
	}
	
    table tr {
        height: 30px;
    }

    .red_header_box {
        height: 30px;
        background: #C51D2E;
    }
    .red_header_box p{
        padding: 10px 0 0 15px;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
    }
	
	.helpful_tips{
		height:60px;
	}
	
	.sub1{
		width:60%;
		display:inline-block;
	}
	
	.sub2{
		width:35%;
		display:inline-block;
		border-left:2px solid #C51D2E;
		padding-left:1%;
	}
	
	.investor{
		border:2px solid #C51D2E;
	}
	
</style>