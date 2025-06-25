<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\p{L}\s\.\'-]+$/u' // Cho phép chữ, khoảng trắng, dấu chấm, nháy đơn
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                'regex:/^0[0-9]{9}$/', // VD: 0912345678
            ],
            'email' => [
                'required',
                'email',
                'max:100',
            ],
            'address' => [
                'required',
                'string',
                'max:255',
            ],
            'education' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\p{L}\s\-\/]+$/u', // VD: Cử nhân / Kỹ sư
            ],
            'major' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\p{L}\s\-\&]+$/u', // VD: Công nghệ & Thông tin
            ],
        ], [
            'required' => 'Vui lòng nhập :attribute.',
            'email' => 'Vui lòng nhập đúng định dạng email.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'regex' => ':attribute không hợp lệ.',
        ]);

        // Đặt tên các trường bằng tiếng Việt
        $validator->setAttributeNames([
            'full_name' => 'họ và tên',
            'phone' => 'số điện thoại',
            'email' => 'email',
            'address' => 'quê quán',
            'education' => 'trình độ hiện tại',
            'major' => 'chuyên ngành',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        return view('web.register.index');
    }
}
