

// this is a jquery file
jQuery(function(){
 // another ajax call 
 // jQuery("#forpostallpage").validate({

 // 	submitHandler:function(){
 // 	     var post_data=jQuery("#forpostallpage").serialize()+"&action=custon_ajax_req";

 // 		jQuery.post(ajaxurl,post_data,function(response){
 //        console.log(response);
 // 		});
 // 	}
 // });
//  jQuery("#forpostallpage").on('click',function(e){
		// 	e.preventDefault();

		// 	jQuery.post(ajaxurl,
		// 		{action:"custom_plugin",name:"online web",tut:"wprdpress"},
		// 		function(response)
		// 		{
		//     	console.log(response);
		//     });
		// });

	// jQuery(document).on('click',".save",function(){

 //    var data="action=custom_plugin_library_post&param=get_message";

 //    jQuery.post(my_ajax_object.ajax_url,data,function(response){
 //    	console.log(response);
 //    });

	// });

   
		 jQuery("#forpostdata").validate({
		 	submitHandler:function(){
            var name=jQuery("txtname").val ;
            var email=jQuery("txtemail").val;
            var phone=jQuery("txtphone").val;
            // var description=encodeURlComponent(tinyMCE.get("Description_id").getContent());
            console.log("heelo");
		 	var data="action=custom_plugin_library_post&param=savedata&name="
		 	+name+"&email="+email+"&phone="+phone
		      ;

		    jQuery.post(my_ajax_object.ajaxurl,data,function(response){
		    	console.log(response);
		    	alerts('data is save');
		    	

		    })

		 	}
     
		 });

});
