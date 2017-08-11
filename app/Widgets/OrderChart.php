<?php

namespace App\Widgets;

use AdminTemplate;
use App\Order;
use SleepingOwl\Admin\Widgets\Widget;

class OrderChart extends Widget
{
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        $data = [
            'labels'=> ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            'datasets'=>[
                [
                    'label'=> 'Количество заказов: ',
                    'borderColor' => 'rgba(0, 192, 239, 0.8)',
                    'borderWidth'=> 1,
                    'backgroundColor' => 'rgba(0, 192, 239, 0.2)',
                    'pointBackgroundColor'=> '#00c0ef',
                    'data' => []
                ],
            ],

        ];
        for($i = 1; $i <= 12; $i++){
            $data['datasets'][0]['data'][] = Order::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->count();
        }
        return view('admin.dashboard')->with(["newOrders"=>Order::where('status',0)->get(), "data" => json_encode($data)]);
    }

    /**
     * @return string|array
     */
    public function template()
    {
        return AdminTemplate::getViewPath('dashboard');
    }

    /**
     * @return string
     */
    public function block()
    {
        return 'block.top';
    }

}