<div class="relative">
  @if ('textarea' != $type)
    @if ($formRef)
      <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2"
        @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="h-4 w-4 text-slate-500">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    @endif
    <input x-ref="input-{{ $name }}" type="{{ $type }}"
      placeholder="{{ $placeholder }}"
      name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
      class="w-full rounded-md border-0 py-1.5 px-2.5 pr-8 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2" />
  @else
    <textarea
      class="w-full rounded-md border-0 py-1.5 px-2.5 pr-8 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2"
      id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
  @endif
  @error($name)
    <div class="mt-1 text-red-500">
      {{ $message }}
    </div>
  @enderror
</div>
