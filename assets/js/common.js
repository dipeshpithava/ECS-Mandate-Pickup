/*------------------------------------*/
$(document).ready(function() {

  $(".additionalDetailsError .mfs2").click(function() {
    alert("ss");
    $('.overlaybox3 .input').removeClass('input__field_error focussed1');
  });


  $(".btSubmitContinue").click(function() {
    // alert("sss");
    // if ($('.overlaybox3 .input__field').is(":empty")) {
    //   $('.overlaybox3 .input').addClass('input__field_error');
    //   $('.overlaybox3 .input').addClass('focussed1');
    //   $('.overlaybox3 .input').addClass('focussed');
    //   $('.overlaybox3 .input').addClass('input--filled');
    //   $('.overlaybox3 .input').css('zIndex', 0);
    //   $('.overlaybox3 .mfs2 a.mfs-selected-option').addClass('input__field_error focussed1');
    // }
    // if (!$('input[name="Dealing[]"]').is(':checked')) {
    //   alert("Please Check Dealing through Sub-Brokers and Other Stock Brokers- if client is dealing through Stock-Broker/ Sub-Broker in case of multiple Stock-Broker/ Sub-Broker");
    //   $("input#DealingYES").focus();
    //   return false;
    // }
    // if (!$('input[name="EXCHANGE[]"]').is(':checked')) {
    //   alert("Please Check Exchange");
    //   $("input#BSE").focus();
    //   return false;
    // }
    // if (!$('input[name="investType[]"]').is(':checked')) {
    //   alert("Please Check Your intend to invest in the stock market with");
    //   $("input#OwnFunds").focus();
    //   return false;
    // }

  });


  $(".btnNomineeSubmit").click(function() {
    // alert("sss");
    //$('.input__field input__field--hoshi').attr("disabled", "disabled");
    if ($('.overlaybox4 .input__field').is(":empty")) {
      // $(this).parents('p').addClass('warning');
      // alert("sss");
      // $('.overlaybox4 .input').addClass('input__field_error');
      // $('.overlaybox4 .input').addClass('focussed1');
      // $('.overlaybox4 .input').addClass('focussed');
      // $('.overlaybox4 .input').addClass('input--filled');
      // $('.overlaybox4 .input').css('zIndex', 0);
      // $('.overlaybox4 .mfs2 a.mfs-selected-option').addClass('input__field_error focussed1');
    }
  });

  
  $(".clickload3").click(function() {

    if ($('.additionalDetailsError .input__field').is(":empty")) {
      alert("d");
      $('.additionalDetailsError .input').addClass('input__field_error');
      $('.additionalDetailsError .input').addClass('focussed1');
      $('.additionalDetailsError .input').addClass('focussed');
      $('.additionalDetailsError .input').addClass('input--filled');
      $('.additionalDetailsError .input').css('zIndex', 0);
    }
    // $('.additionalDetailsError .mfs2 a.mfs-selected-option, .additionalDetailsError  .mfs3 a.mfs-selected-option, .additionalDetailsError  .mfs a.mfs-selected-option').addClass('input__field_error focussed1');

    // if (!$('input[name="checkbox[]"]').is(':checked')) {
    //   alert("Please Check any action taken by SEBI Or any other authority");
    //   return false;
    // }


  });




  $(".scrolltop").click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, "slow");
    return false;
  });

  /*================= pop edit =================*/

  $('.formBox01, #done01').hide();
  $('#edit01').click(function(e) {
    $('.labelBox01, #edit01').fadeOut('slow', function() {
      $('.formBox01, #done01').fadeIn('slow');
    });
  });

  $('#done01').click(function(e) {
    $('.formBox01, #done01').fadeOut('slow', function() {
      $('.labelBox01, #edit01').fadeIn('slow');
    });
  });
  /**/
  $('.formBox02, #done02').hide();
  $('#edit02').click(function(e) {
    $('.labelBox02, #edit02').fadeOut('slow', function() {
      $('.formBox02, #done02').fadeIn('slow');
    });

    //$('.disableBoxRad').css('display','none');
    // $('.enableBoxRad').css('display','block');
  });

  $('#done02').click(function(e) {
    $('.formBox02, #done02').fadeOut('slow', function() {
      $('.labelBox02, #edit02').fadeIn('slow');
    });
  });



  /*================= pop edit =================*/


  /*================= pop checkbox behaviour=================*/
  $('.popForm :checkbox').on('change', function() {
    var th = $(this),
      name = th.prop('name');
    if (th.is(':checked')) {
      $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
    }
  });


  $('.nomineeRht :checkbox, .accoutBx2 :checkbox').on('change', function() {
    var th = $(this),
      name = th.prop('name');
    if (th.is(':checked')) {
      $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
    }
  });
  /*================= pop checkbox behaviour =================*/

  /*================pop==================*/
  $('.EmailDoc').click(function() {
    $('.overlay3, .overlaybox3').show();
  });
  $('.closepop').click(function() {
    $('.overlay3, .overlaybox3, .overlay4, .overlaybox4').hide();
  });

  $('.overlay3').click(function() {
    // $(this).hide();
    //  $('.overlaybox3').hide();
  });
  /*=================pop=================*/

  $('.disableBox input[type="text"]').css('background', '#e1e1e1').attr("disabled", "disabled");
  $('.disableBox .lftRadsm .styledRadio').css('border', '0px solid #ccc').attr("disabled", "disabled").css('background', 'url(images/radioboxSmallD.png)');
  $('.disableBox .styledRadio radio').attr("disabled", "disabled");
  $('.disableBox select').css('background', '#e1e1e1').attr("disabled", "disabled").parent().addClass('carromod');;
  $('.disableBox textarea').css('background', '#e1e1e1').attr("disabled", "disabled");

  $('.disableBoxRad').css('display', 'block');
  $('.enableBoxRad').css('display', 'none');

  //$('input:radio[name="ex2"]').change(function(){
  // if($(this).val() == 'Yes'){
  //alert("yes");
  $('#addNewPlace').hide();
  $('.selectabankDisable').css('display', 'none');

  $('.nameAsOnBankDisable').css('display', 'block');
  $('.nameAsOnBankEnable').css('display', 'none');

  $('.bankCityDisable').css('display', 'block');
  $('.bankCityEnable').css('display', 'none');

  $('.bankBranchDisable').css('display', 'block');
  $('.bankBranchEnable').css('display', 'none');

  $('.bankAccountNumberDisable').css('display', 'block');
  $('.bankAccountNumberEnable').css('display', 'none');

  $('.bankAddressDisable').css('display', 'block');
  $('.bankAddressEnable').css('display', 'none');

  $('.lftSwitch').click(function() {
    $('.selectabankDisable').css('display', 'block');
    $('.selectabankEnable').css('display', 'none');

    $('.nameAsOnBankDisable').css('display', 'block');
    $('.nameAsOnBankEnable').css('display', 'none');

    $('.bankCityDisable').css('display', 'block');
    $('.bankCityEnable').css('display', 'none');

    $('.bankBranchDisable').css('display', 'block');
    $('.bankBranchEnable').css('display', 'none');

    $('.bankAccountNumberDisable').css('display', 'block');
    $('.bankAccountNumberEnable').css('display', 'none');

    $('.bankAddressDisable').css('display', 'block');
    $('.bankAddressEnable').css('display', 'none');


    $('.fadeInBox').hide().fadeIn(500);
    $('#addNewPlace').hide();
    $(this).addClass('active');
    $('.rhtSwitch').removeClass('active');
    $('.disableBoxRad').css('display', 'block');
    $('.enableBoxRad').css('display', 'none');

    $('.disableBox input[type="text"]').css('background', '#e1e1e1').attr("disabled", "disabled");
    $('.disableBox select').css('background', '#e1e1e1').attr("disabled", "disabled").parent().parent().addClass('carromod');;
    $('.disableBox textarea').css('background', '#e1e1e1').attr("disabled", "disabled");
  });

  $('.rhtSwitch').click(function() {
    $('.selectabankDisable').css('display', 'none');
    $('.selectabankEnable').css('display', 'block');

    $('.nameAsOnBankDisable').css('display', 'none');
    $('.nameAsOnBankEnable').css('display', 'block');

    $('.bankCityDisable').css('display', 'none');
    $('.bankCityEnable').css('display', 'block');

    $('.bankBranchDisable').css('display', 'none');
    $('.bankBranchEnable').css('display', 'block');

    $('.bankAccountNumberDisable').css('display', 'none');
    $('.bankAccountNumberEnable').css('display', 'block');

    $('.bankAddressDisable').css('display', 'none');
    $('.bankAddressEnable').css('display', 'block');

    $('.fadeInBox').hide().fadeIn(500);
    $('#addNewPlace').show();
    $(this).addClass('active');
    $('.lftSwitch').removeClass('active');
    //if($(this).val() == 'No'){
    $('.disableBoxRad').css('display', 'none');
    $('.enableBoxRad').css('display', 'block');

    //$('.disableBox input[type="text"]').css('background','#ccc').prop('disabled', true);
    //$('.disableBox .lftRadsm .styledRadio').css('border','0px solid #ccc').prop('disabled', true).css('background','url(images/radioboxSmallD.png)');
    //$('.disableBox .styledRadio radio').prop('disabled', true);
    //$('.disableBox select').css('background','#ccc').prop('disabled', true).parent().parent().addClass('carromod');;
    //$('.disableBox textarea').css('background','#ccc').prop('disabled', true);

    $('.disableBox input[type="text"]').css('background', '#fff').prop('disabled', false);
    //$('.disableBox .lftRadsm .styledRadio').css('border','0px solid #ccc').prop('disabled', false).css('background','url(images/radioboxSmall.png)');
    //$('.disableBox .styledRadio radio').prop('disabled', false);
    $('.disableBox select').css('background', '#fff').prop('disabled', false).parent().parent().removeClass('carromod');;
    $('.disableBox textarea').css('background', '#fff').prop('disabled', false);
  });
  //  }
  //});


  $('.radioClick').click(function() {
    if ($(this).prop("checked") == false) {
      $('.boxshow').show();
    } else if ($(this).prop("checked") == true) {
      $('.boxshow').hide();
    }
  });
  //===========================
  $('.radioClickNominee').click(function() {
    //$('html,body').animate({scrollTop: $(this).offset().top}, 800);								

    if ($(this).prop("checked") == false) {
      // alert("y");
    } else if ($(this).prop("checked") == true) {

      // alert("n");
      $('.overlay4, .overlaybox4').show();
    }
  });

  $('.closepop').click(function() {
    //alert("n");					   
    $('.radioClickNominee').prop('checked', false);
    $('.radioClickNomineeNo').prop('checked', true);
  });


  /*===============select custom start================*/
  $('.mfs').mfs({
    'enableScroll': true,
    'maxHeight': 160
  });
  $('.mfs2').mfs({
    'enableScroll': true,
    'maxHeight': 160
  });

  $('.mfs3').mfs({
    'enableScroll': true,
    'maxHeight': 160
  });

  $('.mfs4').mfs({
    'enableScroll': true,
    'maxHeight': 160
  });
  /*===============select custom end================*/

  $(".mfs3 mfs-selected-option ").click(function() {
    $(".mfs3 mfs-selected-option span").toggleClass("selectArrUp");
  });
  /*====================validation==================*/


  /**/
  $(".txtNumeric").keypress(function(e) {
    var code = e.keyCode || e.which;
    if ((code < 65 || code > 90) && (code < 97 || code > 122) && code != 32 && code != 46) {
      alert("Only alphabates are allowed");
      return false;
    }
  });
  /*====================validation end==================*/




});

/*------------------------------------*/