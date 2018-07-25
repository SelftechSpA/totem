<?php

Yii::import('application.models._base.BaseUserReactionTest');

class UserReactionTest extends BaseUserReactionTest
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function relations() {
        return array(
            'userTest' => array(self::BELONGS_TO, 'UserTest', 'user_test_id'),
            'userReactionTestMeasurements' => array(self::HAS_MANY, 'UserReactionTestMeasurement', 'user_reaction_test_id'),
            //'meanTopTenPercent' => array(self::STAT, 'UserReactionTestMeasurement', 'user_reaction_test_id', 'select'=>'AVG(value)', 'condition'=>'value > (SELECT value FROM UserReactionTestMeasurement m2 WHERE m2.user_reaction_test_id = t.user_reaction_test_id LIMIT 10 PERCENT)'),
            //'stdev' => array(self::STAT, 'UserReactionTestMeasurement', 'user_reaction_test_id', 'select'=>'STD(value)'),
        );
    }    

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'sleep_hours'=>'Horas de sueño',
            'awake_hours'=>'Horas despierto',
            'time_now'=>'Hora actual',
            'alert_level'=>'Nivel de alerta',
            'standardDeviation'=>Yii::t('app', 'Standard Deviation (ms)'),
            'meanTopTenPercent'=>Yii::t('app', 'Mean Top Ten Percent (ms)'),
            'meanBottomTenPercent'=>Yii::t('app', 'Mean Bottom Ten Percent (ms)'),
            'invalid_count'=>Yii::t('app', 'Invalid Count'),
            'crash_count'=>Yii::t('app', 'Crash Count'),
            'missed_count'=>Yii::t('app', 'Missed Count'),
        ));
    }
    
    public function calculateScore(){
        //$user = Yii::app()->getModule('user')->user();
        //$height = (float)$user->profile->height;
        return getAverageReactionTime();
    }
    
    public function getAverageReactionTime(){
        $sum = 0;
        $count = count($this->userReactionTestMeasurements);
        if ($count == 0)
            return 0;
        foreach ($this->userReactionTestMeasurements as $t) {
            $sum += $t->value;
        }
        
        // add misses
        $sum += 600 * $this->missed_count;
        $count += $this->missed_count;
        
        return $sum / $count;
    }
    
    public function getCrashCount(){
        $count = 0;
        foreach ($this->userReactionTestMeasurements as $t) {
            if ($t->value > 500)
                $count++;
        }
        return $count;
    }
    
    public function getSuperLapsusCount(){
        $count = 0;
        foreach ($this->userReactionTestMeasurements as $t) {
            if ($t->value > 1000)
                $count++;
        }
        return $count;
    }    
    
    public function getMeanTopTenPercent(){
        //$count = round(Yii::app()->db->createCommand("SELECT COUNT(*) FROM user_reaction_test_measurement m WHERE m.user_reaction_test_id = {$this->id}")->queryScalar() * 0.1);
        $count = round(count($this->userReactionTestMeasurements) * 0.1);
        if ($count == 0)
            return 0;        
        $values = UserReactionTestMeasurement::model()->findAllByAttributes(array('user_reaction_test_id'=>$this->id), array('order'=>'value ASC', 'limit'=>$count));
        $sum = 0;
        foreach($values as $v){
            $sum += $v->value;
        }
        return round($sum / $count, 4);
    }
    
    public function getMeanBottomTenPercent(){
        //$count = round(Yii::app()->db->createCommand("SELECT COUNT(*) FROM user_reaction_test_measurement m WHERE m.user_reaction_test_id = {$this->id}")->queryScalar() * 0.1);
        $count = round(count($this->userReactionTestMeasurements) * 0.1);
        if ($count == 0)
            return 0;        
        $values = UserReactionTestMeasurement::model()->findAllByAttributes(array('user_reaction_test_id'=>$this->id), array('order'=>'value DESC', 'limit'=>$count));
        $sum = 0;
        foreach($values as $v){
            $sum += $v->value;
        }
        return round($sum / $count, 4);
    }

    public function getStandardDeviation(){
        $count = round(count($this->userReactionTestMeasurements) * 0.1);
        return round(Yii::app()->db->createCommand("SELECT STD(value) FROM user_reaction_test_measurement m WHERE m.user_reaction_test_id = {$this->id}")->queryScalar(), 4);
    }
    
    public function getResultText(){
        if ($this->userTest->score >= 500) {
            return "Peligro. <br>Reducida velocidad de reacción y capacidad atencional";
        } else if ($this->userTest->score >= 300){
            return "Precaución. <br>Presenta moderada velocidad de reacción y capacidad atencional";
        } else {
            return "Presenta una adecuada velocidad de reacción y capacidad atencional.";
        }
    }    
}