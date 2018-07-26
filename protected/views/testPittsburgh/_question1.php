            <div class="row nomargin">
                <label class="span5"><h4><?php $labels = $model->attributeLabels();
                                           echo $labels[$question]; ?></h4></label>
                      <div class="span4 pull-right">
                          <span>HORAS</span>&nbsp;
                          <input type="text" class="btn spinEditHoras" value="<?php echo substr($model[$question],0,2); ?>">
                          &nbsp;&nbsp;&nbsp;
                          <span>MINUTOS</span>&nbsp;
                          <input type="text" class="btn spinEditMinutos" value="<?php echo substr($model[$question],-2); ?>">                     
                                               
                        <input type="hidden" class="hiddenField" name="PittsburghTest[<?php echo $question; ?>]" value="<?php echo $model[$question]; ?>" />
                     </div>
            </div>
                