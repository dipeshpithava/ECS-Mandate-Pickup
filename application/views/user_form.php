<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Investment Form View</title>
<link href="<?=base_url()?>assets/css/global.css" type="text/css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font.css" type="text/css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/investment_form.css" type="text/css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/chosen.css" type="text/css" rel="stylesheet">
</head>
<body style='display: none' ng-app="">
<?php 
//echo "<pre>";
//print_r($all_bank);
//echo 
//echo "</pre>";
?>
<!-- headerwrapper -->
<div class="headerWrapper hide-in-mobile">
  <div class="container">
    <div class="header">
      <div class="logo"><a href="#"><img src="<?=base_url()?>assets/images/myuniverse-logo.png" alt="Myuniverse Logo" /></a></div>
      <div class="customer-panel">
        <div class="email-info sip-down">SIP
          
        </div>
        <div class="email-info"><img src="<?=base_url()?>assets/images/email-icon.png" width="16" height="13" alt="email-icon" class="email-icon"> <a href="mailto:customercare@myuniverse.co.in" class="link">customercare@myuniverse.co.in</a></div>
        <div class="cell-info"><img src="<?=base_url()?>assets/images/mobile-icon.png" width="15" height="15" alt="email-icon" class="cell-icon"> <span class="cont-no">022-61802828</span> <span class="time-copy">(10am-7pm Mon - Sat)</span></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<header class="mobile-header hide-in-desktop">
  <div class="menu mobile-icon"><a class="menuIcon" href="javascript:void(0);"> <span></span> <span></span> <span></span> </a></div>
  <div class="logo" onClick="LogoRedirection();"><img src="<?=base_url()?>assets/images/logo_red.png" alt="aditya birla logo"></div>
</header>
<!-- end headerwrapper --> 
<div class="row" style="width:100%;text-align:center;">

  <a href="https://stg.adityabirlamoneyuniverse.com/products-services/buy-sell-equity#%21/recommended-stocks" style="font-size:1.2em;">Back</a>
</div>

<?php echo form_open('home/creat_pdf'); ?>

<div class="overlay3"> </div>
<div class="overlaybox3">
  <div class="closebtn"> <a class="closepop close-reveal-modal" href="javascript:void(0)"></a> </div>
  <div class="recurringWhite">
    <div class="popForm">
      <div class="recurringWhiteP">
        <div class="popBoxHd">Refer to authenticated digitally signed contract notes / margin bills sent 
          from the domain: <a href="mailto:abm-chn.ereports@adityabirla.com">abm-chn.ereports@adityabirla.com</a></div>
        <div class="topBox">
          <div class="rowBoxPopL">Dealing through Sub-Brokers and Other Stock Brokers- if client 
            is dealing through Stock-Broker/ Sub-Broker in case of multiple  
            Stock-Broker/ Sub-Brokerv</div>
          <div class="rowBoxPopR">
            <div class="rowBoxPopRIn">
              <div class="radMn">
                <div class="lftRadsm">
                  <input type="checkbox"  name="Dealing[]" id="DealingYES" tabindex="100" >
                </div>
                <div class="rhtRadsm">
                  <div class="inround">
                    <label for="DealingYES">YES</label>
                  </div>
                </div>
              </div>
              <div class="radMn">
                <div class="lftRadsm">
                  <input type="checkbox"  name="Dealing[]" id="DealingNO" tabindex="101">
                </div>
                <div class="rhtRadsm">
                  <div class="inround">
                    <label for="DealingNO">NO</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="CL"></div>
          <div class="formRowM " >
            <div class="formRow mobTopPad">
              <div class="formInput1">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" id="input-8" tabindex="102" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Name of Stock Broker</span> <span class="tooltip1 error">Enter Name of Stock Broker</span> </label>
                  </span> </div>
              </div>
              <div class="formInput2">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" id="input-8" tabindex="103" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Name of Sub Broker, is any</span> <span class="tooltip1 error">Enter Name of Sub Broker, is any</span> </label>
                  </span> </div>
              </div>
              <div class="CL"></div>
            </div>
            <div class="formRow">
              <div class="formInput3">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" id="input-8" tabindex="104" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Client Code</span> <span class="tooltip1 error">Enter Client Code</span> </label>
                  </span> </div>
              </div>
              <div class="formInput3 Exchange">
                <div class="Poplabel1">Exchange</div>
                <div class="PopInp1"> 
                <!---->
                <div class="">
              <div class="radMn">
                <div class="lftRadsm">
                  <input type="checkbox" name="EXCHANGE[]" id="BSE" tabindex="105">
                </div>
                <div class="rhtRadsm">
                  <div class="inround">
                    <label for="BSE">BSE</label>
                  </div>
                </div>
              </div>
              <div class="radMn">
                <div class="lftRadsm">
                  <input type="checkbox" name="EXCHANGE[]" id="NSE" tabindex="106">
                </div>
                <div class="rhtRadsm">
                  <div class="inround">
                    <label for="NSE">NSE</label>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
              <div class="CL"></div>
            </div>
            <div class="formRow">
              <div class="formInput4">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi lineHMob">
                  <input class="input__field input__field--hoshi" type="text" id="input-8" tabindex="107" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Details of disputes/dues pending from/to such Stock Broker / Sub-Broker : </span> <span class="tooltip1 error">Enter Details</span> </label>
                  </span> </div>
              </div>
              <div class="CL"></div>
            </div>
            
            
            <div class="formRow"> <div class="formInput4">
            <div class=" twoNewCln">
                <div class="leftTwoNew">
                  <div class="leftTwoNewIn">
                    <div>I intend to invest in the stock market with </div>
                    
                  </div>
                </div>
                
                <div class="rightTwoNew"> <div class="radMn">
                <div class="lftRadsm">
                  <input type="checkbox" name="investType[]" id="OwnFunds" tabindex="105">
                </div>
                <div class="rhtRadsm">
                  <div class="inround">
                    <label for="OwnFunds">Own Funds</label>
                  </div>
                </div>
              </div>
              <div class="radMn">
                <div class="lftRadsm">
                  <input type="checkbox" name="investType[]" id="BorrowedFunds" tabindex="106">
                </div>
                <div class="rhtRadsm">
                  <div class="inround">
                    <label for="BorrowedFunds">Borrowed Funds</label>
                  </div>
                </div>
              </div>
            </div>
              <div class="CL"></div>
            </div>
                
            </div></div>
            
            <div class="formRow">
              <div class="formInput1" style="height:auto!important">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" id="input-8" tabindex="104" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Sources of Borrowed Funds (if any)</span> <span class="tooltip1 error">Enter Sources of Borrowed Funds</span> </label>
                  </span> </div>
                   <div class="CL"></div>
              </div>
              <div class="formInput3">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" id="input-8" tabindex="105" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Amount</span> <span class="tooltip1 error">Enter Amount</span> </label>
                  </span> </div>
                   <div class="CL"></div>
              </div>
              <div class="CL"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="SecondBox">
        <div class="SecondBoxBoxIn">
          <div class="headRedUn">STANDING INSTRUCTIONS</div>
          <div class="tableBox">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="firstCln" width="70%">Account to be operated through Power of Attorney (PoA) </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Attorney" id="AttorneyYES" checked="checked" disabled tabindex="108" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="AttorneyYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Attorney" id="AttorneyNO" disabled tabindex="109">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="AttorneyNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >I / We instruct the DP to receive each and every credit in my / 
                  our account </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="padB5">(Automatic Credit)</div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Automatic" id="AutomaticYES" checked="checked" disabled tabindex="110">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="AutomaticYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Automatic" id="AutomaticNO" disabled tabindex="111">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="AutomaticNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" ><div class="twoCln">
                    <div class="lftSms">
                      <div>SMS Alert Facility </div>
                      <div class="smfnn"> Refer to 
                        Terms & Conditions given as Annexure in Rights & Obligations 
                        Booklet.</div>
                    </div>
                    <div class="rhtSms">
                      <div> Mobile No. +91 <span class="higlight">987654689</span></div>
                      <div>
                        <div>Mandatory, if you are 
                          giving power of Attorney (POA) </div>
                      </div>
                    </div>
                  </div></td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Alert" id="AlertYES" checked="checked" disabled tabindex="112">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="AlertYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Alert" id="AlertNO" disabled tabindex="113">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="AlertNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >Account Statement Requirement </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox" checked  name="" id="Regulation" disabled tabindex="114">
                      </div>
                      <div class="rhtRadsm mobWidth">
                        <div class="inround">
                          <label for="Regulation">As per SBI Regulation</label>
                        </div>
                      </div>
                    </div>
                    <div class="CL"></div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Statement" id="Daily" disabled tabindex="115" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="Daily">Daily</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Statement" id="Weekly" disabled tabindex="116">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="Weekly">Weekly</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Statement" id="Fortnightly" disabled tabindex="117">
                      </div>
                      <div class="rhtRadsm checkLabel2">
                        <div class="inround">
                          <label for="Fortnightly">Fortnightly</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox" checked  name="" id="Monthly" disabled tabindex="118">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="Monthly">Monthly</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >Whether you wish to receive physical contract note or Electronic 
                  Contract Note (ECN) or Electronic Transaction and Holding Statement 
                  (If ECN & ESOTH is opted, "Authorization for sending documents 
                  through E-Mail" shall be executed and E-Mail id should be specified) <a href="mailto:sanjusahu@gmail.com">sanjusahu@gmail.com</a></td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="ECN" id="ECNYES" checked="checked" disabled tabindex="119" >
                      </div>
                      <div class="rhtRadsm checkLabel">
                        <div class="inround">
                          <label for="ECNYES">Electronic Contract Note</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="ECN" id="ECNNO" disabled tabindex="120">
                      </div>
                      <div class="rhtRadsm checkLabel">
                        <div class="inround">
                          <label for="ECNNO">Electronic Transaction-cum-Holding Statement (ESOTH)</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="ECN" id="pcn" disabled tabindex="121">
                      </div>
                      <div class="rhtRadsm checkLabel">
                        <div class="inround">
                          <label for="pcn">Physical Contract Note (Charges applicable)</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >Do you wish to receive dividend / interest directly in to your bank 
                  account given below through ECS?[ECS is mandatory for locations notified by SEBI from time 
                  to time] </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="ECS" checked id="ECSYES" disabled tabindex="122" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="ECSYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="ECS" id="ECSNO" disabled tabindex="123">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="ECSNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >To register for easi, please visit CDSL website www.cdslindia.com 
                  (Easi allows a BO to view his ISIN balances, transactions and value 
                  of the portfolio online) </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="register" checked id="registerYES" disabled tabindex="124"  >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="registerYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="register" id="registerNO" disabled tabindex="125">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="registerNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >Whether you wish to avail of the facility of Internet Trading/Wireless 
                  Technology (please specify) : </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Internet" checked id="InternetYES" disabled tabindex="126" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="InternetYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="Internet" id="InternetNO" disabled tabindex="127">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="InternetNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >I / We would like to instruct the DP to accept all the pledge instructions in my / our account without any other further instruction from my / our end </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="DP" id="DPYES" checked disabled  tabindex="128" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="DPYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="DP" id="DPNO" disabled tabindex="129">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="DPNO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >I / We would like to share the email ID with the RTA. </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="RTA" id="RTAYES" checked disabled tabindex="130" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="RTAYES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="RTA" id="RTANO" disabled tabindex="131">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="RTANO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >I / We would like to receive the Annual Report. </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="receive" id="receiveYES" disabled tabindex="132">
                      </div>
                      <div class="rhtRadsm checkLabel2">
                        <div class="inround">
                          <label for="receiveYES">Physical </label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="receive" id="receiveNO" checked="checked" disabled tabindex="133" >
                      </div>
                      <div class="rhtRadsm checkLabel2">
                        <div class="inround">
                          <label for="receiveNO">Electronic </label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="receive" id="receivepcn" disabled tabindex="134">
                      </div>
                      <div class="rhtRadsm checkLabel2">
                        <div class="inround">
                          <label for="receivepcn">Both Physical and Electronic </label>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td class="firstCln" >I / We have issued a Power of Attorney (POA) in favour of Aditya Birla Money Limited for Executing delivery instructions for settling stock exchange trades effected through  member, margin obligations etc. </td>
                <td class="secondCln"><div class="rowBoxPopRIn">
                    <div class="radioBx3">
                      <div class="rowRad3">
                        <div class="lftRadC">
                          <div class="lftRadCIn">
                            <input type="checkbox"  name="" id="Option1" disabled tabindex="135">
                          </div>
                        </div>
                        <div class="rhtRadC"><label for="Option1">Option 1: I / We require you to issue Delivery Instruction Slip Booklet to me / us though we have issued POA.</label></div>
                        <div class="CL"></div>
                      </div>
                      <div class="rowRad3">
                        <div class="lftRadC">
                          <div class="lftRadCIn">
                            <input type="checkbox"  name="Option" id="Option2" checked disabled tabindex="136">
                          </div>
                        </div>
                        <div class="rhtRadC"><label for="Option2">Option 2 : I / We do not require the Delivery
                          Instruction Slip for the time being.</label></div>
                        <div class="CL"></div>
                      </div>
                    </div>
                  </div></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="recurringWhiteP" style="padding-top:0px"  >
        <div class="lastBox">
          <div class="seperate">
            <div class="formRow">
              <div class="btnPopN">
                <div class="lftCancel">
                  <input  type="button" class="closepop" value="Cancel" tabindex="137">
                </div>
                <div class="rhtContine">
                  <input  type="submit" class="btSubmitContinue" value="SUBMIT & CONTINUE" tabindex="138">
                </div>
              </div>
              <div class="CL"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="overlay4"> </div>
<div class="overlaybox4">
  <div class="closebtn"> <a class="closepop close-reveal-modal" href="javascript:void(0)"></a> </div>
  <div class="recurringWhite" >
    <div class="popForm">
      <div class="recurringWhiteP">
        <div class="popBoxHd">Refer to authenticated digitally signed contract notes / margin bills sent 
          from the domain: <a href="mailto:abm-chn.ereports@adityabirla.com">abm-chn.ereports@adityabirla.com</a></div>
      </div>
      <div class="recurringWhiteP topPadPop">
        <div class="lastBox">
          <div class="headRedUn">ENTER NOMINEE DETAILS</div>
          
          <div class="CL"></div>
          <div class="formRowM">
            <div class="formRow">
              <div class="formInput1">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" name="nominee_name" type="text" id="input-8" tabindex="61" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">NAME OF THE NOMINEE</span> <span class="tooltip1 error">Enter Name of the Nominee</span> </label>
                  </span> </div>
              </div>
              <div class="formInput2">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" name="nominee_dob" id="date2" tabindex="62"   maxlength="10" />
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Date of birth</span> </label>
                  </span> </div>
              </div>
              <div class="CL"></div>
            </div>
            <div class="formRow">
              <div class="formInput1">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" name="relationsheep" id="input-8" tabindex="63" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Relationship with Applicant (if any)</span> <span class="tooltip1 error">Enter Relationship with Applicant (if any)</span> </label>
                  </span> </div>
              </div>
              <div class="formInput2">
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" name="pan_nominee" id="input-8" tabindex="64" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">PAN OF THE NOMINEE</span> <span class="tooltip1 error">Enter Pan of the Nominee</span> </label>
                  </span> </div>
              </div>
              <div class="CL"></div>
            </div>
            <div class="formRow">
              <div class="formInput4">
                <div class="Poplabel1"></div>
                <div class="PopInp1 textarea2"> <span class="input inputtextarea input--hoshi ">
                  <textarea class="input__field input__field--hoshi" type="text" name="nominee_address" id="input-8" maxlength="150" tabindex="65" /></textarea>
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Address of Nominee</span> <span class="tooltip1 error">Address of Nominee</span> </label>
                  </span> </div>
              </div>
              <div class="CL"></div>
            </div>
            <div class="formRow">
              <div class="formInput5-01" >
                <div class="Poplabel1"></div>
                <div class="PopInp1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="text" name="nominee_pincode" id="input-8" tabindex="66" />
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">pincode</span> <span class="tooltip1 error">Enter Pincode</span> </label>
                  </span> </div>
              </div>
              <div class="formInput5-02" >
                <div class="Poplabel1"></div>
                <div class="PopInp1">
                  <div class="mfs2">
                    <select id="selectField2" name="nominee_city" tabindex="67">
                      <option selected="selected" value="Mumbai">Mumbai</option>
                      <option  value="Bhdohi">Bhdohi</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="formInput5-03" style="margin:0px">
                <div class="Poplabel1"></div>
                <div class="PopInp1">
                  <div class="mfs2">
                    <select id="selectField2" name="nominee_state" tabindex="68">
                      <option selected="selected" value="Maharashtra">Maharashtra</option>
                      <option  value="Uttar Pradesh">Uttar Pradesh</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="CL"></div>
            </div>
            <div class="seperate">
              <div class="formRow">
                <div class="headerP2">NOMINEE CONTACT DETAILS</div>
                <div class="CL"></div>
                <div class="formInput5">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_telphone_office" id="input-8" tabindex="69" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">TEL (OFF)</span> <span class="tooltip1 error">Enter Tel (OFF)</span> </label>
                    </span> </div>
                </div>
                <div class="formInput5">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_telphone_home" id="input-8" tabindex="70" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">TEL (RES)</span> <span class="tooltip1 error">Enter Tel  (RES)</span> </label>
                    </span> </div>
                </div>
                <div class="formInput5" style="margin:0px">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_telphone_mobile" id="input-8" tabindex="71" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">MOBILE Number</span> <span class="tooltip1 error">Enter Mobile Number</span> </label>
                    </span> </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="formRow">
                <div class="formInput6">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_email" id="input-8" tabindex="72" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">EMAIL ID</span> <span class="tooltip1 error">Enter Email Id</span> </label>
                    </span> </div>
                </div>
                <div class="formInput7">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_fax" id="input-8" tabindex="73" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">FAX Number</span> <span class="tooltip1 error">Enter FAX Number</span> </label>
                    </span> </div>
                </div>
                <div class="CL"></div>
              </div>
            </div>
            <div class="seperate">
              <div class="formRow">
                <div class="headerP2">Guardian Details</div>
                <div class="CL"></div>
                <div class="formInput1-divide01">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_name" id="input-8" tabindex="74" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">NAME OF THE GUARDIAN</span> <span class="tooltip1 error">Enter Name of the Guardian</span> </label>
                    </span> </div>
                </div>
                <div class="formInput1-divide02">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_relationsheep" id="input-8" tabindex="75" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">RELATIONSHIP OF THE GUARDIAN</span> <span class="tooltip1 error">Enter Relationshiop of the Gudardian</span> </label>
                    </span> </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="formRow">
                <div class="formInput4">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1 textarea2"> <span class="input inputtextarea input--hoshi ">
                    <textarea class="input__field input__field--hoshi" type="text" name="nominee_gardian_address" id="input-8" maxlength="150" tabindex="76" /></textarea>
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">Address of Guardian</span> <span class="tooltip1 error">Enter Address of Guardian</span> </label>
                    </span> </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="formRow">
                <div class="formInput5-01">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" id="input-8" name="nominee_gardian_pincode" tabindex="77" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">pincode</span> <span class="tooltip1 error">Enter Tel (OFF)</span> </label>
                    </span> </div>
                </div>
                <div class="formInput5-02">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1">
                    <div class="mfs2">
                      <select id="selectField2" name="nominee_gardian_city" tabindex="78">
                        <option selected="selected" value="Mumbai">Mumbai</option>
                        <option  value="Bhadohi">Bhadohi</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="formInput5-03" name="nominee_gardian_state" style="margin:0px">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1">
                    <div class="mfs2">
                      <select id="selectField2" name="nominee_gardian_state" tabindex="79">
                        <option selected="selected" value="Mahrashtra">Mahrashtra</option>
                        <option  value="Uttar Pradesh">Uttar Pradesh</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
            </div>
            <div class="seperate">
              <div class="formRow">
                <div class="headerP2">Guardian Contact Details</div>
                <div class="CL"></div>
                <div class="formInput5">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_phone_office" id="input-8" tabindex="80" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">TEL (OFF)</span> <span class="tooltip1 error">Enter Tel (OFF)</span> </label>
                    </span> </div>
                </div>
                <div class="formInput5">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_phone_home" id="input-8" tabindex="81" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">TEL (RES)</span> <span class="tooltip1 error">Enter Tel (RES)</span> </label>
                    </span> </div>
                </div>
                <div class="formInput5" style="margin:0px">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_mobile" id="input-8" tabindex="82" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">MOBILE</span> <span class="tooltip1 error">Enter Mobile Number.</span> </label>
                    </span> </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="formRow">
                <div class="formInput6">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_email" id="input-8" tabindex="83" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">EMAIL ID</span> <span class="tooltip1 error">Enter Email Id</span> </label>
                    </span> </div>
                </div>
                <div class="formInput7">
                  <div class="Poplabel1"></div>
                  <div class="PopInp1"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="nominee_gardian_fax" id="input-8" tabindex="84" />
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">FAX</span> <span class="tooltip1 error">Enter FAX Number</span> </label>
                    </span> </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="formRow">
                <div class="btnPopN">
                  <div class="lftCancel">
                    <input type="button" class="closepop" value="Cancel" tabindex="85">
                  </div>
                  <div class="rhtContine">
                    <input tabindex="25" type="submit" class="btnNomineeSubmit" value="SUBMIT & CONTINUE" tabindex="86" >
                  </div>
                </div>
                <div class="CL"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section id="invest_wrapper fade out">
  <div class="investment_form  fade out">
    <div class="investmentNewForm">
      <div class="top_band"> <img src="<?=base_url()?>assets/images/icon.png" width="29" height="38" alt="icon">
        <div class="CL"></div>
        <strong >Congratulations,</strong> <span class="light">You are 2 minutes away to Invest in ZIPSIP! </span>
        <div class="smtextr">This account is for Indian nationals only</div>
      </div>
      <div class="investWhiteBox">
        <div class="formMnaBdr">
          <div class="investWhiteBoxIn">
            <div class="headRedUn"> PERSONAL DETAILS <span class="blueRight"><a href="javascript:void(0)" id="edit01">EDIT</a><a href="javascript:void(0)" id="done01">DONE</a></span></div>
            <div class="labelBox labelBox01" style="display:">
              <div class="labelRow">
                <div class="cln01">
                  <div class="dispTop">Pan No</div>
                  <div class="dispBtm" ng-bind="name" data-ng-init="name='AJDPBJFHJ'">AJDPBJFHJ</div>
                  <div class="CL"></div>
                </div>
                
                <div class="cln02KYCS">
                  <div class="dispTop">KYC STATUS</div>
                  <div class="dispBtm">Yes</div>
                  <div class="CL"></div>
                </div>
                <div class="cln02Agency">
                  <div class="dispTop">KYC AGENCY</div>
                  <div class="dispBtm">Text come here</div>
                  <div class="CL"></div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="labelRow">
              
              <div class="cln03">
                  <div class="dispTop">NAME AS ON PAN</div>
                  <div class="dispBtm" ng-bind="NAMEASONPAN" data-ng-init="NAMEASONPAN='Sanju Arjun  LastName'">Sanju Arjun  LastName</div>
                  <div class="CL"></div>
                </div>
                <div class="cln04">
                  <div class="dispTop">FATHER / SPOUSE NAME</div>
                  <div class="dispBtm" ng-bind="FATHERNAME" data-ng-init="FATHERNAME='Rajunath Sahu'">Rajunath Sahu</div>
                  <div class="CL"></div>
                </div>
                
                
                <div class="CL"></div>
              </div>
              <div class="labelRow ">
              <div class="cln02">
                  <div class="dispTop">DOB</div>
                  <div class="dispBtm" ng-bind="DOB" data-ng-init="DOB='10/12/1979'">10/12/1979</div>
                  <div class="CL"></div>
                </div>
              <div class="cln05">
                  <div class="dispTop">GENDER</div>
                  <div class="dispBtm">Male</div>
                  <div class="CL"></div>
                </div>
                <div class="cln06">
                  <div class="dispTop">MARITAL STATUS</div>
                  <div class="dispBtm">Married</div>
                  <div class="CL"></div>
                </div>
                
                
              
                <div class="CL"></div>
              </div>
              
              
              <div class="labelRow">
              
                <div class="cln07Mobile">
                  <div class="dispTop">Mobile Number</div>
                  <div class="dispBtm" ng-bind="MobileNumber" data-ng-init="MobileNumber='+91 9323106139'">+91 9323106139</div>
                  <div class="CL"></div>
                </div>
                <div class="cln07Address">
                  <div class="dispTop">EMAIL ID</div>
                  <div class="dispBtm" ng-bind="EMAILID" data-ng-init="EMAILID='SanjuSahu@gmail.com'">SanjuSahu@gmail.com</div>
                  <div class="CL"></div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="labelRow lastPad">
                <div class="cln07">
                  <div class="dispTop">COMMUNICATION ADDRESS</div>
                  <div class="dispBtm" > <span ng-bind="COMMUNICATIONADDRESS" data-ng-init="COMMUNICATIONADDRESS='Plot no 178, Jai CO- Op Society Ltd. Andheri west.'">Plot no 178, Jai CO- Op Society Ltd Andheri west</span>, <span data-ng-init="CITYNAME='Mumbais'" ng-bind="CITYNAME">Mumbai</span>  <span data-ng-init="STATE='Maharashtra'" ng-bind="STATE">Maharashtra</span> <span data-ng-init="PINCODE='400058'" ng-bind="PINCODE">400058</span> </div>
                  <div class="CL"></div>
                </div>
                <div class="CL"></div>
              </div>
            </div>
            <div class="formBox formBox01">
              <div class="row1" style="">
                <div class="lftFrm"> <span class="input tooltip_main input--hoshi input--filled">
                  <input class="input__field input__field--hoshi panno" type="text" name="pan" ng-model="name" id="pannumber" tabindex="1"  maxlength="10"/>
                  <i class="icon"></i>
                  <label class="input__label input__label--hoshi ht " for="input-6"> <span class="input__label-content input__label-content--hoshi">Enter a valid pan</span> <span class="tooltip">PAN is a mandatory requirement for investing in Mutual Funds in India</span> </label>
                  </span> </div>
                <div class="rhtFrm"> <span class="input input--hoshi input--filled">
                  <input class="input__field input__field--hoshi" type="text" name="dob" id="date1" ng-model="DOB" tabindex="2"   maxlength="10" />
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Date of birth</span> </label>
                  </span> </div>
                <div class="CL"></div>
              </div>
              <div class="row1"> <span class="input input--hoshi input--filled">
                <input class="input__field input__field--hoshi txtNumeric" type="text" name="name_on_pan" maxlength="50" id="" ng-model="NAMEASONPAN" tabindex="3" />
                <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">Name as on pan card</span> <span class="tooltip1 error">Enter Name as on pan card</span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1"> <span class="input input--hoshi input--filled">
                <input class="input__field input__field--hoshi txtNumeric" type="text" id="input-8" name="father_spouse_name" tabindex="4" ng-model="FATHERNAME" maxlength="50" />
                <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">FATHER / SPOUSE NAME</span> <span class="tooltip1 error">Enter Father / Spouse Name</span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="lftFrmG"><span class="input input--hoshi"> <span class="select_gender_female">
                  <input type="radio" name="gender" id="female" value="female" class="radio2" checked tabindex="5">
                  <label for="female">&nbsp;</label>
                  </span> <span class="select_gender_male">
                  <input type="radio" name="gender" id="male" value="male" class="radio2" tabindex="6">
                  <label for="male">&nbsp;</label>
                  </span>
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Select Gender</span> </label>
                  </span></div>
                <div class="rhtFrmG"><span class="input input--hoshi"> <span class="select_marital_single marital1">
                  <input type="radio" name="marital_status" id="single" value="single" checked class="radio2" tabindex="7">
                  <label for="single">&nbsp;</label>
                  </span> <span class="select_marital_married marital2">
                  <input type="radio" name="marital_status" id="married" value="married" class="radio2" tabindex="8">
                  <label for="married">&nbsp;</label>
                  </span>
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Marital Status</span> </label>
                  </span></div>
                <div class="CL"></div>
              </div>
              <div class="row1" style="">
                <div class="lftFrm"> <span class="input input--hoshi input--filled">
                  <input class="input__field input__field--hoshi" name="email" type="email" id="" tabindex="9" ng-model="EMAILID"   />
                  <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">Email ID</span> <span class="tooltip1 error">Enter Valid Email ID</span> </label>
                  </span> </div>
                <div class="rhtFrm"> <span class="input input--hoshi input--filled">
                  <input class="input__field input__field--hoshi" name="mobile_number" type="text" id="mobile" tabindex="10" ng-model="MobileNumber"/>
                  <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">Mobile No.</span> <span class="tooltip1 error">Enter Valid Mobile No.</span> </label>
                  </span> </div>
                <div class="CL"></div>
              </div>
              <div class="row1 textarea2 "> <span class="input inputtextarea input--hoshi input--filled">
                <textarea class="input__field input__field--hoshi" name="address" type="text" id="input-8" maxlength="150" tabindex="11" ng-model="COMMUNICATIONADDRESS"/></textarea>
                <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">COMMUNICATION ADDRESS</span> <span class="tooltip1 error">Enter Communication Address </span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="lftFrm lftFrmChange" > <span class="input input--hoshi input--filled">
                  <input class="input__field input__field--hoshi" name="pincode" type="text" id="user_pincode" tabindex="12" ng-model="PINCODE"/>
                  <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">PINCODE</span> <span class="tooltip1 error">Enter Pincode</span> </label>
                  </span> </div>
                <div class="rhtFrm rhtFrmChange">
                  <div class="mfs3">
                    <select id="selectField" id="user_city" name="user_city" tabindex="13" ng-model="CITYNAME">
                        <option selected="selected" value="Select City"> Select City</option>
                        <option  value="Mumbai">Mumbai</option>
                        <option  value="Nashik">Nashik</option>
                      </select>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1 permP">
                <div class="mfs">
                  <select id="state" name="state" tabindex="14" ng-model="STATE">
                    <option selected="selected" value="Select State">Select State</option>
                    <option  value="Maharashtra">Maharashtra</option>
                    <option  value="Gujarat">Gujarat</option>
                  </select>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="checkBox">
                  <div class="chkInt">
                    <input name="" type="checkbox" value="" class="radioClick" id="perm" checked tabindex="15" />
                  </div>
                  <div class="chkIntTex">
                    <label for="perm">My permanent address is same as above</label>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="boxshow" style="display:none">
                <div class="row1  textarea2" > <span class="input inputtextarea input--hoshi ">
                  <textarea class="input__field input__field--hoshi" name="permanent_address" type="text" id="input-8" maxlength="150" tabindex="16" /></textarea>
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">PERMANENT COMMUNICATION ADDRESS</span> <span class="tooltip1 error">Enter Permanent Communication Address</span> </label>
                  </span>
                  <div class="CL"></div>
                </div>
                <div class="row1">
                  <div class="lftFrm lftFrmChange"> <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" name="permanent_pincode" type="text" id="input-7" tabindex="17" />
                    <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">PINCODE</span> <span class="tooltip1 error">ENTER PINCODE</span> </label>
                    </span> </div>
                  <div class="rhtFrm rhtFrmChange">
                    <div class="mfs3">
                     <select id="selectField" name="permanent_user_city" tabindex="18" ng-model="">
                        <option selected="selected" value="SELECT A BANK FROM THE LIST">SELECT CITY</option>
                        <option  value="Mumbai">Mumbai</option>
                        <option  value="Nashik">Nashik</option>
                      </select>
                    </div>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="row1">
                  <div class="mfs">
                    <select id="selectField" name="permanent_state" tabindex="19">
                      <option selected="selected" value="SELECT A BANK FROM THE LIST">State</option>
                      <option selected="" value="Maharashtra">Maharashtra</option>
                      <option selected="" value="Maharashtra">Maharashtra</option>
                    </select>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="formMnaBdr">
          <div class="investWhiteBoxIn">
            <div class="headRedUn"> BANK DETAILS <span class="blueRight"><a href="javascript:void(0)" id="edit02" >EDIT / ADD BANK</a><a href="javascript:void(0)" id="done02" >DONE</a></span></div>
            <div class="labelBox02">
              <div class="labelBox">
                <div class="labelRow">
                  <div class="cln08">
                    <div class="dispTop">aCCOUNT TYPE</div>
                    <div class="dispBtm" data-ng-init="ACCOUNTTYPE='Saving Account'" ng-bind="ACCOUNTTYPE">Saving Account</div>
                    <div class="CL"></div>
                  </div>
                  <div class="cln09">
                    <div class="dispTop">BANK NAME</div>
                    <div class="dispBtm" data-ng-init="SELECTABANK='ICICI Bank'" ng-bind="SELECTABANK">ICICI Bank</div>
                    <div class="CL"></div>
                  </div>
                  <div class="cln10" style="border:0px solid red">
                    <div class="dispTop">NAME AS ON BANK</div>
                    <div class="dispBtm" data-ng-init="NameasonBank='Sanju Sahu'" ng-bind="NameasonBank">Sanju Sahu</div>
                    <div class="CL"></div>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="labelRow">
                  <div class="cln11-2">
                    <div class="dispTop">BANK City</div>
                    <div class="dispBtm" data-ng-init="BANKCITY='Mumbai'" ng-bind="BANKCITY" >Mumbai</div>

                    <div class="CL"></div>
                  </div>
                  <div class="cln11">
                    <div class="dispTop">BANK BRANCH</div>
                    <div class="dispBtm" data-ng-init="BANKBRANCH='4 Bungalow Andheri West'" ng-bind="BANKBRANCH">4 Bungalow Andheri West</div>
                    <div class="CL"></div>
                  </div>
                  <div class="cln12">
                    <div class="dispTop">BANK ACCOUNT NUMBER</div>
                    <div class="dispBtm" data-ng-init="BANKACCOUNTNUMBER='022938474'" ng-bind="BANKACCOUNTNUMBER">022938474</div>
                    <div class="CL"></div>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="labelRow lastPad">
                  <div class="cln07">
                    <div class="dispTop">BANK ADDRESS</div>
                    <div class="dispBtm"><!--<span data-ng-init="BANKADDRESS='Plot no 178, Jai C0- OP Society Ltd. Andheri west, Mumbai 400058.'" ng-bind="BANKADDRESS">Plot no 178, Jai C0- OP Society Ltd. Andheri west</span>, Mumbai 400058.-->
                    
                    
                    <span ng-bind="BANKADDRESS" data-ng-init="BANKADDRESS='Plot no 178, Jai CO- Op Society Ltd. Andheri west.'">Plot no 178, Jai CO- Op Society Ltd Andheri west</span>, <span data-ng-init="CITYNAME2='Mumbais'" ng-bind="CITYNAME2">Mumbai</span>  <span data-ng-init="STATE2='Maharashtra'" ng-bind="STATE2">Maharashtra</span> <span data-ng-init="PINCODE2='400058'" ng-bind="PINCODE2">400058</span>
                    
                    </div>
                    <div class="CL"></div>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
            </div>
            <div class="formBox02  " >
              <div class="formBox" >
                <div class="row1">
                  <div class="bankstatus">
                    <div class="switchBox">
                      <ul>
                        <li class="lftSwitch active">
                          <div class="lftSwitchP">EXISTING BANK</div>
                        </li>
                        <li class="rhtSwitch">
                          <div class="rhtSwitchP">ADD NEW BANK</div>
                        </li>
                      </ul>
                    </div>
                    <!--  <div class="radMn">
                    <div class="lftRadsm">
                      <input type="radio"  name="ex2" id="ex1_a1" checked="checked" class="radiocust" value="Yes">
                    </div>
                    <div class="rhtRadsm">
                      <div class="inround">
                        <label for="ex1_a1">EXISTING BANK</label>
                      </div>
                    </div>
                  </div>
                  <div class="radMn">
                    <div class="lftRadsm">
                      <input type="radio"  name="ex2" id="ex1_a2" class="radiocust" value="No">
                    </div>
                    <div class="rhtRadsm">
                      <div class="inround">
                        <label for="ex1_a2">ADD A NEW BANK</label>
                      </div>
                    </div>
                  </div>-->
                    <div class="CL"></div>
                  </div>
                </div>
                <div class="fadeInBox disableBox" >
                  <div class="row1">
                    <div class="accoutBx">
                      <div class="typelft">
                        <div class="typelftinround">SELECT A BANK ACCOUNT TYPE</div>
                      </div>
                      <div class="typerht">
                        <div class="enableBoxRad">
                          <div class="radMn acTyLft">
                            <div class="lftRadsm">

                              <!-- button group 1 !-->
                              <input type="radio"  name="new_accounttype" id="accounttypes" tabindex="20" ng-model="ACCOUNTTYPE"  value="SAVING A/C" checked class="radiocust">
                            </div>
                            <div class="rhtRadsm">
                              <div class="inround">
                                <label for="new_accounttype">SAVING A/C</label>
                              </div>
                            </div>
                          </div>
                          <div class="radMn acTyRht ">
                            <div class="lftRadsm">
                            <!-- button group 1 !-->
                              <input type="radio" checked="checked"  name="new_accounttype"  id="accounttypes" tabindex="21" class="radiocust" ng-model="ACCOUNTTYPE"  value="CURRENT A/C">
                            </div>
                            <div class="rhtRadsm">
                              <div class="inround">
                                <label for="new_accounttype">CURRENT A/C</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="disableBoxRad">
                          <div class="radMn">
                            <div class="lftRadsm">
                            <!-- button group 2 !-->
                              <input type="radio" name="existing_accounttype" id="" value="SAVING A/C" tabindex="22" class="radiocust2">
                            </div>
                            <div class="rhtRadsm">
                              <div class="inround">
                                <label for="existing_accounttype">SAVING A/C</label>
                              </div>
                            </div>
                          </div>
                          <div class="radMn">
                            <div class="lftRadsm">
                            <!-- button group 2 !-->
                              <input type="radio" checked="checked" name="existing_accounttype"  id="" value="CURRENT A/C" tabindex="23" class="radiocust2">
                            </div>
                            <div class="rhtRadsm">
                              <div class="inround">
                                <label for="existing_accounttype">CURRENT A/C</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="CL"></div>
                    </div>
                  </div>
                  <div class="row1 selectabankEnable">
                    <div class="mfs">
                      <select id="select_bank_name" name="select_bank" tabindex="15" tabindex="24" ng-model="SELECTABANK">
                        <option selected="selected" value="">SELECT A BANK FROM THE LIST</option>
                         <?php foreach ($all_bank as $kela) {?>
                           <option  value="<?php echo $kela->bank;?>"><?php echo $kela->bank;?></option>
                       <?php  } ?>
                      </select>
                    </div>
                    <div class="CL"></div>
                  </div>
                  
                  <div class="row1 selectabankDisable" id="">
                    <div class="mfs">
                      <select id="selectField" name="select_bank" tabindex="25" >
                        <option selected="selected" value="ICICI BANK">SELECT A BANK FROM THE LIST</option>
                        <option value="ICICI BANK">ICICI BANK</option>
                        <option value="HDFC BANK">HDFC BANK</option>
                      </select>
                    </div>
                    <div class="CL"></div>
                  </div>
                  
                  
                  <div id="">
                    <div class="row1 nameAsOnBankEnable"> <span class="input input--hoshi input--filled">
                      <input class="input__field input__field--hoshi" type="text" name="name_on_banks" id="name_on_banks" tabindex="26" ng-model="NameasonBank"/>
                      <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">Name as on Bank</span> <span class="tooltip1 error">Enter Name as on Bank</span> </label>
                      </span>
                      <div class="CL"></div>
                    </div>
                   <div class="row1 nameAsOnBankDisable"> <span class="input input--hoshi ">
                      <input class="input__field input__field--hoshi" type="text" name="name_on_bank" id="name_on_bank" tabindex="27" />
                      <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">Name as on Bank</span> <span class="tooltip1 error">Enter Name as on Bank</span> </label>
                      </span>
                      <div class="CL"></div>
                    </div>
                  </div>
                 
                  
                  <div class="row1">
                    <div class="lftFrm lftFrmChange">
                      <div class="mfs2 bankCityEnable">
                        <select  id="select_bank_branch_city" name="select_bank_branch_city" tabindex="28" ng-model="BANKCITY">
                          <option selected="selected" value="SELECT BANK CITY">SELECT BANK CITY</option>
                         <option  value="Mumbai">Mumbai</option>
                          <option  value="Nashik">Nashik</option>
                        </select>
                      </div>
                      <div class="mfs2 bankCityDisable">
                        <select id="selectField2" name="select_bank_branch" tabindex="29" >
                          <option selected="selected" value="SELECT BANK CITY">SELECT BANK CITY</option>
                          <option  value="Mumbai">Mumbai</option>
                          <option  value="Nashik">Nashik</option>
                        </select>
                      </div>
                      
                      
                    </div>
                    <div class="rhtFrm rhtFrmChange" style="border:0px solid red">
                      <div class="mfs3 bankBranchEnable">
                        <select id="select_bank_branch" name="select_bank_branch" tabindex="30" ng-model="BANKBRANCH">
                        <option selected="selected" value="SELECT BRANCH FROM THE LIST">SELECT BRANCH FROM THE LIST</option>
                        <option  value="4 bungalow">4 bungalow</option>
                        <option  value="7 bungalow">7 bungalow</option>
                      </select>
                      </div>
                      
                      <div class="mfs3 bankBranchDisable">
                        <select id="selectField" name="select_bank_br" tabindex="31" ng-model="BANKBRANCH">
                        <option selected="selected" value="SELECT BRANCH FROM THE LIST">SELECT BRANCH FROM THE LIST</option>
                        <option  value="4 bungalow">4 bungalow</option>
                        <option  value="7 bungalow">7 bungalow</option>
                      </select>
                      </div>
                    </div>
                    <div class="CL"></div>
                  </div>
                  <div class="row1">
                    <div class="lftFrm lftFrmChange"> <span class="input input--hoshi ">
                      <input class="input__field input__field--hoshi" name="micr_code" type="text" id="micr_code" tabindex="32" />
                      <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">MICR CODE</span> <span class="tooltip1 error">Enter Valid MICR CODE</span> </label>
                      </span> </div>
                    <div class="rhtFrm rhtFrmChange" style="border:0px solid red"> <span class="input input--hoshi ">
                      <input class="input__field input__field--hoshi" name="ifsc_code" type="text" id="ifsc_code" tabindex="33" />
                      <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">IFSC CODE</span> <span class="tooltip1 error">Enter Valid IFSC CODE</span> </label>
                      </span> </div>
                    <div class="CL"></div>
                  </div>
                  <div class="row1 bankAccountNumberEnable">
                   <span class="input input--hoshi input--filled">
                    <input class="input__field input__field--hoshi" type="text" name="bank_account_no" id="bank_account_no" maxlength="15" tabindex="34" ng-model="BANKACCOUNTNUMBER" />
                    <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">BANK ACCOUNT NUMBER</span> <span class="tooltip1 error">Enter Valid Bank Account Number</span> </label>
                    </span>
                    <div class="CL"></div>
                  </div>
                  
                  <div class="row1 bankAccountNumberDisable">
                   <span class="input input--hoshi ">
                    <input class="input__field input__field--hoshi" type="text" name="bank_account" id="bank_account_no" maxlength="15" tabindex="35" />
                    <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">BANK ACCOUNT NUMBER</span> <span class="tooltip1 error">Enter Valid Bank Account Number</span> </label>
                    </span>
                    <div class="CL"></div>
                  </div>
                  
                  <div class="row1 textarea2 bankAddressEnable"> 
                  <span class="input inputtextarea input--hoshi input--filled">
                    <textarea class="input__field input__field--hoshi" type="text" name="bank_address" id="bank_address" maxlength="150" tabindex="36" ng-model="BANKADDRESS"/></textarea>
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">BANK ADDRESS</span> <span class="tooltip1 error">Enter Valid Bank Address </span> </label>
                    </span>
                    <div class="CL"></div>
                  </div>
                  
                  <div class="row1 textarea2 bankAddressDisable"> 
                  <span class="input inputtextarea input--hoshi ">
                    <textarea class="input__field input__field--hoshi" type="text" name="bank_addres" id="input-8" maxlength="150" tabindex="37" /></textarea>
                    <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">BANK ADDRESS</span> <span class="tooltip1 error">Enter Valid Bank Address </span> </label>
                    </span>
                    <div class="CL"></div>
                  </div>
                  <!---->
                  <div id="addNewPlace">
                    <div class="row1">
                      <div class="lftFrm lftFrmChange"> 
                      <span class="input input--hoshi input--filled">
                        <input class="input__field input__field--hoshi" type="text" name="bank_pincode" id="input-7" tabindex="38" ng-model="PINCODE2"/>
                        <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">PINCODE</span> <span class="tooltip1 error">Enter Pincode</span> </label>
                        </span> </div>
                      <div class="rhtFrm rhtFrmChange">
                        <div class="mfs3">
                          <select id="selectField" name="select_bank_city" tabindex="39" ng-model="CITYNAME2">
                            <option selected="selected" value="Mumbai">Select City</option>
                            <option  value="Mumbai">Mumbai</option>
                            <option  value="Nashik">Nashik</option>
                          </select>
                        </div>
                      </div>
                      <div class="CL"></div>
                    </div>
                    <div class="row1">
                      <div class="mfs">
                        <select id="selectField" name="select_bank_state" tabindex="40" ng-model="STATE2">
                          <option selected="selected" value="Select State">Select State</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Gujarat">Gujarat</option>
                        </select>
                      </div>
                      <div class="CL"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="formMnaBdr additionalDetailsError">
          <div class="investWhiteBoxIn">
            <div class="headRedUn">ADDITIONAL DETAILS</div>
            <div class="formBox">
              <div class="row1">
                <div class="lftFrm">
                  <div class="mfs2">
                    <select id="selectField" name="income_range" tabindex="41">
                      <option selected="selected" value="INCOME RANGE (P.A)">INCOME RANGE (P.A)</option>
                      <option  value="Below Rs. 1 Lac">Below Rs. 1 Lac</option>
                      <option  value="Rs. 1-5 Lac">Rs. 1-5 Lac</option>
                      <option  value="Rs. 5-10 Lac">Rs. 5-10 Lac</option>
                      <option  value="Rs. 10-25 Lac">Rs. 10-25 Lac</option>
                       <option  value="Rs. > 25 Lacs">Rs. > 25 Lacs</option>
                    </select>
                  </div>
                </div>
                <div class="rhtFrm">
                  <div class="mfs3">
                    <select id="selectField" name="occupation" tabindex="42">
                      <option selected="selected" value="OCCUPATION">OCCUPATION</option>
                    
                      <option  value="Private Sector Service">Private Sector Service</option>
                      <option  value="Public Sector">Public Sector</option>
                      <option  value="Government Service">Government Service</option>
                      <option  value="Business">Business</option>
                       <option  value="Agriculturist">Agriculturist</option>
                       
                        <option  value=" Retired"> Retired</option>
                      <option  value="Housewife">Housewife</option>
                       <option  value="Student">Student</option>
                       
                          <option  value=" Professional"> Professional</option>
                      <option  value="Housewife">Housewife</option>
                       <option  value="Others">Others</option>
                    </select>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="mfs">
                  <select id="selectField" name="trading_account" tabindex="43">
                    <option selected="selected" value="Individual Margin Trading A/c (Mantra)">Individual Margin Trading A/c (Mantra)</option>
                  </select>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="lftFrm2">
                  <div class="innP">
                    <label for="politicalLY">ARE YOU politicalLY exposed  PERSON? </label>
                  </div>
                </div>
                <div class="rhtFrm2">
                  <div class="mfs">
                    <select id="politicalLY" name="politically_exposed" tabindex="44">
                      <option selected="selected" value="YES">YES</option>
                      <option  value="NO">NO</option>
                    </select>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="numYear">
                  <div class="lftyear">
                    <div class="lftyearI">
                      <label for="selectField">Number of years of Investment/Trading experience</label>
                    </div>
                  </div>
                  <div class="rtyear">
                    <div class="mfs">
                    <select id="politicalLY" name="investment_year" tabindex="45">
                      <option selected="selected" value="1">1</option>
                      <option  value="2">2</option>
                      <option  value="3">3</option>
                      <option  value="4">5</option>
                      <option  value="5">5</option>
                      <option  value="6">6</option>
                      <option  value="7">7</option>
                      <option  value="8">8</option>
                      <option  value="9">9</option>
                      <option  value="10">10</option>
                      <option  value="11">11</option>
                      <option  value="12">12</option>
                      <option  value="13">13</option>
                      <option  value="14">14</option>
                      <option  value="15">15</option>
                      <option  value="16">16</option>
                      <option  value="17">17</option>
                      <option  value="18">18</option>
                      <option  value="19">19</option>
                      <option  value="> 20">> 20</option>
                    </select>
                  </div>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
              <div class="row1">
                <div class="formNominee">
                  <div class="nomineeLft">
                    <div class="nomineeLftIn">ANY ACTION TAKEN BY SEBI OR ANY OTHER AUTHORITY</div>
                  </div>
                  <div class="nomineeRht">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox" checked name="action_taken_sbi" id="ACTIONSBIYES2" value="yes" tabindex="46">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="ACTIONSBIYES2">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="action_taken_sbi" id="ACTIONSBINO2" value="no"  tabindex="47">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="ACTIONSBINO2">NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
              
              
              <div class="row1">
                <div class="formNominee">
                  <div class="nomineeLft">
                    <div class="nomineeLftIn">DO U WISH TO ADD A NOMINEE</div>
                  </div>
                  <div class="nomineeRht">
                    <div class="radMn" >
                      <div class="lftRadsm">
                        <input type="checkbox"  name="nominees" id="YES2" class="radioClickNominee scrolltop" value="yes" tabindex="48">
                      </div>
                      <div class="rhtRadsm ">
                        <div class="inround">
                          <label for="YES2" class="radioClickNominee" >YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="nominees" id="NO2" value="no" class="radioClickNomineeNo" checked="checked" tabindex="49">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="NO2">NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
              <div class="row1 labelReviewLast">
                <div class="labelcheckLft">
                  <input name="reviewed" id="reviewed" type="checkbox" value="" checked tabindex="50"/>
                </div>
                <div class="labelcheckRht">
                  <div class="smaGrey">
                    <label for="reviewed">I have reviewed the additional settings and accept the same. <a href="javascript:void(0)" class="EmailDoc scrolltop">Click here to review</a></label>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="btnCntBox">
                  <input type="submit" class="clickload3" value="REVIEW & SUBMIT NOW" tabindex="51">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footerB">By signing up, you agree to our <a href="#">terms of use</a>. </div>
    <!-- <div>
    <iframe src="https://stg.adityabirlamoneyuniverse.com/sitepages/nb_keepalive.aspx"></iframe>
    </div> -->
  </div>
  
  
</section>

<?php echo form_close(); ?>

<div class="footerWrapper section" id="">
<div class="footer-container">
<div class="footer-menus">
<div class="footer-menu-block first">
<div class="h5-head">LINK ALL OF YOUR ACCOUNTS</div>
<ul class="footer-menu-list">
<li><a href="#">Bank accounts</a></li>
<li><a href="#">Credit Cards</a></li>
<li><a href="#">Investments</a></li>
<li><a href="#">Loans</a></li>
<li><a href="#">Insurance</a></li>
<li><a href="#">Reward points</a></li>
<li><a href="#">Real estate</a></li>
</ul>
</div>
<div class="footer-menu-block">
<div class="h5-head">MANAGE MONEY</div>
<ul class="footer-menu-list">
<li><a href="#">Get the right health insurance</a></li>
<li><a href="#">Get sufficient life insurance</a></li>
<li><a href="#">Create emergency funds</a></li>
<li><a href="#">Track all transactions</a></li>
<li><a href="#">Know your expenses</a></li>
<li><a href="#">Set budgets</a></li>
<li><a href="#">Add your bills</a></li>
<li><a href="#">Setup auto pay for bills</a></li>
<li><a href="#">See your alerts & advices</a></li>
</ul>
</div>
<div class="footer-menu-block">
<div class="h5-head">INVEST MONEY</div>
<ul class="footer-menu-list">
<li><a href="#">Open investment account</a></li>
<li><a href="#">Get KYC verified</a></li>
<li><a href="#">Invest in mutual funds</a></li>
<li><a href="#">Invest in fixed deposits / bonds</a></li>
<li><a href="#">Invest in stocks</a></li>
<li><a href="#">Invest in real estate</a></li>
<li><a href="#">Get loans</a></li>
<li><a href="#">File taxes</a></li>
</ul>
</div>
<div class="footer-menu-block">
<div class="h5-head">MUTUAL FUNDS</div>
<ul class="footer-menu-list">
<li><a href="#">Recommended funds</a></li>
<li><a href="#">Popular funds</a></li>
<li><a href="#">Top performing funds</a></li>
<li><a href="#">New fund offers</a></li>
<li><a href="#">All mutual funds</a></li>
<li><a href="#">Compare funds</a></li>
<li><a href="#">Easy SIP</a></li>
<li><a href="#">SIPs with debit card</a></li>
<li><a href="#">One click portfolio</a></li>
</ul>
</div>
<div class="footer-menu-block">
<div class="h5-head">EQUITY</div>
<ul class="footer-menu-list">
<li><a href="#">Recommended stocks</a></li>
<li><a href="#">Most active by volume</a></li>
<li><a href="#">Most active by value</a></li>
<li><a href="#">52 week high</a></li>
<li><a href="#">52 week low</a></li>
<li><a href="#">Top gainers</a></li>
<li><a href="#">Compare stocks</a></li>
</ul>
</div>
<div class="footer-menu-block last">
<div class="h5-head">FIXED DEPOSITS</div>
<ul class="footer-menu-list">
<li><a href="#">Bajaj Finance Ltd.</a></li>
<li><a href="#">HDFC Ltd.</a></li>
<li><a href="#">Godrej Industries Ltd.</a></li>
<li><a href="#">Gruh Finance Ltd.</a></li>
<li><a href="#">Exim Finance Ltd.</a></li>
</ul>
</div>
</div>
<ul class="social-wrap">
<li class="social-panel">
<div class="social-icon">
<div class="h5-head">CONNECT WITH US</div>
<ul class="social-list">
<li><a href="#" class="social-icon-grp facebook icon-vertical"></a></li>
<li><a href="#" class="social-icon-grp twiter icon-vertical"></a></li>
<li><a href="#" class="social-icon-grp linkin icon-vertical"></a></li>
</ul>
</div>
</li>
<li class="social-panel second">
<div class="social-icon">
<div class="h5-head sign-txt">SIGNUP FOR NEWSLETTER</div>
<h6 class="small">Enter your email address below to receive our money tips</h6>
<p class="email-field">
<input type="email" class="form-control" placeholder="" />
<span class="small">we promise not to spam you</span></p>
<button type="button" class="btn-gray">SUBMIT</button>
</div>
</li>
<li class="social-panel last">
<div class="h5-head">CONTACT US</div>
<div class="contact-panel">
<p class="contact-icons phone-icon"></p>
<p class="con-txt">022-61802828 <br />
<span class="small"> (10am-7pm Mon - Sat)</span></p>
</div>
<div class="contact-panel second">
<p class="contact-icons email-icon"></p>
<p class="con-txt"><a href="mailto:customercare@myuniverse.co.in">customercare <span class="small">@myuniverse.co.in</span></a></p>
</div>
</li>
</ul>
<div class="clear"></div>
</div>

<!--end Footer links--> 
<!--footer menus-->
<div class="footer-links">
<div class="footer-link-contain">
<div class="footer-logo lflt"><img src="<?=base_url()?>assets/images/footer-logo.png" width="191" height="48" alt="adityabirla myuniverse" /></div>
<ul class="footer-menu-link">
<li><a href="#">About Us</a></li>
<li><a href="#">SECURITY & PRIVACY</a></li>
<li><a href="#">PRICING</a></li>
</ul>
<p class="lflt terms-con">* The research based investment advice & reports, stock and commodity recommendations, if any, projected/ displayed on or communicated through the www.myuniverse.co.in are provided by /created by/ sourced from Aditya Birla Money Mart Ltd, Aditya Birla Money Ltd and Aditya Birla Commodities Broking Ltd, respectively and not by ABCSPL, the owner of this website. For more details, please refer the legal disclaimer</p>
<p class="lflt">Copyright &copy; 2016 Aditya Birla Customer Services Ltd.| <a href="#">Legal Disclaimer</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a> | <a href="#">Investment Account T & C</a></p>
<div class="clear"></div>
</div>
</div>
</div>
<script src="<?=base_url()?>assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/nprogress.js"></script>
<script src="<?=base_url()?>assets/js/classie.js"></script>
<script src="<?=base_url()?>assets/js/chosen.jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">


  
  $('body').show();
    //$('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);

  var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
  }

  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }
  
  (function() {
    // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
    if (!String.prototype.trim) {
      (function() {
        // Make sure we trim BOM and NBSP
        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        String.prototype.trim = function() {
          return this.replace(rtrim, '');
        };
      })();
    }
  
    [].slice.call( document.querySelectorAll( '.input__field' ) ).forEach( function( inputEl ) {
      // in case the input is already filled..
      if( inputEl.value.trim() !== '' ) {
        classie.add( inputEl.parentNode, 'input--filled' );
      }
      
      // events:
      inputEl.addEventListener( 'focus', onInputFocus );
      inputEl.addEventListener( 'blur', onInputBlur );
    } );
  
    function onInputFocus( ev ) {
      classie.add( ev.target.parentNode, 'input--filled' );
      classie.add( ev.target.parentNode, 'focussed' )
    }
  
    function onInputBlur( ev ) {
      if( ev.target.value.trim() === '' ) {
        classie.remove( ev.target.parentNode, 'input--filled' );
        classie.add( ev.target.parentNode, 'focussed1' );
        classie.add( ev.target.parentNode, 'input__field_error' ); 
      }
      if( ev.target.value.trim() !== '' ) {
        classie.remove( ev.target.parentNode, 'focussed1' );
        classie.remove( ev.target.parentNode, 'input__field_error' );
      }
      classie.remove( ev.target.parentNode, 'focussed' );
    }
    
  })();
  
//Backslash for dates
function addSlashes(input) {
    var v = input.value;
    if (v.match(/^\d{2}$/) !== null) {
        input.value = v + '/';
    } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
        input.value = v + '/';
    }
}

$(document).ready(function () {
  


$("#user_pincode").blur(function(){
  var pin_val = $(this).val();
      $.ajax({
      url:"<?=base_url()?>home/piccheck",
      type: "post",
      data:{
       // email:email,
        pin:pin_val
      },
      success:function(akhi){
        var js = $.parseJSON(akhi);
        var alerts = js.alert;
        var city = js.city;
        var state = js.state;
      }
    });
});


$("#select_bank_name").change(function(){
  var select_val = $(this).val();
   $.ajax({
      url:"<?=base_url()?>home/bank_details",
      type: "post",
      data:{
        select_val:select_val
      },
      success:function(akhi){
        var ob = jQuery.parseJSON(akhi);
        var len =  ob.all_bank_city.length;
       var html = "<option value=''>---select---</option>";
        var mfs_html = "";
         $.each(ob.all_bank_city, function(i,d){
          //html += "<option>Select</option>";
          html += "<option value='"+d.city+"'>"+d.city+"</option>";
         });
         $("#select_bank_branch_city").html(html);
         $('form').mfs('refresh');  
      }
    });

});

$("#select_bank_branch_city").change(function(){
  var select_city = $(this).val();
  var bank_name = $("#select_bank_name").val();
  //alert(select_val);
   $.ajax({
      url:"<?=base_url()?>home/bank_details",
      type: "post",
      data:{
        bank_name:bank_name,
        select_city:select_city
      },
      success:function(akhi){
        //alert(akhi);
        //console.log(akhi);
      var objec = jQuery.parseJSON(akhi);
       var html = "<option value=''>---select---</option>";
        //var mfs_html = "";
         $.each(objec.all_bank_branch, function(i,d){
          html += "<option value='"+d.branch_name+"'>"+d.branch_name+"</option>";
         });
         //console.log(html);
         $("#select_bank_branch").html(html);
         $('form').mfs('refresh');  
      }
        
    });

});



  //Allow only numeric values
  //called when key is pressed in textbox
  $("#date1, #date2").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
    }
   });
   
    $("#date1, #date2").keyup(function(e){
        if (e.keyCode != 8){   
            if ($(this).val().length == 2){
                $(this).val($(this).val() + "/");
            } else if ($(this).val().length == 5){
                $(this).val($(this).val() + "/");
            }
        } else {
            var temp = $(this).val();
            
            if ($(this).val().length == 5){                
                $(this).val(temp.substring(0,4));    
            } else if ($(this).val().length == 2){        
                $(this).val(temp.substring(0,1));    
            }
        }
    });
  
   
   $(".submit_btn").click(function () {
     $(this).addClass('in-progress');
   $(this).attr('disabled', 'true');
   $(this).val('Please Wait.....');
   });
   
   //For Adding dash after 4 digit in Bank Account No.
   $('.bankaccno').keyup(function() {
    var foo = $(this).val().split("-").join(""); // remove hyphens
    if (foo.length > 0) {
    foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
    }
    $(this).val(foo);
   });
    $('.pincode').keyup(function() {
    var foo = $(this).val().split("-").join(""); // remove hyphens
    if (foo.length > 0) {
    foo = foo.match(new RegExp('.{1,3}', 'g')).join("-");
    }
    $(this).val(foo);
   });
   
});



</script>
<script src="<?=base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.mfs.min.js"></script>
<!--custome select-->
<script src="<?=base_url()?>assets/js/jquery.screwdefaultbuttonsV2.js"></script>
<script src="<?=base_url()?>assets/js/common.js"></script>
<script type="text/javascript">
    $(function(){
    
    
    
      $('.radiocust').screwDefaultButtons({
        image: 'url("<?=base_url()?>assets/images/radioboxSmall.png")',
        width: 27,
        height: 30
      });
      
      $('.radiocust2').screwDefaultButtons({
        image: 'url("<?=base_url()?>assets/images/radioboxSmallD.png")',
        width: 27,
        height: 30
      });
      
      /*$('input:checkbox').screwDefaultButtons({
        image: 'url("images/radioboxSmall.png")',
        width: 28,
        height: 28
      });*/
    
    });
    

  </script>
<!--custome select end-->

<script type = "text/javascript">
    function Validate() {
        var mobile = document.getElementById("mobile").value;
        var pattern = /^\d{10}$/;
        if (pattern.test(mobile)) {
            alert("Your mobile number : " + mobile);
            return true;
        }
        alert("It is not valid mobile number.input 10 digits number!");
        return false;
    }
</script>

<script src= "<?=base_url()?>assets/js/angular.min.js"></script>
</body>
</html>
