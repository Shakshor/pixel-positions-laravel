<x-layout>
    <div class="font-hanken space-y-6">
        <section class="pt-6 text-center">
            <h1 class="text-4xl font-bold">Let's Find Your Next Job</h1>

            <x-forms.form action='/search' class="mt-6">
                <x-forms.input :label="false" name='q' placeholder='Web Developer' />
            </x-forms.form>
        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="mt-6 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($featuredJobs as $job)
                    <x-job-card :tags="$tags" :job="$job" />
                @endforeach
            </div>

        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>


            <div class="mt-6 space-x-1">
                @foreach ($tags as $tag)
                    {{-- <x-tag :tag="$tag"/> --}}
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-3">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
