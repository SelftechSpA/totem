<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<div class="row span12 center">
    <div class="span7 center">
        <div class="video-wrapper">
            <iframe width="780" height="439" src="//www.youtube.com/embed/<?php echo $code;?>?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="row barra-inferior menu-home">
    <?php echo CHtml::link('', array('/site/test'), array('class'=>'span6')); ?>
</div>
