<?php echo validation_errors(); ?>
<?php echo form_open('world/store'); ?>
<?php echo form_input(array('name'=>'country','id'=>'country','maxlength'=>100,'placeholder'=>'Country','value'=>set_value('country'))); ?>
<?php echo form_input(array('name'=>'city','id'=>'city','maxlength'=>200,'placeholder'=>'City','value'=>set_value('city'))); ?>
<?php echo form_submit('save', 'Add to world'); ?>
</form>
