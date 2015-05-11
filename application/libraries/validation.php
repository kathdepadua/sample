<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of validation
 *
 * @author Julius Tan
 * @modified_by Katherine de Padua
 */
class validation
{
    /**
     * Field label
     */
    var $field = NULL;

    /**
     * Field parameter name
     */
    var $value = NULL;

    /**
     * Constant Globe Prefixes
     */
    public $globe_prefix = array(905, 906, 915, 916, 917, 926, 927, 935, 936, 937, 975, 976, 977, 995, 996, 997);

    /**
     * Error message array
     */
    public $err = array();

    /**
     * Begin
     */
    public function __construct()
    {
        return $this;
    }

    /**
     * @method Field Name
     * 
     * @param string, field label
     */
    public function field_name($name)
    {
        $this->field = $name;

        return $this;
    }

    /**
     * @method Field Value
     * 
     * @param field name, key 
     */
    public function field_value($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @method Alphanumeric
     * 
     * Check if field input string is alphanumeric
     * 
     * @return error message, null if string is empty
     */
    public function is_alphanumeric()
    {
        if (!empty($this->value)) {
            $string = preg_match('/^[a-zA-Z]/', $this->value);

            if ($string < 1) {
                $this->err[] = $this->field . ' must start with letter and should only contain letters and numbers';
            }
        }

        return $this;
    }

    /**
     * @method No special charcters
     * 
     * Check if field contains special charcters
     * 
     * @return error message, null if string is empty and if string contains special characters
     */
    public function no_special_chars()
    {
        if (!empty($this->value)) {
            $allowed_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz1234567890';

            $chars_length = strlen($allowed_chars);

            $chars_arr = array();

            for ($i = 0; $i <= $chars_length - 1; $i++) {
                $chars_arr[] = substr($allowed_chars, $i, 1);
            }

            $string_length = strlen($this->value);

            $catcher = '';

            for ($i = 0; $i <= $string_length - 1; $i++) {
                if (!in_array(substr($this->value, $i, 1), $chars_arr)) {
                    $catcher = 1;
                }
            }

            if ($catcher == 1) {
                $this->err[] = $this->field . ' must not contain special charcters';
            }
        }

        return $this;
    }

    /**
     * @method Validate email address
     * 
     * Check if email is a valid format
     * 
     * @return error message, null if string is empty
     */
    public function is_email()
    {
        $string = $this->value;

        if (!empty($string)) {
            $is_email = @eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $string);

            if ($is_email < 1) {
                $this->err[] = $this->field . ' is invalid format.';
            }
        }

        return $this;
    }

    /**
     * @method Min/Max string allowed
     * 
     * Limits the min/max input string 
     * 
     * @param int min, int max
     * 
     * @return error message, null if string is empty
     */
    public function char_min_max($min = 0, $max = 0)
    {
        $string = $this->value;

        if (!empty($string)) {
            $c = strlen($string);

            if ($max > $min) {
                if ($c < $min || $c > $max) {
                    $this->err[] = $this->field . ' should be ' . $min . ' to ' . $max . ' characters';
                }
            }else if($max == $min){
                if($c != $min){
                    $this->err[] = $this->field . ' should be ' . $min . ' characters';                
                }
            }
        }

        return $this;
    }

    /**
     * @method Character limit
     * 
     * Limits the input string
     * 
     * @param int limit max
     * 
     * @return error message, null if string is empty
     */
    public function char_limit($limit = NULL)
    {
        $string = $this->value;

        if (!empty($string)) {
            $string = strlen($string);

            if ($string > $limit) {
                $this->err[] = $this->field . ' should not exceed ' . $limit . ' characters';
            }
        }

        return $this;
    }

    /**
     * @method No white spaces
     * 
     * Inpout will be checked for white spaces
     * 
     * @return error message, null if string is empty
     */
    public function no_white_spaces()
    {
        $string = $this->value;

        if (!empty($string)) {
            $string = preg_match('/ | /', $string);

            if ($string > 0) {
                $this->err[] = $this->field . ' should not contain white spaces';
            }
        }

        return $this;
    }

    /**
     * @method Match Password
     * 
     * @param password 1 string, password 2 string
     */
    public function match_password($password_1 = NULL, $password_2 = NULL)
    {
        if (!empty($password_1) && !empty($password_2)) {
            if ($password_1 != $password_2) {
                $this->err[] = 'Passwords does not match';
            }
        }

        return $this;
    }

    /**
     * @method Date Range
     * 
     * Validates the input date range
     * 
     * @param date 1 string, date 2 string
     * 
     * @return error message, null if input strings are empty
     */
    public function date_range($date_1, $date_2)
    {
        if (!empty($date_1) && !empty($date_2)) {
            if (strtotime($date_1) > strtotime($date_2)) {
                $this->err[] = 'Input date range is invalid';
            }
        }

        return $this;
    }

    /**
     * @method Age Range
     * 
     * Validates the input age range
     * 
     * @param age 1 string, age 2 string
     * 
     * @return error message, null if input strings are empty
     */
    public function age_range($age_from, $age_to)
    {
        if (!empty($age_from) && !empty($age_to)) {
            if ($age_from > $age_to) {
                $this->err[] = 'Age range is invalid';
            }
        }

        return $this;
    }

    /**
     * @method Mobile Number
     * 
     * Validates the input mobile number
     * 
     * @return error message, null if input string is empty
     */
    public function is_mobile_number()
    {
        $msisdn = $this->value;

        if (!empty($msisdn)) {
            $c = strlen($msisdn);

            if ($c < 10 || !is_numeric($msisdn)) {
                $this->err[] = 'Invalid mobile number';
            }
        }

        return $this;
    }

    /**
     * @method Numeric values only
     * 
     * Validates the input value as integer
     * 
     * @return error message, null if string is empty
     */
    public function is_numeric()
    {
        $number = $this->value;

        if (!empty($number)) {
            if (!is_numeric($number)) {
                $this->err[] = $this->field . ' should be numeric';
            }
        }

        return $this;
    }

    /**
     * @method Alphabet values only
     * 
     * Validates the input value as alphabets only
     * 
     * @return error message, null if string is empty
     */
    public function is_alpha()
    {
        $string = $this->value;

        if (!empty($string)) {
            if (!is_string($string)) {
                self::$msg = $this->field . ' should only contain alphabets';
            }
        }

        return $this;
    }

    public function is_globe()
    {

        $msisdn = $this->value;

        if (!empty($msisdn)) {
            $is_prefix = substr($this->value, 0, 1);

            if ($is_prefix == 0) {
                $prefix = substr($msisdn, 1, 3);
                $number = substr($msisdn, 1, 11);
            } else if ($is_prefix == 9) {
                $prefix = substr($msisdn, 0, 3);
                $number = $msisdn;
            } else {
                $prefix = substr($msisdn, 0, 3);
                $number = $msisdn;
            }

            if (!in_array($prefix, $this->globe_prefix)) {

                $this->err[] = $this->field . ' is not a Globe subscriber';
            }
        }

        return $this;
    }

    /**
     * @method Required field
     * 
     * Check if input string is not empty
     * 
     * @return error message if string is empty
     * 
     */
    public function required()
    {
        if (empty($this->value)) {
            $this->err[] = $this->field . ' is required';
        }
    }

    /**
     * @method Show error messages
     * 
     * Parse array as string
     * 
     * @return Collected error messages
     */
    public function show_errors()
    {
        if ($this->err) {
            $error = '<div>';

            foreach ($this->err as $value) {
                $error .= '<span>' . $value . '</span>';
            }

            $error .= '</div>';

            return $error;
        }

        return '&nbsp;';
    }

    public function destruct()
    {
        unset($this);
    }

}
?>
