<?php

/**
 * EpworthTest class.
 * EpworthTest is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class EpworthTest extends UserTest
{
    public $questions = array(
        '1' => array('id' => 1),
        '2' => array('id' => 2),
        '3' => array('id' => 3),
        '4' => array('id' => 4),
        '5' => array('id' => 5),
        '6' => array('id' => 6),
        '7' => array('id' => 7),
        '8' => array('id' => 8),
    );

	public $question_1;
	public $question_2;
	public $question_3;
	public $question_4;
	public $question_5;
    public $question_6;
    public $question_7;
    public $question_8;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('question_1', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 1.'),
            array('question_2', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 2.'),
            array('question_3', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 3.'),
            array('question_4', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 4.'),
            array('question_5', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 5.'),
            array('question_6', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 6.'),
            array('question_7', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 7.'),
            array('question_8', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 8.'),
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
			'question_1'=>'1. Sentado leyendo',
            'question_2'=>'2. Viendo la televisión',
            'question_3'=>'3. Sentado, inactivo, en un lugar público<br> <small>(por ej. un teatro, un acto público o una reunión)</small>',
            'question_4'=>'4. Como pasajero en un coche una hora seguida',
            'question_5'=>'5. Descansando recostado por la tarde cuando las circunstancias lo permiten',
            'question_6'=>'6. Sentado charlando con alguien',
            'question_7'=>'7. Sentado tranquilo, después de un almuerzo sin alcohol',
            'question_8'=>'8. En un coche, al pararse unos minutos en el tráfico <br><small>(como conductor o acompañante en forma indistinta)</small>',
		));
	}

    public function calculateScore(){
        $acum = 0;
        for($i=1;$i<=8;$i++){
            $acum += (int)$this['question_'.$i];
        }
        return $acum;
    }

    public function save($runValidation=true,$attributes=null)
    {
        if($runValidation & !$this->validate($attributes)){
            return false;
        }        
        $transaction = Yii::app()->db->beginTransaction();
        try{
            $this->user_id = Yii::app()->user->id;
            $this->test_id = 3;
            $this->date_taken = new CDbExpression('NOW()');
            $this->score = $this->calculateScore();
            if (!parent::save()){
                throw new CDbException('No se pudo guardar el resultado del test!');
            }
            for($i=1;$i<=8;$i++){
                $answer = new UserTestAnswer;
                $answer->user_test_id = $this->id;
                $answer->question_id = (int)$this->questions[$i]['id'];
                $answer->question_type_option_id = QuestionTypeOption::model()->findByAttributes(array('value'=>$this['question_'.$i]))->id; 
                /*echo $this->questions[$i]['id'].': ';
                echo $this['question_'.$i].' -> ';
                echo $answer->question_type_option_id.'<br>';*/
                if (!$answer->save())
                    throw new CDbException('No se pudo guardar el resultado del test!');
            }
            $transaction->commit();
        }catch(Exception $e){
            $transaction->rollBack();
            throw $e;
            return false;
        }
        return true;
    }
    
    public function getResultText(){
        if ($this->score == 0) {
            return "Sin somnolencia diurna";
        } else if ($this->score <= 5){
            return "Ligera somnolencia diurna";
        } else if ($this->score <= 10){
            return "Moderada somnolencia diurna";
        } else {
            return "Excesiva somnolencia diurna";
        }
    }
}