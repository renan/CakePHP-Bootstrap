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
	public function input($fieldName, $params = array()) {
		$defaults = array(
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label'),
			'between' => '<div class="controls">',
			// 'after' => '</div>',
			'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
		);

		$options = Set::merge($defaults, $params);

		$prepend = isset($options['bootstrap-prepend']) && is_string($options['bootstrap-prepend']) ? " input-prepend" : "";
		$append  = isset($options['bootstrap-append'])  && is_string($options['bootstrap-append'])  ? " input-append"  : "";
		if ($prepend || $append) {
			if (!isset($options['before'])) {
				$options['before'] = '';
			}
			if (!isset($options['between'])) {
				$options['between'] = '';
			}
			if (!isset($options['after'])) {
				$options['after'] = '';
			}

			$options['before'] .= '<div class="' . trim($prepend . $append) . '">';

			if ($prepend) {
				$options['between'] .= '<span class="add-on">' . $options['bootstrap-prepend'] .  '</span>';
			}

			if ($append) {
				$options['after'] .= '<span class="add-on">' . $options['bootstrap-append'] .  '</span>';
			}

			$options['after'] .= '</div>';

			unset($options['bootstrap-prepend']);
			unset($options['bootstrap-append']);
		}

		if (!isset($options['after'])) {
			$options['after'] = '';
		}
		$options['after'] .= '</div>';

		if (isset($options['label']) && is_string($options['label'])) {
			$options['label'] = array(
				'class' => 'control-label',
				'text' => $options['label'],
			);
		}

		if (isset($options['div']) && $options['div'] === false) {
			unset($options['between'], $options['after']);
		}		

		// if ($append) {
		// 	prd(compact('fieldName', 'options', 'params', 'default'));
		// }

		return parent::input($fieldName, $options);
	}

/**
 * Adds the class `help-inline` as its required by bootstrap
 *
 */
	public function error($field, $text = null, $options = array()) {
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
