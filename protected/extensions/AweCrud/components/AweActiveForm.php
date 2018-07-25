<?php

/**
 * AweActiveForm class file.
 *
 * @author Ricardo Obregón <ricardo@obregon.co>
 * @link http://awecrud.obregon.co/
 * @copyright Copyright &copy; 2012 Ricardo Obregón
 * @license http://awecrud.obregon.org/license/ New BSD License
 */

Yii::import('bootstrap.widgets.TbActiveForm');
/**
 * AweActiveForm provides forms with additional features.
 *
 * @author Ricardo Obregón <ricardo@obregon.co>
 * @package AweCrud.components
 */
class AweActiveForm extends TbActiveForm
{
    /*public function pictureRow($model, $name, $suffix){
        //echo '<div class="row">';
        echo $this->labelEx($model, $name);
            
        if ($this->owner->getAction()->getId() == 'update' && strlen($model->pictureBehavior->getFileURLWithSuffix($suffix)) > 0) {
            echo CHtml::image($model->pictureBehavior->getFileURLWithSuffix($suffix));
            echo '&nbsp;';
            echo CHtml::checkBox($model->pictureBehavior->getDeleteInputName()).' '.Yii::t('app', 'Delete picture');
        }
            
        echo '<br/>';
        echo $this->fileField($model, $name);
        echo $this->error($model, $name);
        //echo '</div><!-- row -->';  
    }*/

    public function pictureRow($model, $name, $suffix){
        $behaviorName = $name . 'Behavior';
        //echo '<div class="row">';
        echo $this->labelEx($model, $name);
            
        if ($this->owner->getAction()->getId() == 'update' && strlen($model->$behaviorName->getFileURLWithSuffix($suffix)) > 0) {
            echo CHtml::image($model->$behaviorName->getFileURLWithSuffix($suffix));
            echo '&nbsp;';
            echo CHtml::checkBox($model->$behaviorName->getDeleteInputName()).' '.Yii::t('app', 'Delete picture');
        }
            
        echo '<br/>';
        echo $this->fileField($model, $name);
        echo $this->error($model, $name);
        //echo '</div><!-- row -->';  
    }
    
    public function fileRow($model, $name){
        $behaviorName = $name . 'Behavior';
        //echo '<div class="row">';
        echo $this->labelEx($model, $name);
        if ($this->owner->getAction()->getId() == 'update' && strlen($model->$behaviorName->getFileURL()) > 0) {
            echo CHtml::link('Download', $model->$behaviorName->getFileURL());
            echo '&nbsp;';
            echo CHtml::checkBox($model->$behaviorName->getDeleteInputName()).' '.Yii::t('app', 'Delete file');
        }
            
        echo '<br/>';
        echo $this->fileField($model, $name);
        echo $this->error($model, $name);
        //echo '</div><!-- row -->';  
    }
}