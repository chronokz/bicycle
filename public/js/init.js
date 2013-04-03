$(document).ready(function() {
		$(".telephone").mask("+7(999)999-99-99");
		$(".rtd select").selectBox();

		$("#next_button").click(function() {
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "/manager",
				data: $("#mainForm").serialize(),
				success: function(data){                
					$("#fieldsErrors").html('');
					$("tr").removeClass("red");
					if(data.fields.length == 0) {					
						$.ajax({
							type: "POST",							
							url: "finalPage",
							data: "",
							success: function(data){                
								$("#content").html(data);
							}
						});
					}
					else {						
						$("#fieldsErrors").html('Некоторые поля заполнены некорректно');
						for(i = 0; i < data.fields.length; i++) {
							$("[name="+data.fields[i]+']').parent().parent().addClass("red");
						}												
					}
				}
			});
		});		
});