<style>
	#select_power{
		display: none;
	}
	input[type='checkbox']{
		width: 1rem;
		/*float: left;*/
	}
	input[type='text']{
		width: 5rem;
		/*float: left;*/
	}
	/*	select{
			float: left;
			width: 25rem;
		}*/
	/*	.checkboxinput-label{
			float: left;
			padding-left: 1rem;
		}
		.textinput-label{
			float: left;
			padding-right: 1rem;
		}
		.calc-input, .calc-checkbox, .calc-select{
		}
		#options{
			float: left;
		}
		#modifiers{
			float: left;
		}*/
	#options_modifiers, #options, #modifiers, #modifiers_adder, #modifiers_advantage, #modifiers_limitation, #modifiers_penalty{
		border: 1px solid black;
	}
	h3{
		text-align: center;
	}

	.row-calc{
		padding-bottom: 1rem;
	}
</style>


<div id="select_locklevel" class="row">
	<div class="col-xs-2">Lock Level</div>
	<div class="col-xs-3"><input id='locklevel' type='text' value=''></div>
</div>
<div id="selections" class="row">
	<div class="row wrapper-select">
		<div class="col-xs-12">
			<select id="select_maneuver">
				<option disabled selected value="0">Select a Maneuver</option>
				<?php foreach ($maneuvers as $maneuver) { ?>
					<option name='<?= $maneuver['name'] ?>' value='<?= $maneuver['id'] ?>'><?= $maneuver['name'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row wrapper-select">
		<div class="col-xs-12">
			<select id="select_power"></select>
		</div>
	</div>
	<div id="options_modifiers" class="row">
		<div id="options" class="col-xs-4"></div>
		<div id="modifiers" class="col-xs-8">
			<div id="modifiers_adder"></div>
			<div id="modifiers_advantage"></div>
			<div id="modifiers_limitation"></div>
			<div id="modifiers_penalty"></div>
		</div>
	</div>
	<script>



		$(function () {
			$('#select_maneuver').attr("size", <?= count($maneuvers) + 1 ?>);

			$("#select_maneuver").change(function () {
				clearSelectPower();
				var maneuver_id = $(this).val();
				var json_url = "/stilettos/getPowers/" + maneuver_id;
				$.getJSON(json_url, function (pwrs) {
					switch (pwrs.length) {
						case 0:
							// Something's not right
							console.log(json_url + "returned nothing or an empty array");
							break;
						case 1:
							// Only one power for that maneuver, jump to modifier display
							showOptions(pwrs[0].ability_id, 1, function () {});
							showOptions(pwrs[0].ability_id, 0, function () {});
							break;
						default:
							// More than one power for the maneuver, show selection
							$("#select_power").append("<option disabled selected value='0'>Select a Maneuver</option>");
							for (var i = 0, tot = pwrs.length; i < tot; i++) {
								$("#select_power").append("<option name='" + pwrs[i].name + "' value='" + pwrs[i].ability_id + "'>" + pwrs[i].name + "</option>");
							}
							$('#select_power').attr("size", pwrs.length + 1);
							$('#select_power').show();
							break;
					}
				});
			});

			$("#select_power").change(function () {
				clearOptions();
				var ability_id = $(this).val();
				showOptions(ability_id, 1, function () {});
				showOptions(ability_id, 0, function () {});
			});

			function showOptions(ability_id, power, callback) {
				var json_url = "/stilettos/getOptions/" + ability_id + "/" + power;
				$.getJSON(json_url, function (pwrs) {
					$.each(pwrs, function (dindex, dvalue) {
						$.each(dvalue.modifiers, function (mindex, mvalue) {
							var optstr = "<div class='row row-calc calc-" + mvalue.type.name + "'>";
							switch (mvalue.type.name) {
								case "checkbox":
									$.each(mvalue.values, function (vindex, vvalue) {
										optstr += "<div class='col-xs-1'>";
										optstr += "<input type='checkbox' class='calc' data-type='" + mvalue.type.name + "' id='saveref_" + vvalue.id + "'>";
										optstr += "</div>";
										optstr += "<div class='col-xs-11'>";
										optstr += vindex;
										optstr += "</div>";
									});
									break;
								case "input":
									$.each(mvalue.values, function (vindex, vvalue) {
										optstr += "<div class='col-xs-6'>";
										optstr += vindex;
										optstr += "</div>";
										optstr += "<div class='col-xs-2'>";
										optstr += "<input type='text' maxlength='4' size='4' class='calc' data-type='" + mvalue.type.name + "' id='saveref_" + vvalue.id + "'>";
										optstr += "</div>";
									});
									break;
								case "select":
									optstr += "<div class='col-xs-12'>";
									optstr += "<select id='saveref_" + mvalue.id + "' class='calc' data-type='" + mvalue.type.name + "'>";
									optstr += "<option disabled selected value='0'>" + mindex + "</option>";
									$.each(mvalue.values, function (vindex, vvalue) {
										optstr += "<option name='" + vindex + "' value='" + vvalue.value + "'>" + vindex + "</option>";
									});
									optstr += "</select>";
									optstr += "</div>";
									break;
								case "radio":
									break;
								default:
									//An error has occured
									console.log("modifier type name: ~" + mvalue.type.name + "~ id: ~" + mvalue.type.id + "~ does not exist.");
							}
							optstr += "</div>";
							if (power) {
								$("#options").append(optstr);
							} else {
								$("#modifiers_" + mvalue.class.name).append(optstr);
							}
						});
					});
					setHeadersAndShow(power);
				});
				callback();
			}

			function setHeadersAndShow(power) {
				$.each($('.calc[data-type="select"]'), function () {
					console.log('calc');
					console.log($(this).attr('id'));
					console.log($(this).find("option").length);
					$(this).attr("size", ($(this).find("option").length));
				});
				if (power) {
					if ($("#options").html().length > 0) {
						$("#options").prepend("<h3>OPTIONS</h3>").show();
					}
				} else {

					if ($("#modifiers_adder").html().length > 0) {
						$("#modifiers_adder").prepend("<h3>ADDERS</h3>").show();
					}
					if ($("#modifiers_advantage").html().length > 0) {
						$("#modifiers_advantage").prepend("<h3>ADVANTAGES</h3>").show();
					}
					if ($("#modifiers_limitation").html().length > 0) {
						$("#modifiers_limitation").prepend("<h3>LIMITATIONS</h3>").show();
					}
					if ($("#modifiers_penalty").html().length > 0) {
						$("#modifiers_penalty").prepend("<h3>PENALTIES</h3>").show();
					}
				}
			}



			function clearSelectPower() {
				$('#select_power').hide().html("");
				clearOptions();
			}
			function clearOptions() {
				$('#options').hide().html("");
				$('#modifiers_adder').hide().html("");
				$('#modifiers_advantage').hide().html("");
				$('#modifiers_limitation').hide().html("");
				$('#modifiers_penalty').hide().html("");
			}
		});



	</script>
