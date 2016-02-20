<?php echo("TEST<br>"); ?>
<style>
	#select_power{
		display: none;
	}
	input[type='checkbox']{
		width: 1rem;
		margin-left: 1rem;
		/*float: left;*/
	}
	input[type='text']{
		width: 5rem;
		/*float: left;*/
	}
	.wrapper{
		width: 100%;
		border: 1px solid black;
		padding-top: 15px;
	}
	h3{
		text-align: center;
	}
	.row-calc{
		padding-bottom: 1rem;
	}
	h5{
		font-weight: bold;
	}
</style>


<div id="select_locklevel" class="row">
	<div class="col-xs-2">Lock Level</div>
	<div class="col-xs-3"><input id='locklevel' type='text' value='1'></div>
</div>
<div id="selections" class="row">
	<div class="col-xs-4">
		<select id="select_maneuver">
			<option disabled selected value="0">Select a Maneuver</option>
			<?php foreach ($maneuvers as $maneuver) { ?>
				<option name='<?= $maneuver['name'] ?>' value='<?= $maneuver['id'] ?>'><?= $maneuver['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="col-xs-4">
		<select id="select_power"></select>
	</div>
	<div class="col-xs-4">
		<div id="display_cost"></div>
	</div>
</div>
<div id="options_modifiers" class="row">
	<div id="options" class="col-xs-6"></div>
	<div id="modifiers" class="col-xs-6"></div>
</div>

<script>

	var locklevel = 1;

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

		$("#locklevel").change(function () {
			clearOptions();
			locklevel = parseInt($(this).val());
			showOptions(ability_id, 1, function () {});
			showOptions(ability_id, 0, function () {});
		});

		function showOptions(ability_id, power, callback) {
			var json_url = "/stilettos/getOptionsTest/" + ability_id + "/" + power;
			var optstr = "";
			var dispstr = "";
			var appstr = "";
			$.getJSON(json_url, function (opts) {
				$.each(opts, function (cindex, cvalue) {
					$.each(cvalue, function (dindex, dvalue) {
						$.each(dvalue, function (mindex, mvalue) {
//							console.log(mvalue.locklevel, parseInt(mvalue.locklevel), locklevel, parseInt(locklevel));							
							if (parseInt(mvalue.locklevel) && parseInt(locklevel) && parseInt(locklevel) >= parseInt(mvalue.locklevel)) {
								optstr += "<div class='row row-calc calc-" + mvalue.type.name + "'>";
								switch (mvalue.type.name) {
									case "checkbox":
										$.each(mvalue.values, function (vindex, vvalue) {
											optstr += "<div class='col-xs-1'>";
											optstr += "<input type='checkbox' class='calc' value='" + vvalue.value + "' data-type='" + mvalue.type.name + "' data-class='" + mvalue.class.name + "' id='saveref_" + mvalue.id + "_" + vindex + "'>";
											optstr += "</div>";
											optstr += "<div class='col-xs-11'>";
											optstr += vvalue.name;
											optstr += "</div>";
										});
										break;
									case "input":
										$.each(mvalue.values, function (vindex, vvalue) {
											optstr += "<div class='col-xs-6'>";
											optstr += vvalue.name;
											optstr += "</div>";
											optstr += "<div class='col-xs-2'>";
											optstr += "<input type='text' maxlength='4' size='4' class='calc' data-value='" + vvalue.value + "' data-type='" + mvalue.type.name + "' data-class='" + mvalue.class.name + "' id='saveref_" + mvalue.id + "_" + vindex + "'>";
											optstr += "</div>";
										});
										break;
									case "select":
										optstr += "<div class='col-xs-12'>";
										optstr += "<select id='saveref_" + mvalue.id + "' class='calc' data-type='" + mvalue.type.name + "' data-class='" + mvalue.class.name + "'>";
										optstr += "<option disabled selected value='0'>" + mindex + "</option>";
										$.each(mvalue.values, function (vindex, vvalue) {
											optstr += "<option id='saveref_" + mvalue.id + "_" + vindex + "' value='" + vvalue.value + "'>" + vvalue.name + "</option>";
										});
										optstr += "</select>";
										optstr += "</div>";
										break;
									case "radio":
										break;
									case "multiplier":
										$.each(mvalue.values, function (vindex, vvalue) {
											optstr += "<div class='col-xs-1'>";
											optstr += "<input type='checkbox' class='calc' value='" + vvalue.value + "' data-type='" + mvalue.type.name + "' data-class='" + mvalue.class.name + "' id='saveref_" + mvalue.id + "_" + vindex + "'>";
											optstr += "</div>";
											optstr += "<div class='col-xs-11'>";
											optstr += vvalue.name;
											optstr += "</div>";
										});
										break;
									default:
										//An error has occured
										console.log("modifier type name: ~" + mvalue.type.name + "~ id: ~" + mvalue.type.id + "~ does not exist.");
								}
								optstr += "</div>";
							}
						});
						if (optstr.length > 0) {
							dispstr += "<div class='row wrapper'><div class='col-xs-12'>" + "<h5>" + dindex + "</h5>" + optstr + "</div></div>";
							optstr = "";
						}
					});
					if (dispstr.length > 0) {
						appstr += "<div class='row wrapper'><div class='col-xs-12'>" + "<h3>" + cindex + "</h3>" + dispstr + "</div></div>";
						dispstr = "";
						if (power) {
							$("#options").append(appstr);
						} else {
//						$("#modifiers_" + mvalue.class.name).append(optstr);
							$("#modifiers").append(appstr);
						}
						appstr = "";
					}
				});
				setHeadersAndShow(power);
			});
			callback();
		}

		function setHeadersAndShow(power) {
			$.each($('.calc[data-type="select"]'), function () {
				$(this).attr("size", ($(this).find("option").length));
			});
			if (power) {
				if ($("#options").html().length > 0) {
					$("#options").show();
				}
			} else {
				if ($("#modifiers").html().length > 0) {
					$("#modifiers").show();
				}

//					if ($("#modifiers_adder").html().length > 0) {
//						$("#modifiers_adder").prepend("<h3>ADDERS</h3>").show();
//					}
//					if ($("#modifiers_advantage").html().length > 0) {
//						$("#modifiers_advantage").prepend("<h3>ADVANTAGES</h3>").show();
//					}
//					if ($("#modifiers_limitation").html().length > 0) {
//						$("#modifiers_limitation").prepend("<h3>LIMITATIONS</h3>").show();
//					}
//					if ($("#modifiers_penalty").html().length > 0) {
//						$("#modifiers_penalty").prepend("<h3>PENALTIES</h3>").show();
//					}
			}
		}

		$("body").delegate(".calc", "change", function () {
			reCalc();
		});


		function clearSelectPower() {
			$('#select_power').hide().html("");
			clearOptions();
		}
		function clearOptions() {
			$('#display_cost').hide().html("");
			$('#options').hide().html("");
			$('#modifiers').hide().html("");
		}

		function reCalc() {
			var vals = [];
			vals.adder = 0;
			vals.advantage = 0;
			vals.limitation = 0;
			vals.penalty = 0;
			$.each($('.calc'), function () {
//				console.log($(this).attr('id'), $(this).val(),$(this).data('class'), $(this).data('type'));
				switch ($(this).data('type')) {
					case "select":
						if ($(this).val()) {
							vals[$(this).data('class')] += parseFloat($(this).val());
						}
						break;
					case "input":
						if (parseFloat($(this).val())) {
							vals[$(this).data('class')] += parseFloat($(this).val()) * parseFloat($(this).data('value'));
						}
						break;
					case "checkbox":
						if (this.checked) {
							vals[$(this).data('class')] += parseFloat($(this).val());
						}
						break;
					case "radio":
						break;
					case "multiplier":
						break;
					default:
						//An error has occured
						console.log("modifier type name: ~" + $(this).data('type') + "~ id: ~" + $(this).attr('id') + "~ does not exist.");
				}

			});
			console.log(vals);
			$("#display_cost").html(Math.ceil(vals.adder * (1 + vals.advantage) / (1 + vals.limitation)) + " / " + (vals.penalty ? vals.penalty : 0)).show();

		}
	});


</script>
