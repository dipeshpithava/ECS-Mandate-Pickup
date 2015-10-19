
jQuery(document).ready(function ($) {

    $('[data-popup-target]').click(function () {
		clearPopup();
        $('html').addClass('overlay');
        var activePopup = $(this).attr('data-popup-target');
        $(activePopup).addClass('visible');
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27 && $('html').hasClass('overlay')) {
            clearPopup();
        }
    });

    $('.popup-exit').click(function () {
        clearPopup();

    });
    $('.popup-overlay').click(function () {
        clearPopup();
    });
	

    function clearPopup() {
        $('.popup.visible').addClass('transitioning').removeClass('visible');
        $('html').removeClass('overlay');

        setTimeout(function () {
            $('.popup').removeClass('transitioning');
        }, 200);
    }
	
	list = $("#holiday").val();
		var removeDays = list.split(",");
		// alert(removeDays);
		//removeDays = [array];


	//var list = [];
	
	function disabledays(date) {
    var ymd = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        //if u have to disable a list of day
		
        // var removeDays = ["2015-08-27","2015-8-29","2015-9-3","2015-9-17","2015-9-24","2015-10-2","2015-10-20","2015-10-22","2015-10-3","2015-10-24","2015-9-27","2015-9-3","2015-11-10","2015-11-11","2015-11-12","2015-11-13","2015-11-25","2015-12-24","2015-12-25" ];
         if ($.inArray(ymd, removeDays) >= 0) {
        return [false];
    } else {
        //Show accept sundays
        var day = date.getDay();
        return [(day == 1 || day == 2 || day == 3 || day == 4 ||day == 5 ||day == 6 )];
    }
}

$('#datepicker').datepicker({
    beforeShowDay: disabledays,  
    dateFormat: "yy/mm/dd",
    minDate: 1,
	maxDate: '+6m', 
	changeMonth: true
});



function noWeekendsOrHolidays(date) {
            var noWeekend = $.datepicker.noWeekends(date);
            if (noWeekend[0]) {
                return nationalDays(date);
            } else {
                return noWeekend;
            }
}
        function nationalDays(date) {
            for (i = 0; i < natDays.length; i++) {
                if (date.getMonth() == natDays[i][0] - 1 && date.getDate() == natDays[i][1]) {
                    return [false, natDays[i][2] + '_day'];
                }
            }
            return [true, ''];
        }
 var natDays = [
          [1, 1, 'uk'],
          [12, 25, 'uk'],
          [12, 26, 'uk']
        ];
        function AddWeekDays(weekDaysToAdd) {
            var daysToAdd = 0
            var mydate = new Date()
            var day = mydate.getDay()
            weekDaysToAdd = weekDaysToAdd - (7 - day);
          
            if ((5 - day) < weekDaysToAdd || weekDaysToAdd == 1) {
                daysToAdd = (5 - day) + 5 + daysToAdd
            } else { // (5-day) >= weekDaysToAdd
                daysToAdd = (5 - day) + daysToAdd
            }
            while (weekDaysToAdd != 0) {
                var week = weekDaysToAdd - 5
                if (week > 0) {
                    daysToAdd = 7 + daysToAdd
                    weekDaysToAdd = weekDaysToAdd - 5
                } else { // week < 0
                    daysToAdd = (5 + week) + daysToAdd
                    weekDaysToAdd = weekDaysToAdd - (5 + week)
                }
            }

            return daysToAdd;
        }
});

 
