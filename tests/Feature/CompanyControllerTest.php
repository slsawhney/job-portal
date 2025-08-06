<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $company;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->company = Company::factory()->create(['owner_id' => $this->user->id]);
    }

    public function test_index_displays_user_companies()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('companies.index'));
        $response->assertStatus(200);
        $response->assertViewHas('companies');
    }

    public function test_show_displays_company_and_jobs()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('companies.show', $this->company));
        $response->assertStatus(200);
        $response->assertViewHas('company');
        $response->assertViewHas('jobs');
    }

    public function test_create_displays_company_creation_form()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('companies.create'));
        $response->assertStatus(200);
    }

    public function test_edit_displays_company_edit_form()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('companies.edit', $this->company));
        $response->assertStatus(200);
        $response->assertViewHas('company');
    }

    public function test_update_modifies_company_data()
    {
        $this->actingAs($this->user);

        $response = $this->put(route('companies.update', $this->company), [
            'name' => 'Updated Company Name',
            'location' => 'Updated Location',
            'description' => 'Updated company description with enough characters.',
        ]);

        $response->assertRedirect(route('companies.index'));
        $this->assertDatabaseHas('companies', ['name' => 'Updated Company Name']);
    }

    public function test_store_creates_new_company()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('companies.store'), [
            'name' => 'New Company',
            'location' => 'New Location',
            'description' => 'Description long enough to pass validation.',
        ]);

        $response->assertRedirect(route('companies.index'));
        $this->assertDatabaseHas('companies', ['name' => 'New Company']);
    }

    public function test_destroy_deletes_company()
    {
        $this->actingAs($this->user);

        $response = $this->delete(route('companies.destroy', $this->company));
        $response->assertRedirect(route('companies.index'));
        $this->assertDatabaseMissing('companies', ['id' => $this->company->id]);
    }
}
