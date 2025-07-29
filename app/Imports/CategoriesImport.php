<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class CategoriesImport implements ToModel, SkipsEmptyRows
{
    protected $isFirstRow = true;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Skip the first row (headers)
        if ($this->isFirstRow) {
            $this->isFirstRow = false;
            return null;
        }

        $mainCategory = $row[0] ?? '';
        $subCategory  = $row[1] ?? '';
        $service      = $row[2] ?? '';

        $exists = Category::where('main_category', $mainCategory)
            ->where('sub_category', $subCategory)
            ->where('service', $service)
            ->exists();

        if ($exists) {
            return null;
        }

        return new Category([
            'main_category' => $mainCategory,
            'sub_category'  => $subCategory,
            'service'       => $service,
        ]);
    }
}
