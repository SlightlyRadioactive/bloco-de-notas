<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Note;

class DataMergerService
{
    public static function getCategoriesAndNotes()
    {
        $categories = Category::query()->orderBy('created_at', 'desc')->get();
        $notes = Note::query()->orderBy('created_at', 'desc')->paginate(15);

        return [
            'categories' => $categories,
            'notes' => $notes
        ];
    }


}