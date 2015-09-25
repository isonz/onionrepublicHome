<?php

if (!class_exists('Padd_AdminPanel')) :

class Padd_AdminPanel {

	public $slug;
	public $name;
	public $menu_name;
	public $description;
	public $fields;

	function __construct($slug, $name, $menu_name, $description) {
		$this->slug = $slug;
		$this->name = $name;
		$this->menu_name = $menu_name;
		$this->description = $description;
		$this->fields = array();
	}

	function get_field($name) {
		if (isset($this->fields[$name])) {
			return $this->fields[$name];
		} else {
			return null;
		}
	}

	function count_fields() {
		return count($this->fields);
	}

	function add_field($field) {
		$this->fields[$field->id] = $field;
	}

	function get_field_names() {
		return array_keys($this->fields);
	}

	function __toString() {
		$strHTML  = '';
		$strHTML .= '<fieldset id="padd-admin-tab-' . $this->slug . '">';
		$strHTML .= '<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">';
		$strHTML .= '<h3>' . $this->name . '</h3>';
		$strHTML .= '<p>' . $this->description . '</p>';
		$strHTML .= '<table class="form-table">';
		foreach ($this->fields as $field) {
			$field->set_value(Padd_Option::get($field->id));
			$strHTML .= (string) $field;
		}
		$strHTML .= '</table>';
		$strHTML .= '<p class="submit">';
		$strHTML .= '<button class="button button-primary" name="action" type="submit" value="' . $this->slug . '">' .  __('Save Settings', PADD_THEME_SLUG) . '</button>';
		$strHTML .= ' ';
		$strHTML .= '<button class="button" name="action" type="submit" value="reset">' .  __('Reset All Settings', PADD_THEME_SLUG) . '</button>';
		$strHTML .= '</p>';
		$strHTML .= '</form>';
		$strHTML .= '</fieldset>';
		return $strHTML;
	}

}

endif;