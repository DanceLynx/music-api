<?php

namespace App\Admin\Controllers;

use Admin;
use App\Models\Cover;
use App\Models\Singer;
use App\Models\Song;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use League\CommonMark\Inline\Element\Code;

class SongsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '歌曲管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Song());

        $singers = Singer::all()->pluck('name','id')->toArray();
        $covers = Cover::all()->pluck('name','id')->toArray();

        $grid->column('id', '序号');
        $grid->column('name', '歌曲名');
        $grid->column('dt', '歌曲时长')->display(function ($value){
            if(empty($value)) return $value;
            return intval($value) / 600;
        });
        $grid->column('cover_id', '歌单')->editable('select',$covers);
        $grid->column('singer_id', '歌手')->using($singers);
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
        $show = new Show(Song::findOrFail($id));

        $show->field('id', '序号');
        $show->field('name', '歌曲名');
        $show->field('pic_url', '歌曲图片链接');
        $show->field('url', '歌曲链接');
        $show->field('lyric', '歌词');
        $show->field('dt', '播放时长');
        $show->field('cover_id', '歌单');
        $show->field('singer_id', '歌手');
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
        $form = new Form(new Song());

        $singers = Singer::all()->pluck('name','id')->toArray();
        $covers = Cover::all()->pluck('name','id')->toArray();
        $form->text('name', '歌曲名')->required();
        $form->image('pic_url', '歌曲图片链接')->required();
        $form->file('url', '歌曲文件')->required();
        $form->textarea('lyric','歌词');
        $form->number('dt', '播放时长')->required();
        $form->select('singer_id', '歌手')->options($singers)->required();
        $form->select('cover_id','歌单')->options($covers);

        return $form;
    }
}
