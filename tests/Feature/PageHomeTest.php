<?php

use App\Models\Course;
use Carbon\Carbon;

use function Pest\Laravel\get;

it('shows courses overview', function () {

    // Arrange: Create some course data in the database

    $firstCourse = Course::factory()->released()->create();

    $secondCourse = Course::factory()->released()->create();

    $thirdCourse = Course::factory()->released()->create();

    // Act & Assert: Make a GET request to the home page
    get(route('home'))
        ->assertSeeText([
            $firstCourse->title,
            $firstCourse->description,
            $secondCourse->title,
            $secondCourse->description,
            $thirdCourse->title,
            $thirdCourse->description,
        ]);

});

it('shows only released courses', function () {

    // Arrange: Create both released and unreleased courses in the database

    $releasedCourse = Course::factory()->released()->create();

    $notReleasedCourse = Course::factory()->create();

    // Act & Assert: Make a GET request to the home page
    get(route('home'))
        ->assertSeeText($releasedCourse->title)
        ->assertDontSeeText($notReleasedCourse->title);
});

it('shows courses by release date', function () {

    // Arrange: Create courses with different release dates in the database

    $releasedCourse = Course::factory()->released(Carbon::yesterday())->create();

    $newestReleasedCourse = Course::factory()->released()->create();

    // Act & Assert: Make a GET request to the home page

    get(route('home'))
        ->assertSeeTextInOrder([
            $newestReleasedCourse->title,
            $releasedCourse->title,
        ]);
});
