<?php

namespace Database\Seeders;

use App\Models\TestQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestQuestion::create([
            'test_id' => 1,
            'question' => 'Which method is used to initialize the state in a React component?',
            'option1' => 'constructor()',
            'option2' => 'componentDidMount()',
            'option3' => 'componentDidUpdate()',
            'option4' => 'render()',
            'option5' => 'setState()',
            'correct_option' => 1,
            'xp' => 10
        ]);
        TestQuestion::create([
            'test_id' => 1,
            'question' => 'What is the purpose of the render() method in React components?',
            'option1' => 'It updates the components state.',
            'option2' => 'It handles user input and triggers events.',
            'option3' => 'It returns the JSX representation of the component.',
            'option4' => 'It fetches data from an API.',
            'option5' => 'It defines the components lifecycle methods.',
            'correct_option' => 3,
            'xp' => 10
        ]);
        TestQuestion::create([
            'test_id' => 1,
            'question' => 'How can you pass data from a parent component to a child component in React?',
            'option1' => 'By using the setState() method.',
            'option2' => 'By using the props system.',
            'option3' => 'By using the componentDidMount() method.',
            'option4' => 'By using the render() method.',
            'option5' => 'By using the constructor() method.',
            'correct_option' => 2,
            'xp' => 10
        ]);
        TestQuestion::create([
            'test_id' => 1,
            'question' => 'True or False: In React.js, a components state can be directly modified outside of the component itself.',
            'option1' => 'True',
            'option2' => 'False',
            'correct_option' => 2,
            'xp' => 20
        ]);
    }
}
