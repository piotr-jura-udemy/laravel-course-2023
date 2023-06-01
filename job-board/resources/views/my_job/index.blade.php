<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>
  </div>

  @forelse ($jobs as $job)
    <x-job-card :$job>
      <div class="flex space-x-2">
        <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
        <x-link-button href="">Delete</x-link-button>
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No jobs yet
      </div>
      <div class="text-center">
        Post your first job <a class="text-indigo-500 hover:underline"
          href="{{ route('my-jobs.create') }}">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>
