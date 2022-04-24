<?php

namespace App\Models;

class Renting extends Base {
    // 读取器
    public function getPhoneAttribute() {
        return !empty($this->attributes['phone']) ? $this->attributes['phone'] : '无号码';
    }

    public function getCardImgAttribute() {
        $imglist = explode('#', $this->attributes['card_img']);
        return array_map(function ($item) {
            return ['pic' => $item, 'url' => config('url.domain') . $item];
        }, $imglist);
    }
}
