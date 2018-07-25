            <div class="row nomargin">
                <div class="span1" style="margin-right: 10px;"><?php echo CHtml::image("images/questions/ico_epworth_$question.png"); ?></div>
                <label class="span6 nomargin" style="margin-top: 3px;"><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></label>
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'normal',
                    'size' => 'small',
                    'buttonType' => 'button',
                    'toggle' => 'radio',
                    'htmlOptions' => array('data-toggle-name'=>'EpworthTest['.$question.']', 
                                           'class'=>'span8 offset1'),
                    'buttons'=>array(
                        array('label'=>'Ninguna posibilidad', 'htmlOptions' => array('value'=>'0')),
                        array('label'=>'Pocas posibilidades', 'htmlOptions' => array('value'=>'1')),
                        array('label'=>'Es posible que dormite', 'htmlOptions' => array('value'=>'2')),
                        array('label'=>'Grandes posibilidades', 'htmlOptions' => array('value'=>'3')),
                    ),
                )); ?>
                <input type="hidden" name="EpworthTest[<?php echo $question; ?>]" value="<?php echo $model[$question]; ?>" />
            </div>
                