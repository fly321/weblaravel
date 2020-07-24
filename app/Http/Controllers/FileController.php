<?php
/**
 * 文件上传控制器
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    // 上传的显示
    public function index()
    {
        return view('file.index');
    }
    // 上传的处理
    public function up(Request $request)
    {
        # 判断文件是否上传
        # dump($request->hasFile('pic'));

        $pic = 'not.jpg';
        if($request->hasFile('pic')){
            // 有文件上传了
            $file=$request->file('pic');

            # 获取文件扩展名
            #$ext = $file->getClientOriginalExtension();
            // dump(get_class_methods($filename));
            # 也可以得到扩展名
            $ext = $file->clientExtension();

            # 文件名
            // laravel 帮我们得到了一个public的指向路径
            $filename = time().uniqid().'.'.$ext;

            $info = $file->move(public_path('uploads'),$filename);

            $pic = $info->getFilename();
        }

        // dump($request->file('pic'));
        $html = <<<html
<script >
parent.window.document.querySelector('#img').src='/uploads/{$pic}';
</script>
html;


        return $html;
    }

}
