<?php

namespace App\View\Components;

use App\Models\Directory;
use Illuminate\View\Component;

class FormEditDirectory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $identity;

    public function __construct($identity)
    {
        $this->identity = $identity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $enity = Directory::find($this->identity);
        return view('components.directory.form-edit-directory', compact('enity'));
    }
}
