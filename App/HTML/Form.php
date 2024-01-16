<?php

namespace App\HTML;

class Form 
{

    private $data;

    private $errors;

    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input (string $key, string $label):string
    {

        $value = $this->getValue($key);
        $type = $key === "password" ? "password" : "text";
        return '
        <div class="form-group">
            <label for="' . $key . '">' . $label . '</label>
            <input type="'. $type . '" id="' . $key . '" class="form-control" name="' . $key . '" value="' . $value .'" required >
        </div>';
    }

    public function textarea(string $name, string $label): string
    {
        return '';
    }

    private function getValue(string $key)
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        $method = 'get' . ucfirst($key);
        return $this->data->$method();
    }

    private function getErrorFeedback(string $key):string
    {
        if (isset($this->errors[$key])) {
            if (is_array($this->errors[$key])) {
                $error = implode('<br>', $this->errors[$key]);
            } else {
                $error = $this->errors[$key];
            }
            return '<div class="invalid-feedback">' . $error . '</div>';
        }
        return '';
    }
}