<?php

use function Pest\Laravel\get;

test('the application returns a successful response', function () {

    // Act & Assert, make a GET request to the home page and assert a 200 OK response
    get(route('home'))
        ->assertOk();
});
