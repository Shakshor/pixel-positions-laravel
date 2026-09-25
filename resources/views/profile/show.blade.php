<x-layout>
    <div class="space-y-10">
        <x-page-heading>Profile Details</x-page-heading>

        {{-- Profile Header Card --}}
        <x-panel class="flex flex-col gap-6 p-6 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-x-6">
                @if ($employer && $employer->logo)
                    <x-employer-logo :employer="$employer" width="90" />
                @else
                    <div
                        class="flex h-[90px] w-[90px] items-center justify-center rounded-xl bg-white/10 text-2xl font-bold text-white">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                @endif

                <div>
                    <div class="flex items-center gap-x-3">
                        <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                        <span
                            class="text-2xs rounded-xl bg-blue-800/40 px-3 py-1 font-bold uppercase tracking-wider text-blue-400">
                            Employer
                        </span>
                    </div>

                    @if ($employer)
                        <p class="mt-1 text-sm font-semibold text-gray-300">{{ $employer->name }}</p>
                    @endif

                    <p class="mt-1 text-sm text-gray-400">{{ $user->email }}</p>
                    <p class="mt-1 text-xs text-gray-500">Member since {{ $user->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <div class="rounded-xl border border-white/5 bg-white/5 px-5 py-3 text-center">
                    <div class="text-2xl font-bold">{{ $jobs->count() }}</div>
                    <div class="text-2xs uppercase tracking-wider text-gray-400">Total Jobs</div>
                </div>

                <div class="rounded-xl border border-white/5 bg-white/5 px-5 py-3 text-center">
                    <div class="text-2xl font-bold text-blue-400">{{ $jobs->where('is_featured', true)->count() }}</div>
                    <div class="text-2xs uppercase tracking-wider text-gray-400">Featured</div>
                </div>

                <a href="/jobs/create"
                    class="rounded-xl bg-blue-800 px-5 py-3 text-sm font-bold text-white transition-colors duration-300 hover:bg-blue-700">
                    Post A Job
                </a>
            </div>
        </x-panel>

        {{-- Details Grid --}}
        <section class="grid gap-6 md:grid-cols-2">
            <x-panel class="space-y-4">
                <x-section-heading>Account Information</x-section-heading>

                <div class="space-y-3 pt-2 text-sm">
                    <div class="flex justify-between border-b border-white/5 pb-2">
                        <span class="text-gray-400">Full Name</span>
                        <span class="font-medium text-white">{{ $user->name }}</span>
                    </div>
                    <div class="flex justify-between border-b border-white/5 pb-2">
                        <span class="text-gray-400">Email Address</span>
                        <span class="font-medium text-white">{{ $user->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Account Created</span>
                        <span class="font-medium text-white">{{ $user->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
            </x-panel>

            <x-panel class="space-y-4">
                <x-section-heading>Company Information</x-section-heading>

                @if ($employer)
                    <div class="space-y-3 pt-2 text-sm">
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-gray-400">Company Name</span>
                            <span class="font-medium text-white">{{ $employer->name }}</span>
                        </div>
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-gray-400">Active Listings</span>
                            <span class="font-medium text-white">{{ $jobs->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Featured Listings</span>
                            <span
                                class="font-medium text-white">{{ $jobs->where('is_featured', true)->count() }}</span>
                        </div>
                    </div>
                @else
                    <p class="pt-2 text-sm text-gray-400">No company associated with this account.</p>
                @endif
            </x-panel>
        </section>
    </div>
</x-layout>
