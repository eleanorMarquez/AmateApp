<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\View\Component;

class FormEditEvent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $idevent;

    public function __construct($idevent)
    {
        $this->idevent = $idevent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $even = Event::find($this->idevent);
        return view('components.event.form-edit-event', compact('even'));
    }
}
