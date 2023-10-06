<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;

class CourseControllerTest extends TestCase
{
    //use RefreshDatabase; // Refresh the database before each test

    public function testGetAllCourses()
    {
        Course::factory()->count(5)->create();
        $response = $this->get('/api/courses');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

}
