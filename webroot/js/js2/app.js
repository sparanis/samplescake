
$(document).ready(function(){

	if(location.href.match(/workers?/)!=null)
	{
		var gender = location.href.match(/[?&]gender=(.*?)[$&]/)[1];
		var age_min = location.href.match(/[?&]age_min=(.*?)[$&]/)[1];
		var age_max = location.href.match(/[?&]age_max=(.*?)[$&]/)[1];

		var category1 = location.href.match(/[?&]category1=(.*?)[$&]/)[1];
		var category2 = location.href.match(/[?&]category2=(.*?)[$&]/)[1];
		var category3 = location.href.match(/[?&]category3=(.*?)[$&]/)[1];

		var skill1 = location.href.match(/[?&]skill1=(.*?)[$&]/)[1];
		var skill2 = location.href.match(/[?&]skill2=(.*?)[$&]/)[1];
		var skill3 = location.href.match(/[?&]skill3=(.*?)[$&]/)[1];
		var experience = location.href.match(/[?&]experience=(.*?)[$&]/)[1];

		var project = location.href.match(/[?&]project=(.*)/)[1];
	}


	
	/*select*/

	if(typeof project !== 'undefined')
	{
		$('#project').val(project); 
	}

	if(typeof gender !== 'undefined')
	{
		
		$('#gender').val(gender); 
	}

	if(typeof age_min !== 'undefined')
	{
		
		$('#age_min').val(age_min); 
	}

	if(typeof age_max !== 'undefined')
	{
		
		$('#age_max').val(age_max); 
	}

	if(typeof category1 !== 'undefined')
	{
		
		$('#category1').val(category1);
		skill_populate('category1',skill1);
	}

	if(typeof category2 !== 'undefined')
	{
		
		$('#category2').val(category2);
		skill_populate('category2',skill2);
	}

	if(typeof category3 !== 'undefined')
	{
		
		$('#category3').val(category3);
		skill_populate('category3',skill3); 
	}


	if(typeof experience !== 'undefined')
	{
		
		console.log('e'+experience);
		$('#experience').val(experience); 
	}


	$('.cats').on('click',function(){

		var catid = $(this).val();
		var selectbox = $(this).data('id');

		data = {
			cat_id : catid
		}

		if(location.href.match(/project/))
		{
			var re = new RegExp(/^.*\/search/);
			var sk = '/getSKillOptions';
		}
		else
		{
			var re = new RegExp(/^.*\//);
			var sk = 'search/getSKillOptions';
		}
		

		$.ajax({
				type : 'POST',
				data : data,
				url: re.exec(window.location.href)+sk,
	            success: function(response){

	            	$('#'+selectbox).html(response);
				
	            }
			})

	});

	function skill_populate(cat_id, selected_id){
		
		var selected = selected_id;
		var catid = $('#'+cat_id).val();
		var selectbox = $('#'+cat_id).data('id');

		console.log(catid);
		console.log(selected);

		if(location.href.match(/project/))
		{
			var re = new RegExp(/^.*\/search/);
			var sk = '/getSKillOptions';
		}
		else
		{
			var re = new RegExp(/^.*\//);
			var sk = 'search/getSKillOptions';
		}

		data = {
			cat_id : catid,
			selected_id : selected
		}

	 

		$.ajax({
				type : 'POST',
				data : data,
				url: re.exec(window.location.href)+sk,
	            success: function(response){

	            	$('#'+selectbox).html(response);
				
	            }
			})
	} 

	

	$('.like').on('click',function(){
		var id = $(this).data('id');

		  data = {
					id : id, 
				}

	    $.ajax({
				type : "POST",
				data : data,
				url: 'bookmarks/add',
	            success: function(response){
	            	if(response)
	            	{	
	            		$('.'+id).each(function(i, obj) {
						    $('.'+id).html(response);
	        
						});
					}
	            	
	            	// console.log(response);
	            }
			})

	});

	/*for search*/

	$(window).load(function()
     {

		 $('#search-results').masonry({
	    
	      itemSelector: '.item',
	       isAnimated: true,
	       percentPosition: true
	    });

		});

 //     if ($(window).width() < 769) {
	//     $('#search-results').masonry({
    
	//       itemSelector: '.item-mobile',
	//        isAnimated: true,
	//        percentPosition: true
	//     });
	// }


	$( window ).resize(function() {
	  $('#search-results').masonry();
	});


	
	/*for search content modal*/

	$('.to_content').click(function(){

		$('.modal-body').html('');

		var id = $(this).data('id');

		var re = new RegExp(/^.*\/taiyaki/);

		$('.modal-body').html('<iframe src="'+re.exec(window.location.href)+'/workers/modal_view/'+id+'"></iframe>');
		
	});

	$('#reply-btn').on('click',function(){
		var content = $('.reply-area').val();
		var msg_id = $('.thread-item').find('.avatar-small').data('id');

		data = {
			content : content,
			msg_id : msg_id
		}

	    var re = new RegExp(/^.*\/messages/);

		$.ajax({
				type : 'POST',
				data : data,
				url: re.exec(window.location.href)+'/reply',
	            success: function(response){

	            	$(".thread").append(response);
	            	$(".reply-area").val('');
	            	// console.log(response);
				
	            }
			})

	});


});
