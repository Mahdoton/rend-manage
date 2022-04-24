<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Article_count;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller {
    // 分页数
    protected $pagesize = 5;

    public function __construct() {
        $this->pagesize = config('page.pagesize');
    }

    // 列表
    public function index(Request $request) {
        $allow_field = [
            'id',
            'title',
            'desn',
            'pic',
            'created_at'
        ];
        $data = Article::orderBy('id', 'desc')->select($allow_field)->paginate($this->pagesize);

        return $data;
    }

    // 详情
    public function show(Article $article) {
        return $article;
    }

    // 用户访问统计
    public function count(Request $request, int $article) {
        // 获取openid
        $openid = $request->get('openid');
        // 统计的数据
        $data = [
            // 唯一索引
            'openid' => $openid,
            'art_id' => $article,
            'vdt' => date('Y-m-d'),
            'vtime' => time()
        ];
        try {
            $model = Article_count::create($data);
        } catch (\Exception $exception) {
            return ['status' => 10006, 'msg' => '数据已存在'];
        }
        return $model;
    }

}
