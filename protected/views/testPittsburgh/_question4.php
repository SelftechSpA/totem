            <div class="row nomargin">
                <label class="span7"><h4><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></h4></label>
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'normal',
                    'size' => 'small',
                    'buttonType' => 'button',
                    'toggle' => 'radio',
                    'htmlOptions' => array('data-toggle-name'=>'PittsburghTest['.$question.']', 
                                           'class'=>'span12'),
                    'buttons'=>array(
                        array('label'=>'Muy buena', 'htmlOptions' => array('value'=>'0')),
                        array('label'=>'Bastante buena', 'htmlOptions' => array('value'=>'1')),
                        array('label'=>'Bastante mala', 'htmlOptions' => array('value'=>'2')),
                        array('label'=>'Muy mala', 'htmlOptions' => array('value'=>'3')),
                    ),
                )); ?>
                <input type="hidden" name="PittsburghTest[<?php echo $question; ?>]" value="<?php echo $model[$question]; ?>" />
            </div>
                