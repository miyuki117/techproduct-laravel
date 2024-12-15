<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class NotificationComposer
{
    public function compose(View $view)
    {
        $view->with('message', 'Laravelを学ぼう！'); // $view->with('変数名','値')でviewに変数を渡す
    }

}
