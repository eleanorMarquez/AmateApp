<?php

namespace App\View\Components;

use App\Models\Question;
use Illuminate\View\Component;

class FormTestUser extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $quesions = Question::where('deleted_up', null)->get();
        return view('components.testuser.form-test-user', compact('quesions'));
    }
}
