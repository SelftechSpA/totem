<?php
/**
 * TbSlider class file.
 * @author: ferow2k <ferow2k@gmail.com>
 */

/**
 * A simple implementation for Bootstrap spin edit
 * @see https://github.com/geersch/bootstrap-spinedit
 */
class TbSpinEdit extends CInputWidget
{
	/**
	 * @var TbActiveForm when created via TbActiveForm, this attribute is set to the form that renders the widget
	 * @see TbActionForm->inputRow
	 */
	public $form;

	/**
	 * @var string $selector
	 */
	public $selector;

	/**
	 * @var string JS Callback for Spin Edit
	 */
    public $formatter;
	public $onSlideStart;
	public $onSlide;
	public $onSlideStop;
	/**
	 * @var array Options to be passed to Spin Edit
	 */
	public $options = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		$this->registerClientScript();
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		if($this->selector)
		{
			Yii::app()->bootstrap->registerSpinEditPlugin($this->selector, $this->options);
		}
		else
		{
			list($name, $id) = $this->resolveNameID();
	
			if ($this->hasModel())
			{
				if ($this->form)
					echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
				else
					echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
	
			} 
			else
				echo CHtml::textField($name, $this->value, $this->htmlOptions);
	
			Yii::app()->bootstrap->registerSpinEditPlugin('#' . $id, $this->options);
		}
	}

	/**
	 * Registers required css js files
	 */
	public function registerClientScript()
	{
		Yii::app()->bootstrap->registerAssetCss('bootstrap-spinedit.css');
		Yii::app()->bootstrap->registerAssetJs('bootstrap-spinedit.js', CClientScript::POS_HEAD);
	}
}