<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>EKYC Mailer</title>
<style type="text/css">
.link {
	color: #039
}
a img {
	border: none
}
</style>
</head>

<body  bgcolor="#d3d3d3">
<table width="650" border="0" cellspacing="0" cellpadding="0" bgcolor="#d3d3d3" align="center">
  <tbody>
    <tr>
      <td><table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #b8b8b8; border-bottom:0; background-color:#fff; font-size:14px; font-family: Arial, Helvetica, sans-serif; color:#444; line-height:18px;">
          <tbody>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td height="90px" align="left" valign="middle" style="padding-left:25px"><img src="<?=base_url()?>assets/emailer_images/myuniverse_logo.jpg" width="148" height="46" alt=""/></td>
                      <td align="right" valign="middle" style="padding-right:25px"><img src="<?=base_url()?>assets/emailer_images/ab_logo.jpg" width="81" height="66" alt=""/></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td style="height:6px; background-color:#c61c2c;"></td>
            </tr>
            <tr>
              <td align="center"><img src="<?=base_url()?>assets/emailer_images/pickbg.jpg" width="600" height="181" alt="EKYC "></td>
            </tr>
            <tr>
              <td height="30"></td>
            </tr>
            <tr>
              <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td><strong>Dear <?=$investor_data->name?>,</strong></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                  <td>                  
                      <strong>Congratulations!</strong> Your documents have been successfully picked up by our representative  It will reach our offices within 02 working days, post which we will process and activate your Mandate.</td>
                  </tr>
                  <tr>
                  <td height="15"></td>
                  </tr>
                  <tr>
                    <td>You can re-schedule your pickup from here <a href="#" style="color:#0d6ca2">Re-schedule my pickup </a></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
            <tr>
              <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td colspan="3" style="padding:15px 0px 0px; text-align:center"><strong>LIST OF DOCUMENTS</strong></td>
                  </tr>
                  <tr>
                    <td style="text-align:center" valign="top" height="20"><img src="<?=base_url()?>assets/emailer_images/black-line.jpg" width="23" height="1"></td>
                  </tr>
                  <tr>
                    <td><table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td style="text-align:left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#8f8f8f">
                              <tr>
                                <td width="7%">1.</td>
                                <td width="89%"><?=$investor_data->bankName?> Mandate Form</td>
                              </tr>
                            </table></td>
                          <td style="text-align:left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#8f8f8f">
                              <tr>
                                <td width="7%">2.</td>
                                <td width="89%">Second Document</td>
                              </tr>
                            </table></td>
                          <td style="text-align:left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#8f8f8f">
                              <tr>
                                <td width="7%">3.</td>
                                <td width="89%">Third Document</td>
                              </tr>
                            </table></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="30"></td>
            </tr>
            <tr>
              <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td style=" padding:15px 0px 0px;text-align:center"><strong>DOCUMENT PICK UP DETAILS</strong></td>
                  </tr>
                  <tr>
                    <td style="text-align:center" valign="top"><img src="<?=base_url()?>assets/emailer_images/black-line.jpg" width="23" height="1"></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td style="padding-top:25px"><table width="90%" border="0" cellspacing="0" cellpadding="0" style="color:#444" align="center">
                  <tr>
                    <td width="110" valign="top"><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td valign="top"><img src="<?=base_url()?>assets/emailer_images/pickupicon.png" width="70" height="52"></td>
                        </tr>
                        <tr>
                          <td height="21px" valign="top">
                            <?php
                              $month = date("m", strtotime($investor_address->date_of_pickup));
                              $date = date("d", strtotime($investor_address->date_of_pickup));
                              $year = date("y", strtotime($investor_address->date_of_pickup));

                              $jd = gregoriantojd($month, $date, $year); // m,d,y
                              $dayname = jddayofweek($jd, 2);

                              echo date("d M", strtotime($investor_address->date_of_pickup)). $dayname;
                            ?>
                          </td>
                        </tr>
                      </table></td>
                    <td width="110"  valign="top"><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td valign="top"><img src="<?=base_url()?>assets/emailer_images/pickupicon2.png" width="73" height="54"></td>
                        </tr>
                        <tr>
                          <td height="21px" valign="top">
                            <?php
                              echo $investor_address->time_of_pickup;
                              // $time = explode("To", $investor_address->time_of_pickup)[0];
                              // if($time == "10.00 " || $time == "10.30 " || $time == "11.00 " || $time == "11.30 "){
                              //   $mid_day = "AM";
                              // }else{
                              //   $mid_day = "PM";
                              // }
                              // echo $time." ".$mid_day;
                            ?>
                          </td>
                        </tr>
                      </table></td>
                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td><img src="<?=base_url()?>assets/emailer_images/pickupicon3.png" width="90" height="54"></td>
                        </tr>
                        <tr>
                          <td><?=$investor_address->address.", ".$investor_address->landmark.", ".$investor_address->city.", ".$investor_address->pincode.", ".$investor_address->state?></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="40"></td>
            </tr>
            <tr>
              <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="color:#444">
                  <tr>
                    <td style="line-height: 19px"><strong>Thankyou <br>
                      Team MyUniverse</strong></td>
                  </tr>
                  <tr>
                    <td height="30"></td>
                  </tr>
                </table></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
   <tr>
   <td>
   <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr>
      <td style="padding-top:0px;"><table width="600" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; border:1px solid #b8b8b8;margin:0px auto;display:block;" bgcolor="#fff">
          <tbody>
            <tr>
              <td height="25" style="text-align:center; font-size:12px; color:#444444">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align:center; font-size:12px; color:#444444">WIDE RANGE OF SOLUTIONS</td>
            </tr>
            <tr>
              <td height="8"></td>
            </tr>
            <tr>
              <td style="text-align:center"><table width="80%" border="0" cellspacing="0" cellpadding="0" style="text-align:center" align="center">
                <tr>
                  <td style="font-size:12px; color:#0942b8; ">Broking & Distribution </td>
                  <td width="1" bgcolor="#909090" style="font-size:12px; color:#0942b8; "></td>
                  <td style="font-size:12px; color:#0942b8; ">Wealth Management </td>
                   <td width="1" bgcolor="#909090" style="font-size:12px; color:#0942b8; "></td>
                  <td style="font-size:12px; color:#0942b8; ">Corporate &amp; Treasury Services </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="5"></td>
            </tr>
            <tr>
              <td style="text-align:center"><table width="60%" border="0" cellspacing="0" cellpadding="0" style="text-align:center" align="center">
                <tr>
                  <td style="font-size:12px; color:#0942b8; ">Online Money Management   </td>
                  <td width="1" bgcolor="#909090" ></td>
                  
                   <td width="1" bgcolor="#909090"></td>
                  <td style="font-size:12px; color:#0942b8; "> Real Estate Advisory</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="30"></td>
            </tr>
            <tr>
              <td style="text-align:center; font-size:12px; color:#444444">GET CONNECTED</td>
            </tr>
            <tr>
              <td align="center" valign="middle" style="padding:10px 0 0;"><table width="250" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tbody>
                    <tr>
                      <td><a href="https://www.facebook.com/MyUniverse.co.in/?utm_source=mutual_fund_txn&utm_medium=email&utm_campaign=acc-opening" target="_blank"><img src="<?=base_url()?>assets/emailer_images/fb.png" width="36" height="35" alt=""/></a></td>
                      <td><a href="https://twitter.com/ABMMyUniverse/?utm_source=mutual_fund_txn&utm_medium=email&utm_campaign=acc-opening"><img src="<?=base_url()?>assets/emailer_images/twitter.png" width="36" height="35" alt=""/></a></td>
                      <td><a href="https://plus.google.com/106068966189682897403/?utm_source=mutual_fund_txn&utm_medium=email&utm_campaign=acc-active" target="_blank"><img src="<?=base_url()?>assets/emailer_images/gplus.png" width="36" height="35" alt=""/></a></td>
                      <td><a href="http://in.linkedin.com/company/aditya-birla-money-myuniverse/?utm_source=mutual_fund_txn&utm_medium=email&utm_campaign=acc-active" target="_blank"><img src="<?=base_url()?>assets/emailer_images/linked.png" width="36" height="35" alt=""/></a></td>
                      <td><a href="http://www.youtube.com/user/MyUniversePFM/?utm_source=mutual_fund_txn&utm_medium=email&utm_campaign=acc-active" target="_blank"><img src="<?=base_url()?>assets/emailer_images/youtube.png" width="36" height="35" alt=""/></a></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
      <td height="30"></td>
    </tr>
    <tr>
      <td><table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align:left; padding:15px 0 0; font-family:Arial, Helvetica, sans-serif">
          <tbody>
            <tr>
              <td width="35"><img src="<?=base_url()?>assets/emailer_images/call.png" width="26" height="27" alt=""/></td>
              <td><font style="font-size:11px; color:#666">Call 022-61675656<br>
                (Mon-Sat 10.00 am - 7.00 pm)</font></td>
              <td width="50" align="center"><img src="<?=base_url()?>assets/emailer_images/mail.png" width="30" height="25" alt=""/></td>
              <td><font style="font-size:11px; color:#666">E-Mail <br>
                Customercare@myuniverse.co.in</font></td>
              <td width="45"><img src="<?=base_url()?>assets/emailer_images/visit.png" width="32" height="29" alt=""/></td>
              <td><font style="font-size:11px; color:#666">Visit<br>
                www.myuniverse.co.in</font></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
    <td height="25"></td>
    </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
    </tr>
    
    
    <tr>
      <td style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif">Aditya Birla Money MyUniverse is an innovative online money management platform offered by Aditya Birla Money (ABM). ABM also offers a range of solutions for wealth management and broking. It also offers third party products like company deposits, mutual funds, insurance, structured products, alternate investments and property services. ABM has a strong pan India distribution network of about 1000 owned and franchisee branches and enjoys the trust of over 4 lakh customers. ABM is a part of the Aditya Birla Financial Services Group (ABFSG) which provides a wide gamut of financial offerings such as Life Insurance, Asset Management, NBFC, Private Equity, Broking, Wealth Management and Distribution and General Insurance Advisory Services suited to serve your financial needs.</td>
    </tr>
    <tr>
      <td style="padding:23px 0; font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif">Aditya Birla Money is the single brand offering the combined products and services of Aditya Birla Customer Services Pvt Ltd (ABCSPL), Aditya Birla Money Limited (ABML) and Aditya Birla Money Mart Limited (ABMML). The services of MyUniverse are being provided through Aditya Birla Customer Services Pvt. Ltd. (ABCSPL). For detailed terms and conditions, please log on to <a href="#" style="color:#336699; text-decoration:none;">www.myuniverse.co.in </a></td>
    </tr>
</table>

   </td>
   </tr>
  </tbody>
</table>
</body>
</html>
