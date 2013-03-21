$(document).ready(function() {

	$('.author').click(function(index) 
	{
		$(this).children('span').show();
		$(this).removeClass('light');
	});	
	
	$('.add_photo').click(function(index) 
	{
		localthis = $(this);
	
		// Ajax for ease of HTML
		$.ajax({
  			url: "http://sonar.local/sonar/articles/fragments/add_photo",
  			context: document.body,
  			success: function(data){

    			localthis.parent().append(data);
  			}
		});
	});	
	
	
	
	$('.destroy').click(function(e) 
	{
		e.preventDefault();
		
		var answer = confirm("Sure you want to delete?")
	    if (answer){
	        window.location.href = $(this).attr('href');
	    }
	      
	});	
	
	$('.topicaddbutton').click(function(e) 
	{
		e.preventDefault();
		
		$(this).hide();
		$(this).parent().find('topicadd').show();
	      
	});	
	



});