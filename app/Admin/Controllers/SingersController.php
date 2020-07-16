<?php

namespace App\Admin\Controllers;

use Admin;
use App\Models\Singer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SingersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '歌手管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Singer());

        $grid->column('id', '序号');
        $grid->column('name', '歌手名');
        $grid->column('created_at', '添加时间');

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
        $show = new Show(Singer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', '歌手名');
        $show->field('image_url', '歌手写真');
        $show->field('description', '歌手简介');
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
        $form = new Form(new Singer());

        $form->text('name', '歌手名');
        $form->image('image_url', '歌手写真');
        $form->textarea('description', '歌手简介');

        return $form;
    }
}
