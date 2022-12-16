<?php

namespace App\View\Components;

use App\Models\Information;
use Illuminate\View\Component;

class FormEditNew extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $idnew;

    public function __construct($idnew)
    {
        $this->idnew = $idnew;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $new = Information::find($this->idnew);

        return view('components.news.form-edit-new', compact('new'));
    }
}
