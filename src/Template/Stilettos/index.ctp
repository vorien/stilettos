<style>
	body{
		overflow-y: scroll;
	}
	#selections{
		margin-bottom: 1rem;
	}
	#select_power, #select_target{
		display: none;
	}
	#select_locklevel{
		margin: 1rem 0;
	}
	input[type='checkbox']{
		width: 1rem;
		margin-left: 1rem;
		float: left;
	}
	input[type='text']{
		/*		width: 5rem;
				float: left;*/
		font-size: 1rem;
		line-height: 1.5rem;
		padding: 0px;
		margin: 0px;
		height: 1.5rem;
	}
	select{
		font-size: 1rem;
		/*height: 2rem;*/
		line-height: 1.2rem;
	}
	.wrapper{
		/*width: 100%;*/
		border: 1px solid black;
		padding: 15px 0;
	}
	h3{
		text-align: center;
	}
	div#accordion.panel-group{
		margin-bottom: 0px;
	}
	div.panel-heading{
		line-height: 2.5em;
		text-align: center;
		font-size: 1.5em;
		font-weight: bold;
		/*text-indent: 2em;*/
		padding: 0px;
		margin: 0px;
	}
	.panel.panel-default{
		padding: 0px;
	}
	.row-calc{
		padding-bottom: 3px;
	}
	.required{
		background-color: lightsalmon;
	}
	.anyrequiresall{
		background-color:#f5e79e;
	}
</style>


<div id="select_locklevel" class="row">
	<div class="col-xs-2">Lock Level</div>
	<div class="col-xs-1"><input id='locklevel' type='text' value='1'></div>
</div>
<div id="selections" class="row">
	<div class="col-xs-3">
		<select id="select_maneuver"></select>
	</div>
	<div class="col-xs-3">
		<select id="select_power"></select>
	</div>
	<div class="col-xs-3">
		<select id="select_target"></select>
	</div>
	<div class="col-xs-3">
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
			showPowers(maneuver_id);
		});
		$("#select_power").change(function () {
			clearSelectTarget();
			var id = $(this).val();
			showTargets(id, function () {});
		});
		$("#select_target").change(function () {
			clearSelectOptions();
			var id = $(this).val();
			showOptions(id, function () {
				showOptions(1, function () {
					reCalc();
				});
			});
//			showOptions(id, function () {});
//			showOptions(1, function () {});
		});
		$("#locklevel").change(function () {
			clearSelectManeuver();
			locklevel = parseInt($(this).val());
			showManeuvers(locklevel);
		});
		function showManeuvers() {
			var json_url = "/stilettos/getManeuvers";
			$.getJSON(json_url, function (mnvs) {
				if (mnvs.length == 0) {
					// Something's not right
					console.log(json_url + "returned nothing or an empty array");
				} else {
					$("#select_maneuver").append("<option disabled selected value='0'>Select a Maneuver</option>");
					for (var i = 0, tot = mnvs.length; i < tot; i++) {
						$("#select_maneuver").append("<option name='" + mnvs[i].name + "' value='" + mnvs[i].id + "'>" + mnvs[i].name + "</option>");
					}
				}
			});
		}

		function showPowers(maneuver_id) {
			var json_url = "/stilettos/getPowers/" + maneuver_id;
			$.getJSON(json_url, function (pwrs) {
				switch (pwrs.length) {
					case 0:
						// Something's not right
						console.log(json_url + "returned nothing or an empty array");
						break;
					case 1:
						// Only one power for that maneuver, jump to modifier display
						showTargets(pwrs[0].id, function () {});
						break;
					default:
						// More than one power for the maneuver, show selection
						$("#select_power").append("<option disabled selected value='0'>Select a Power</option>");
						for (var i = 0, tot = pwrs.length; i < tot; i++) {
							$("#select_power").append("<option name='" + pwrs[i].name + "' value='" + pwrs[i].id + "'>" + pwrs[i].name + "</option>");
						}
						$('#select_power').show();
						break;
				}
			});
		}

		function showTargets(power_id) {
			var json_url = "/stilettos/getTargets/" + power_id;
			$.getJSON(json_url, function (tgts) {
				switch (tgts.length) {
					case 0:
						// Something's not right
						console.log(json_url + "returned nothing or an empty array");
						break;
					case 1:
						// Only one power for that maneuver, jump to modifier display
						showOptions(tgts[0].id, function () {
							showOptions(1, function () {
								reCalc();
							});
						});
						break;
					default:
						// More than one power for the maneuver, show selection
						$("#select_target").append("<option disabled selected value='0'>Select a Target</option>");
						for (var i = 0, tot = tgts.length; i < tot; i++) {
							$("#select_target").append("<option name='" + tgts[i].name + "' value='" + tgts[i].id + "'>" + tgts[i].name + "</option>");
						}
						$('#select_target').show();
						break;
				}
			});
		}

		function showOptions(target_id, callback) {
			var json_url = "/stilettos/getOptions/" + target_id;
//			console.log(json_url);
			var mstring = "";
			var dstring = "";
			var cstring = "";
			var sstring = "";
			$.getJSON(json_url, function (opts) {
				$.each(opts.section_types, function (sindex, svalue) {
//					console.log("s", sindex, svalue.name);
					$.each(svalue.modifier_classes, function (cindex, cvalue) {
//						console.log("c", cindex, cvalue.display_name);
						$.each(cvalue.displays, function (dindex, dvalue) {
//							console.log("d", dindex, dvalue.name);
							$.each(dvalue.modifiers, function (mindex, mvalue) {
//								console.log("m", mindex, mvalue.name);
								mstring += getMString(mvalue);
//								console.log(mstring);
							});
							dstring += getDString(dvalue, mstring);
//							console.log(dstring);
							mstring = "";
						});
						cstring += getCString(cvalue, dstring, target_id, svalue);
//						console.log(cstring);
						dstring = "";
					});
					sstring += getSString(svalue, cstring, target_id);
//					console.log(sstring);
					cstring = "";
					if (target_id != 1) {
						$("#options").append(sstring);
					} else {
						$("#modifiers").append(sstring);
					}
					sstring = "";
				});
				setHeadersAndShow(target_id);
			});
			console.log("showOptions/" + target_id + " complete");
			callback();
		}


		function setHeadersAndShow(target_id) {
//			$.each($('.calc[data-type="select"]'), function () {
//				$(this).attr("size", ($(this).find("option").length));
//			});
			if (target_id != 1) {
				if ($("#options").html().length > 0) {
					$("#options").show();
				}
			} else {
				if ($("#modifiers").html().length > 0) {
					$("#modifiers").show();
				}
			}
		}

		$("body").delegate(".calc", "change", function () {
			reCalc();
		});
		function clearSelectManeuver() {
			clearSelectPower();
			$('#select_maneuver').hide().html("");
		}
		function clearSelectPower() {
			$('#select_power').hide().html("");
			clearSelectTarget();
		}
		function clearSelectTarget() {
			$('#select_target').hide().html("");
			clearSelectOptions();
		}
		function clearSelectOptions() {
			$('#display_cost').hide().html("");
			$('#options').hide().html("");
			$('#modifiers').hide().html("");
		}

		var vals = [];
		function reCalc() {
			setTimeout(function () {
				console.log("Running reCalc");
				vals.adder = 0;
				vals.advantage = 0;
				vals.limitation = 0;
				vals.penalty = 0;
				vals.endurance_reduction = 0;
				$.each($('.calc'), function () {
					vals[$(this).data('class')] += getVal($(this));
					console.log(vals);
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
				costs.active = vals.adder * (1 + (vals.advantage + vals.endurance_reduction));
				costs.real = costs.active / (1 + vals.limitation);
				costs.endurance_reduction_reduction = (vals.endurance_reduction > 0 ? 0 : Math.ceil(costs.active / 10));
				costs.penalty = (-1 * Math.ceil(costs.active / 10)) + vals.penalty;
//			console.log(costs);

				var display_cost = "";
				display_cost += "<div>Active Cost: " + Math.round(costs.active) + "</div>";
				display_cost += "<div>Endurance Cost: " + costs.endurance_reduction + "</div>";
				display_cost += "<div>Real Cost: " + Math.ceil(costs.real) + "</div>";
				display_cost += "<div>Penalty to Roll: " + costs.penalty + "</div>";
				$("#display_cost").html(display_cost).show();
			}, 100);
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

		function getMString(mvalue) {
			var mstring = "";
			var mclass = mvalue.class.name;
			var mtype = mvalue.type.name;
			var mid = mvalue.id;
			var mname = mvalue.name;
			mstring += "<div class='row row-calc calc-" + mtype + "' >";
			switch (mtype) {
				case "checkbox":
					$.each(mvalue.values, function (vindex, vvalue) {
						mstring += "<div class='col-xs-2'>";
						mstring += "<input type='checkbox'" + (vvalue.is_default ? " checked" : "") + " class='calc' value='" + vvalue.value + "' data-type='" + mtype + "' data-class='" + mclass + "' id='saveref_" + mid + "_" + vindex + "'>";
						mstring += "</div>";
						mstring += "<div class='col-xs-10'>";
						mstring += mname;
						mstring += "</div>";
					});
					break;
				case "input":
					$.each(mvalue.values, function (vindex, vvalue) {
						mstring += "<div class='col-xs-2'>";
						mstring += "<input type='text' maxlength='2' class='calc' data-value='" + vvalue.value + "' data-type='" + mtype + "' data-class='" + mclass + "' id='saveref_" + mid + "_" + vindex + "'>";
						mstring += "</div>";
						mstring += "<div class='col-xs-10'>";
						mstring += mname;
						mstring += "</div>";
					});
					break;
				case "select":
					mstring += "<div class='col-xs-12'>";
					mstring += "<select id='saveref_" + mid + "' class='calc' data-type='" + mtype + "' data-class='" + mclass + "'>";
					var sortable = [];
					$.each(mvalue.values, function (vindex, vvalue) {
						sortable.push([vvalue.value, vvalue.id, vvalue.name, vvalue.is_default]);
					});
					sortable.sort(function (a, b) {
						switch (mclass) {
							case "limitation":
								return parseFloat(b[0]) - parseFloat(a[0]);
								break;
							default:
								return parseFloat(a[0]) - parseFloat(b[0]);
								break;
						}
					});
					$.each(sortable, function (tindex, tvalue) {
						mstring += "<option id='saveref_" + mid + "_" + tvalue[1] + "'" + (tvalue[3] ? " selected" : "") + " value='" + tvalue[0] + "'>" + tvalue[2] + "</option>";
					});
					mstring += "</select>";
					mstring += "</div>";
					break;
				case "radio":
					break;
				case "multiplier":
					$.each(mvalue.values, function (vindex, vvalue) {
						mstring += "<div class='col-xs-2'>";
						mstring += "<input type='checkbox'" + (vvalue.is_default ? " checked" : "") + " class='calc' value='" + vvalue.value + "' data-type='" + mtype + "' data-class='" + mclass + "' id='saveref_" + mid + "_" + vindex + "'>";
						mstring += "</div>";
						mstring += "<div class='col-xs-10'>";
						mstring += mname;
						mstring += "</div>";
					});
					break;
				default:
					//An error has occured
					console.log("modifier type name: ~" + mtype + "~ id: ~" + mvalue.type.id + "~ does not exist.");
			}
			mstring += "</div>";
			return(mstring);
		}

//		function mnameComparator(switchvalue) {
//    return function(a, b) {
//        return a[prop] - b[prop];
//    }
//}


		function getDString(dvalue, mstring) {
			var dstring = "";
			if (mstring.length > 0) {
				dstring += "<div class='row wrapper'>";
				dstring += "  <div class='col-xs-4'>";
				dstring += "    <b>" + dvalue.name + "</b>";
				dstring += "  </div>";
				dstring += "  <div class='col-xs-8'>";
				dstring += mstring;
				dstring += "  </div>";
				dstring += "</div>";
			}
			return dstring;
		}

		function getCString(cvalue, dstring, target_id, svalue) {
			var cstring = "";
			if (dstring.length > 0) {
//							cstring += "    <div class='panel-group' id='accordion_" + target_id + "_" + svalue.id + "_" + cvalue.id + "'>";
//							cstring += "        <div class='panel panel-default'>";
//							cstring += "            <div class='panel-heading'>";
//							cstring += "                <div data-toggle='collapse' data-parent='#accordion_" + target_id + "_" + svalue.id + "_" + cvalue.id + "' href='#collapse_" + target_id + "_" + svalue.id + "_" + cvalue.id + "' class='panel-title'>";
//							cstring += "                    <span class='modifier-class-label'>" + cvalue.display_name + "</span>";
//							cstring += "                </div>";
//							cstring += "            </div>";
//							cstring += "            <div id='collapse_" + target_id + "_" + svalue.id + "_" + cvalue.id + "' class='panel-collapse collapse'>";
//							cstring += "                <div class='panel-body'>";
				cstring += dstring;
//							cstring += "                </div>";
//							cstring += "            </div>";
//							cstring += "        </div>";
//							cstring += "    </div>";
			}
			return cstring;
		}

		function getSString(svalue, cstring, target_id) {
			var sstring = "";
			if (cstring.length > 0) {
				sstring += "    <div class='panel-group' id='accordion_" + target_id + "_" + svalue.id + "'>";
				sstring += "        <div class='panel panel-default'>";
				sstring += "            <div class='panel-heading'>";
				sstring += "                <div data-toggle='collapse' data-parent='#accordion_" + target_id + "_" + svalue.id + "' href='#collapse_" + target_id + "_" + svalue.id + "' class='panel-title'>";
				sstring += "                    <span class='modifier-class-label'>" + svalue.display_name + "</span>";
				sstring += "                </div>";
				sstring += "            </div>";
				sstring += "            <div id='collapse_" + target_id + "_" + svalue.id + "' class='panel-collapse collapse'>";
				sstring += "                <div class='panel-body'>";
				sstring += cstring;
				sstring += "                </div>";
				sstring += "            </div>";
				sstring += "        </div>";
				sstring += "    </div>";
			}
			return sstring;
		}

		function checkLocklevel(lvl) {
			if (parseInt(lvl) && parseInt(locklevel) && parseInt(locklevel) >= parseInt(lvl)) {
				return true;
			} else {
				return false;
			}


		}

		function spReplace(str) {
			return str.replace(' ', '_');
		}

	});


</script>
