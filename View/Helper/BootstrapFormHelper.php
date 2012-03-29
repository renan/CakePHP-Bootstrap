<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {

/**
 * Adds the class `form-horizontal` as its required by bootstrap
 *
 */
	public function create($model = null, $options = array()) {
		if (is_array($model) && empty($options)) {
			$options = $model;
			$model = null;
		}
		$defaults = array(
			'class' => 'form-horizontal',
		);
		$options = Set::merge($defaults, $options);

		return parent::create($model, $options);
	}

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
			'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
		);
		if (isset($options['div']) && $options['div'] === false) {
			unset($defaults['between'], $defaults['after']);
		}
		$options = Set::merge($defaults, $options);

		if (isset($options['label']) && is_string($options['label'])) {
			$options['label'] = array(
				'class' => 'control-label',
				'text' => $options['label'],
			);
		}

		return parent::input($fieldName, $options);
	}

/**
 * Adds the class `help-inline` as its required by bootstrap
 *
 */
	public function error($field, $text, $options = array()) {
		$defaults = array(
			'class' => 'help-inline',
		);
		$options = Set::merge($defaults, $options);

		return parent::error($field, $text, $options);
	}

/**
 * Add divs and classes necessary for bootstrap
 *
 */
	public function end($options = null) {
		if ($options !== null) {
			if (!is_array($options)) {
				$options = array('label' => $options);
			}
			$defaults = array(
				'class' => 'btn btn-primary',
				'div' => array(
					'class' => 'form-actions',
				),
			);
			$options = Set::merge($defaults, $options);
		}

		return parent::end($options);
	}
}
