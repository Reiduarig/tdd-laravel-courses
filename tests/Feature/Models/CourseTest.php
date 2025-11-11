<?php

use App\Models\Course;

it('only return released courses for released scope', function () {

    // Arrange: Create some course data in the database

    $firstCourse = Course::factory()->released()->create();

    $secondCourse = Course::factory()->create();

    // Act & Assert: Verify the released scope works as expected

    expect(Course::released()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual($firstCourse->id);

});

it('has videos', function () {

    // Arrange: Create a course and some associated videos

    $course = Course::factory()->create();

    $videos = \App\Models\Video::factory()->count(3)->create([
        'course_id' => $course->id,
    ]);

    // Act & Assert: Verify the relationship between course and videos

    expect($course->videos)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(\App\Models\Video::class);

});
