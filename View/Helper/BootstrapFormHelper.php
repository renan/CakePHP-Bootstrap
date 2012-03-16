<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {

/**
 * Add divs and classes necessary for bootstrap
 *
 */
	public function input($fieldName, $options = array()) {
		$defaults = array(
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label'),
			'between' => '<div class="controls">',
			'after' => '</div>',
		);
		$options = Set::merge($defaults, $options);

		return parent::input($fieldName, $options);
	}
}
