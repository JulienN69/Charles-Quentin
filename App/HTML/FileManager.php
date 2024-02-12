<?php

namespace App\HTML;

class FileManager
{
    public function uploadFile(array $file, $uploadCategory = null)
    {
        $errors = [];

        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'Aucun fichier téléchargé ou erreur de téléchargement';
            return $errors;
        }

        var_dump('test 3');

        if ($uploadCategory !== null) {
            $destinationUpload = 'C:\xampp\htdocs\charles_cantin\assets\images/'.$uploadCategory .'/';
        } else {
            $destinationUpload = 'C:\xampp\htdocs\charles_cantin\assets\images/';
        }


        $tmp_name = $file['tmp_name'];
        $name = basename($file['name']);
        $extension = pathinfo($name, PATHINFO_EXTENSION); 

        $typesAutorises = array('image/jpeg', 'image/png');
        $type = $file['type'];

        if (!in_array($type, $typesAutorises)) {
            $errors[] = 'Fichier non autorisé, seuls les jpg et les png sont acceptés.';
            return $errors;
        }
            
        $maxFileSize = 5 * 1024 * 1024;     

        if ($file['size'] > $maxFileSize) {
            $errors[] = 'La taille du fichier dépasse la limite autorisée.';
            return $errors;
        }

        $nomUnique = time() . '_' . mt_rand() . '.' . $extension;

        if (move_uploaded_file($tmp_name, $destinationUpload . $nomUnique)) {
            return $nomUnique;
        } else {
            $errors[] = 'Erreur lors du téléchargement';
            return $errors;
        }
    }
    
    public function deleteFile(string $file): void
    {
        $directory = 'assets/images/'; 
        $filePath = $directory . $file;
    
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                return; 
            } else {
                throw new \Exception('Erreur lors de la suppression du fichier.');
            }
        } else {
            throw new \Exception('Le fichier à supprimer n\'existe pas.');
        }
    }
    
}
