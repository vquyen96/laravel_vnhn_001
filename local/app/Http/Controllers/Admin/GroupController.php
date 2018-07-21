<?php

namespace App\Http\Controllers\Admin;

use App\Model\Group_vn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Mockery\Exception;

class GroupController extends Controller
{
    public function getList(){
        $list_group = DB::table('group_vn')->orderByDesc('id')->paginate(15);

        foreach ($list_group as $value){
            $value->created_at = date('d/m/Y h:m');
        }
        $data = [
            'list_group' => $list_group
        ];
        return view("admin.group.index",$data);
    }

/*function show_group($list_group,$parent_id = '00',$char = '',&$str){
        $group_child = [];
        foreach ($list_group as $key => $item)
        {
            if ($item->parentid == $parent_id) {
                $group_child[] = $item;
                unset($list_group[$key]);
            }
        }

        if ($group_child && $parent_id != 00) {
            $str[] = '<ul class="nav nav-treeview">';
            foreach ($group_child as $key => $item) {
                $str[] = '<li class="nav-item has-treeview">'.'<input style="margin-top: 15px" type="checkbox" value=""> &nbsp&nbsp'.' <a href="javascrip:;" class="nav-link">'.$char.$item->title.'</a>';
                $this->show_group($list_group, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp',$str);
                $str[] = '</li>';
            }
            $str[] = '</ul>';
        }else{
            $str[] = '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
            foreach ($group_child as $key => $item) {
                $str[] = '<li class="nav-item has-treeview">'.'<input style="margin-top: 15px" type="checkbox" value=""> &nbsp&nbsp'.'<a href="javascrip:;" class="nav-link">'.$char.$item->title.'</a>';
                $this->show_group($list_group, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp',$str);
                $str[] = '</li>';
            }
            $str[] = '</ul>';
        }
    }*/

//   function show_group($list_group,$parent_id = '00',$char = '',&$str){
//        $group_child = [];
//        foreach ($list_group as $key => $item)
//        {
//            if ($item->parentid == $parent_id) {
//                $group_child[] = $item;
//                unset($list_group[$key]);
//            }
//        }
//
//        if ($group_child && $parent_id != 00) {
//            $str[] = '<ul class="nav nav-treeview">';
//            foreach ($group_child as $key => $item) {
//                $icon = '';
//                if($this->check_has_chlid($list_group,$item->id)) $icon = '<i class="fa fa-plus"></i>&nbsp&nbsp';
//                $str[] = '<li class="nav-item has-treeview"> <div><a href="javascrip:;"><i class="fa fa-plus text-primary"></i></a>&nbsp&nbsp<a href="javascrip:;"><i class="fa fa-pencil text-success"></i></a>&nbsp&nbsp<a href="javascrip:;"><i class="fa fa-trash text-danger"></i></a></div> <a href="javascrip:;" class="nav-link">'.$char.$icon.$item->title.'</a>';
//                $this->show_group($list_group, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp',$str);
//                $str[] = '</li>';
//            }
//            $str[] = '</ul>';
//        }else{
//            $str[] = '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
//            foreach ($group_child as $key => $item) {
//                $icon = '';
//                if($this->check_has_chlid($list_group,$item->id)) $icon = '<i class="fa fa-plus"></i>&nbsp&nbsp';
//                $str[] = '<li class="nav-item has-treeview"> <div><a href="javascrip:;"><i class="fa fa-plus text-primary"></i></a>&nbsp&nbsp<a href="javascrip:;"><i class="fa fa-pencil text-success"></i></a>&nbsp&nbsp<a href="javascrip:;"><i class="fa fa-trash text-danger"></i></a></div> <a href="javascrip:;" class="nav-link">'.$char.$icon.$item->title.'</a>';
//                $this->show_group($list_group, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp',$str);
//                $str[] = '</li>';
//            }
//            $str[] = '</ul>';
//        }
//    }

    function check_has_chlid($list_group,$id){
        foreach ($list_group as $value){
            if($value->parentid == $id){
                return true;
            }
        }
        return false;
    }

    public function form_group($id){
        $list_group = DB::table('group_vn')->where('status',1)->get()->toArray();
        $root = [
            'id' => 0,
            'title' => 'root'
        ];
        $result[] = (object)$root;
        $this->recusiveGroup($list_group,0,"",$result);

        if($id == 0){
            $group = [
                'id' => 0,
                'title' => '',
                'avatar' => '',
                'slug' => '',
                'summary' => '',
                'parentid' => '00',
                'keywords' => '',
                'titlemeta' => '',
                'status' => 1
            ];

            $group = (object)$group;
        }else {
            $group = DB::table('group_vn')->find($id);
        }

        $data = [
            'list_group' => $result,
            'group' => $group
        ];
        return view('admin.group.form_group',$data);
    }

    public function action_group(Request $request){
        $data = $request->get('group');
        $id = $data['id'];
        unset($data['id']);
        $data['slug'] = str_slug($data['title']);
        $data['updated_at'] = time();
        if($id == 0){
            $data['created_at'] = time();
            try{
                $group = Group_vn::create($data);
                if($group){
                    return redirect()->route('admin_group')->with('status','Tạo mới thành công');
                }
            }catch (Exception $e){
                return redirect()->route('form_group')->with('error','Tạo mới không thành công');
            }
        }else {
            $group = Group_vn::find($id);
            if(!$group){
                return redirect()->route('form_group')->with('error','Có lỗi xảy ra');
            }else {
                if ($group->update($data)){
                    return redirect()->route('admin_group')->with('status','Cập nhật thành công');
                }else {
                    return redirect()->route('form_group')->with('error','Có lỗi xảy ra');
                }

            }
        }
    }

    function delete_group($id){
        if(DB::table('group_vn')->delete($id)){
            return redirect()->route('admin_group')->with('status','Xóa thành công');
        }
        return redirect()->route('admin_group')->with('error','Xóa không thành công');
    }

    function form_sort_group($parent_id = 0){
        if($parent_id == 0){
            $list_group = DB::table('group_vn')->where('parentid','00')->orderBy('order')->get();

            $data = [
                'list_group' => $list_group
            ];

            return view('admin.group.sort_group',$data);
        }else {
            $list_group = DB::table('group_vn')->where('parentid',$parent_id)->orderBy('order')->get();
            $group_parent = DB::table('group_vn')->find($parent_id);
            $data = [
                'list_group' => $list_group,
                'group_parent' => $group_parent
            ];
            $view =  View::make('admin.group.child_group', $data)->render();
            return json_encode([
                'content' => $view
            ]);
        }

    }

    public function update_order(Request $request){
        $data = $request->get('group');
        $check = 1;
        foreach ($data as $key => $item){
            $data['parentid'] ? $order = $data['parentid'].$item : $order = $item;
            DB::table('group_vn')->where('id',$key)->update(['order' => $order]);
        }
        if($check == 1){
            return redirect()->route('form_sort_group', '00' )->with('status','Sắp xếp thành công');
        }else {
            return redirect()->route('form_sort_group', '00')->with('error','Sắp xếp không thành công');
        }
    }
}
