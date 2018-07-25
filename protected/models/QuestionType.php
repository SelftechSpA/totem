<?php

Yii::import('application.models._base.BaseQuestionType');

class QuestionType extends BaseQuestionType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}