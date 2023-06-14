<?php

namespace App\Custom;

use App\Models\Route;
use Illuminate\Support\Str;

class ImageHandler {

    
    private function encryptImage($image) {

        $encryptedImage = Str::random(32).".".$image->getClientOriginalExtension();

        return $encryptedImage;
    }

    private function storeImage($image, $encryptedImage, $imagePath) {

        $image->move(public_path($imagePath), $encryptedImage);

    }

    private function updateField($fields, $fieldName, $encryptedImage) {

        $fields[$fieldName] = $encryptedImage;

        return $fields;

    }

    public function execute($image, $imagePath, $field, $fieldName) {

        $encryptedImage = $this->encryptImage($image);
        $this->storeImage($image, $encryptedImage, $imagePath);
        $updatedFields = $this->updateField($field, $fieldName, $encryptedImage);
        
        return $updatedFields;

    }

}

?>