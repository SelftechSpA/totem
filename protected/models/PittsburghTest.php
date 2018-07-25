<?php

/**
 * PittsburghTest class.
 */
class PittsburghTest extends UserTest
{
    public $questions = array(
        '1' => array('id' => 9),
        '2' => array('id' => 10),
        '3' => array('id' => 11),
        '4' => array('id' => 12),
        '5' => array('id' => 13),
        '6' => array('id' => 14),
        '7' => array('id' => 15),
        '8' => array('id' => 16),
        '9' => array('id' => 17),
        '10' => array('id' => 18),
        '11' => array('id' => 19),
        '12' => array('id' => 20),
        '13' => array('id' => 21),
        '14' => array('id' => 22),
        '15' => array('id' => 23),
        '16' => array('id' => 24),
        '17' => array('id' => 25),
        '18' => array('id' => 26)
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
    public $question_15;
    public $question_16;
    public $question_17;
    public $question_18;
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			//array('question_1', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 1.'),
            //array('question_2', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 2.'),
            //array('question_3', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 3.'),
            //array('question_4', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 4.'),
            array('question_1, question_2, question_3, question_4', 'safe'),
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
            array('question_15', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 15.'),
            array('question_16', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 16.'),
            array('question_17', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 17.'),
            array('question_18', 'required', 'message'=>'Debe seleccionar una opción para la pregunta 18.'),
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
			'question_1'=>'1. En su casa, ¿a qué hora se acuesta normalmente por la noche?',
            'question_2'=>'2. ¿Cúanto tiempo demora en quedarse dormido en promedio?',
            'question_3'=>'3. ¿A qué hora se levanta habitualmente por la mañana?',
            'question_4'=>'4. ¿Cuántas horas calcula que duerme habitualmente cada noche? (El tiempo puede ser diferente al que Ud. permanezca en la cama)',
            'question_5'=>'5. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir por no poder quedarse dormido en la primera media hora?',
            'question_6'=>'6. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de despertarse durante la noche o de madrugada?',
            'question_7'=>'7. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de tener que levantarse para ir al baño?',
            'question_8'=>'8. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir por no poder respirar bien?',
            'question_9'=>'9. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de toser o roncar ruidosamente?',
            'question_10'=>'10. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de sentir frío?',
            'question_11'=>'11. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de sentir calor?',
            'question_12'=>'12. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de tener sueños feos o pesadillas?',
            'question_13'=>'13. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de tener dolores?',
            'question_14'=>'14. Durante el mes pasado, ¿cuántas veces ha tenido problemas para dormir a causa de otras razones?',
            'question_15'=>'15. Durante el mes pasado, ¿cuántas veces ha tomado medicinas (recetadas por el medico o por su cuenta) para dormir?',
            'question_16'=>'16. Durante el mes pasado, ¿cuántas veces ha tenido problemas para permanecer despierto mientras conducía, comía, trabajaba, estudiaba o desarrollaba alguna otra actividad social?',
            'question_17'=>'17. Durante el último mes, ¿qué tanto problema le ha traído a usted su estado de ánimo para realizar actividades como conducir, comer, trabajar, estudiar o alguna otra actividad social?',
            'question_18'=>'18. Durante el último mes, ¿cómo calificaría en conjunto la calidad de su sueño?',
		));
	}

    /*public function averageQuestionScore()
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
        return 1;
    }*/
    
    public function calculateScore(){
        //C1 #9 puntuación
        $c1 = $this->question_18;
        
        //C2 #2 puntuación [menos de 15 min: 0, 16-30 min:1, 31-60 min: 2, más de 60 min: 3)] + #5a puntuación (Si la suma es igual a 0: 0; 1-2: 1; 3-4: 2; 5-6: 3)
        $aux = $this->question_2 * 60;
        if($aux <= 15){
            $c2 = 0;
        }else if($aux <= 30){
            $c2 = 1;
        }else if($aux <= 60){
            $c2 = 2;
        }else{
            $c2 = 3;
        }
        
        $c2 = $c2 + $this->question_5;
        if ($c2 == 0){
             $c2 = 0;
        }else if($c2 <= 2){
             $c2 = 1;
        }else if($c2 <= 4){
             $c2 = 2;
        }else if($c2 <= 6){
             $c2 = 3;
        }
        
        //C3 #4 puntuación [más de 7: 0, 6-7: 1, 5-6: 2, menos de 5: 3]
        $aux = $this->question_4;
        if($aux >= 7){
            $c3 = 0;
        }else if($aux >= 6){
            $c3 = 1;
        }else if($aux >= 5){
            $c3 = 2;
        }else{
            $c3 = 3;
        }
       
       //C4 (Total # de horas dormido)/(Total # de horas en cama) × 100 | Más del 85%: 0, 75-84%: 1, 65-74%: 2, menos del 65%: 3
       //$this->question_4 es Horas dormidas
       $aux = $this->question_3 - $this->question_1; //Horas en cama (cuando me acuesto y cuando me levanto
       if($aux <= 0){
           $aux = $aux + 24;
       }
       $c4 = ($this->question_4 / $aux)*100;
       if($c4 >= 85){
            $c4 = 0;
       }else if($c4 >= 75){
            $c4 = 1;
       }else if($c4 >= 65){
            $c4 = 2;
       }else{
            $c4 = 3;
       }
       
       //C5 Suma de puntuaciones 5b a 5j (0: 0; 1-9: 1; 10-18: 2; 19-27: 3
       $aux = $this->question_6 + $this->question_7 + $this->question_8 + $this->question_9 + $this->question_10 + $this->question_11 + $this->question_12 + $this->question_13 + $this->question_14; 
       if($aux == 0){
           $c5 = 0;
       }else if($aux <= 9){
           $c5 = 1;
       }else if($aux <= 18){
           $c5 = 2;
       }else{
           $c5 = 3;
       }
       
       //C6 #6 puntuaciones
       $c6 = $this->question_15;
       
       //C7 #7 puntuaciones + #8 puntuaciones (0: 0; 1-2: 1; 3-4: 2; 5-6: 3)
       $aux = $this->question_16 + $this->question_17;
       if($aux == 0){
           $c7 = 0;
       }else if($aux <= 2){
           $c7 = 1;
       }else if($aux <= 4){
           $c7 = 2;
       }else{
           $c7 = 3;
       }
       
       $score = $c1 + $c2 + $c3 + $c4 + $c5 + $c6 + $c7;
      
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
            $this->test_id = 1;
            $this->date_taken = new CDbExpression('NOW()');
            $this->score = $this->calculateScore();
            if (!parent::save()){
                throw new CDbException('No se pudo guardar el resultado del test!');
            }
            for($i=1;$i<=18;$i++){
                if($i <= 4){
                    $answer = new UserTestAnswer;
                    $answer->user_test_id = $this->id;
                    $answer->question_id = (int)$this->questions[$i]['id'];
                    $answer->question_type_option_id = null;
                    $answer->value = $this['question_'.$i]; 
                }else{
                    $answer = new UserTestAnswer;
                    $answer->user_test_id = $this->id;
                    $answer->question_id = (int)$this->questions[$i]['id'];
                    $answer->question_type_option_id = QuestionTypeOption::model()->findByAttributes(array('value'=>$this['question_'.$i]))->id; 
                }
                
                if (!$answer->save())
                    throw new CDbException('No se pudo guardar el resultado del test!');
            }
            $transaction->commit();
        }catch(Exception $e){
            $transaction->rollBack();
            throw $e;
        }
        return true;
    }

    public function getResultText(){
        if ($this->score < 5) {
            return "Presenta una buena calidad de sueño en el momento actual.";
        } else if ($this->score < 7){
            return "Presenta ciertas dificultades que requieren la valoración de un especialista.";
        } else if ($this->score < 14){
            return "Presenta dificultades que requieren consulta y probable tratamiento médico.";
        } else /* if ($this->score < 21)*/{
            return "Presenta alta probabilidad de problemas de sueño grave.";
        }
    }
}