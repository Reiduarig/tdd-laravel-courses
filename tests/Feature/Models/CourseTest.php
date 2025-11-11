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
