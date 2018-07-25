<?php

class QuestionTypeOptionController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view', 'minicreate', 'create', 'update', 'admin', 'delete'),
				'users'=>Yii::app()->getModule('user')->getAdmins(),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'QuestionTypeOption'),
		));
	}

	public function actionCreate() {
		$model = new QuestionTypeOption;


		if (isset($_POST['QuestionTypeOption'])) {
			$model->setAttributes($_POST['QuestionTypeOption']);

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
		$model = $this->loadModel($id, 'QuestionTypeOption');


		if (isset($_POST['QuestionTypeOption'])) {
			$model->setAttributes($_POST['QuestionTypeOption']);

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
			$this->loadModel($id, 'QuestionTypeOption')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('QuestionTypeOption');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new QuestionTypeOption('search');
		$model->unsetAttributes();

		if (isset($_GET['QuestionTypeOption']))
			$model->setAttributes($_GET['QuestionTypeOption']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}