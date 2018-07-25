            <div class="row nomargin">
                <label class="span4"><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></label>
                      <div class="span6 pull-right">
                          <span>Horas</span>&nbsp;
                          <input type="text" class="spinEditHoras" value="<?php echo substr($model[$question],0,2); ?>">
                          &nbsp;&nbsp;&nbsp;
                          <span>Minutos</span>&nbsp;
                          <input type="text" class="spinEditMinutos" value="<?php echo substr($model[$question],-2); ?>">                     
                                               
                        <input type="hidden" class="hiddenField" name="PittsburghTest[<?php echo $question; ?>]" value="<?php echo $model[$question]; ?>" />
                     </div>
            </div>
                