<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryColors = [
            'Drinks' => '#90caf9',
            'Coffee' => '#a1887f',
            'Espresso' => '#d32f2f',
            'Tea' => '#81c784',
            'Pastries' => '#f8bbd0',
            'Milkshakes' => '#ffcc80',
            'ColdBrew' => '#78909c',
            'Smoothies' => '#ffb74d',
            'LatteArt' => '#ce93d8',
            'Beans' => '#8d6e63',
        ];

        foreach ($categoryColors as $name => $colour) {
            Category::create(compact("name", "colour"));
        }
    }
}
