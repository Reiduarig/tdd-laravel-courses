<?php

use function Pest\Laravel\get;
use App\Models\Course;

test('the application returns a successful response', function () {

    // Act & Assert, make a GET request to the home page and assert a 200 OK response
    get(route('home'))
        ->assertOk();
});


it('gives back successful response on course details page', function () {

   // Arrange
    $course = Course::factory()->create();

    // Act & Assert
    get(route('course-details', $course))
        ->assertOk();
});