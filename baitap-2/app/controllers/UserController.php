<?php 

Model('User');
Controller('Base');


class UserController extends BaseController 
{
    public function index() {
        $data = UserModel::get_users();
        return $this->load_view('users.home', ['data' => $data]);
    }

    public function create() {
        return $this->load_view('users.create');
    }

    public function postCreate($request) {
        $errors = [];
        if($request['name'] == '') {
            $errors['name'] = 'Nhập họ tên';
        }

        if($request['phone'] == '') {
            $errors['phone'] = 'Nhập số điện thoại';
        }else {
            $check_phone_user = UserModel::check_phone_user($request['phone']);
            if($check_phone_user > 0) {
                $errors['phone'] = 'Số điện thoại đã tồn tại';
            }
        }
        
        if($request['birth'] == '') {
            $errors['birth'] = 'Nhập ngày sinh';
        }
        
        if(count($errors) > 0) {
            return $this->load_view('users.create', ['errors' => $errors]);
        }

        $id =  UserModel::save_user($request);
        return $this->redirect('/')->with(['success' => 'Tạo user thành công', 'id_new' => $id]);
    }

    public function edit($id) {
        $data = UserModel::find_user($id);
        if(count($data) == 0) {
            echo '404';
            return;
        }
        return $this->load_view("users.edit", ['data' => $data[0]]);
    }

    public function postEdit($request, $id) {
        $errors = [];
        if($request['name'] == '') {
            $errors['name'] = 'Nhập họ tên';
        }

        if($request['phone'] == '') {
            $errors['phone'] = 'Nhập số điện thoại';
        }else {
            $check_phone_user = UserModel::check_phone_user2($request['phone'], $id);
            if($check_phone_user) {
                $errors['phone'] = 'Số điện thoại đã tồn tại';
            }
        }
        
        
        if($request['birth'] == '') {
            $errors['birth'] = 'Nhập ngày sinh';
        }

        
        if(count($errors) > 0) {
            $data = UserModel::find_user($id);
            return $this->load_view('users.edit', ['data' => $data[0], 'errors' => $errors]);
        }
        $request['updated_at'] = date("Y-m-d h:i:s");
        UserModel::update_user($request, $id);

        return $this->redirect('/')->with(['success' => 'Sửa user thành công', 'id_new' => $id]);
    }

    public function delete($id) {
        $row_check = PostModel::check_post($id);
        if($row_check > 0) {
            return $this->redirect('/')->with(['error' => 'Không thể xoá Tác giả này vì vẫn còn bài viết của Tác giả']);
        }
        UserModel::delete_user($id);
        return $this->redirect('/')->with(['success' => 'Xoá user thành công']);
    } 
}