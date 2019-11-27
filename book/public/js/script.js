  jQuery(function(){
  	 // =======Eneol Section
      
      //jQuery("table tbody").html('');
      //jQuery("table tbody").html(response);

      // =======End

jQuery(".search__click").on("click",function(){
	console.log(jQuery(".searched__text").val());
	var searchedText = jQuery(".searched__text").val()
});

     jQuery("#btnimage").on("click",function(){ // image uplode section in media query
     	var image=wp.media({
     		title:"Uplode image",
     		mulitple:false
    	}).open().on("select",function(){
		    var uplode_image=image.state().get("selection").first();
		    var get_image=uplode_image.toJSON().url;
		    jQuery("#showimage").html("<img src='"+get_image+"'style='height:50px;width:50px'/>");
		    jQuery("#imagename").val(get_image);
	 	});
	 });
// --------------------------------------------------------------------
	 jQuery("#myfrmdata").validate({// form  validate
	  submitHandler:function(){ // submitHandler part of form  validate  
	  var postdata="action=my_book_action&param=save_book&"+jQuery("#myfrmdata").serialize();
	  jQuery.post(ajaxurl,postdata,function(response){ // this is a all section of ajax
	  var data=jQuery.parseJSON(response);
	  alert("Your data is saved");
	  	 // if (data.status==1) { // this is a section of show notifybar to save data then
	  	 //	data  is save to database
	  	 // 	jQuery.notifyBar({
	  	 // 		cssClass:"success",
	  	 // 		html:data.message
	  	 // 	});

	  	 // }else{

	  	 // }
	  	});
	  }   
	});
// --------update data----------
    jQuery("#myfrmeditdata").validate({
        submitHandler:function(){
       		var postdata="action=my_book_action&param=edit_book&"+jQuery("#myfrmeditdata").serialize();
	  		jQuery.post(ajaxurl,postdata,function(response){
	  	 	var data=jQuery.parseJSON(response);
	  	 	alert("Your data is UpDated"); 	

    		});
		    
	    }	
    });
      // ======================del
    jQuery(document).on('click','.delbook',function(){
      	 var book_id=jQuery(this).attr("data-id");
      	 var postdata="action=my_book_action&param=delete_book&id="+book_id;
		  jQuery.post(ajaxurl,postdata,function(response){ // this is a all section of ajax
			  var data=jQuery.parseJSON(response);
			  jQuery(".record_row_"+book_id).remove();
			  //alert("You whant to Delete This Data!");
	      });
    });  
      // ====Authors parts===
      jQuery("#myfrmauthordata").validate({
      	submitHandler:function(){
      		var postdata="action=my_book_action&param=save_author&"+jQuery("#myfrmauthordata").serialize();
	  		jQuery.post(ajaxurl,postdata,function(response){ // this is a all section of ajax
	  		var data=jQuery.parseJSON(response);
	  		alert("Your data is saved");

      	
       });
	  	}
      });

      // ==== End Authors parts===
      // =====student section====
       jQuery("#myfrmstudentdata").validate({
      	submitHandler:function(){
      		var postdata="action=my_book_action&param=save_student&"+jQuery("#myfrmstudentdata").serialize();
	  		jQuery.post(ajaxurl,postdata,function(response){ // this is a all section of ajax
	  		var data=jQuery.parseJSON(response);
	  		alert("Your data is saved");

      	
       });
	  	}
      });
      // =====end student


  });

     

     
     


