<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Create a new question
    public function store(Request $request)
    {
        \Log::info('Request Data:', $request->all());
        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'comment' => 'required|string',
        ]);
      
        $question = Question::create($data);
        \Log::info('Response Data:', ['message' => 'Question created successfully', 'question' => $question]);
        return response()->json(['message' => 'Question created successfully', 'question' => $question]);
    
    }

    // Read all questions
    public function index()
    {
        $questions = Question::all();

        return response()->json(['questions' => $questions]);
    }
    public function searchWithinIds(Request $request)
    {
        $ids = $request->input('ids'); // Get the array of IDs from the request

        // Query the database for questions with specific IDs
        $questions = Question::whereIn('id', $ids)->get();

        return response()->json(['questions' => $questions]);
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
    
        return response()->json(['question' => $question]);
    }
    // Update a question
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'comment' => 'required|string',
        ]);

        $question->update($data);

        return response()->json(['message' => 'Question updated successfully', 'question' => $question]);
    }

    // Delete a question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully']);
    }
}
