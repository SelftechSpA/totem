<?php

/**
 * MAPTest class.
 */
class MAPTest extends UserTest
{
    public $questions = array(
        '1' => array('id' => 27),
        '2' => array('id' => 28),
        '3' => array('id' => 29),
        '4' => array('id' => 30),
        '5' => array('id' => 31),
        '6' => array('id' => 32),
        '7' => array('id' => 33),
        '8' => array('id' => 34),
        '9' => array('id' => 35),
        '10' => array('id' => 36),
        '11' => array('id' => 37),
        '12' => array('id' => 38),
        '13' => array('id' => 39),
        '14' => array('id' => 40)
    );

	public $question_1;
	public $question_2;
	public $question_3;
	public $question_4;
	public $question_5;
    public $question_6;
    public $question_7;
    public $question_8;
    public $question_9;
    public $question_10;
    public $question_11;
    public $question_12;
    public $question_13;
    public $question_14;

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
            array('question_9', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 9.'),
            array('question_10', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 10.'),
            array('question_11', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 11.'),
            array('question_12', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 12.'),
            array('question_13', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 13.'),
            array('question_14', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 14.'),
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
			'question_1'=>'1. Ronquido fuerte',
            'question_2'=>'2. ¿Siente las piernas inquietas, como si saltaran, o que se sacuden??',
            'question_3'=>'3. Dificultad para conciliar el sueño',
            'question_4'=>'4. Despertares frecuentes',
            'question_5'=>'5. ¿Tiene dificultad para respirar? ¿Respiración entrecortada? ¿Respiración ruidosa?',
            'question_6'=>'6. ¿Se siente adormecido en el trabajo?',
            'question_7'=>'7. ¿Con frecuencia da vueltas o se sacude en la cama?',
            'question_8'=>'8. ¿En algún momento siente que se queda sin aire?',
            'question_9'=>'9. ¿Tiene excesiva somnolencia (le da mucho sueño) durante el día?',
            'question_10'=>'10. ¿Tiene dolores de cabeza por la mañana?',
            'question_11'=>'11. ¿Se sintió adormecido al conducir?',
            'question_12'=>'12. Se siente paralizado, incapaz de moverse por períodos cortos al dormirse o al despertar',
            'question_13'=>'13. ¿Tiene sueños vívidos al quedarse dormido o en el momento de despertarse?',
            'question_14'=>'14. Ronquido (Cualquiera: fuerte o débil)',
		));
	}

    public function averageQuestionScore()
    {
        $count = 0;
        $sum = 0;
        $args = func_get_args();
        foreach($args as $arg){
            if ($arg != 5){ // 5 es "no sabe"
                $count++;
                $sum+=$arg;
            }
        }
        return $sum / $count;
    }
    
    public function calculateScore(){
        $user = Yii::app()->getModule('user')->user();
        $height = (float)$user->profile->height;
        $weight = (float)$user->profile->weight;
        $is_male = ($user->profile->gender == 1) ? 1 : 0;
        $age = (float)$user->profile->age;
        $index1 = $this->averageQuestionScore($this->question_1, $this->question_5, $this->question_8);
        $bmi = $weight / ($height * $height);
        $x = -8.16 + (1.299 * $index1) + (0.163 * $bmi) - (0.028 * $index1 * $bmi) + (0.032 * $age) + (1.278 * $is_male);
        $score = exp($x)/(1+exp($x));
        return $score;
    }

    public function save($runValidation=true,$attributes=null)
    {
        if($runValidation & !$this->validate($attributes)){
            return false;
        }        
        $transaction = Yii::app()->db->beginTransaction();
        try{
            $this->user_id = Yii::app()->user->id;
            $this->test_id = 2;
            $this->date_taken = new CDbExpression('NOW()');
            $this->score = $this->calculateScore();
            if (!parent::save()){
                throw new CDbException('No se pudo guardar el resultado del test!');
            }
            for($i=1;$i<=14;$i++){
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
        if ($this->score >= 0.5) {
            return "Alto nivel de riesgo de padecer Apneas de Sueño";
        } else if ($this->score >= 0.1){
            return "Riesgo bajo de padecer Apneas de Sueño";
        } else {
            return "No existe riego de padecer Apneas de Sueño";
        }
    }
}