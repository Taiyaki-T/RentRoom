<?php
//后台登陆
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登陆显示
    public function index(){
        //判断用户是否已登录过
        if(auth()->check()){
            //跳转后台页面
            return redirect(route('admin.index'));
        }

        return view('admin.login.login');
    }

    //登陆 别名 admin.login 根据别名生成url  route(别名);
    public function login(Request $request){



        // 表单验证
        $post = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => '请输入用户名'
        ]);

        //登陆
        $bool = auth()->attempt($post);
        $model = auth()->user();
        //判断是否登陆成功
        if($bool){ //登陆成功
            // auth()->user() 返回当前登陆的用户模型对象 存在session中
            // laravel 默认session是存储在文件中 优化到memcached redis
//            $model = auth()->user();
//            dump($model->toArray());

            //跳转到后台页面
//            return ('跳转到后台页面');

            return redirect(route('admin.index'));
        }
        // withErrors 把信息写入到验证错误提示中  特殊的session laravel中叫 闪存
        // 闪存 从设置好之后，只能在第1个http请求中获取到数据，以后就没有了
        return redirect(route('admin.login'))->withErrors(['error'=>'登陆失败']);



    }

}
