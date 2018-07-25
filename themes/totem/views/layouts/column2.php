<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row span12 center">
    <div class="span8">
        <div id="content" class="row">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div id="sidebar" class="span3 pull-right popover bottom" style="display: block; position: relative; margin-right: -15px; margin-top: 31px;">
        <div class="popover-title"><?php echo Yii::t('app', 'Operations'); ?></div>
        <div class="popover-content">
        <?php
            /*$this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>Yii::t('app', 'Operations'),
                'htmlOptions'=>array('class'=>'portlet'),
            ));*/
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            /*$this->endWidget();*/
        ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>