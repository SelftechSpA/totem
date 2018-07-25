            <div class="row nomargin">
                <label class="span3"><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></label>
                <?php echo $form->error($model, $question); ?>
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'normal',
                    'size' => 'small',
                    'buttonType' => 'button',
                    'toggle' => 'radio',
                    'htmlOptions' => array('data-toggle-name'=>'PittsburghTest['.$question.']', 
                                           'class'=>'span8 pull-right'),
                    'buttons'=>array(
                        array('label'=>'Ninguna en el último mes', 'htmlOptions' => array('value'=>'0')),
                        array('label'=>'Menos de 1 por semana', 'htmlOptions' => array('value'=>'1')),
                        array('label'=>'1-2 por semana', 'htmlOptions' => array('value'=>'2')),
                        array('label'=>'3 o más por semana', 'htmlOptions' => array('value'=>'3')),
                    ),
                )); ?>
                <input type="hidden" name="PittsburghTest[<?php echo $question; ?>]" id="PittsburghTest_<?php echo $question; ?>" value="<?php echo $model[$question]; ?>" />
                <div class="span8 pull-right"><?php echo $form->error($model, $question); ?></div>
            </div>
                