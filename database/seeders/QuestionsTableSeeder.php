<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
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
        $categories = Category::whereNotIn('year', ['LEARNINGSTYLE'])->get();

        foreach($categories as $category)
        {
            foreach(range(1,5) as $index)
            {
                $category->categoryQuestions()->create([
                    'question_text' => 'What is a token? ' .$category->name,
                ]); 
            }
        }

        $questions = [
            [
                'question_text'       => 'I understand something better after I',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I would rather be considered',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I think about what I did yesterday, I am most likely to get',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I tend to',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I am learning something new, it helps me to',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'If I were a teacher, I would rather teach a course',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I prefer to get new information in',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'Once I understand',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'In a study group working on difficult material, I am more likely to',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I find it easier',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'In a book with lots of pictures and charts, I am likely to',
                'isLearningStyle'     => true,
                'category_id'         => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            //part 2
            [
                'question_text'       => 'When I solve math problems',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'In classes I have taken',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'In reading nonfiction, I prefer',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I like teachers',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => "When I'm analyzing a story or a novel",
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'question_text'       => 'When I start a homework problem, I am more likely to',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I prefer the idea of',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I remember best',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'It is more important to me that an instructor',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I prefer to study ',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I am more likely to be considered',
                'isLearningStyle'     => true,
                'category_id'         => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //PART 3
            [
                'question_text'       => 'When I get directions to a new place, I prefer',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I learn',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I would rather first',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I am reading for enjoyment, I like writers to',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I see a diagram or sketch in class, I am most likely to remember',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When considering a body of information, I am more likely to',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I more easily remember',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I have to perform a task, I prefer to',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When someone is showing me data, I prefer ',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When writing a paper, I am more likely to',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I have to work on a group project, I first want to',
                'isLearningStyle'     => true,
                'category_id'         => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //PART 4
            [
                'question_text'       => 'I consider it higher praise to call someone',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I meet people at a party, I am more likely to remember',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I am learning a new subject, I prefer to',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I am more likely to be considered',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I prefer courses that emphasize',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'For entertainment, I would rather',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'Some teachers start their lectures with an outline of what they will cover. Such outlines are',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'The idea of doing homework in groups, with one grade for the entire group',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When I am doing long calculations',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'I tend to picture places I have been',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'question_text'       => 'When solving problems in a group, I would be more likely to',
                'isLearningStyle'     => true,
                'category_id'         => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

        ];

        Question::insert($questions);


    }
}
