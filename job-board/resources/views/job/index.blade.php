<x-layout>
  @foreach ($jobs as $job)
    <x-card class="mb-4">
      {{ $job->title }}
    </x-card>
  @endforeach
</x-layout>
