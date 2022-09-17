<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        foreach($categories as $category)
        {
            foreach(range(1,5) as $index)
            {
                $category->categoryQuestions()->create([
                    'question_text' => 'What is a token?',
                ]);
            }
        }
    }
}
