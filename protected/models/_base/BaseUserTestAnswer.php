<?php

/**
 * This is the model base class for the table "user_test_answer".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserTestAnswer".
 *
 * Columns in table "user_test_answer" available as properties of the model,
 * followed by relations of table "user_test_answer" available as properties of the model.
 *
 * @property string $id
 * @property string $user_test_id
 * @property string $question_id
 * @property string $question_type_option_id
 * @property string $value
 *
 * @property UserTest $userTest
 * @property Question $question
 * @property QuestionTypeOption $questionTypeOption
 */
abstract class BaseUserTestAnswer extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_test_answer';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserTestAnswer|UserTestAnswers', $n);
	}

	public static function representingColumn() {
		return 'value';
	}

	public function rules() {
		return array(
			array('user_test_id, question_id', 'required'),
			array('user_test_id, question_id, question_type_option_id, value', 'length', 'max'=>10),
			array('question_type_option_id, value', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_test_id, question_id, question_type_option_id, value', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'userTest' => array(self::BELONGS_TO, 'UserTest', 'user_test_id'),
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
			'questionTypeOption' => array(self::BELONGS_TO, 'QuestionTypeOption', 'question_type_option_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_test_id' => null,
			'question_id' => null,
			'question_type_option_id' => null,
			'value' => Yii::t('app', 'Value'),
			'userTest' => null,
			'question' => null,
			'questionTypeOption' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('user_test_id', $this->user_test_id);
		$criteria->compare('question_id', $this->question_id);
		$criteria->compare('question_type_option_id', $this->question_type_option_id);
		$criteria->compare('value', $this->value, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}