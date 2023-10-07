<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Course;
class CourseControllerTest extends TestCase
{
    use RefreshDatabase; // Reset the database before each test
    public function testGetAllCourses()
    {
        Course::factory()->count(3)->create();
        $response = $this->get('/api/courses');
        $response->assertStatus(200);
        $response->assertJsonCount(3); // Adjust the count as needed
    }
    public function testGetCourseById()
    {
        $course = Course::factory()->create();
        $response = $this->get("/api/courses/{$course->id}");
        $response->assertStatus(200);
        $response->assertJson($course->toArray());
    }
}
