<?php
use Illuminate\Support\Collection;

Form::macro('textField', function ($name, $label = null, $value = null, $attributes = []) {
    if (isset($attributes['type']) && $attributes['type'] == 'number') {
        $element = Form::input('number', $name, $value, fieldAttributes($name, $attributes));
    } else {
        $element = Form::text($name, $value, fieldAttributes($name, $attributes));
    }

    return fieldWrapper($name, $element, $label);
});
Form::macro('emailField', function ($name, $label = null, $value = null, $attributes = []) {
    $element = Form::email($name, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});
Form::macro('passwordField', function ($name, $label = null, $value = null, $attributes = []) {
    $element = Form::password($name, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('textareaField', function ($name, $label = null, $value = null, $attributes = []) {
    if (!isset ($attributes ['rows'])) {
        $attributes = array_merge($attributes, [
            'rows' => 3,
        ]);
    }
    $element = Form::textarea($name, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('selectField', function ($name, $options, $label = null, $value = null, $attributes = array()) {
    if ($options instanceof Collection) {
        $options = $options->toArray();
    }
    if (!empty($attributes['defaultValue'])) {
        $options = ['' => $attributes['defaultValue']] + $options;
    } else {
        $options = ['' => trans('common.choose')] + $options;
    }
    if (isset($attributes['choose']) && $attributes['choose'] == false) {
        unset($options[''], $attributes['choose']);
    }

    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));
    return fieldWrapper($name, $element, $label);
});


Form::macro('checkboxField', function ($name, $displayName = null, $value = 1, $checked = null, $attributes = []) {
    if (empty($displayName)) {
        $displayName = $name;
    }
    $element = checkBox($name, $displayName, $value, $checked, $attributes);

    return fieldWrapper($name, $element, $displayName);
});
Form::macro('fileField', function ($name, $displayName = null, $attributes = []) {
    if (empty($displayName)) {
        $displayName = $name;
    }
    $element = Form::file($name, $attributes);

    return fieldWrapper($name, $element, $displayName) . '<br>';
});
Form::macro('staticField', function ($name, $value, $class = null) {
    $element = '<p class="' . ($class != null ? $class : 'form-control-static') . '">' . $value . '</p>';

    return fieldWrapper($name, $element, $name);
});
Form::macro('captchaField', function ($label) {
    $element = app('captcha')->display([], 'fa_IR');

    return fieldWrapper('g-recaptcha-response', $element, $label);
});
Form::macro('radioField', function ($name, $displayName, $value = 1, $checked = null, $attributes = []) {
    return radio($name, $displayName, $value, $checked, $attributes);
});

/**
 * Return the html to render an individual radio control
 *
 * @param string $name
 *            - name of the radio
 * @param string $displayName
 *            - display name of the radio
 * @param string $value
 *            - value of control if selected
 * @param string $checked
 *            - is the radio selected?
 * @param array $attributes
 *            - other attributes (class, id etc)
 * @return string - The html rendering of the radio control
 */
if (!function_exists('radio')) {
    function radio($name, $displayName, $value, $checked = null, $attributes = [])
    {
        $out = '';
        $attributes = array_merge([
        ], $attributes);
        if (!empty($displayName)) {
            $out .= '<label for="' . $name . '">' . $displayName . '</label>';
        }
        $out .= Form::radio($name, $value, $checked, $attributes);

        return $out;
    }
}
/**
 * Return the html to render an individual checkbox control
 *
 * @param string $name
 *            - Name of the checkbox
 * @param string $displayName
 *            - Display name of the checkbox
 * @param string $value
 *            - Value if control is checked
 * @param string $checked
 *            - Is the checkbox checked by default
 * @param array $attributes
 *            - other attributes (class, id etc)
 * @return string - html rendering of the checkbox control. Note that
 *         it includes a hidden field. This simplifies form processing when checkbox is unchecked
 */
if (!function_exists('checkBox')) {
    function checkBox($name, $displayName, $value = 1, $checked = null, $attributes = [])
    {
        $out = '';
        $attributes = array_merge([
        ], $attributes);
        $out .= '<input name="' . $name . '" type="hidden" value="0" />'; // spl handling for checkbox that is not checked
        // $out .= Form::hidden($name, 0); //note that this does NOT work well!
        $out .= Form::checkbox($name, $value, $checked, $attributes);

        return $out;
    }
}
/**
 * Wrap an element with twitter bootstrap 3.0 specific code for proper rendering
 *
 * @param string $field
 *            - field name
 * @param string $element
 *            - html rendering of internal form element to be output
 * @param string $label
 *            - label that is displayed to the left
 * @return string - formatted html with all divs etc for final display on screen
 */
if (!function_exists('fieldWrapper')) {
    function fieldWrapper($field, $element, $label = null)
    {
        $out = fieldLabel($field, $label, $element); // gen label
        $out .= errorMessage($field); // display error message

        return $out;
    }
}
/**
 * return formatted error message associated with a field
 *
 * @param string $field
 *            - name of the field to be checked for errors
 * @return string - TBS 3.0 formatted span tag that is to be displayed alongside the field
 */
if (!function_exists('errorMessage')) {
    function errorMessage($field)
    {
        if ($errors = Session::get('errors')) {
            if (!empty($errors->first($field))) {
                return '<small class="error">' . $errors->first($field) . '</small>';
            }
        }
    }
}
/**
 * Return string 'has-error' that can be tagged to element div to signal erroneous entry
 *
 * @param string $field
 *            - the field name
 * @return string - 'has-error' in case the field has a validation error
 */
if (!function_exists('fieldError')) {
    function fieldError($field)
    {
        $error = '';
        if ($errors = Session::get('errors')) {
            $error = $errors->first($field) ? ' error' : '';
        }

        return $error;
    }
}
/**
 * html required for displaying the field label.
 * In case an explicit label is not passed,
 * generate one
 *
 * @param unknown $name
 *            - field name
 * @param unknown $label
 *            - label to be used
 * @return string - html for the label (TBS 3.0 formatted)
 */
if (!function_exists('fieldLabel')) {
    function fieldLabel($name, $label, $element)
    {
        $class = null;
        if (strpos($element, 'type="checkbox"') > 0) {
            $class = 'class="checkbox"';
        }
        $out = '<label ' . $class . ' ';
        $out .= fieldError($name) . '>';
        if ($label === null) {
            // remove _id, [].. replace _ and - with space.
            $out .= ucfirst(str_replace([
                '_',
                '-',
            ], ' ', str_replace([
                '_id',
                '[]',
            ], '', $name)));
        } else {
            $out .= $label;
        }
        $out .= $element;
        $out .= '</label>';

        return $out;
    }
}
/**
 * helper function to add required classes (TBS 3.0) for "text input" fields
 *
 * @param string $name
 *            - field name
 * @param array $attributes
 *            - control attribs passed by user
 * @return array - attributes array merged with TBS specific classes
 */
if (!function_exists('fieldAttributes')) {
    function fieldAttributes($name, $attributes = [])
    {
        return array_merge([
            'class' => 'form-control',
        ], $attributes);
    }
}
