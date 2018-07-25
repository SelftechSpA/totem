<?php

Yii::import('application.models._base.BaseUserTest');

class UserTest extends BaseUserTest
{    
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getViewURL(){
        switch($this->test_id){
            case '1': return array('/TestPittsburgh/view', 'id' => $this->id);
            case '2': return array('/TestMAP/view', 'id' => $this->id);
            case '3': return array('/TestEpworth/view', 'id' => $this->id);
            case '4': return array('/TestReaction/view', 'id' => $this->id);
            default:
                return array();
        }
    }
    
    public function rules() {
        return array(
            array('user_id, test_id, date_taken, score', 'required'),
            array('user_id, gender, age, marital_status, activity_level, weekend_sleep_quality', 'numerical', 'integerOnly'=>true),
            array('test_id, score, height, weight, working_days_sleep_hours, working_days_sleep_hours_desired, working_days_sleep_quality, weekend_sleep_hours, weekend_sleep_hours_desired, working_hours, exercise_hours, recreation_hours, travel_hours', 'length', 'max'=>10),
            array('occupation, occupation_area', 'length', 'max'=>255),
            array('gender, height, weight, age, marital_status, occupation, occupation_area, activity_level, working_days_sleep_hours, working_days_sleep_hours_desired, working_days_sleep_quality, weekend_sleep_hours, weekend_sleep_hours_desired, weekend_sleep_quality, working_hours, exercise_hours, recreation_hours, travel_hours', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, user_id, test_id, date_taken, score, gender, height, weight, age, marital_status, occupation, occupation_area, activity_level, working_days_sleep_hours, working_days_sleep_hours_desired, working_days_sleep_quality, weekend_sleep_hours, weekend_sleep_hours_desired, weekend_sleep_quality, working_hours, exercise_hours, recreation_hours, travel_hours', 'safe', 'on'=>'search'),
        );
    }    
    
    public function search() {
        $criteria = new CDbCriteria;
        /*$criteria->with = array('user');
        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('test_id', $this->test_id);
        $criteria->compare('date_taken', $this->date_taken, true);
        $criteria->compare('score', $this->score, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('occupation_area', $this->occupation_area, true);
        $criteria->compare('working_days_sleep_hours', $this->working_days_sleep_hours);
        $criteria->compare('working_hours', $this->working_hours);*/
        
        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('test_id', $this->test_id);
        $criteria->compare('date_taken', $this->date_taken, true);
        $criteria->compare('score', $this->score, true);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('height', $this->height, true);
        $criteria->compare('weight', $this->weight, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('marital_status', $this->marital_status);
        $criteria->compare('occupation', $this->occupation, true);
        $criteria->compare('occupation_area', $this->occupation_area, true);
        $criteria->compare('activity_level', $this->activity_level);
        $criteria->compare('working_days_sleep_hours', $this->working_days_sleep_hours, true);
        $criteria->compare('working_days_sleep_hours_desired', $this->working_days_sleep_hours_desired, true);
        $criteria->compare('working_days_sleep_quality', $this->working_days_sleep_quality, true);
        $criteria->compare('weekend_sleep_hours', $this->weekend_sleep_hours, true);
        $criteria->compare('weekend_sleep_hours_desired', $this->weekend_sleep_hours_desired, true);
        $criteria->compare('weekend_sleep_quality', $this->weekend_sleep_quality);
        $criteria->compare('working_hours', $this->working_hours, true);
        $criteria->compare('exercise_hours', $this->exercise_hours, true);
        $criteria->compare('recreation_hours', $this->recreation_hours, true);
        $criteria->compare('travel_hours', $this->travel_hours, true);        

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
               'pagesize' => 10,
            ),
        ));
    }

    public function isReactionTest(){
        return count($this->userReactionTests) > 0;
    }
    
    public function getReactionTest(){
        if (!$this->isReactionTest())
            return null;
        return $this->userReactionTests[0];
    }
    
    public function getGenderText(){
        switch ($this->gender){
            case "0": return "N/D";
            case "1": return "Masculino";
            case "2": return "Femenino";
        }
    }

    public function getGendersArray(){
        return array(array('id'=>'0', 'name'=>'N/D'), array('id'=>'1', 'name'=>'Masculino'), array('id'=>'2', 'name'=>'Femenino'));
    }
    
    public function getMaritalStatusText(){
        switch ($this->marital_status){
            case "0": return "N/D";
            case "1": return "Soltero";
            case "2": return "Casado";
            case "3": return "Divorciado";
            case "4": return "Viudo";
        }
    }

    public function getMaritalStatusesArray(){
        return array(array('id'=>'0', 'name'=>'N/D'), 
                     array('id'=>'1', 'name'=>'Soltero'), 
                     array('id'=>'2', 'name'=>'Casado'), 
                     array('id'=>'3', 'name'=>'Divorciado'), 
                     array('id'=>'4', 'name'=>'Viudo'));
    }    
    
    public function getActivityLevelText(){
        switch ($this->activity_level){
            case "0": return "N/D";
            case "1": return "Sedentario";
            case "2": return "Activo";
            case "3": return "Muy activo";
        }
    }

    public function getActivityLevelsArray(){
        return array(array('id'=>'0', 'name'=>'N/D'), 
                     array('id'=>'1', 'name'=>'Sedentario'), 
                     array('id'=>'2', 'name'=>'Activo'), 
                     array('id'=>'3', 'name'=>'Muy activo'));
    }      
    
    public function beforeSave() {
        if ($this->isNewRecord){
            $profile = Yii::app()->getModule('user')->user()->profile;
            $this->gender = $profile->gender;
            $this->height = $profile->height;
            $this->weight = $profile->weight;
            $this->age = $profile->age; // TODO: Obtener edad a partir de la fecha de nacimiento
            $this->marital_status = $profile->marital_status;
            $this->occupation = $profile->occupation;
            $this->occupation_area = $profile->occupation_area;
            $this->activity_level = $profile->activity_level;
            $this->working_days_sleep_hours = $profile->working_days_sleep_hours;
            $this->working_days_sleep_hours_desired = $profile->working_days_sleep_hours_desired;
            $this->working_days_sleep_quality = $profile->working_days_sleep_quality;
            $this->weekend_sleep_hours = $profile->weekend_sleep_hours;
            $this->weekend_sleep_hours_desired = $profile->weekend_sleep_hours_desired;
            $this->weekend_sleep_quality = $profile->weekend_sleep_quality;
            $this->working_hours = $profile->working_hours;
            $this->exercise_hours = $profile->exercise_hours;
            $this->recreation_hours = $profile->recreation_hours;
            $this->travel_hours = $profile->travel_hours;        
        }
        return parent::beforeSave();
    }

    public function getResultText(){
        if ($this->isReactionTest())
            return $this->getReactionTest()->getResultText();
        else
            return '';
    }
}