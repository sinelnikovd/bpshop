<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use App\Mark;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Autos
 *
 * @property \App\Auto $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Autos extends Section implements Initializable
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
    protected $title = "Автомобили";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-car');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setColumns([
                AdminColumn::link('model', 'Модель'),
                AdminColumn::text('mark.label', 'Марка'),
                AdminColumn::text('price', 'Цена')->setWidth("200px"),
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
            AdminFormElement::text('model', 'Модель')->required(),
            AdminFormElement::select('mark_id', 'Марка', Mark::class)->setDisplay('label')->required(),
            AdminFormElement::wysiwyg('desc', 'Описание', 'tinymce')->required(),
            AdminFormElement::image('image', 'Картинка')->required(),
            AdminFormElement::file('pdf', 'PDF')->required(),
            AdminFormElement::number('price', 'Цена')->required(),
            AdminFormElement::checkbox('availability', 'В наличии')->required(),
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
