<?php

Yii::import('application.models._base.BaseQuestion');

class Question extends BaseQuestion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}