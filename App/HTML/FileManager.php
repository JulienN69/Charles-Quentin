<?php

namespace App\HTML;

class FileManager
{

    public function uploadFile(array $file)
    {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return false; // Aucun fichier téléchargé ou erreur de téléchargement
        }
    
        $destinationUpload = 'C:\xampp\htdocs\charles_cantin\assets\images/';
    
        $tmp_name = $file['tmp_name'];
        $name = basename($file['name']);
        $extension = pathinfo($name, PATHINFO_EXTENSION); 
    
        $typesAutorises = array('image/jpeg', 'image/png');
        $type = $file['type'];
    
        if (!in_array($type, $typesAutorises)) {
            throw new \Exception('fichier non autorisé, seuls les jpg et les png sont acceptés.');
        }
    
        $nomUnique = time() . '_' . mt_rand() . '.' . $extension;
    
        if (move_uploaded_file($tmp_name, $destinationUpload . $nomUnique)) {
            return $nomUnique; // Téléchargement réussi
        } else {
            return 'logo.jpg'; // Erreur lors du téléchargement
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
