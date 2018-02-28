<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clearing the categories and subcategories tables
        Category::truncate();
        Subcategory::truncate();

        // creating 1 main category
        Category::create([
            'name' => 'Sport'
        ]);   

        // creating 1 subcategory
        Subcategory::create([
            'category_id' => 1,
            'name' => 'football'
        ]);      
    }
}
