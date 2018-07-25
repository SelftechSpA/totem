<?php
/**
 * TbSlider class file.
 * @author: ferow2k <ferow2k@gmail.com>
 */

/**
 * A simple implementation for Bootstrap slider
 * @see http://www.eyecon.ro/bootstrap-slider/
 */
class TbSlider extends CInputWidget
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
	 * @var string JS Callback for Slider picker
	 */
  public $formatter;
	public $onSlideStart;
	public $onSlide;
	public $onSlideStop;
	/**
	 * @var array Options to be passed to slider picker
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
			Yii::app()->bootstrap->registerSliderPlugin($this->selector, $this->options, $this->onSlideStart, $this->onSlide, $this->onSlideStop);
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

			Yii::app()->bootstrap->registerSliderPlugin('#' . $id, $this->options, $this->onSlideStart, $this->onSlide, $this->onSlideStop);
		}
	}

	/**
	 * Registers required css js files
	 */
	public function registerClientScript()
	{
		Yii::app()->bootstrap->registerAssetCss('bootstrap-slider.css');
		Yii::app()->bootstrap->registerAssetJs('bootstrap-slider.js', CClientScript::POS_HEAD);
	}
}
