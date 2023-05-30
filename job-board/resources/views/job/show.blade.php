<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
  <x-job-card :$job>
    <p class="mb-4 text-sm text-slate-500">
      {!! nl2br(e($job->description)) !!}
    </p>

    @can('apply', $job)
      <x-link-button :href="route('job.application.create', $job)">
        Apply
      </x-link-button>
    @else
      <div class="text-center text-sm font-medium text-slate-500">
        You already applied to this job
      </div>
    @endcan
  </x-job-card>

  <x-card class="mb-4">
    <h2 class="mb-4 text-lg font-medium">
      More {{ $job->employer->company_name }} Jobs
    </h2>

    <div class="text-sm text-slate-500">
      @foreach ($job->employer->jobs as $otherJob)
        <div class="mb-4 flex justify-between">
          <div>
            <div class="text-slate-700">
              <a href="{{ route('jobs.show', $otherJob) }}">
                {{ $otherJob->title }}
              </a>
            </div>
            <div class="text-xs">
              {{ $otherJob->created_at->diffForHumans() }}
            </div>
          </div>
          <div class="text-xs">
            ${{ number_format($otherJob->salary) }}
          </div>
        </div>
      @endforeach
    </div>
  </x-card>
</x-layout>
