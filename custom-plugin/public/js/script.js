//  this is a my js file


	jQuery(function(){
    jQuery("#btnimage").on('click',function(){
    	var images=wp.media({
		title:"Uplode image",
		multiple:false

	}).open().on("select",function(e){
		var uplodeimages=images.state().get("selection").first();

		var selectedimage=uplodeimages.toJSON();

    jQuery("#getimage").attr("src",selectedimage.url);



		// jQuery.each(selectedimage,function(index,image){
		// 	console.log(image.url);

		// });

	});

	});
		});
	


