<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public array $options,
        public ?bool $allOption = true,
        public ?string $value = null
        // ['entry' => 'entry', 'senior']
        // 0,        1

        // ['Entry' => 'entry', 'Senior' => 'senior']
    ) {
        //
    }

    public function optionsWithLabels(): array
    {
        return array_is_list($this->options) ?
            array_combine($this->options, $this->options)
            : $this->options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}