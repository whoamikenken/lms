<?php
namespace Database\Seeders;

use App\Models\Question;
use App\Models\Option;
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
        $questions = Question::whereNotIn('isLearningStyle', [true])->get();

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


        $options = [
            ///Q1
            [
                'option_text'       => 'try it out',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 61,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'think it through',
                'value_learning_style'     => 'Active',

                'question_id'         => 61,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q2
            [
                'option_text'       => 'realistic',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 62,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'innovative',
                'value_learning_style'     => 'Active',

                'question_id'         => 62,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q3
            [
                'option_text'       => 'a picture',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 63,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'words',
                'value_learning_style'     => 'Active',

                'question_id'         => 63,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q4
            [
                'option_text'       => 'understand the overall structure but may be fuzzy about details.',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 64,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'understand details of a subject but may be fuzzy about its overall structure.',
                'value_learning_style'     => 'Active',

                'question_id'         => 64,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q5
            [
                'option_text'       => 'think about it',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 65,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'talk about it',
                'value_learning_style'     => 'Active',

                'question_id'         => 65,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q6
            [
                'option_text'       => 'that deals with ideas and theories',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 66,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'that deals with facts and real life situations',
                'value_learning_style'     => 'Active',

                'question_id'         => 66,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q7
            [
                'option_text'       => 'pictures, diagrams, graphs, or maps.',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 67,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'written directions or verbal information.',
                'value_learning_style'     => 'Active',

                'question_id'         => 67,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q8
            [
                'option_text'       => 'all the parts, I understand the whole thing',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 68,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'the whole thing, I see how the parts fit',
                'value_learning_style'     => 'Active',

                'question_id'         => 68,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q3
            [
                'option_text'       => 'jump in and contribute ideas',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 69,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'sit back and listen',
                'value_learning_style'     => 'Active',

                'question_id'         => 69,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q10
            [
                'option_text'       => 'to learn concepts',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 70,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'to learn facts',
                'value_learning_style'     => 'Active',

                'question_id'         => 70,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q11
            [
                'option_text'       => 'look over the pictures and charts carefully',
                'value_learning_style'     => 'Reflective',

                'question_id'         => 71,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'words',
                'value_learning_style'     => 'Active',

                'question_id'         => 71,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
           
            //Part 2
            ///Q12
             [
                'option_text'       => 'I usually work my way to the solutions one step at a time',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 72,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'I often just see the solutions but then have to struggle to figure out the steps to get to them',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 72,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q13
            [
                'option_text'       => 'I have rarely gotten to know many of the students',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 73,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'I have usually gotten to know many of the students',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 73,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q14
            [
                'option_text'       => 'something that gives me new ideas to think about',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 74,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'something that teaches me new facts or tells me how to do something.',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 74,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q15
            [
                'option_text'       => 'who put a lot of diagrams on the board',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 75,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'who spend a lot of time explaining',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 75,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q16
            [
                'option_text'       => 'I just know what the themes are when I finish reading and then I have to go back and find the incidents that demonstrate them.',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 76,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'I think of the incidents and try to put them together to figure out the themes.',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 76,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q17
            [
                'option_text'       => 'start working on the solution immediately',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 77,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'try to fully understand the problem first',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 77,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q18
            [
                'option_text'       => 'theory',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 78,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'certainty',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 78,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q19
            [
                'option_text'       => 'what I hear',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 79,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'what I see',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 79,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q20
            [
                'option_text'       => 'give me an overall picture and relate the material to other subjects',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 80,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'lay out the material in clear sequential steps',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 80,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q21
            [
                'option_text'       => 'in a study group',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 81,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'alone',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 81,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            ///Q22
            [
                'option_text'       => 'creative about how to do my work',
                'value_learning_style'     => 'Sensing',

                'question_id'         => 82,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'careful about the details of my work',
                'value_learning_style'     => 'Intuitive',

                'question_id'         => 82,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Part 3
            //Q23
            [
                'option_text'       => 'a map',
                'value_learning_style'     => 'Visual',

                'question_id'         => 83,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => 'written directions',
                'value_learning_style'     => 'Verbal',

                'question_id'         => 83,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q24
            [
                'option_text'       => "at a fairly regular pace. If I study hard, I'll 'get it.'",
                'value_learning_style'     => 'Visual',

                'question_id'         => 84,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "in fits and starts. I'll be totally confused and then suddenly it all 'clicks'",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 84,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q25
            [
                'option_text'       => "try things out",
                'value_learning_style'     => 'Visual',

                'question_id'         => 85,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "think about how I'm going to do it",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 85,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q26
            [
                'option_text'       => "clearly say what they mean",
                'value_learning_style'     => 'Visual',

                'question_id'         => 86,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "say things in creative, interesting ways",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 86,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q27
            [
                'option_text'       => "what the instructor said about it",
                'value_learning_style'     => 'Visual',

                'question_id'         => 87,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "the picture",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 87,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q28
            [
                'option_text'       => "focus on details and miss the big picture",
                'value_learning_style'     => 'Visual',

                'question_id'         => 88,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "try to understand the big picture before getting into the details",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 88,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q29
            [
                'option_text'       => "something I have thought a lot about",
                'value_learning_style'     => 'Visual',

                'question_id'         => 89,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "something I have done.",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 89,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q30
            [
                'option_text'       => "come up with new ways of doing it",
                'value_learning_style'     => 'Visual',

                'question_id'         => 90,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "master one way of doing it",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 90,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q31
            [
                'option_text'       => "charts or graphs",
                'value_learning_style'     => 'Visual',

                'question_id'         => 91,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "text summarizing the results",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 91,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q32
            [
                'option_text'       => "work on (think about or write) the beginning of the paper and progress forward",
                'value_learning_style'     => 'Visual',

                'question_id'         => 92,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "work on (think about or write) different parts of the paper and then order them.",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 92,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q33
            [
                'option_text'       => "have 'group brainstorming' where everyone contributes ideas",
                'value_learning_style'     => 'Visual',

                'question_id'         => 93,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "brainstorm individually and then come together as a group to compare ideas",
                'value_learning_style'     => 'Verbal',

                'question_id'         => 93,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Part 4
            //Q34
            [
                'option_text'       => "sensible",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 94,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "imaginative",
                'value_learning_style'     => 'Global',

                'question_id'         => 94,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q35
            [
                'option_text'       => "what they looked like",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 95,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "what they said about themselves",
                'value_learning_style'     => 'Global',

                'question_id'         => 95,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q36
            [
                'option_text'       => "try to make connections between that subject and related subjects",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 96,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "stay focused on that subject, learning as much about it as I can",
                'value_learning_style'     => 'Global',

                'question_id'         => 96,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q37
            [
                'option_text'       => "reserved",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 97,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "outgoing",
                'value_learning_style'     => 'Global',

                'question_id'         => 97,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q38
            [
                'option_text'       => "concrete material (facts, data)",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 98,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "abstract material (concepts, theories)",
                'value_learning_style'     => 'Global',

                'question_id'         => 98,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q39
            [
                'option_text'       => "read a book",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 99,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "watch television",
                'value_learning_style'     => 'Global',

                'question_id'         => 99,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q40
            [
                'option_text'       => "somewhat helpful to me",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "very helpful to me",
                'value_learning_style'     => 'Global',

                'question_id'         => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q41
            [
                'option_text'       => "easily and fairly accurately",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 101,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "with difficulty and without much detail",
                'value_learning_style'     => 'Global',

                'question_id'         => 101,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q42
            [
                'option_text'       => "think of the steps in the solutions process",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 102,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "think of possible consequences or applications of the solution in a wide range of areas",
                'value_learning_style'     => 'Global',

                'question_id'         => 102,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q43
            [
                'option_text'       => "somewhat helpful to me",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 103,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "very helpful to me",
                'value_learning_style'     => 'Global',

                'question_id'         => 103,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Q44
            [
                'option_text'       => "think of the steps in the solutions process",
                'value_learning_style'     => 'Sequential',

                'question_id'         => 104,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'option_text'       => "think of possible consequences or applications of the solution in a wide range of areas",
                'value_learning_style'     => 'Global',

                'question_id'         => 104,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
           
        ];

        Option::insert($options);
    }
}
