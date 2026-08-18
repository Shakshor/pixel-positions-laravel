@props(['job'])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo />
    </div>

    <div class="flex flex-1 flex-col">
        <a class="mb-2 self-start text-sm text-gray-400">{{ $job->employer->name }}</a>

        <h3 class="mt-3 text-xl font-bold transition-colors duration-300 group-hover:text-blue-800">{{ $job->title }}
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
