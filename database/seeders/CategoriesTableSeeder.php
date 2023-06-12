<?php
namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name'       => '1st category1',
                'year'       => '1st Year',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '1st category2',
                'year'       => '1st Year',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '1st category3',
                'year'       => '1st Year',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'name'       => '2nd category1',
                'year'       => '2nd Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '2nd category2',
                'year'       => '2nd Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '2nd category3',
                'year'       => '2nd Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'name'       => '3rd category1',
                'year'       => '3rd Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '3rd category2',
                'year'       => '3rd Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '3rd category3',
                'year'       => '3rd Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '4th category1',
                'year'       => '4th Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '4th category2',
                'year'       => '4th Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => '4th category3',
                'year'       => '4th Year ',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            //LEARNING SYLE
            [
                'name'       => 'LEARNING STYLE PART 1',
                'year'       => 'LEARNINGSTYLE',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => 'LEARNING STYLE PART 2',
                'year'       => 'LEARNINGSTYLE',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => 'LEARNING STYLE PART 3',
                'year'       => 'LEARNINGSTYLE',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'       => 'LEARNING STYLE PART 4',
                'year'       => 'LEARNINGSTYLE',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        
        
        Category::insert($categories);
    }
}
