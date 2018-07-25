<?php

class TableController extends GxController {

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
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Table'),
		));
	}

	public function actionCreate() {
		$model = new Table;

		$this->performAjaxValidation($model, 'table-form');

		if (isset($_POST['Table'])) {
			$model->setAttributes($_POST['Table']);
            $model->user_id = Yii::app()->getModule('user')->user()->id;
            
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Table');

		$this->performAjaxValidation($model, 'table-form');

		if (isset($_POST['Table'])) {
			$model->setAttributes($_POST['Table']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Table')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$criteria = new CDbCriteria;
		$criteria->compare('user_id', Yii::app()->getModule('user')->user()->id);    
		$dataProvider = new CActiveDataProvider('Table', array(
			'criteria' => $criteria,
		));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Table('search');
		$model->unsetAttributes();

		if (isset($_GET['Table']))
			$model->setAttributes($_GET['Table']);
            
        //$model->user_id = Yii::app()->getModule('user')->user()->id;
            
		$this->render('admin', array(
			'model' => $model,
		));
	}

}