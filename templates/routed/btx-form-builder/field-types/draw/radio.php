<?php
	/**
	 * @global array $default
	 * @global array $field_data
	 * @global array $form
	 * @global array $settings
	 * @global bool $error
	 * @global int $count
	 * @global string $field_name
	 */
?>
<fieldset class="form_builder_fieldset form_builder_fieldset_radios">
	<?php
		if ($field_data["label"]) {
	?>
	<legend class="form_builder_legend">
		<?php
			echo htmlspecialchars($field_data["label"]);

			if ($field_data["required"]) {
		?>
		<span class="form_builder_required_star">*</span>
		<?php
			}
		?>
	</legend>

	<?php
		}

		foreach ($field_data["list"] as $item) {
	?>
	<div class="form_builder_item">
		<input class="form_builder_radio" type="radio" id="form_builder_field_<?=$count?>" name="<?=$field_name?>" value="<?=htmlspecialchars($item["value"])?>" <?php if ($default == $item["value"] || ($default === false && $item["selected"])) { ?>checked="checked" <?php } ?> data-price="<?=floatval(str_replace(array('$', ','), '', $item["price"]))?>" />
		<span class="form_builder_radio_indicator"></span>
		<label class="form_builder_radio_label" for="form_builder_field_<?=$count?>"><?=htmlspecialchars($item["description"])?></label>
	</div>
	<?php
			// If this is a paid form, we watch the element for changes to calculate the total
			if ($form["paid"]) {
				$radio_watch[] = "form_builder_field_$count";
			}

			$count++;
		}
	?>
</fieldset>
