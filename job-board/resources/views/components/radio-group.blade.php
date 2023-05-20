<label class="mb-1 flex items-center">
  <input type="radio" name="{{ $name }}" value="" @checked(!request($name))>
  <span class="ml-2">All</span>
</label>

@foreach ($optionsWithLabels as $label => $option)
  <label class="mb-1 flex items-center">
    <input type="radio" name="{{ $name }}" value="{{ $option }}"
      @checked($option === request($name))>
    <span class="ml-2">{{ $label }}</span>
  </label>
@endforeach
