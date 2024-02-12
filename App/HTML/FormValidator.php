<?php

namespace App\HTML;

class FormValidator
{
    private $data;
    private $errors = [];
    private $session;

    public function __construct($data, $session)
    {
        $this->data = $data;
        $this->session = $session;
    }

    public function validate()
    {
        $this->validateCSRF();
        $this->validateTitle();
        $this->validatePrice();
        $this->validateDescription();

        return $this->errors;
    }

    private function validateTitle()
    {
        if (isset($this->data['title']) && strlen($this->data['title']) > 10) {
            $this->errors['title'] = 'Titre trop long, veuillez ne pas dépasser 10 caractères';
        }
    }

    private function validatePrice()
    {
        if (isset($this->data['price']) && strlen($this->data['price']) > 10) {
            $this->errors['price'] = 'Prix trop long, veuillez ne pas dépasser 10 caractères';
        }
    }

    private function validateDescription()
    {
        if (isset($this->data['description']) && strlen($this->data['description']) > 200) {
            $this->errors['description'] = 'Texte trop long, veuillez ne pas dépasser 200 caractères';
        }
    }

    private function validateCSRF()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($this->data['csrf_token']) || $this->data['csrf_token'] !== $_SESSION['csrf_token']) {
                $this->errors['csrf_token'] = 'Erreur CSRF : jeton invalide.';
            }
        }
    }

    public function getData()
    {
        return $this->data;
    }
}
