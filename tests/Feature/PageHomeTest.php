<?php
use Carbon\Carbon;
use App\Models\Course;
use function Pest\Laravel\get;

it('shows courses overview', function () {

    // Arrange: Create some course data in the database

    Course::factory()->create([
        'title' => 'Introduction to Testing',
        'description' => 'Learn the basics of testing in Laravel.',
        'release_at' => Carbon::yesterday(),
    ]);

    Course::factory()->create([
        'title' => 'Advanced Laravel',
        'description' => 'Deep dive into advanced Laravel features.',
        'release_at' => Carbon::tomorrow(),
    ]);

    Course::factory()->create([
        'title' => 'PHP for Beginners',
        'description' => 'Start your journey with PHP programming.',
        'release_at' => Carbon::today(),
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

    Course::factory()->create([
        'title' => 'Introduction to Testing',
        'release_at' => Carbon::yesterday(),
    ]);

    Course::factory()->create([
        'title' => 'Advanced Laravel',
        
    ]);

    // Act & Assert: Make a GET request to the home page
    get(route('home'))
        ->assertSeeText('Introduction to Testing')
        ->assertDontSeeText('Advanced Laravel');
});

it('shows courses by release date', function () {
    
    // Arrange: Create courses with different release dates in the database

    Course::factory()->create([
        'title' => 'Introduction to Testing',
        'release_at' => Carbon::yesterday(),
    ]);

    Course::factory()->create([
        'title' => 'Advanced Laravel',
        'release_at' => Carbon::now(),     
    ]);

    // Act & Assert: Make a GET request to the home page

    get(route('home'))
        ->assertSeeTextInOrder([
            'Introduction to Testing',
            'Advanced Laravel',
        ]);
});