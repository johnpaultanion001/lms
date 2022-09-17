<?php
namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::all();

        foreach($questions as $question)
        {
            $correctOption = rand(1,4);

            foreach(range(1,4) as $index)
            {
                $question->questionOptions()->create([
                    'option_text' => 'is an object that represents something else, such as another object, or an abstract concept.',
                    'points' => $index == $correctOption ? 1 : 0,
                ]);
            }
        }
    }
}
