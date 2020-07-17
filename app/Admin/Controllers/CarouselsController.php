<?php

namespace App\Admin\Controllers;

use App\Models\Carousel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CarouselsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Carousel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel());

        $grid->column('id', '序号');
        $grid->column('image_url', '幻灯片地址');
        $grid->column('target_id', '目标id');
        $grid->column('target_type', '目标类型');
        $grid->column('created_at', '创建时间');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Carousel::findOrFail($id));

        $show->field('id', '序号');
        $show->field('image_url', '幻灯片地址');
        $show->field('target_id', '目标id');
        $show->field('target_type', '目标类型');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '修改时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Carousel());

        $form->image('image_url', '轮播图图片');
        $form->text('target_id', '目标id');
        $form->text('target_type', '目标类型');

        return $form;
    }
}
