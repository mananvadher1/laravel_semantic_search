<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'main_category' => $row['main_category'] ?? '',
            'sub_category'  => $row['sub_category'] ?? '',
            'service'       => $row['service'] ?? '',
            'keywords'      => $row['keywords'] ?? '',
        ]);
    }
}
