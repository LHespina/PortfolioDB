<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        // Sample data for questions
        $questions = [
            [
                'full_name' => 'John Doe',
                'email' => 'john@example.com',
                'phone_number' => '123-456-7890',
                'comment' => 'This is a sample question.',
            ],
            // Add more sample data as needed
        ];

        // Insert the data into the "questions" table
        DB::table('questions')->insert($questions);
    }
}