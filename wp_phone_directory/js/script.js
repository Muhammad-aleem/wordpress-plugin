jQuery(function () {

	jQuery(".clickbtn").on("click", function () {
		var searchedText = jQuery("#clicksearch").val();
		// console.log(jQuery("#tableseac").serialize());
		// return false;
		var searchdata = "action=my_seaarh_action&searchedText=" + searchedText;
		jQuery.post(my_ajax_object.ajaxurl, searchdata, function (response) {
			console.log(response);
			jQuery("#tableseac tbody").html('');
			jQuery("#tableseac tbody").html(response);

		});
		// console.log(searchedText);
	});

	jQuery(".dec").on("click", function () {
		var Text = this.id;
		console.log(Text);
		var colom_name = "action=my_sort_action&order=" + Text;
		jQuery.post(my_ajax_object.ajaxurl, colom_name, function (response) {
			jQuery("#tableseac tbody").html('');
			jQuery("#tableseac tbody").html(response);
		});
		// var colom_name = jQuery(this).attr("id");
		// var order = jQuery(this).data("order");
		// var arrow = "";
		// if (order == 'desc') {
		// 	arrow = '<span class="glyphicon glyphicon-arrow-down"></span>';

		// } else {
		// 	arrow = '<span class="glyphicon glyphicon-arrow-up"></span>';
		// }

	});
	// var content = `<tr class="row_number_434">
	// 					      <td>3</td>
	// 					      <td>3232323232 ALEEM</td>
	// 					      <td>2019-08-10 07:49:07</td>
	// 					      <td><a href="javascript:void(0)" class="btn btn-danger delbook" data-id="4" onclick="return confirm('Are you sure want to Delete ?')"> Delete</a></td>
	// 					      <td><a href="admin.php?page=edit_phone&amp;edit=4" class="btn btn-info"><i><b>Edit</b></i>
	//                              </a></td>

	// 					    </tr><tr class="row_number_434">
	// 					      <td>3</td>
	// 					      <td>3232323232 ALEEM</td>
	// 					      <td>2019-08-10 07:49:07</td>
	// 					      <td><a href="javascript:void(0)" class="btn btn-danger delbook" data-id="4" onclick="return confirm('Are you sure want to Delete ?')"> Delete</a></td>
	// 					      <td><a href="admin.php?page=edit_phone&amp;edit=4" class="btn btn-info"><i><b>Edit</b></i>
	//                              </a></td>
	// 					    </tr>`;
	// jQuery(".table-striped tbody").html('');
	// jQuery(".table-striped tbody").append(content);		
	// var rowid = 434;
	//(".row_number_"+rowid).remove();	    

	// ============== Delete phone data

	jQuery(document).on('click', '.delbook', function () {

		var doYouWantto = confirm("you realy whant to delete this Data!");
		if (doYouWantto == true) {
			var phone_id = jQuery(this).attr("data-id");
			var postdata = "action=my_phone_action&param=delete_phone&id=" + phone_id;
			jQuery.post(my_ajax_object.ajaxurl, postdata, function (response) { // this is a all section of ajax
				//var data=jQuery.parseJSON(response);
				jQuery('.record_row_' + phone_id).remove();
			});
		}
	});
	// ============== End Phone delete
	// ======== save Phone====
	jQuery("#btnimage").on("click", function () { // image uplode section in media query
		var image = wp.media({
			title: "Uplode image",
			mulitple: false
		}).open().on("select", function () {
			var uplode_image = image.state().get("selection").first();
			var get_image = uplode_image.toJSON().url;
			jQuery("#showimage").html("<img src='" + get_image + "'style='height:50px;width:50px'/>");
			jQuery("#imagename").val(get_image);
		});
	});
	// ======= save  section

	jQuery("#myfrmphonedata").validate({
		submitHandler: function () {

			var inputPhone = jQuery("#inputPhone").val();
			var name = jQuery("#name").val();
			var imagename = jQuery("#imagename").val();

			console.log(inputPhone, name, imagename);
			console.log(jQuery("#myfrmphonedata").serialize());
			//return false;
			var postdata = "action=my_phone_action&param=save_phoneData&inputPhone=" + inputPhone + "&name=" + name + "&imagename=" + imagename;
			jQuery.post(my_ajax_object.ajaxurl, postdata, function (response) { // this is a all section of ajax
				// var data=jQuery.parseJSON(response);
				jQuery('#tableseac tbody').append(response);
				jQuery("#inputPhone").val('');
				jQuery("#name").val('');
				alert("Your phone data is saved");
			});
		}
	});
	// ============ End save Phone==========
	// =================== Edit Data =======
	jQuery("#myfrmphonedata").validate({
		submitHandler: function () {
			var postdata = "action=my_phone_action&param=edit_phone&" + jQuery("#myfrmphonedata").serialize();
			jQuery.post(my_ajax_object.ajaxurl, postdata, function (response) {
				var data = jQuery.parseJSON(response);
				alert("Your data is Updated");

			});
			//    setTimeout(function(){// this is a timeout fun to relode the page with define time
			//   	window.location.reload(1);
			// }, 500);
		}
	});
	// ================= End Edit Data ======
	// --------------------------

	// ----------------------------------------------------------------
	// jQuery("table tbody").html('');
	//jQuery("table tbody").html(response);

	// =======End

	jQuery(".search__click").on("click", function () {
		console.log(jQuery(".searched__text").val());
		var searchedText = jQuery(".searched__text").val()
	});

	//========  input validation=======
	jQuery("#inputPhone").keypress(function (e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			//display error message
			jQuery("#errmsg").html("Digits Only").show('3000').fadeOut("slow");
			return false;
		}
	});
	//  ============= End==========
	// ========= Jquery Search is working======
	jQuery("#search_bar").keyup(function () {
		search_table(jQuery(this).val());
	});
	function search_table(value) {
		jQuery("#tableseac tr").each(function () {
			var found = 'false';
			jQuery(this).each(function () {
				if (jQuery(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
					found = "true";
				}
			});
			if (found == "true") {
				jQuery(this).show();

			} else {
				jQuery(this).hide();
			}
		});
	}
	// ========== End search =======
});


