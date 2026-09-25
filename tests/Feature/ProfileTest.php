<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

test('guests are redirected to login when visiting profile', function () {
    $this->get('/profile')
        ->assertRedirect('/login');
});

test('authenticated users can view their profile page with account and company details', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
    $employer = Employer::factory()->create([
        'user_id' => $user->id,
        'name' => 'Acme Corp',
    ]);

    Job::factory()->create([
        'employer_id' => $employer->id,
        'title' => 'Senior Laravel Architect',
        'is_featured' => true,
    ]);

    $this->actingAs($user)
        ->get('/profile')
        ->assertOk()
        ->assertSee('Profile Details')
        ->assertSee('John Doe')
        ->assertSee('john@example.com')
        ->assertSee('Acme Corp')
        ->assertSee('Account Information')
        ->assertSee('Company Information');
});
