            <div class="row nomargin">
                <label class="span4"><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></label>
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'normal',
                    'size' => 'small',
                    'buttonType' => 'button',
                    'toggle' => 'radio',
                    'htmlOptions' => array('data-toggle-name'=>'MAPTest['.$question.']', 
                                           'class'=>'span6 pull-right'),
                    'buttons'=>array(
                        array('label'=>'Nunca', 'htmlOptions' => array('value'=>'0')),
                        array('label'=>'Casi nunca', 'htmlOptions' => array('value'=>'1')),
                        array('label'=>'A veces', 'htmlOptions' => array('value'=>'2')),
                        array('label'=>'Con frecuencia', 'htmlOptions' => array('value'=>'3')),
                        array('label'=>'Siempre', 'htmlOptions' => array('value'=>'4')),
                        //array('label'=>'No sabe', 'htmlOptions' => array('value'=>'5')),
                    ),
                )); ?>
                <input type="hidden" name="MAPTest[<?php echo $question; ?>]" id="MAPTest_<?php echo $question; ?>" value="<?php echo $model[$question]; ?>" />
                <div class="span6 pull-right"><?php echo $form->error($model, $question); ?></div>
            </div>
                