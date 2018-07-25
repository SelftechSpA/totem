<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    protected function beforeAction($action){
        if (Yii::app()->request->getParam('totem','0') == '1' || $this->isItemActive($this->route, 'totem') || isset(Yii::app()->session['totem'])){
            Yii::app()->session['totem'] = 1;
            Yii::app()->theme = 'totem';
        }

        $company = '';
        Yii::app()->params['company'] = $company;

        return true;
    }
    
    function startsWith($haystack, $needle)
    {
        return !strncmp($haystack, $needle, strlen($needle));
    }
    
    function isItemActive($route,$id)
    {
        return $this->startsWith($route, $id);
        //explode the route ($route format example: /site/contact)
        //$menu = explode("/",$route);
        
        //compare the first array element to the $id passed
        //return $menu[0] == $id ? true:false;
    }    
}