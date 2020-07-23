<?php

namespace App\Admin\Controllers;

use App\Models\Cover;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CoversController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '歌单管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cover());

        $grid->column('id', '序号');
        $grid->column('name', '歌单名');
        $grid->column('is_hot','是否热门')->switch();
        $grid->column('is_recommend','是否推荐')->switch();
        $grid->column('play_count', '播放数');
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
        $show = new Show(Cover::findOrFail($id));

        $show->field('id', '序号');
        $show->field('cover_image_url', '歌单封面');
        $show->field('name', '歌单名');
        $show->field('play_count', '播放数');
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
        $form = new Form(new Cover());

        $form->text('name', '歌单名');
        $form->switch('is_hot','是否推荐');
        $form->switch('is_recommend','是否推荐');
        $form->textarea('description','歌单简介');
        $form->image('cover_image_url', '歌单封面');

        return $form;
    }
}
