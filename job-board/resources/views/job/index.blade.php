<x-layout>
  @foreach ($jobs as $job)
    <div>{{ $job->title }}</div>
  @endforeach
</x-layout>
