<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index')]" />

  <x-card class="mb-4 text-sm">
    <form action="{{ route('jobs.index') }}" method="GET" id="filter-form">
      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <div class="mb-1 font-semibold">Search</div>

          <x-text-input form-id="filter-form" name="search"
            value="{{ request('search') }}" placeholder="Search for any text" />
        </div>

        <div>
          <div class="mb-1 font-semibold">Salary</div>

          <div class="flex space-x-2">
            <x-text-input form-id="filter-form" name="min_salary"
              value="{{ request('min_salary') }}" placeholder="From" />

            <x-text-input form-id="filter-form" name="max_salary"
              value="{{ request('max_salary') }}" placeholder="To" />
          </div>
        </div>

        <div>
          <div class="mb-1 font-semibold">Experience</div>

          <x-radio-group name="experience" :options="array_combine(
              array_map('ucfirst', \App\Models\Job::$experience),
              \App\Models\Job::$experience,
          )" />

          {{-- <label class="mb-1 flex items-center">
            <input type="radio" name="experience" value="" @checked(!request('experience'))>
            <span class="ml-2">All</span>
          </label>

          @foreach (\App\Models\Job::$experience as $experience)
            <label class="mb-1 flex items-center">
              <input type="radio" name="experience" value="{{ $experience }}"
                @checked($experience === request('experience'))>
              <span class="ml-2">{{ Str::ucfirst($experience) }}</span>
            </label>
          @endforeach --}}
        </div>
        <div>
          <div class="mb-1 font-semibold">Category</div>

          <x-radio-group name="category" :options="\App\Models\Job::$category" />

          {{-- <label class="mb-1 flex items-center">
            <input type="radio" name="category" value="" @checked(!request('category'))>
            <span class="ml-2">All</span>
          </label>

          @foreach (\App\Models\Job::$category as $category)
            <label class="mb-1 flex items-center">
              <input type="radio" name="category" value="{{ $category }}"
                @checked($category === request('category'))>
              <span class="ml-2">{{ Str::ucfirst($category) }}</span>
            </label>
          @endforeach --}}
        </div>
      </div>

      <x-button class="w-full">Filter</x-button>
    </form>
  </x-card>

  @foreach ($jobs as $job)
    <x-job-card class="mb-4" :$job>
      <div>
        <x-link-button :href="route('jobs.show', $job)">
          Show
        </x-link-button>
      </div>
    </x-job-card>
  @endforeach
</x-layout>
