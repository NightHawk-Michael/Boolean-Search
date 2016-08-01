<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/css/normalize.css">
	<script src="/js/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="/js/jquery-ui-1.11.0.custom/jquery-ui.min.css">
	<link rel="stylesheet" href="/css/jquery.multiselect.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/js/bootstrap.min.js">
	<script src="/js/jquery-ui-1.11.0.custom/jquery-ui.min.js"></script>
	<script src="/js/jquery-ui-1.11.0.custom/jquery-ui-timepicker-addon.js"></script>
	<script src="/js/jquery.multiselect.min.js"></script>
	<script src="/js/jquery.cookie.js"></script>
	<!-- <script type="text/javascript" src="/boolean/view/booleanIndex_v.js"></script> -->

	<script language="javascript" type='text/javascript'>

		var file_to_submit = "booleanSubmit.php";
		//build_data();

		$(document).ready( function() {
			// Display location tag when the browser is online
			addLocationTag();

			$("#featureSelect,#rockSelect,#eruptionSelect").multiselect({
			});

			build_data();
			$("#featureSelect,#rockSelect,#eruptionSelect").multiselect("refresh");

			$("#boolean_form").submit(function() {
					console.log("asdf");
					$(this).attr("action",file_to_submit);
					return true;
			});
			
		});

		var addLocationTag = function(){
			if(navigator.onLine){
				$("#location").show();
			}
			else{
				$("#location").hide();
			}
		}

		var build_data = function(){
			list = ["feature","rock","edPhase"];
			for(var i = 0; i < list.length; i++){
				getJsonObject(list[i]);
			}
		};

		var getJsonObject = function(val){
			// console.log(val);
			$.ajax({
				type:"GET",
				dataType:"json",
				url:"model/booleanIndex_m.php",
				data:"dataType="+val,
				success: function(result){
					// console.log("get ajax success!");
					// console.log(result);
					$.each(result, function(key,value) {   
					$("#"+val).append($("<option></option>").attr("value",key).text(value));
					});
					
				},
				error: function(xhr, ajaxOptions, thrownError){
				},
				async: false,
			});
		}

	</script>	

	<style>
		.hidden_data {
			display:inline-block;
		}
		u {
			font-size: 1.1em;
			display: block;
		}
		form {
			margin-left:5px; 
		}
		.wrapper {
			margin-top: 20px;
			margin-left: 20px;
		}
		.ui-datepicker {
			width:230px;
			font-size: 0.9em;
		}
		.validation_alert {
			/*border-radius: 5px;
			border: 1px #F5142E solid;
			height:20px;
			width: 250px;
			background-color: #dddddd;
			text-align: center;
			padding-top: 5px;*/
			font-size: 0.8em;
			font-style: italic;
			color:red;

		}
		div#select_mainCategory {
			margin-top: 50px;
			margin-left: 70px;
		}
		body h2:first-of-type {
			text-align: center;
		}
		input[type="submit"] {
			margin-left: 40%;
		}
		button.ui-multiselect {

		}
		.data-wrapper {
			font-size: 15px;
			margin-left: 10px;
			margin-top: 10px;
		}
		.data-header {
			display: inline-block;
			margin-right: 25px;
			width: 175px;
		}
		.selected_list {
			display: inline-block;
			margin-left: 20px;
		}
		.vei-input {
			display: inline-block;
			width: 100px;
		}
		.eruption-time-text {
			display: inline-block;
			font-size: 0.8em;
		}
		.eruption-time-input {
			width: 180px;
			display: inline-block;
		}
		button span {
			font-size: 13px;
		}
		.monitoring_data {
			border: 2px solid;
			border-radius: 25px;
			margin-left: 30px;
			margin-right: 120px;
			margin-top: 20px;
			overflow:hidden;
		}
		.seismic {
			float: left;
			margin-left: 50px;
			margin-top: 20px;
			margin-bottom: 10px;
			width: 25%;
		}
		.deformation {
			float: left;
			margin-left: 50px;
			margin-top: 20px;
			margin-bottom: 10px;
			width: 25%;
		}
		.field {
			float: left;
			margin-left: 50px;
			margin-top: 20px;
			margin-bottom: 10px;
			width: 25%;
		}
		.gas {
			float: left;
			margin-left: 50px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 25%;
		}
		.hydrologic {
			float: left;
			margin-left: 50px;
			margin-top: 10px;
			margin-bottom: 20px;
			width: 25%;
		}
		.thermal {
			float: left;
			margin-left: 50px;
			margin-top: 10px;
			margin-bottom: 20px;
			width: 25%;
		}
		.meteo {
			float: left;
			margin-left: 50px;
			margin-top: 10px;
			margin-bottom: 20px;
			width: 25%;
		}

		/*#radioButton {
			
		}*/
		.innerData {
			margin-left: 70px;
		}
	</style>

</head>


<body>
	<h2>WOVOdat Boolean Search Form</h2>

	<form id="boolean_form" name="boolean_form" method="post" action="">
		<div id="select_mainCategory">
			<div id="Volcano Search">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Volcano Search
				<span class="caret"></span></button>
				<br>
				<br>
				<div id="Volcano Inner Group" class="innerData">
					<label>Feature: </label>
					<select id="featureSelect" name="feature[]" multiple="multiple">
						<optgroup id="feature" label="Feature"></optgroup>
						<!-- <option value="feature" disabled="">Features</option> -->
						<!-- <option value="foo">foo</option> -->
					</select>
					<br>
					<br>
					<label>Rock Types: </label>
					<select id="rockSelect" name="rock[]" multiple="multiple">
						<optgroup id="rock" label="Rock"></optgroup>
						<!-- <option value="rock" disabled="">Rock Types</option> -->
					</select>
					<br>
					<br>
					<label id="location">Location: </label>
					<br>
					<br>
				</div>

			</div>

			<div id="Eruption Search">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Eruption Search
				<span class="caret"></span></button>
				<br>
				<br>
				<div id="Eruption inner Group" class="innerData">
					<label>Eruption Phase Type: </label>
					<select id="eruptionSelect" name="eruption[]" multiple="multiple">
						<optgroup id="edPhase" label="Eruption Phase Type"></optgroup>
						<!-- <option value="rock" disabled="">Rock Types</option> -->
					</select>
					<br>
					<br>


					<label>VEI: &nbsp&nbsp&nbsp</label>	
					<input type="text" name="veiMin" id="veiMin">
					<p style="display:inline">&lt;= Range &lt;= </p>
					<input type="text" name="veiMax" id="veiMax">
					<br>
					<br>

					<label>Eruption Time: &nbsp&nbsp&nbsp</label>	
					<input type="text" name="eruptionTimeMin" id="eruptionTimeMin">
					<p style="display:inline">&lt;= Range &lt;= </p>
					<input type="text" name="eruptionTimeMax" id="eruptionTimeMax">
					<br>
					<br>
				</div>

			</div>
			
			<div id="Monitoring Data Search"></div>	
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Monitoring Data Search
				<span class="caret"></span></button>
			    <br>
			    <br>

			    <div id="Monitoring Data Lists" class="monitoring_data">
			    	<p class="seismic">
			    		<input id="radioButton" type="radio" name="Seismic" checked>Seismic<br>
			    		<input type="checkbox" name="sd_evn" value="sd_evn">Network Events<br>
			    		<input type="checkbox" name="sd_evs" value="sd_evs">Single Station Events<br>
			    		<input type="checkbox" name="sd_int" value="sd_int">Seismic Intensity<br>
			    		<input type="checkbox" name="sd_ivl" value="sd_ivl">Interval (Swarm)<br>
			    		<input type="checkbox" name="sd_trm" value="sd_trm">Tremor<br>
			    		<input type="checkbox" name="sd_rsm" value="sd_rsm">RSAM<br>
			    		<input type="checkbox" name="sd_ssm" value="sd_ssm">SSAM<br>
			    	</p>

			    	<p class="deformation">
			    		<input id="radioButton" type="radio" name="Deformation" checked>Deformation<br>
			    		<input type="checkbox" name="dd_ang" value="dd_ang">Angle<br>
			    		<input type="checkbox" name="dd_edm" value="dd_edm">EDM<br>
			    		<input type="checkbox" name="dd_gps" value="dd_gps">GPS<br>
			    		<input type="checkbox" name="dd_gpv" value="dd_gpv">GPS vector<br>
			    		<input type="checkbox" name="dd_lev" value="dd_lev">Leveling<br>
			    		<input type="checkbox" name="dd_str" value="dd_str">Strain<br>
			    		<input type="checkbox" name="dd_tlt" value="dd_tlt">Tilt<br>
			    		<input type="checkbox" name="dd_tlv" value="dd_tlv">Tilt vector<br>
			    	</p>

			    	<p class="field">
			    		<input id="radioButton" type="radio" name="Field" checked=>Field<br>
			    		<input type="checkbox" name="fd_ele" value="fd_ele">Electricity (SP)<br>
			    		<input type="checkbox" name="fd_gra" value="fd_gra">Gravity<br>
			    		<input type="checkbox" name="fd_mag" value="fd_mag">Magnetic Fields<br>
			    		<input type="checkbox" name="fd_mgv" value="fd_mgv">Magnetic Vector<br>
			    	</p>

			    	<p class="gas">
			    		<input id="radioButton" type="radio" name="Gas" checked>Gas<br>
			    		<input type="checkbox" name="gd" value="gd">Sampled Gas<br>
			    		<input type="checkbox" name="gd_plu" value="gd_plu">Plume<br>
			    		<input type="checkbox" name="gd_sol" value="gd_sol">Soil Effux<br>
			    	</p>

			    	<p class="hydrologic">
			    		<input id="radioButton" type="radio" name="Hydrologic" checked>Hydrologic<br>
			    		<input type="checkbox" name="hd" value="hd">Hydrologic Sampled Data<br>
			    	</p>

			    	<p class="thermal">
			    		<input id="radioButton" type="radio" name="Thermal" checked>Thermal<br>
			    		<input type="checkbox" name="td" value="td">Thermal Data<br>
			    	</p>

			    	<p class="meteo">
			    		<input id="radioButton" type="radio" name="Meteo" checked>Meteo<br>
			    		<input type="checkbox" name="med" value="med">Meteo Data<br>
			    	</p>

			    </div>
		    	<br>
		    	<br>

		    	<label>Priority Time Period: &nbsp&nbsp&nbsp</label>	
				<p style="display:inline">Start &nbsp&nbsp&nbsp</p>
				<input type="text" name="veiMin" id="veiMin">
				<p style="display:inline">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
				<p style="display:inline">End &nbsp&nbsp&nbsp</p>
				<input type="text" name="veiMax" id="veiMax">
				<br>
				<br>

		    </div>
		    <br>
		    <br>
	    </div>
		<input type="submit" value="Search" style="margin-top:30px;width:100px;font-size:15px;">
		<input type="button" value="Clear All Fields" style="margin-left:30px;width:120px;font-size:15px;">
			
	</form>


	
</body>
</html>
