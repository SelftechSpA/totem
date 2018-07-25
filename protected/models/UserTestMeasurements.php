<?php

Yii::import('application.models._base.BaseUserTestMeasurements');

class UserTestMeasurements extends BaseUserTestMeasurements
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}