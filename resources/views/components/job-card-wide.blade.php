@props(['job'])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>

    <div class="flex flex-1 flex-col">
        <div class="flex items-center justify-between">
            <a class="mb-2 self-start text-sm text-gray-400">{{ $job->employer->name }}</a>

            @can('update', $job)
                <a href="/jobs/{{ $job->id }}/edit" class="text-xs text-blue-500 hover:underline">Edit</a>
            @endcan
        </div>

        <h3 class="mt-3 text-xl font-bold transition-colors duration-300 group-hover:text-blue-800">
            <a href="{{ $job->url }}" target="_blank"> {{ $job->title }}
            </a>
        </h3>
        <p class="font-sm mt-auto text-gray-400">{{ $job->salary }}</p>
    </div>
    <div>
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>
    </div>
</x-panel>
