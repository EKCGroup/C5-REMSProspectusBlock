<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="form-group">
    <div class="block-message info">
        <legend>REMS Course Information</legend>
        <p>Add the PRPI code for the course you wish to display.</p>
    </div>
    <div class="form-group">
        <label class="control-label"><?php echo $form->label('CourseCode', t('Course Code')) ?></label>
        <?php echo $form->text('CourseCode', $prpi_code) ?>
    </div>
    <div class="form-group">
        <label class="control-label"><?php echo $form->label('CourseTemplate', t('Course Template'));?></label> <br>
	<select class="form-control" name="CourseTemplate">
            <option value="fefull"<?php if ($CourseTemplate == 'fefull') { ?> selected <?php   } ?> > <?php  echo t('Further Education Full Time')?></option>
            <option value="fepart"<?php if ($CourseTemplate == 'fepart') { ?> selected <?php   } ?> > <?php  echo t('Further Education Part Time')?></option>
            <option value="he"<?php if ($CourseTemplate == 'he') { ?> selected <?php   } ?> > <?php  echo t('Higher Education')?></option>
            <option value="apprenticeship"<?php if ($CourseTemplate == 'apprenticeship') { ?> selected <?php   } ?> > <?php  echo t('Apprenticeship')?></option>
	</select>
    </div>
</div>
