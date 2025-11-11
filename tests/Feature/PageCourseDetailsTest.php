<?php   

use function Pest\Laravel\get;
use App\Models\Course;

it('shows courses details', function () {

    // Arrange: Create some course data in the database

    $course = Course::factory()->released()->create([
        'tagline' => 'Learn TDD with Laravel',
        'image' => 'image.png',
        'learnings' => [
            'Write tests first',
            'Use Pest for testing',
            'Build Laravel applications',
        ],
    ]);

    // Act & Assert: Make a GET request to the course details page and assert the content
    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->description,
            'Learn TDD with Laravel',
            'Write tests first',
            'Use Pest for testing',
            'Build Laravel applications',
        ])
        ->assertSee('image.png');
   
});

it('shows course video count', function () {

    // Arrange: Create some course data in the database

   
});