<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>

	<?php Yii::app()->bootstrap->init(); ?>
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/magic-bootstrap-min.css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/site.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/nouislider.css" />
    <!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/less.js" type="text/javascript"></script> -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/noUiSlider/nouislider.js" type="text/javascript"></script> 
    <?php Yii::app()->clientScript->registerScriptFile('js/jquery.cookie.js'); ?>


</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=121931851310445";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
            $company = Company::getCompany();
            if(!is_null($company)){
                echo CHtml::image($company->getFileUrl('normal'), $company->name, array('class'=>'company-logo'));
            }
        ?>
        <?php
        
            $this->widget('bootstrap.widgets.TbMenu',array(
                'items'=>array(
                    //array('label'=>Yii::t('app', 'Home'), 'url'=>array('/site/index'), 'linkOptions'=>array('class'=>'home')),
                    //array('label'=>Yii::t('app', 'About'), 'url'=>array('/site/about'), 'linkOptions'=>array('class'=>'about')),
                    array('label'=>Yii::t('app', 'TEST'), 'url'=>array('/site/test'), 'linkOptions'=>array('class'=>'test'),'visible'=>!$isGuest),
                    array('label'=>Yii::t('app', 'RESULTADOS'), 'url'=>array('/results'), 'linkOptions'=>array('class'=>'test'), 'visible'=>$isAdmin),
                    //array('label'=>Yii::t('app', 'Empresas'), 'url'=>array('/company/admin'), 'linkOptions'=>array('class'=>'home'), 'visible'=>$isAdmin),
                    array('label'=>Yii::t('app', 'LOGIN'), 'url'=>array('/user/login'), 'linkOptions'=>array('class'=>'login'), 'visible'=>$isGuest),
                    array('label'=>Yii::t('app', 'MI CUENTA'), 'url'=>array('/user/profile'), 'linkOptions'=>array('class'=>'profile'), 'visible'=>!$isGuest),
                    //array('label'=>, 'url'=>, 'linkOptions'=>array('class'=>'span2 logout'), 'visible'=>!$isGuest),
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
        <div class="botonera pull-left">
            <?php echo CHtml::link(CHtml::image('images/bt_contacto.png') . 'contacto', array('/site/contact')); ?>
		</div>
        <div class="botonera pull-right">
            <a href="https://www.facebook.com/selfishnesspowernap" target="_blank" title="Facebook"><img src="images/bt_facebook.png" alt="Facebook"></a>
            <a href="https://www.youtube.com/channel/UC8YzY5Nwh_jTRIC0A0QuXDA/videos?view_as=public" target="_blank" title="Youtube"><img src="images/bt_youtube.png" alt="Youtube"></a>
        </div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
