<x-layout>
    <div class="space-y-6">
        <section>
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="mt-6 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
            </div>

        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>


            <div class="mt-6 space-x-1">
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

        </section>
    </div>
</x-layout>
