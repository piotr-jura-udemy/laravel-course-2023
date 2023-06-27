<x-layout>
  <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" class="mb-4" />

  <x-card class="mb-8">
    <form action="{{ route('my-jobs.update', $job) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <x-label for="title" :required="true">Job Title</x-label>
          <x-text-input name="title" :value="$job->title" />
        </div>

        <div>
          <x-label for="location" :required="true">Location</x-label>
          <x-text-input name="location" :value="$job->location" />
        </div>

        <div class="col-span-2">
          <x-label for="salary" :required="true">Salary</x-label>
          <x-text-input name="salary" type="number" :value="$job->salary" />
        </div>

        <div class="col-span-2">
          <x-label for="description" :required="true">Description</x-label>
          <x-text-input name="description" type="textarea" :value="$job->description" />
        </div>

        <div>
          <x-label for="experience" :required="true">Experience</x-label>
          <x-radio-group name="experience" :value="$job->experience"
            :all-option="false"
            :options="array_combine(
                array_map('ucfirst', \App\Models\Job::$experience),
                \App\Models\Job::$experience,
            )" />
        </div>

        <div>
          <x-label for="category" :required="true">Category</x-label>
          <x-radio-group name="category" :all-option="false" :value="$job->category"
            :options="\App\Models\Job::$category" />
        </div>

        <div class="col-span-2">
          <x-button class="w-full">Edit Job</x-button>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>
