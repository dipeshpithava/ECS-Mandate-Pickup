<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Investment Form</title>
<link href="<?=base_url()?>assets/css/global.css" type="text/css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font.css" type="text/css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/investment_form.css" type="text/css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/chosen.css" type="text/css" rel="stylesheet">
</head>
<body style='display: none'>
<section id="invest_wrapper fade out">
  <div class="investment_form  fade out">
    <div class="investmentNewForm">
      <div class="top_band"> <img src="<?=base_url()?>assets/images/icon.png" width="29" height="38" alt="icon">
        <div class="CL"></div>
        <strong>Congratulations,</strong> <span class="light">You are 2 minutes away to Invest in ZIPSIP! </span>
        <div class="smtextr">This account is for Indian nationals only</div>
      </div>

      <?php echo form_open('home/pdfreport'); ?>

      <div class="investWhiteBox">
        <div class="formMnaBdr">
          <div class="investWhiteBoxIn">
            <div class="headRedUn">ADD PERSONAL DETAILS</div>
            <div class="formBox">
              <div class="row1">
                <div class="lftFrm"> <span class="input tooltip_main input--hoshi ">
                  <input class="input__field input__field--hoshi panno" name="pan" type="text" id="input-6" tabindex="1"  maxlength="10" />
                  <i class="icon"></i>
                  <label class="input__label input__label--hoshi ht " for="input-6"> <span class="input__label-content input__label-content--hoshi">Enter a valid pan</span> <span class="tooltip">PAN is a mandatory requirement for investing in Mutual Funds in India</span> </label>
                  </span> </div>
                <div class="rhtFrm"> <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" name="dob" id="date" tabindex="2"   maxlength="10" />
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Date of birth</span> </label>
                  </span> </div>
                <div class="CL"></div>
              </div>
              <div class="row1"> <span class="input input--hoshi ">
                <input class="input__field input__field--hoshi" name="name" type="text" id="input-7" tabindex="3" />
                <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">Name as on pan card</span> <span class="tooltip1 error">Enter Name as on pan card</span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1"> <span class="input input--hoshi ">
                <input class="input__field input__field--hoshi" type="text" name="father_spouse_name" id="input-8" tabindex="4" />
                <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">FATHER / SPOUSE NAME</span> <span class="tooltip1 error">FATHER / SPOUSE NAME</span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="lftFrmG"><span class="input input--hoshi"> <span class="select_gender_female">
                  <input type="radio" name="gender" id="female" value="female" class="radio2" tabindex="5">
                  <label for="female">&nbsp;</label>
                  </span> <span class="select_gender_male">
                  <input type="radio" name="gender" id="male" value="male" class="radio2" tabindex="6">
                  <label for="male">&nbsp;</label>
                  </span>
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Select Gender</span> </label>
                  </span></div>
                <div class="rhtFrmG"><span class="input input--hoshi"> <span class="select_marital_single marital1">
                  <input type="radio" name="marital" id="single" value="single" class="radio2" tabindex="7">
                  <label for="single">&nbsp;</label>
                  </span> <span class="select_marital_married marital2">
                  <input type="radio" name="marital" id="married" value="married" class="radio2" tabindex="8">
                  <label for="married">&nbsp;</label>
                  </span>
                  <label class="input__label input__label--hoshi" for="input-6"> <span class="input__label-content input__label-content--hoshi">Marital Status</span> </label>
                  </span></div>
                <div class="CL"></div>
              </div>
              <div class="row1 textarea2"> <span class="input inputtextarea input--hoshi ">
                <textarea class="input__field input__field--hoshi" name="address" type="text" id="input-8" maxlength="150" tabindex="9" /></textarea>
                <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">COMMUNICATION ADDRESS</span> <span class="tooltip1 error">COMMUNICATION ADDRESS </span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="checkBox">
                  <div class="chkInt">
                    <input name="permanent_address_check" type="checkbox" value="" class="radioClick" id="perm" tabindex="10" />
                  </div>
                  <div class="chkIntTex">
                    <label for="perm">I will add permanent address</label>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1 boxshow textarea2" style="display:none"> <span class="input inputtextarea input--hoshi ">
                <textarea class="input__field input__field--hoshi" name="permanent_address" type="text" id="input-8" maxlength="150" tabindex="11" /></textarea>
                <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">COMMUNICATION ADDRESS</span> <span class="tooltip1 error">COMMUNICATION ADDRESS </span> </label>
                </span>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="lftFrm">
                  <div class="mfs2">
                    <select id="selectField" name="income_range" tabindex="12">
                      <option selected="selected" value="YES">INCOME RANGE (P.A)</option>
                      <option  value="0">Below Rs. 1 Lac</option>
                      <option  value="Rs. 1-5 Lac">Rs. 1-5 Lac</option>
                      <option  value="Rs. 5-10 Lac">Rs. 5-10 Lac</option>
                      <option  value="Rs. 10-25 Lac">Rs. 10-25 Lac</option>
                      <option  value="Rs. > 25 Lacs">Rs. > 25 Lacs</option>
                    </select>
                  </div>
                </div>
                <div class="rhtFrm">
                  <div class="mfs3">
                    <select id="selectField" name="occupation" tabindex="13">
                      <option selected="selected" value="OCCUPATION">OCCUPATION</option>
                      <option value="Private Sector Service">Private Sector Service</option>
                      <option value="Public Sector">Public Sector</option>
                      <option value="Government Service">Government Service</option>
                      <option value="Business">Business</option>
                      <option value="Agriculturist">Agriculturist</option>
                      <option value="Retired">Retired</option>
                      <option value="Housewife">Housewife</option>
                      <option value="Student">Student</option>
                      <option value="Others (Please specify)">Others (Please specify)</option>
                    </select>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="lftFrm2">
                  <div class="innP"> ARE YOU politicalLY exposed  PERSON? </div>
                </div>
                <div class="rhtFrm2">
                  <div class="mfs">
                    <select id="selectField" name="politically_exposed" tabindex="14">
                      <option selected="selected" value="YES">YES</option>
                      <option  value="NO">NO</option>
                    </select>
                  </div>
                </div>
                <div class="CL"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="formMnaBdr">
          <div class="investWhiteBoxIn">
            <div class="headRedUn">ADD BANK DETAILS</div>
            <div class="formBox">
              <div class="row1">
                <div class="bankstatus">
                  <div class="radMn">
                    <div class="lftRadsm">
                      <input type="radio"  name="ex2" id="ex1_a1" checked="checked" class="radiocust" value="Yes">
                    </div>
                    <div class="rhtRadsm">
                      <div class="inround">
                        <label for="ex1_a1">ADD A NEW BANK</label>
                      </div>
                    </div>
                  </div>
                  <div class="radMn">
                    <div class="lftRadsm">
                      <input type="radio"  name="ex2" id="ex1_a2" class="radiocust" value="No">
                    </div>
                    <div class="rhtRadsm">
                      <div class="inround">
                        <label for="ex1_a2">EXISTING BANK</label>
                      </div>
                    </div>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
              <div class="disableBox">
                <div class="row1">
                  <div class="accoutBx">
                    <div class="typelft">
                      <div class="typelftinround">SELECT A BANK ACCOUNT TYPE</div>
                    </div>
                    <div class="typerht">
                     <div class="enableBoxRad">
                      <div class="radMn">
                        <div class="lftRadsm">
                          <input type="radio" value="saving" name="accounttype" id="accounttype1" checked="checked" class="radiocust">
                        </div>
                        <div class="rhtRadsm">
                          <div class="inround">
                            <label for="accounttype1">SAVING</label>
                          </div>
                        </div>
                      </div>
                      <div class="radMn">
                        <div class="lftRadsm">
                          <input type="radio" value="current" name="accounttype" id="accounttype2" class="radiocust">
                        </div>
                        <div class="rhtRadsm">
                          <div class="inround">
                            <label for="accounttype2">CURRENT</label>
                          </div>
                        </div>
                      </div>
                      </div>
                      
                      <div class="disableBoxRad">
                      <div class="radMn">
                        <div class="lftRadsm">
                          <input type="radio"  name="accounttype" id="" class="radiocust2">
                        </div>
                        <div class="rhtRadsm">
                          <div class="inround">
                            <label for="">SAVING</label>
                          </div>
                        </div>
                      </div>
                      <div class="radMn">
                        <div class="lftRadsm">
                          <input type="radio"  name="accounttype" id="" class="radiocust2">
                        </div>
                        <div class="rhtRadsm">
                          <div class="inround">
                            <label for="">CURRENT</label>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="CL"></div>
                  </div>
                </div>
                <div class="row1">
                  <div class="mfs">
                    <select id="selectField" name="bank_name" tabindex="15">
                      <option selected="selected" value="SELECT A BANK">SELECT A BANK</option>
                      <option value="HDFC BANK">HDFC BANK</option>
                      <option value="YES BANK">YES BANK</option>
                      <option value="HSBC">HSBC</option>
                    </select>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="row1">
                  <div class="lftFrm">
                    <div class="mfs2">
                      <select id="selectField2" name="bank_city" tabindex="16">
                        <option selected="selected" value="YES">BANK CITY</option>
                        <option  value="MUMBAI">MUMBAI</option>
                        <option  value="DELHI">DELHI</option>
                      </select>
                    </div>
                  </div>
                  <div class="rhtFrm">
                    <div class="mfs3">
                      <select id="selectField" name="bank_branch" tabindex="17">
                        <option selected="selected" value="BANK BRANCH">BANK BRANCH</option>
                        <option value="ANDHERI">ANDHERI</option>
                        <option value="MALAD">MALAD</option>
                      </select>
                    </div>
                  </div>
                  <div class="CL"></div>
                </div>
                <div class="row1"> <span class="input input--hoshi ">
                  <input class="input__field input__field--hoshi" type="number" name="bank_account_number" id="input-7" maxlength="16" tabindex="19" />
                  <label class="input__label input__label--hoshi ht" for="input-7"> <span class="input__label-content input__label-content--hoshi">BANK ACCOUNT NUMBER</span> <span class="tooltip1 error">BANK ACCOUNT NUMBER</span></label>
                  </span>
                  <div class="CL"></div>
                </div>
                <div class="row1 textarea2"> <span class="input inputtextarea input--hoshi ">
                  <textarea class="input__field input__field--hoshi" name="bank_address" type="text" id="input-8" maxlength="150" tabindex="20" /></textarea>
                  <label class="input__label input__label--hoshi ht" for="input-8"> <span class="input__label-content input__label-content--hoshi">BANK ADDRESS</span> <span class="tooltip1 error">BANK ADDRESS </span> </label>
                  </span>
                  <div class="CL"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="formMnaBdr">
          <div class="investWhiteBoxIn">
            <div class="headRedUn">ADDITIONAL DETAILS</div>
            <div class="formBox">
              <div class="row1">
                <div class="accoutBx2">
                  <div class="typelft">
                    <div class="typelftinround">Any Action taken by SEBI or any other authority </div>
                  </div>
                  <div class="typerht">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox" name="sebi_action" value="yes" id="YES" >
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="YES">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox" checked="checked" name="sebi_action" value="yes" id="NO">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="NO">NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
              <div class="row1">
                <div class="numYear">
                  <div class="lftyear">
                    <div class="lftyearI"><label for="selectField">Number of years of Investment/Trading experience</label> </div>
                  </div>
                  <div class="rtyear">
                  <div class="mfs4">
                      <select id="selectField" name="years_of_trading_experience" tabindex="17" >
                        <option selected="selected" value="1">1</option>
                        <option  value="2">2</option>
                      </select>
                    </div>
                  
                  </div>
                  <div class="CL"></div>
                </div>
              </div>
              <div class="row1">
                <div class="mfs">
                  <select id="selectField" name="trading_account" tabindex="22">
                    <option selected="selected" value="Individual">Individual</option>
                    <option selected="selected" value="Individual Resident">Individual Resident </option>
                    <option selected="selected" value="Individual Director's Relative">Individual Director's Relative</option>
                    <option selected="selected" value="Individual Promoter"> Individual Promoter </option>
                    <option selected="selected" value="Individual - Director">Individual - Director</option>
                    <option selected="selected" value="Individual HUF / AOP">Individual HUF / AOP</option>
                    <option selected="selected" value="Others">Others</option>
                    <option selected="selected" value="Individual Margin Trading A/c (Mantra)">Individual Margin Trading A/c (Mantra)</option>
                  </select>
                </div>
                <div class="CL"></div>
              </div>
              <div class="row1">
                <div class="formNominee">
                  <div class="nomineeLft">
                    <div class="nomineeLftIn">DO U WISH TO ADD A NOMINEE</div>
                  </div>
                  <div class="nomineeRht">
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox" name="nominees" id="YES2" value="yes" tabindex="23">
                      </div>
                      <div class="rhtRadsm">
                        <div class="inround">
                          <label for="YES2">YES</label>
                        </div>
                      </div>
                    </div>
                    <div class="radMn">
                      <div class="lftRadsm">
                        <input type="checkbox"  name="nominees" id="NO2" value="no" checked="checked" tabindex="24">
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
              <div class="row1">
                <div class="smaGrey">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem 
                  has been the industry's standard dummy text ever<a href="#"> since the 1500s, when an unknown</a> </div>
              </div>
              <div class="row1">
                <div class="btnCntBox">
                  <input tabindex="25" type="submit" class="clickload3" value="REVIEW & SUBMIT NOW">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php echo form_close(); ?>

    </div>
    <div class="footerB">By signing up, you agree to our <a href="#">terms of use</a>. </div>
  </div>
</section>
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
$('.nomineeRht :checkbox, .accoutBx2 :checkbox').on('change',function(){
 var th = $(this), name = th.prop('name'); 
 if(th.is(':checked')){
     $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);   
  }
});




  //Allow only numeric values
  //called when key is pressed in textbox
  $("#date").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
    }
   });
   
    $("#date").keyup(function(e){
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

$(document).ready(function(){



//alert("d");

 $('.mfs').mfs({
       'enableScroll' : true,
       'maxHeight'    : 160
       });
    $('.mfs2').mfs({
       'enableScroll' : true,
       'maxHeight'    : 160
       });
    
    $('.mfs3').mfs({
       'enableScroll' : true,
       'maxHeight'    : 160
       });
     
     $('.mfs4').mfs({
       'enableScroll' : true,
       'maxHeight'    : 160
       });



});

</script>
<script src="<?=base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.mfs.min.js"></script>
<!--custome select-->
<script src="<?=base_url()?>assets/js/jquery.screwdefaultbuttonsV2.js"></script>
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
    
    
    $(document).ready(function(){

/*$('.disableBox input[type="text"]').css('background','#ccc').attr("disabled", "disabled");
$('.disableBox .lftRadsm .styledRadio').css('border','0px solid #ccc').attr("disabled", "disabled").css('background','url(images/radioboxSmallD.png)');
$('.disableBox .styledRadio radio').attr("disabled", "disabled");
$('.disableBox select').css('background','#ccc').attr("disabled", "disabled").parent().addClass('carromod');;
$('.disableBox textarea').css('background','#ccc').attr("disabled", "disabled");
*/
$('.disableBoxRad').hide();
$('.enableBoxRad').show();

$('input:radio[name="ex2"]').change(function(){
    if($(this).val() == 'Yes'){
  
    $('.disableBoxRad').hide();
        $('.enableBoxRad').show();
    $('.disableBox input[type="text"]').css('background','#fff').prop('disabled', false);
    //$('.disableBox .lftRadsm .styledRadio').css('border','1px solid #ccc').prop('disabled', false).css('background','url(images/radioboxSmall.png)');
    //$('.disableBox .styledRadio radio').prop('disabled', false);
    $('.disableBox select').css('background','#fff').prop('disabled', false).parent().removeClass('carromod');;
    $('.disableBox textarea').css('background','#fff').prop('disabled', false);
    
    }
  if($(this).val() == 'No'){
  $('.disableBoxRad').show();
    $('.enableBoxRad').hide();
    $('.disableBox input[type="text"]').css('background','#ccc').prop('disabled', true);
    //$('.disableBox .lftRadsm .styledRadio').css('border','0px solid #ccc').prop('disabled', true).css('background','url(images/radioboxSmallD.png)');
    //$('.disableBox .styledRadio radio').prop('disabled', true);
    $('.disableBox select').css('background','#ccc').prop('disabled', true).parent().addClass('carromod');;
    $('.disableBox textarea').css('background','#ccc').prop('disabled', true);

    
    

   
    }
});


    $('.radioClick').click(function(){
            if($(this).prop("checked") == true){
                $('.boxshow').show();
            }
            else if($(this).prop("checked") == false){
               $('.boxshow').hide();
            }
        });
});
  </script>
<!--custome select end-->
</body>
</html>
