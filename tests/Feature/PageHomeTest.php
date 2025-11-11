<?php
use function Pest\Laravel\get;
use App\Models\Course;

it('shows courses overview', function () {

    // Arrange: Create some course data in the database

    Course::factory()->create([
        'title' => 'Introduction to Testing',
        'description' => 'Learn the basics of testing in Laravel.',
    ]);

    Course::factory()->create([
        'title' => 'Advanced Laravel',
        'description' => 'Deep dive into advanced Laravel features.',
    ]);

    Course::factory()->create([
        'title' => 'PHP for Beginners',
        'description' => 'Start your journey with PHP programming.',
    ]);

    // Act & Assert: Make a GET request to the home page
    get(route('home'))
        ->assertSeeText([
            'Introduction to Testing',
            'Learn the basics of testing in Laravel.',
            'Advanced Laravel',
            'Deep dive into advanced Laravel features.',
            'PHP for Beginners',
            'Start your journey with PHP programming.',
        ]);


});


it('shows only released courses', function () {

    // Arrange: Create both released and unreleased courses in the database

    // Act: Make a GET request to the home page

    // Assert: Check that only released courses are shown in the response

});

it('shows courses by release date', function () {
    
    // Arrange: Create courses with different release dates in the database

    // Act: Make a GET request to the home page

    // Assert: Check that courses are displayed in order of their release dates
});