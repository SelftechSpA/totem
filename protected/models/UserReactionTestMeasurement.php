<?php

Yii::import('application.models._base.BaseUserReactionTestMeasurement');

class UserReactionTestMeasurement extends BaseUserReactionTestMeasurement
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}