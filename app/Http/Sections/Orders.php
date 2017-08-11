<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Orders
 *
 * @property \App\Order $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Orders extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Заказы";

    /**
     * @var string
     */
    protected $alias;


    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation($priority = 10, function() {
            return \App\Order::where('status', 0)->count();
        })->setIcon('fa fa-cart-plus');
    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id', '#'),
                AdminColumn::link('user.name', 'Пользователь'),
                AdminColumn::link('product.name', 'Товар'),
                AdminColumn::link('count', 'Количество'),
                AdminColumn::link('price', 'Итоговая цена'),
                AdminColumn::custom('Статус', function(\Illuminate\Database\Eloquent\Model $model) {

                    return ['Ожидает подтверждения', 'Подтвержден', 'Выполнен'][$model->status];
                })
            ])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::form()->setItems([
            AdminFormElement::html(function(\Illuminate\Database\Eloquent\Model $model) {
                $html = "
<div class=\"panel panel-default\">
  <div class=\"panel-body\"><dl>
                            <dt><strong>Пользователь</strong></dt>
                            <dd>".$model->user->name."</dd>
                            <dt style='margin-top: 20px;'><strong>Товар</strong></dt>
                            <dd>".$model->product->name."</dd>
                            <dt style='margin-top: 20px;'><strong>Итоговая цена</strong></dt>
                            <dd>".number_format($model->price,0,' ',' ')." тг.</dd>
                        </dl></div></div>";
                return $html;
            }),
            AdminFormElement::number('count', 'Количество')->required(),
            AdminFormElement::select('status', 'Статус заказа', [
                0 => 'Ожидает подтверждения',
                1 => 'Подтвержден',
                2 => 'Выполнен'
            ])->required(),
        ]);
    }


    /**
     * @return void
     */
    public function onDelete($id)
    {
    }

}
