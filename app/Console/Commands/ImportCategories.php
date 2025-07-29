<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import categories from Excel and generate embeddings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new CategoriesImport, storage_path('app/Lynx_Keyword_Enhanced_Services.xlsx'));

        $categories = Category::whereNull('embedding')->get();
        foreach ($categories as $category) {
            $text = $category->keywords ?? "{$category->main_category} {$category->sub_category} {$category->service}";
            $embedding = Category::generateEmbedding($text);

            $category->embedding = $embedding;
            $category->save();
        }

        $this->info('Categories imported and embeddings generated.');
    }
}
