<?php

/** Create Unique Slug */
if(!function_exists('generateUniqueSlug')){
    function generateUniqueSlug($model, $name) : string
    {
        $modelClass = "App\\Models\\$model";

        if(!class_exists($modelClass)){
            throw new Exception("Model class '$model' not found");
        }

        $slug = \Str::slug($name);
        $count = 2;


        while($modelClass::where('slug', $slug)->exists()){
            $slug = $slug . '-' . $count++;
        }

        return $slug;
    }
}


