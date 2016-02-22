<?php

foreach ($options as $cname => $class) { //Adders
	foreach ($class as $dname => $display) { //Objects/People
			$optstr = "";
			$optstr .= "<div class='panel-group' id='accordion_$dname'>";
			$optstr .= "<div class='panel panel-default'>";
			$optstr .= "<div class='panel-heading'>";
			$optstr .= "<h4 class='panel-title'>";
			$optstr .= "<a data-toggle='collapse' data-parent='#accordion_$dname' href='#collapse_$dname'>$dname</a>";
			$optstr .= "</h4>";
			$optstr .= "</div>";
			$optstr .= "<div id='collapse_$dname' class='panel-collapse collapse row-calc'>";
			$optstr .= "<div class='panel-body'>";
		foreach ($display as $mname => $modifier) { //Base Distance
			$modifier_type = $modifier['type']['name'];
			$optstr .= "<div id='collapse_$mname' class='row row-calc'>";

			switch ($modifier_type) {
				case "checkbox":
					foreach ($modifier['values'] as $mvkey => $modifier_value) {
						$optstr .= "<div class='col-xs-1'>";
						$optstr .= "<input type='checkbox' class='calc' value='" . $modifier_value['value'] . "' data-type='" . $modifier_type . "' data-class='" . $modifier['class']['name'] . "' id='saveref_" . $modifier_value['id'] . "_" . $mvkey . "'>";
						$optstr .= "</div>";
						$optstr .= "<div class='col-xs-11'>";
						$optstr .= $modifier_value['name'];
						$optstr .= "</div>";
					}
					break;
				case "input":
					foreach ($modifier['values'] as $mvkey => $modifier_value) {
						$optstr .= "<div class='col-xs-6'>";
						$optstr .= $modifier_value['name'];
						$optstr .= "</div>";
						$optstr .= "<div class='col-xs-2'>";
						$optstr .= "<input type='text' maxlength='4' size='4' class='calc' data-value='" . $modifier_value['value'] . "' data-type='" . $modifier_type . "' data-class='" . $modifier['class']['name'] . "' id='saveref_" . $modifier_value['id'] . "_" . $mvkey . "'>";
						$optstr .= "</div>";
					}
					break;
				case "select":
					$optstr .= "<div class='col-xs-12'>";
					$optstr .= "<select id='saveref_" . $modifier['id'] . "' class='calc' data-type='" . $modifier_type . "' data-class='" . $modifier['class']['name'] . "'>";
					$optstr .= "<option selected value='0'>" . $modifier['name'] . "</option>";
					foreach ($modifier['values'] as $mvkey => $modifier_value) {
						$optstr .= "<option id='saveref_" . $modifier_value['id'] . "_" . $mvkey . "' value='" . $modifier_value['value'] . "'>" . $modifier_value['name'] . "</option>";
					}
					$optstr .= "</select>";
					$optstr .= "</div>";
					break;
				case "radio":
					break;
				case "multiplier":
					foreach ($modifier['values'] as $mvkey => $modifier_value) {
						$optstr .= "<div class='col-xs-1'>";
						$optstr .= "<input type='checkbox' class='calc' value='" . $modifier_value['value'] . "' data-type='" . $modifier_type . "' data-class='" . $modifier['class']['name'] . "' id='saveref_" . $modifier_value['id'] . "_" . $mvkey . "'>";
						$optstr .= "</div>";
						$optstr .= "<div class='col-xs-11'>";
						$optstr .= $modifier_value['name'];
						$optstr .= "</div>";
					}
					break;
				default:
					//An error has occured
					debug("modifier type name: ~" . $modifier_type . "~ id: ~" . $modifier['type']['id'] . "~ does not exist.");
			}
			$optstr .= "</div>";
		}
			$optstr .= "</div>";
			$optstr .= "</div>";
			$optstr .= "</div>";
			$optstr .= "</div>";
			echo($optstr);
	}
}
//
//if ($optstr.length > 0) {
//dispstr .= "<div class='row wrapper'><div class='col-xs-12'>" . "<h5>" . dindex . "</h5>" . $optstr . "</div></div>";
//$optstr .= "";
//}
//});
//if (dispstr.length > 0) {
//appstr .= "<div class='row wrapper'><div class='col-xs-12'>" . "<h3>" . cindex . "</h3>" . dispstr . "</div></div>";
//dispstr = "";
//if (power) {
//$("#options").append(appstr);
//} else {
////						$("#modifiers_" . mvalue.class.name).append($optstr);
//$("#modifiers").append(appstr);
//}
//appstr = "";
//}
//});
//setHeadersAndShow(power);
//});
//callback();
//}
//

?>

<?php

//debug($maneuvers);
//debug($powers);
debug($options);
?>


