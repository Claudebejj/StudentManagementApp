<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;

class StudentControllerTest extends TestCase
{
    //use RefreshDatabase; // Refresh the database before each test

    public function testGetAllStudents()
    {
        Student::factory()->count(5)->create();
        $response = $this->get('/api/students');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

}
