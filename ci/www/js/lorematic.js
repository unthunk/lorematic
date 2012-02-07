$(function(){
	$('#lorematic-form').submit(function(e) {
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			data: data,
			url: "/lorematic/ipsum",
			dataType: "json",
			success: function(data) {
				$('#lorematic').html(data.lorem);
			},
			type: "POST"
		});
	});
	$('#lorematic').click(function(e){
		$(this)[0].select();
	});
});