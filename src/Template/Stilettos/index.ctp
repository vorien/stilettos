<style>
	#select_power{
		display: none;
	}
</style>


<div>Lock Level: <input id='locklevel' type='text' value=''></div>
<div id="selections">
	<div class="wrapper-select"><select id="select_maneuver">
			<option disabled selected value="0">Select a Maneuver</option>
			<?php foreach ($maneuvers as $maneuver) { ?>
				<option name='<?= $maneuver['name'] ?>' value='<?= $maneuver['id'] ?>'><?= $maneuver['name'] ?></option>
			<?php } ?>
		</select></div>
	<div class="wrapper-select"><select id="select_power"></select></div>
</div>

<script>



	$(function () {
		$('#select_maneuver').attr("size", <?= count($maneuvers) + 1 ?>);

		$("#select_maneuver").change(function () {
			$('#select_power').hide();
			$('#select_power').html("");
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
						showModifiers(pwrs[0].ability_id);
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
			var ability_id = $(this).val();
			showModifiers(ability_id);
		});

	});


	function showModifiers(ability_id) {
		console.log(ability_id);

	}
	
	function showOptions(option, callback) {
		console.log("active_power", active_power);

		var mod = null;
		if (option == "power") {
			if (active_power != '') {
				mod = mods['power'][active_power];
			} else {
				mod = mods['power'][active_grid['power']];
			}
		} else {
			mod = mods[option];
		}
		$.each(mod, function (index, value) {
//			console.log("mod->index", index, "mod->value", value);
			$.each(mod[index], function (mindex, mvalue) {
				var optstring = "";
//				console.log("mod[index]->mindex", mindex, "mod[index]->mvalue", mvalue);
				switch (index) {
					case "select":
						optstring += "<h3>" + mindex + "</h3><select id='options_" + mindex + "' size=" + (Object.keys(mvalue).length) + ">";
						var selectedindex = getClosestIndex(mvalue, locklevel);
						$.each(mvalue, function (oindex, ovalue) {
							if (ovalue >= selectedindex[1]) {
								optstring += "<option value='" + ovalue + "'" + (oindex == selectedindex[0] ? ' selected' : '') + ">" + oindex + "</option>";
							}
						});
						optstring += "</select>";
						$("#" + option).append(optstring);
						break;
					case "checkbox":
						optstring += "<h3>" + mindex + "</h3>";
						$.each(mvalue, function (oindex, ovalue) {
							optstring += "<input type='checkbox' id='options_" + oindex + "' value='" + ovalue + "'" + (ovalue <= locklevel ? ' checked' : '') + ">"
							optstring += "<b>" + oindex + ": </b>";
							optstring += "<br>";
						});
						$("#" + option).append(optstring);
						break;
					default:
						alert("invalid mod index: " + index);
						break
				}
			});
//			console.log(option, index);
		});

//		console.log(mod);

		callback();
	}


</script>
<?php
//debug($maneuvers);
?>
