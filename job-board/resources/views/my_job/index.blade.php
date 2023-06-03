<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>
  </div>

  @forelse ($jobs as $job)
    <x-job-card :$job>
      <h2 class="mb-4 text-lg font-medium">Applications</h2>
      <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div>
              <div>
                {{ $application->user->name }}
              </div>
              <div>
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div>
                <a href="{{ route('job-application-cvs.show', $application) }}">Download CV</a>
              </div>
            </div>
            <div class="text-xs">
              ${{ number_format($application->expected_salary) }}
            </div>
          </div>
        @empty
          <div>No applications yet</div>
        @endforelse
      </div>

      <div class="flex space-x-2">
        @if (!$job->deleted_at)
          <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
          <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>Delete</x-button>
          </form>
        @endif
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
