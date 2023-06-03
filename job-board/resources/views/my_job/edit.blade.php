<x-layout>
  <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4" />

  <x-card class="mb-8">
    <form action="{{ route('my-jobs.update', $job) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <x-label for="title">Job Title</x-label>
          <x-text-input name="title" :value="$job->title" />
        </div>

        <div>
          <x-label for="location">Location</x-label>
          <x-text-input name="location" :value="$job->location" />
        </div>

        <div class="col-span-2">
          <x-label for="location">Salary</x-label>
          <x-text-input name="salary" type="number" :value="$job->salary" />
        </div>

        <div class="col-span-2">
          <x-label for="description">Description</x-label>
          <x-text-input type="textarea" name="description" :value="$job->description" />
        </div>

        <div>
          <x-label>Experience</x-label>

          <x-radio-group name="experience" :all-option="false" :value="$job->experience"
            :options="array_combine(
                array_map('ucfirst', \App\Models\Job::$experience),
                \App\Models\Job::$experience,
            )" />
        </div>
        <div>
          <x-label>Category</x-label>

          <x-radio-group name="category" :all-option="false" :value="$job->category"
            :options="\App\Models\Job::$category" />
        </div>
      </div>

      <x-button class="w-full">Update Job</x-button>
    </form>
  </x-card>
</x-layout>
