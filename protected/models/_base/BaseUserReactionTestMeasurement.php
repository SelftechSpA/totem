<?php

/**
 * This is the model base class for the table "user_reaction_test_measurement".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserReactionTestMeasurement".
 *
 * Columns in table "user_reaction_test_measurement" available as properties of the model,
 * followed by relations of table "user_reaction_test_measurement" available as properties of the model.
 *
 * @property string $id
 * @property string $user_reaction_test_id
 * @property string $value
 *
 * @property UserReactionTest $userReactionTest
 */
abstract class BaseUserReactionTestMeasurement extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_reaction_test_measurement';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserReactionTestMeasurement|UserReactionTestMeasurements', $n);
	}

	public static function representingColumn() {
		return 'value';
	}

	public function rules() {
		return array(
			array('user_reaction_test_id, value', 'required'),
			array('user_reaction_test_id, value', 'length', 'max'=>10),
			array('id, user_reaction_test_id, value', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'userReactionTest' => array(self::BELONGS_TO, 'UserReactionTest', 'user_reaction_test_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_reaction_test_id' => null,
			'value' => Yii::t('app', 'Value'),
			'userReactionTest' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('user_reaction_test_id', $this->user_reaction_test_id);
		$criteria->compare('value', $this->value, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}