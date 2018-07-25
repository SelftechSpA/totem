<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
    
	<link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.less" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/less.js" type="text/javascript"></script>
</head>

<body>


<div class="container" id="page" style="position: relative;">
    
	<div id="header">
		<div id="logo"><?php echo Yii::app()->name; ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">
        <?php 
	    $isGuest = Yii::app()->user->isGuest;
        $isAdmin = Yii::app()->getModule('user')->isAdmin();
        $isUser = !$isGuest && !$isAdmin;

		$this->widget('application.extensions.mbmenu.MbMenu', array(
			'items'=>array(
				array('label'=>Yii::t('app', 'Home'), 'url'=>array('/site/index')),
                
                array('label'=>Yii::app()->getModule('user')->t("Login"), 'url'=>Yii::app()->getModule('user')->loginUrl, 'visible'=>Yii::app()->user->isGuest),
                //array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                //array('label'=>Yii::app()->getModule('user')->t("Profile"), 'url'=>Yii::app()->getModule('user')->profileUrl, 'visible'=>!Yii::app()->user->isGuest),

                /* User-only  */
                //array('label'=>Yii::t('app', 'Tables'), 'url'=>array('/table/index'), 'visible'=>!Yii::app()->user->isGuest && !Yii::app()->getModule('user')->isAdmin()),

                /* Admin-only */
                array('label'=>Yii::t('app', 'Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                //array('label'=>'Permisos', 'url'=>array('/rights'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                
				//array('label'=>Yii::t('app', 'Contact'), 'url'=>array('/site/contact')),

                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),                
            ),
		)); ?>
	</div><!-- mainmenu -->
    
	<?php /*if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/ ?>
    
	<?php echo $content; ?>

	<div class="clear"></div>
    
    <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Devonix.&nbsp;
		Todos los derechos reservados.&nbsp;
		<?php /*echo Yii::powered();*/ ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
