            <div class="row nomargin">
                <label class=""><h4><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></h4></label>
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'normal',
                    'size' => 'small',
                    'buttonType' => 'button',
                    'toggle' => 'radio',
                    'htmlOptions' => array('data-toggle-name'=>'MAPTest['.$question.']', 
                                           'class'=>'span13','style'=>'margin:0 auto;float:none !important;display:table !important;'),
                    'buttons'=>array(
                        array('label'=>'Nunca', 'htmlOptions' => array('value'=>'0')),
                        array('label'=>'Casi nunca', 'htmlOptions' => array('value'=>'1')),
                        array('label'=>'A veces', 'htmlOptions' => array('value'=>'2')),
                        array('label'=>'Con frecuencia', 'htmlOptions' => array('value'=>'3')),
                        array('label'=>'Siempre', 'htmlOptions' => array('value'=>'4')),
                        //array('label'=>'No sabe', 'htmlOptions' => array('value'=>'5')),
                    ),
                )); ?>
                <input type="hidden" name="MAPTest[<?php echo $question; ?>]" value="<?php echo $model[$question]; ?>" />
            </div>
                