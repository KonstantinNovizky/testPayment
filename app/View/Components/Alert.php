<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $needDismiss, $message, $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message='', $type="success", $needDismiss = false)
    {
        $this->message = $message;
        $this->needDismiss = $needDismiss;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
