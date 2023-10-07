<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;
class StudentControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testGetAllStudents()
    {
        Student::factory()->count(3)->create();
        $response = $this->get('/api/students');
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
    public function testListStudents()
    {
        Student::factory()->count(3)->create();
        $response = $this->get('/students-list');
        $response->assertStatus(200);
        $response->assertViewHas('students');
    }
    public function testGetStudentById()
    {
        $student = Student::factory()->create();
        $response = $this->get("/api/students/{$student->id}");
        $response->assertStatus(200);
        $response->assertJson($student->toArray());
    }
}
