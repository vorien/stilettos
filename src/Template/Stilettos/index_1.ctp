<style>
	#select_power{
		display: none;
	}
/*	input[type='checkbox']{
		width: 1rem;
		margin-left: 1rem;
		float: left;
	}
	input[type='text']{
		width: 5rem;
		float: left;
	}*/
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
		<select id="select_maneuver"></select>
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

		showManeuvers();

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
						$("#select_power").append("<option disabled selected value='0'>Select a Power</option>");
						var sz = 0;
						for (var i = 0, tot = pwrs.length; i < tot; i++) {
//							if (checkLocklevel(pwrs[i].locklevel)) {
							sz += 1;
							$("#select_power").append("<option name='" + pwrs[i].name + "' value='" + pwrs[i].ability_id + "'>" + pwrs[i].name + "</option>");
//							}
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
			clearSelectManeuver();
			locklevel = parseInt($(this).val());
			showManeuvers(locklevel);
		});
		function showOptions(ability_id, power, callback) {
			var json_url = "/stilettos/getOptions/" + ability_id + "/" + power;
			var optstr = "";
			var dispstr = "";
			var appstr = "";
			$.getJSON(json_url, function (opts) {
				$.each(opts, function (cindex, cvalue) {
					$.each(cvalue, function (dindex, dvalue) {
						$.each(dvalue, function (mindex, mvalue) {
							var mclass = mvalue.class.name;
							var mtype = mvalue.type.name;
							var mid = mvalue.id;
							optstr += "<div class='row row-calc calc-" + mtype + "'>";
							switch (mtype) {
								case "checkbox":
									$.each(mvalue.values, function (vindex, vvalue) {
										optstr += "<div class='col-xs-1'>";
										optstr += "<input type='checkbox' class='calc' value='" + vvalue.value + "' data-type='" + mtype + "' data-class='" + mclass + "' id='saveref_" + mid + "_" + vindex + "'>";
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
										optstr += "<input type='text' maxlength='4' size='4' class='calc' data-value='" + vvalue.value + "' data-type='" + mtype + "' data-class='" + mclass + "' id='saveref_" + mid + "_" + vindex + "'>";
										optstr += "</div>";
									});
									break;
								case "select":
									optstr += "<div class='col-xs-12'>";
									optstr += "<select id='saveref_" + mid + "' class='calc' data-type='" + mtype + "' data-class='" + mclass + "'>";
									optstr += "<option selected value='0'>" + mindex + "</option>";
									$.each(mvalue.values, function (vindex, vvalue) {
										optstr += "<option id='saveref_" + mid + "_" + vindex + "' value='" + vvalue.value + "'>" + vvalue.name + "</option>";
									});
									optstr += "</select>";
									optstr += "</div>";
									break;
								case "radio":
									break;
								case "multiplier":
									$.each(mvalue.values, function (vindex, vvalue) {
										optstr += "<div class='col-xs-1'>";
										optstr += "<input type='checkbox' class='calc' value='" + vvalue.value + "' data-type='" + mtype + "' data-class='" + mclass + "' id='saveref_" + mid + "_" + vindex + "'>";
										optstr += "</div>";
										optstr += "<div class='col-xs-11'>";
										optstr += vvalue.name;
										optstr += "</div>";
									});
									break;
								default:
									//An error has occured
									console.log("modifier type name: ~" + mtype + "~ id: ~" + mvalue.type.id + "~ does not exist.");
							}
							optstr += "</div>";
						});
						if (optstr.length > 0) {
							dispstr += "<div class='row wrapper'>";
							dispstr += "  <div class='col-xs-4'>";
							dispstr += "    <h5>";
							dispstr += dindex;
							dispstr += "    </h5>";
							dispstr += "  </div>";
							dispstr += "  <div class='col-xs-8'>";
							dispstr += optstr;
							dispstr += "  </div>";
							dispstr += "</div>";
							optstr = "";
						}
					});
					if (dispstr.length > 0) {
						appstr += "<div class='row wrapper'><div class='col-xs-12'>" + "<h3>" + cindex + "</h3>" + dispstr + "</div></div>";
						dispstr = "";
						if (power) {
							$("#options").append(appstr);
						} else {
//						$("#modifiers_" + mclass).append(optstr);
							$("#modifiers").append(appstr);
						}
						appstr = "";
					}
				});
				setHeadersAndShow(power);
			});
			callback();
		}

		function showManeuvers() {
			var json_url = "/stilettos/getManeuvers";
			$.getJSON(json_url, function (mnvs) {
				var sz = 1;
				$("#select_maneuver").append("<option disabled selected value='0'>Select a Maneuver</option>");
				for (var i = 0, tot = mnvs.length; i < tot; i++) {
//					if (checkLocklevel(mnvs[i].locklevel)) {
					sz += 1;
					$("#select_maneuver").append("<option name='" + mnvs[i].name + "' value='" + mnvs[i].id + "'>" + mnvs[i].name + "</option>");
//					}
				}
				$('#select_maneuver').attr("size", sz);
			});
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
		function clearSelectManeuver() {
			clearSelectPower();
			$('#select_maneuver').hide().html("");
			clearOptions();
		}
		function clearSelectPower() {
			$('#select_power').hide().html("");
			clearOptions();
		}
		function clearOptions() {
			$('#display_cost').hide().html("");
			$('#options').hide().html("");
			$('#modifiers').hide().html("");
		}

		var vals = [];
		function reCalc() {
			vals.adder = 0;
			vals.advantage = 0;
			vals.limitation = 0;
			vals.penalty = 0;
			vals.endurance_effect = 0;
			$.each($('.calc'), function () {
				vals[$(this).data('class')] += getVal($(this));
//				console.log(vals);
//				switch ($(this).data('type')) {
//					case "select":
//						if ($(this).val()) {
//							vals[$(this).data('class')] += parseFloat($(this).val());
//						}
//						break;
//					case "input":
//						if (parseFloat($(this).val())) {
//							vals[$(this).data('class')] += parseFloat($(this).val()) * parseFloat($(this).data('value'));
//						}
//						break;
//					case "checkbox":
//						if (this.checked) {
//							vals[$(this).data('class')] += parseFloat($(this).val());
//						}
//						break;
//					case "radio":
//						break;
//					case "multiplier":
//						var parent = $(this).closest(".wrapper");
//						var chklist = parent.find($(".calc:not([data-class='multiplier'])"));
//						console.log(chklist);
//						break;
//					default:
//						//An error has occured
//						console.log("modifier type name: ~" + $(this).data('type') + "~ id: ~" + $(this).attr('id') + "~ does not exist.");
//				}

			});
//			console.log(vals);

			var costs = [];
			costs.base = vals.adder;
			costs.active = vals.adder * (1 + (vals.advantage + vals.endurance_effect));
			costs.real = costs.active / (1 + vals.limitation);
			costs.endurance = (vals.endurance_effect > 0 ? 0 : Math.ceil(costs.active / 10));
			costs.penalty = (-1 * Math.ceil(costs.active / 10)) + vals.penalty;
//			console.log(costs);

			var display_cost = "";
			display_cost += "<div>Active Cost: " + Math.round(costs.active) + "</div>";
			display_cost += "<div>Endurance Cost: " + costs.endurance + "</div>";
			display_cost += "<div>Real Cost: " + Math.ceil(costs.real) + "</div>";
			display_cost += "<div>Penalty to Roll: " + costs.penalty + "</div>";
			$("#display_cost").html(display_cost).show();
		}

		function getVal(ths) {
			var retval = 0;
			switch (ths.data('type')) {
				case "select":
					if (ths.val()) {
						retval = parseFloat(ths.val());
					}
					break;
				case "input":
					if (parseFloat(ths.val())) {
						retval = parseFloat(ths.val()) * parseFloat(ths.data('value'));
					}
					break;
				case "checkbox":
					if (ths.is(":checked")) {
						retval = parseFloat(ths.val());
					}
					break;
				case "radio":
					break;
				case "multiplier":
					if (ths.is(":checked")) {
						var mval = 0;
						var parent = ths.closest(".wrapper");
						parent.find($(".calc:not([data-class='multiplier'])")).each(function () {
							if ($(this).data("type") != "multiplier") {
								mval += getVal($(this));
							}
						});
						retval = mval;
					}
					break;
				default:
					//An error has occured
					console.log("modifier type name: ~" + ths.data('type') + "~ id: ~" + ths.attr('id') + "~ does not exist.");
			}
//			console.log(retval);
			return retval;
		}

		function checkLocklevel(lvl) {
			if (parseInt(lvl) && parseInt(locklevel) && parseInt(locklevel) >= parseInt(lvl)) {
				return true;
			} else {
				return false;
			}


		}


	});


</script>
