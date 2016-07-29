var build_all_data = function(){
	var list = ["Volcano","Eruption","Monitoring"];
			for (var i = 0; i<list.length; i++) 
				$("<select name='feature[]' multiple='multiple'>").find("option").each(function() {
					$("#"+list[i]).append( build_data( $(this).val(), $(this).text() ) ); 
				});
			$("#Eruption").append( build_data("edTime" , "Eruption Time") );
}

var build_data = function(val,text) {
	var container = $("<div id='"+val+"_wrapper'></div>");

	if ( $.inArray(val,has_dropdownbox)!=-1 ) 
	{
		addDropdownBox(container, val);

	}  
	else if (val=="vei") 
	{
		addVEIRange(container);
	} 
	else if (val=="edTime") 
	{
		addTime(container);
		var div_validation2 = $("<div></div>");
		div_validation2.addClass("validation_alert hidden_data").append("Time must not be blank!").css("margin-left","20px");
		container.append(div_validation2);
	}
	else
	{ 
		addHiddenInput(container, val);
	}

	return container;
}

var addDropdownBox = function(container,val){

	var limit_select_value = function(e,ui) {
					if( $(this).multiselect("widget").find("input:checked").length > 0 ){
						$("#"+val+"_wrapper div.validation_alert").css("display","none");
					}
					if( $(this).multiselect("widget").find("input:checked").length > maxSelectedDropdownbox ){
						return false;
					}
					var $p = $("#"+val+"_wrapper p.selected_list");
					$p.text("");
					$(this).multiselect("widget").find("input:checked").each(function() {
						if ( $p.text() != "" ) $p.append(", ");
						$p.append($(this).attr("title"));	
					});
					return true;
			};

	var select = $("<select name='"+val+"[]' multiple='multiple'></select>");



	$.ajax({
				type:"GET",
				dataType:"json",
				url:"model/booleanIndex_m.php",
				data: "dataType="+val,
				success:function(result) {
					if (result.length == 0) {
			 			select.append(new Option("Nodata","Nodata"));
					} else {
						if ( val == "sd_evn" || val == "sd_evs" || val ==  "sd_ivl" ) {
							for(var i = 0; i < result.length; i++)
								select.append(new Option(result[i][0], result[i][1]));
						}  else {
							for(var i  = 0; i < result.length; i++) {
								select.append(new Option(result[i],result[i]));
							}
						}
					}

					var div_validation = $("<div>Please select at least one option!</div>");
					div_validation.addClass("validation_alert hidden_data");

					selected_list = $("<p></p>");
					selected_list.addClass("selected_list");
					container.append(select).append(selected_list);

					select.multiselect({
						header:false,
						minWidth:350,
						height:150,
						noneSelectedText: "Maximum "+maxSelectedDropdownbox+" criteria are able to select",
						selectedText: "Maximum "+maxSelectedDropdownbox+" criteria are able to select",
						click: limit_select_value
					});

					//$container.find("button").css("display","inline-block");
					container.append($div_validation);

					loadSpecificSelectData(val);
				}
			});
}