<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use App\Auto;
use App\Categorie;
use App\Manufacturer;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Products
 *
 * @property \App\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Products extends Section
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
    protected $title = "Товары";

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()->setHtmlAttribute('class', 'table-bordered table-success table-hover')->setColumns([
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'Название'),
                AdminColumn::custom('В наличии', function ($model){
                    $cls = ($model-> availability) ? 'fa-check-circle-o': 'fa-circle-o';
                    return "<div style=''><i class='fa ".$cls."'></i></div>";
                })->setWidth("100px"),
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
        $form = AdminForm::form()->setItems([
            AdminFormElement::text('name', 'Название')->required(),
            AdminFormElement::wysiwyg('desc', 'Описание', 'tinymce')->required(),
            AdminFormElement::images('images', 'Картинки'),
            AdminFormElement::number('price', 'Цена')->required(),
            AdminFormElement::checkbox('availability', 'В наличии'),


        ]);

        $autos = Auto::all();
        $list = [];

        foreach($autos as $auto){
            $list[$auto->id] = $auto->mark->label ."-". $auto->model;
        }

        $form->addElement(
            AdminFormElement::select('auto_id', 'Модель авто', $list)->required()
        );

        $form->addElement(
            AdminFormElement::select('categorie_id', 'Категория', Categorie::class)->setDisplay('label')->required()
        );

        $form->addElement(
            AdminFormElement::select('manufacturer_id', 'Производитель', Manufacturer::class)->setDisplay('label')->required()
        );

        return $form;
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
