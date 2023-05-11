<div>
  <form>
    <label>Poll Title</label>

    <input type="text" wire:model="title" />

    Current title: {{ $title }}

    <div class="mb-4 mt-4">
      <button class="btn" wire:click.prevent="addOption">Add Option</button>
    </div>

    <div>
      @foreach ($options as $index => $option)
        <div class="mb-4">
          {{ $index }} - {{ $option }}
        </div>
      @endforeach
    </div>
  </form>
</div>
