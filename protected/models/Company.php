<?php

Yii::import('application.models._base.BaseCompany');

class Company extends BaseCompany
{
    public $logo = null;

    public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function relations()
    {
        return array(
                'profiles'=>array(self::HAS_MANY, 'Profile', 'company_id'),
        );
    }

    public function rules()
    {
        return array_merge(parent::rules(), array(
                array('logo', 'file', 'allowEmpty' => true, 'types'=>'jpg, jpeg, gif, png', 'maxSize'=>1024 * 1024 * 8, 'tooLarge'=>'The file was larger than 8 MB. Please upload a smaller file.', 'on'=>'insert', ),
                array('logo', 'file', 'allowEmpty' => true, 'types'=>'jpg, jpeg, gif, png', 'maxSize'=>1024 * 1024 * 8, 'tooLarge'=>'The file was larger than 8 MB. Please upload a smaller file.', 'on'=>'update', ),
            )
        );
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'logo' => Yii::t('app', 'Logo'),
        ));
    }

    public function behaviors() {
        return array(
            'logoBehavior' => array(
                'class' => 'ImageARBehavior',
                'attribute' => 'logo',
                'extension' => 'png, gif, jpg, jpeg',
                'prefix' => 'company_logo_',
                'relativeWebRootFolder' => 'uploads',
                'forceExt' => 'png',
                'formats' => array(
                    'normal' => array(
                        'suffix' => '_normal',
                        'process' => array(
                            'resize' => array(200, 147),
                            'quality' => array(90),
                        ),
                    ),
                    'thumb' => array(
                        'suffix' => '_thumb',
                        'process' => array(
                            'resize' => array(80, 80),
                            'quality' => array(90),
                        ),
                    ),
                ),
                'defaultName' => 'default',
            ),
        );
    }

    public static function getCompany(){
        if(isset($_COOKIE["hss_company"])){
            $company_id = $_COOKIE["hss_company"];
            if(is_numeric($company_id)){
                $company = Company::model()->findByPk($company_id);
                return $company;
            }
        }
        return null;
    }
}