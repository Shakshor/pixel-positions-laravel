<x-layout>
    <x-page-heading>Edit Job: {{ $job->title }}</x-page-heading>

    <x-forms.form method="PATCH" action="/jobs/{{ $job->id }}">
        <x-forms.input label="Title" name="title" :value="old('title', $job->title)" placeholder="CEO" />
        <x-forms.input label="Salary" name="salary" :value="old('salary', $job->salary)" placeholder="$90,000 USD" />
        <x-forms.input label="Location" name="location" :value="old('location', $job->location)" placeholder="Winter Park, Florida" />

        <x-forms.select label="Schedule" name="schedule">
            <option class="text-black" @selected(old('schedule', $job->schedule) === 'Part Time')>Part Time</option>
            <option class="text-black" @selected(old('schedule', $job->schedule) === 'Full Time')>Full Time</option>
        </x-forms.select>

        <x-forms.input label="Url" name="url" :value="old('url', $job->url)" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" :checked="old() ? (bool) old('featured') : (bool) $job->is_featured" />

        <x-forms.divider />

        <x-forms.input label="Tags (Comma separated)" name="tags" :value="old('tags', $job->tags->pluck('name')->implode(', '))"
            placeholder="frontend, ai engineer, backend" />

        <x-forms.button>Update</x-forms.button>
    </x-forms.form>
</x-layout>
