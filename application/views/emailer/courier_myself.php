<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ESC Mailer</title>
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
      <td><table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #b8b8b8; border-bottom:0; background-color:#fff; font-size:14px; font-family: Arial, Helvetica, sans-serif; color:#444444; line-height:18px;">
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
              <td align="center"><img src="<?=base_url()?>assets/emailer_images/courierbg2.jpg" width="600" height="181" alt="EKYC "></td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
            <tr>
              <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td><strong>Dear <?=@$investor_data->name?>,</strong></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                    <td>Thank you for opening an Investment account with MyUniverse. For your 
                      <br>
                      scheduled SIPs to be active you have to send us a copy of an ECS Mandate for 
                      <br>
                    your <strong>Bank Account <?=$investor_data->bankName?>, xxxxxxxxxx<?=substr(trim(@$investor_data->accountNumber, " "), -3, 3)?></strong></td>
                  </tr>
                  <tr>
                    <td height="30"></td>
                  </tr>
                  <tr>
                    <td height="10">You have chosen to courier us the ECS Mandate by yourself.</td>
                  </tr>
                  <tr>
                    <td height="1"></td>
                  </tr>
                  <tr>
                    <td>If the ECS mandate is received by us within <strong>3 working days</strong>, you are <strong>eligible</strong> for 
a <strong>Rs. 100 Flipkart Voucher</strong>. Please send us the ECS Mandate document duly<br>
signed at the following address</td>
                  </tr>
                   <tr>
                    <td height="20"></td>
                  </tr>
                  <tr>
                     <td><strong>Courier us at :</strong></td>
                  </tr>
                  <tr>
                    <td>Aditya Birla Money MyUniverse.
                      <br>
                      506, B Wing 5th Floor, Cello Triumph,
                      <br>
                      I.B Patel Road, Goregaon East
                      <br>
                    Mumbai - 4000063</td>
                  </tr>
                  <tr>
                    <td height="30">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>If you wish to schedule a Pickup for your ECS Mandate, please feel free to 
                      <br>
                      contact our Help desk. A representative will help you schedule a pickup 
                      <br>
                    from your doorstep.</td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="10"></td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
            <tr>
              <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="color:#444">
                  <tr>
                    <td style="line-height: 19px"><strong>Thank you<br>
                      Team MyUniverse</strong></td>
                  </tr>
                  <tr>
                    <td height="20"></td>
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
      <td><table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td style="padding-top:0px;"><table width="600" border="0" cellspacing="0" cellpadding="0" style=" font-family:Arial, Helvetica, sans-serif; border:1px solid #b8b8b8" bgcolor="#f1f1f1">
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
                          <td style="font-size:12px; color:#0942b8; ">Online Money Management </td>
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
                            <td style="line-height:12px"><font style="font-size:11px; color:#666">Call 022-61802828<br>
                              (Mon-Sat 10.00 am - 7.00 pm)</font></td>
                            <td width="50" align="center"><img src="<?=base_url()?>assets/emailer_images/mail.png" width="30" height="25" alt=""/></td>
                            <td style="line-height:12px"><font style="font-size:11px; color:#666">E-Mail <br>
                              <a href="mailto:customercare@myuniverse.co.in" style="font-size:11px; color:#666">Customercare@myuniverse.co.in</a></font></td>
                            <td width="45"><img src="<?=base_url()?>assets/emailer_images/visit.png" width="32" height="29" alt=""/></td>
                            <td  style="line-height:12px"><font style="font-size:11px; color:#666">Visit<br>
                              <a href="https://www.myuniverse.co.in/" style="font-size:11px; color:#666">www.myuniverse.co.in</a></font></td>
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
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
