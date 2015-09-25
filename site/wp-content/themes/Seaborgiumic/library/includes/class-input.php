<?php

/**
 * An abstract class to render the input elements in HTML.
 *
 * @author Padd Solutions Team
 * @version 5.0.0
 */
abstract class Padd_Input {

	/**
	 * Input type.
	 *
	 * @var type
	 */
	public $type;

	/**
	 * Field ID.
	 *
	 * @var type
	 */
	public $id;

	/**
	 * Field name, also used as a value of <code>id</code> attribute.
	 *
	 * @var string
	 */
	public $name;

	/**
	 * Actual field value.
	 *
	 * @var string
	 */
	public $value;

	/**
	 * The default value.
	 *
	 * @var type
	 */
	public $default;

	/**
	 * HTML code to render the input field.
	 *
	 * @var string
	 */
	public $strHTML;

	/**
	 * Constructor for Padd_Input.
	 *
	 * @param type $name
	 * @param type $value
	 */
	function __construct($id, $name, $value='', $default='', $description='') {
		$this->id      = $id;
		$this->name    = $name;
		$this->value   = $value;
		$this->default = $default;
		$this->description = $description;
		$this->strHTML = '';
	}

	/**
	 * Generate a string of HTML input.
	 */
	abstract protected function _generate_html();

	public function set_value($value) {
		$this->value = $value;
	}

	public function set_default($default) {
		$this->default = $default;
	}

	/**
	 * Magic method to render the class as string.
	 *
	 * @return string
	 */
	public function __toString() {
		$this->strHTML .= '<tr valign="top" id="tr-' . $this->id . '">';
		$this->strHTML .= '	<th scope="row"><label for="' . $this->id . '">' . $this->name . '</label></th>';
		$this->strHTML .= '	<td>';
		$this->_generate_html();
		$this->strHTML .= '		<br /><small>' . $this->description . '</small>';
		$this->strHTML .= '	</td>';
		$this->strHTML .= '</tr>';
		return $this->strHTML;
	}

}

if (!class_exists('Padd_Input_Textfield')) :

/**
 * An class to render the textfield input in HTML.
 *
 * @author Themecredible Team
 * @version 1.0.0
 */
class Padd_Input_Textfield extends Padd_Input {

	public $type = 'textfield';

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		$this->strHTML .= '<input name="' . $this->id . '" type="text" class="textfield" id="' . $this->id . '" value="' . $this->value . '" />';
	}

}

endif;


if (!class_exists('Padd_Input_Textarea')) :
/**
 * An class to render the textarea in HTML.
 *
 * @author Themecredible Team
 * @version 1.0.0
 */
class Padd_Input_Textarea extends Padd_Input {

	public $type = 'textarea';

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		$this->strHTML .= '<textarea name="' . $this->id . '" id="' . $this->id . '">' . stripslashes($this->value). '</textarea>';
	}

}

endif;


if (!class_exists('Padd_Input_Dropdown')) :

/**
 * A class to render the simple dropdown button.
 *
 * @author Themecredible Team
 * @version 1.0.0
 */
class Padd_Input_Dropdown extends Padd_Input {

	public $type = 'dropdown';

	/**
	 * List of options to be rendered in the dropdown. In the array the "key" portion corresponds the actual value and the "value" portion
	 * corresponds the display name.
	 *
	 * If an array contains <code>array('foo' => 'Barista')</code>, the HTML generated in the <code>option</code> tag is
	 * <code>&lt;option value="foo"&gt;Barista&lt;/option&gt;</code>
	 *
	 * @var array
	 */
	public $choices;

	/**
	 * Sets if the dropdown list can select multiple values.
	 *
	 * @var boolean
	 */
	public $multiple;

	public $allow_blank;

	/**
	 * Constructor for Padd_Input_Dropdown.
	 *
	 * @param string $name
	 * @param string $value
	 * @param string $choices
	 * @param boolean $multiple
	 */
	function __construct($id, $name, $value, $default, $description, $choices, $multiple=false, $allow_blank=false) {
		$value = stripslashes($value);
		if (!is_array($value)) {
			$value = explode(':', $value);
		}
		parent::__construct($id, $name, $value, $default, $description);
		$this->choices = $choices;
		$this->multiple = $multiple;
		$this->allow_blank = $allow_blank;
	}

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		if (is_array($this->choices)) {
			$this->strHTML  .= '<select id="' . $this->id . '" name="' . $this->id . '"' . ($this->multiple ? ' multiple="multiple"' : '') . '>';
			if ($this->allow_blank) {
				$this->strHTML .= '<option value="" selected="selected">' . __('Please Select', THEMECREDIBLE_THEME_SLUG) . '</option>';
			}
			foreach ($this->choices as $k => $v) {
				if (is_array($v)) {
					$this->strHTML .= '<optgroup label="' . $k . '">';
					foreach ($v as $a => $b) {
						$this->strHTML .= '<option value="' . $a . '"' .(in_array($a, $this->value) ? ' selected="selected"' : '') . '>' . $b . '</option>';
					}
					$this->strHTML .= '</optgroup>';
				} else {
					$this->strHTML .= '<option value="' . $k . '"' .(in_array($k, $this->value) ? ' selected="selected"' : '') . '>' . $v . '</option>';
				}
			}
			$this->strHTML .= '</select>';
		} else if (is_string($this->choices)) {
			switch ($this->choices) {
				case 'wp_categories':
					if (function_exists('padd_dropdown_categories')) {
						$v = is_array($this->value) ? implode(',', $this->value) : $this->value;
						$this->strHTML .= padd_dropdown_categories('name=' . $this->id . '&echo=0&selected=' . $v . '&multiple=' . $this->multiple);
					} else {
						die('You need WordPress to get working.');
					}
					break;
				case 'wp_pages':
					if (function_exists('wp_dropdown_pages')) {
						$this->strHTML .= wp_dropdown_pages("name=" . $this->id . "&echo=0&show_option_none=" . __('Please Select', PADD_THEME_SLUG) . "&selected=" . implode(':', $this->value));
					} else {
						die('You need WordPress to get working.');
					}
					break;
				case 'wp_users':
					if (function_exists('wp_dropdown_users')) {
						$this->strHTML .= wp_dropdown_users("name=" . $this->id . "&echo=0&show_option_none=". __('Please Select', PADD_THEME_SLUG) ."&selected=" . implode(':', $this->value));
					} else {
						die('You need WordPress to get working.');
					}
					break;
			}
		}
	}

	public function set_value($value) {
		if (!is_array($value)) {
			$value = explode(':', $value);
		}
		parent::set_value($value);
	}

	public function set_default($default) {
		if (!is_array($default)) {
			$value = explode(':', $default);
		}
		parent::set_default($default);
	}

}

endif;


if (!class_exists('Padd_Input_Checkbox')) :

class Padd_Input_Checkbox extends Padd_Input {

	public $type = 'checkbox';

	/**
	 * The value choice in the checkbox.
	 *
	 * @var string
	 */
	protected $choice;

	/**
	 * Constructor for Padd_Input_Dropdown.
	 *
	 * @param string $name
	 * @param string $value
	 * @param string $choice
	 */
	function __construct($id, $name, $value='', $default='', $description='', $choice='1') {
		parent::__construct($id, $name, $value, $default, $description);
		$this->choice = $choice;
	}

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		$this->strHTML .= '<input name="' . $this->id . '" type="checkbox" id="' . $this->id . '" value="' . $this->choice . '"' . ($this->value === $this->choice ? ' checked="checked"': '') . ' />';
	}

}

endif;


if (!class_exists('Padd_Input_Checklist')) :

class Padd_Input_Checklist extends Padd_Input {

	public $type = 'checklist';

	/**
	 * List of options to be rendered in the checklist. In the array the "key" portion corresponds the actual value and the "value" portion
	 * corresponds the display name.
	 *
	 * @var array
	 */
	protected $choices;

	/**
	 * Constructor for Padd_Input_Dropdown.
	 *
	 * @param string $name
	 * @param string $value
	 * @param string $choices
	 */
	function __construct($name, $value, $choices='1') {
		if (!is_array($value)) {
			$value = explode(',', $value);
		}
		parent::__construct($name, $value);
		$this->choices = $choices;
	}

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		$i = 1;
		foreach ($this->choices as $k => $v) {
			$found = is_array($this->value) ? (in_array($k, $this->value)) : false;
			$this->strHTML .= '<span class="cb-item cb-item-' . $i . '">';
			$this->strHTML .= '<input class="checkbox" name="' . $this->id . '[]" type="checkbox" id="' . $this->id . '-' . $i . '" value="' . $k . '"' . ($found ? ' checked="checked"' : '') . ' /> ';
			$this->strHTML .= '<label for="' . $this->id . '-' . $i . '">' . $v . '</label>';
			$this->strHTML .= '</span>';
			$i++;
		}
	}

}

endif;


if (!class_exists('Padd_Input_Radiolist')) :

class Padd_Input_Radiolist extends Padd_Input_Checklist {

	public $type = 'radiolist';

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		$i = 1;
		foreach ($this->choices as $k => $v) {
			$found = is_array($this->value) ? (in_array($k, $this->choices)) : false;
			$this->strHTML .= '<span class="cb-item cb-item-' . $i . '">';
			$this->strHTML .= '<input class="radio" name="' . $this->keyword . '" type="radio" id="' . $this->keyword . '-' . $i . '" value="' . $k . '"' . ($found ? ' checked="checked"' : '') . ' /> ';
			$this->strHTML .= '<label for="' . $this->keyword . '-' . $i . '">' . $v . '</label>';
			$this->strHTML .= '</span>';
			$i++;
		}
	}

}

endif;


if (!class_exists('Padd_Input_Colorpicker')) :

/**
 * An class to render the textfield input in HTML.
 *
 * @author Themecredible Team
 * @version 1.0.0
 */
class Padd_Input_Colorpicker extends Padd_Input {

	public $type = 'colorpicker';

	/**
	 * @see Padd_Input::_generate_html()
	 */
	protected function _generate_html() {
		$this->strHTML .= '<input name="' . $this->id . '" type="text" class="colorpicker" id="' . $this->id . '" value="' . $this->value . '" />';
	}

}

endif;
