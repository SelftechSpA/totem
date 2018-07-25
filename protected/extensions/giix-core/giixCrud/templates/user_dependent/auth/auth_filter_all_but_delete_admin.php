public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view', 'minicreate', 'create', 'update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin', 'delete'),
				'users'=>Yii::app()->getModule('user')->getAdmins(),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}
