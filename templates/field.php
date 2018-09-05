<?php
/** @var \Stripe_Payments_Custom_Fields\Field_Model $field */
?>
<div class="spcf_age_input_container">
    <input id="<?= $field->id; ?>"
           class="asp_product_custom_field_input"
           type="text" name="<?= $field->id; ?>" placeholder="<?= $field->placeholder; ?>">
    <label for="spcf-age" class="asp_product_custom_field_label"><?= $field->label; ?></label>
</div>
