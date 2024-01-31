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

    public function input (string $key, string $label, string $class):string
    {

        $value = $this->getValue($key);
        $type = $key === "password" ? "password" : "text";
        return '
        <div class="form-group">
            <label for="' . $key . '">' . $label . '</label>
            <input class="' .$class . '" type="'. $type . '" id="' . $key . '" class="form-control" name="' . $key . '" value="' . $value . '" required >
            ' . $this->getErrorFeedback($key) .'
        </div>';
    }


    private function getValue(string $key)
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        // Ajoutez cette vérification pour s'assurer que $this->data n'est pas null
        if ($this->data !== null) {
            $method = 'get' . ucfirst($key);
            return $this->data->$method();
        }  
        return null; // Si $this->data est null, retourne null.
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