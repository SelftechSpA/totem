            <div class="row nomargin">
                <label class="span3"><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></label>
                <div class="span7 pull-left">
                  <?php
                  //echo $form->labelEx($model, $question);
                  echo '&nbsp;&nbsp;&nbsp;';
                  $this->widget('bootstrap.widgets.TbTimePicker',
                      array(
                          'model'=>$model,
                          'attribute'=>$question,
                          'options' => array(
                              'defaultTime' => '0:00',
                              'noAppend' => true, // mandatory
                              'disableFocus' => true, // mandatory
                              'showMeridian' => false, // irrelevant
                              'showInputs' => false,
                              'disableFocus' => true
                          ),
                          'htmlOptions'=>array('style'=>'margin-left: 250px; width: 240px; height: 50px; font-size: 20px;'),
                      )
                  );
                  echo $form->error($model, $question);
                  ?>

                </div>
            </div>
