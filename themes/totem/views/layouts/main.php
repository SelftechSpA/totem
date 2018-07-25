<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>

	<?php Yii::app()->bootstrap->init(); ?>
    
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/magic-bootstrap-min.css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/totem.min.css" />
    <!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/less.js" type="text/javascript"></script> -->
    <?php Yii::app()->clientScript->registerScriptFile('js/jquery.cookie.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile('js/main.js'); ?>

</head>

<body class="totem">
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=121931851310445";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->

<div class="container" id="page">

<?php 
    function startsWith($haystack, $needle)
    {
        return !strncmp($haystack, $needle, strlen($needle));
    }
    
    function isItemActive($route,$id)
    {
        return startsWith($route, $id);
        //explode the route ($route format example: /site/contact)
        //$menu = explode("/",$route);
        
        //compare the first array element to the $id passed
        //return $menu[0] == $id ? true:false;
    }

    $isGuest = Yii::app()->user->isGuest;
    $isAdmin = Yii::app()->getModule('user')->isAdmin();
    $isSuperAdmin = (isset(Yii::app()->user->username) ? Yii::app()->user->username=='admin' : false);
    $isUser = !$isGuest && !$isAdmin;
    
    $menuClass = '';
    if (isItemActive($this->route, 'site/index'))
        $menuClass = 'menu-home';
    if (isItemActive($this->route, 'site/about'))
        $menuClass = 'menu-about';
    if (isItemActive($this->route, 'site/test'))
        $menuClass = 'menu-test';
    if (isItemActive($this->route, 'test'))
        $menuClass = 'menu-test';
    if (isItemActive($this->route, 'user'))
        $menuClass = 'menu-login';      
    
    ?>
    
    <div class="menu row center <?php echo $menuClass; ?>">
        <img class="span5 logo" src="images/logo.png" alt="HSS">
        <?php
            $this->widget('bootstrap.widgets.TbMenu',array(
                'items'=>array(
                    /*array('label'=>Yii::t('app', 'Home'), 'url'=>array('/totem/index'), 'linkOptions'=>array('class'=>'span2 home')),
                    array('label'=>Yii::t('app', 'About'), 'url'=>array('/site/about'), 'linkOptions'=>array('class'=>'span2 about')),
                    array('label'=>Yii::t('app', 'Test'), 'url'=>array('/site/test'), 'linkOptions'=>array('class'=>'span2 test'), 'visible'=>!$isAdmin),
                    array('label'=>Yii::t('app', 'Resultados'), 'url'=>array('/results'), 'linkOptions'=>array('class'=>'span2 test'), 'visible'=>$isAdmin),
                    array('label'=>Yii::t('app', 'Empresas'), 'url'=>array('/company/admin'), 'linkOptions'=>array('class'=>'span2 home'), 'visible'=>$isAdmin),
                    array('label'=>Yii::t('app', 'Login'), 'url'=>array('/user/login'), 'linkOptions'=>array('class'=>'span2 login'), 'visible'=>$isGuest),
                    array('label'=>Yii::t('app', 'Mi cuenta'), 'url'=>array('/user/profile'), 'linkOptions'=>array('class'=>'span2 profile'), 'visible'=>!$isGuest),*/
                    array('label'=>Yii::t('app', 'Salir'), 'url'=>array('/totem/index'), 'linkOptions'=>array('class'=>'span2 exit'), 'visible'=>!isItemActive($this->route, 'totem/index')),
                ),
                'encodeLabel'=>false,
                'htmlOptions'=>array('class'=>''),
            ));
        ?>
    </div>

	<?php /*if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/ ?>

	<div class="content">
	    <div id="user-bar">
	    <?php if (!$isGuest) 
	              echo 'Usuario: '.Yii::app()->user->name . '&nbsp;' . CHtml::link(Yii::t('app', 'Cerrar sesión'), array('/user/logout')); ?>
	    </div>
        <?php echo $content; ?>
    </div>

	<div class="clear"></div>
    
    <div id="footer" class="row center">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
