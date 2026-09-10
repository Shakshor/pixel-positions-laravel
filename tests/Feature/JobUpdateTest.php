<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

test('guests cannot view the edit job page', function () {
    $job = Job::factory()->create();

    $this->get("/jobs/{$job->id}/edit")
        ->assertRedirect('/login');
});

test('users cannot view the edit page of a job they do not own', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();
    $employer = Employer::factory()->create(['user_id' => $otherUser->id]);
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    $this->actingAs($user)
        ->get("/jobs/{$job->id}/edit")
        ->assertForbidden();
});

test('owners can view their job edit page', function () {
    $user = User::factory()->create();
    $employer = Employer::factory()->create(['user_id' => $user->id]);
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    $this->actingAs($user)
        ->get("/jobs/{$job->id}/edit")
        ->assertOk()
        ->assertSee($job->title);
});

test('owners can update their job', function () {
    $user = User::factory()->create();
    $employer = Employer::factory()->create(['user_id' => $user->id]);
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
        'title' => 'Old Title',
        'salary' => '$50,000 USD',
        'location' => 'Remote',
        'schedule' => 'Part Time',
        'url' => 'https://example.com/jobs/old',
        'is_featured' => false,
    ]);

    $response = $this->actingAs($user)->patch("/jobs/{$job->id}", [
        'title' => 'Senior Laravel Developer',
        'salary' => '$120,000 USD',
        'location' => 'New York, NY',
        'schedule' => 'Full Time',
        'url' => 'https://example.com/jobs/new',
        'featured' => 'on',
        'tags' => 'php, laravel, backend',
    ]);

    $response->assertRedirect('/');

    $job->refresh();

    expect($job->title)->toBe('Senior Laravel Developer');
    expect($job->salary)->toBe('$120,000 USD');
    expect($job->location)->toBe('New York, NY');
    expect($job->schedule)->toBe('Full Time');
    expect($job->url)->toBe('https://example.com/jobs/new');
    expect((bool) $job->is_featured)->toBeTrue();
    expect($job->tags)->toHaveCount(3);
});

test('job update fails and returns validation errors for invalid data', function () {
    $user = User::factory()->create();
    $employer = Employer::factory()->create(['user_id' => $user->id]);
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    $response = $this->actingAs($user)->patch("/jobs/{$job->id}", [
        'title' => '',
        'salary' => '',
        'location' => '',
        'schedule' => 'Invalid Schedule',
        'url' => 'not-a-valid-url',
    ]);

    $response->assertSessionHasErrors(['title', 'salary', 'location', 'schedule', 'url']);
});
