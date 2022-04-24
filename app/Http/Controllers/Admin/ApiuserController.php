<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apiuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiuserController extends BaseController {
    // 列表显示
    public function index() {
        // 分页获取数据
        $data = Apiuser::paginate($this->pagesize);
        // 赋值给模板
        return view('admin.apiuser.index', compact('data'));
    }

    // 添加显示
    public function create() {
        return view('admin.apiuser.create');
    }

    // 添加处理
    public function store(Request $request) {
        // 表单验证
        $postData = $this->validate($request, [
            'username' => 'required|unique:apiusers,username',
            'password' => 'required'
        ]);
        // 密码加密
        #$postData['password'] = bcrypt($postData['password']);

        // 入库
        Apiuser::create($postData);

        return redirect(route('admin.apiuser.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Apiuser $apiuser
     * @return \Illuminate\Http\Response
     */
    public function show(Apiuser $apiuser) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Apiuser $apiuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Apiuser $apiuser) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Apiuser $apiuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apiuser $apiuser) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Apiuser $apiuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apiuser $apiuser) {
        //
    }
}
