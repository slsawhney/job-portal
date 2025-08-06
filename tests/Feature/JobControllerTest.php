<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $company;
    protected $job;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->company = Company::factory()->create(['owner_id' => $this->user->id]);
        $this->job = Job::factory()->create(['company_id' => $this->company->id]);
    }

    public function test_index_displays_jobs()
    {
        $response = $this->get(route('jobs.index'));
        $response->assertStatus(200);
        $response->assertViewHas('jobs');
    }

    public function test_show_displays_single_job()
    {
        $response = $this->get(route('jobs.show', $this->job));
        $response->assertStatus(200);
        $response->assertViewHas('job', $this->job);
    }

    public function test_create_requires_authentication()
    {
        $response = $this->actingAs($this->user)->get(route('jobs.create'));
        $response->assertStatus(200);
        $response->assertViewHas('companies');
    }

    public function test_store_creates_job()
    {
        $this->actingAs($this->user);

        $data = [
            'title' => 'New Job',
            'location' => 'Remote',
            'employment_type' => 'full-time',
            'company_id' => $this->company->id,
            'description' => 'A new job opportunity for remote developers.',
        ];

        $response = $this->post(route('jobs.store'), $data);
        $response->assertRedirect(route('companies.show', $this->company->id));
        $this->assertDatabaseHas('jobs', ['title' => 'New Job']);
    }

    public function test_edit_displays_job_form()
    {
        $response = $this->actingAs($this->user)->get(route('jobs.edit', $this->job));
        $response->assertStatus(200);
        $response->assertViewHas('job', $this->job);
    }

    public function test_update_modifies_existing_job()
    {
        $this->actingAs($this->user);

        $response = $this->put(route('jobs.update', $this->job), [
            'title' => 'Updated Job Title',
            'location' => 'Hybrid',
            'employment_type' => 'contract',
            'company_id' => $this->company->id,
            'description' => 'Updated description of the job.',
        ]);

        $response->assertRedirect(route('companies.show', $this->company->id));
        $this->assertDatabaseHas('jobs', ['title' => 'Updated Job Title']);
    }

    public function test_destroy_deletes_job()
    {
        $this->actingAs($this->user);

        $response = $this->delete(route('jobs.destroy', $this->job));
        $response->assertRedirect(route('jobs.index'));
        $this->assertDatabaseMissing('jobs', ['id' => $this->job->id]);
    }

    public function test_search_logs_search_and_filters_results()
    {
        $response = $this->get(route('jobs.search', ['q' => 'Developer', 'location' => 'Remote']));
        $response->assertStatus(200);
        $response->assertViewHas('jobs');
    }
}
