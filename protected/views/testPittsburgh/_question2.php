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
                        array('label'=>'Ninguna en el último mes', 'htmlOptions' => array('value'=>'0')),
                        array('label'=>'Menos de 1 por semana', 'htmlOptions' => array('value'=>'1')),
                        array('label'=>'1-2 por semana', 'htmlOptions' => array('value'=>'2')),
                        array('label'=>'3 o más por semana', 'htmlOptions' => array('value'=>'3')),
                    ),
                )); ?>
                <input type="hidden" name="PittsburghTest[<?php echo $question; ?>]" value="<?php echo $model[$question]; ?>" />
            </div>
                