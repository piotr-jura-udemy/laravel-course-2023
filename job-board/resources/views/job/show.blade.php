<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
  <x-job-card :$job>
    <p class="mb-4 text-sm text-slate-500">
      {!! nl2br(e($job->description)) !!}
    </p>
  </x-job-card>

  <x-card class="mb-4">
    <h2 class="mb-4 text-lg font-medium">More {{ $job->employer->company_name }} Jobs</h2>

    <div class="text-sm text-slate-500">
      @foreach ($job->employer->jobs as $job)
        <div class="mb-4 flex justify-between space-x-4">
          <div>
            <div class="text-slate-700">
              <a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a>
            </div>
            <div class="text-xs">{{ $job->created_at->diffForHumans() }}</div>
          </div>
          <div class="text-xs">${{ number_format($job->salary) }}</div>
        </div>
      @endforeach
    </div>
  </x-card>
</x-layout>
