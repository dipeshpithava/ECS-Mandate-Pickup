jQuery(document).ready(function($) {
	//blur function json
	$('input').blur(function(){
		//console.log(this);
		// var grab_this = $(this).val();
		// console.log(grab_this);
		var inp_len = $('.cmn_log');
		var obj = {};
		for (var i = 0; i < inp_len.length; i++) {
			var vl = $($(inp_len)[i]).val();
			if(vl != ''){
				var vl_id = $($(inp_len)[i]).attr('id');
				obj[vl_id] = vl;
			}
		}

		var ch_rd = $($('input:radio[name="gender"]')[0]).is(":checked");
		if(ch_rd == true){
			var ide = $($('input:radio[name="gender"]')[0]).attr('id');
			var vl = $($('input:radio[name="gender"]')[0]).val();
			obj[ide] = vl;
		}
		var ch_rd = $($('input:radio[name="gender"]')[1]).is(":checked");
		if(ch_rd == true){
			var ide = $($('input:radio[name="gender"]')[1]).attr('id');
			var vl = $($('input:radio[name="gender"]')[1]).val();
			obj[ide] = vl;
		}
		var ch_rd1 = $($('input:radio[name="marital_status"]')[0]).is(":checked");
		if(ch_rd1 == true){
			var ide = $($('input:radio[name="marital_status"]')[0]).attr('id');
			var vl = $($('input:radio[name="marital_status"]')[0]).val();
			obj[ide] = vl;
		}
		var ch_rd1 = $($('input:radio[name="marital_status"]')[1]).is(":checked");
		if(ch_rd1 == true){
			var ide = $($('input:radio[name="marital_status"]')[0]).attr('id');
			var vl = $($('input:radio[name="marital_status"]')[0]).val();
			obj[ide] = vl;
		}

		console.log(obj);
		$.ajax({
			url: 'home/add_autosave',
			type: 'POST',
			data: obj,
		})
		.done(function(data) {
			var prse = JSON.parse(data);
			console.log(prse);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});

});