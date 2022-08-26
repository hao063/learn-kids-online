<?php

class PostModel extends DB
{
    public function get_list_posts() {
        $sql = "SELECT p.id, user_id, u.name, u.phone, title, content, p.created_at, p.updated_at
        FROM posts as p INNER JOIN users as u ON p.user_id = u.id ORDER BY p.id DESC" ;
        return self::fetch_array($sql);
        
    }

    public function save_post($data) {
        return self::insert('posts', $data);
    }

    public static function check_user_post($title, $user) {
        $sql = "SELECT id FROM posts WHERE title = '$title' AND user_id = '$user'";
        return self::db_num_rows($sql);
    }

    public function find_post($id)
    {
        return DB::fetch_array("SELECT * FROM `posts` WHERE id = $id");
    }

    public function check_user_post2($title, $user, $id) {
        $sql = "SELECT id FROM posts WHERE id = $id AND title = '$title' AND user_id = '$user'";
        $check= self::db_num_rows($sql);
        if($check == 0) { 
            $check2 = self::check_user_post($title, $user);
            if($check2 > 0) {
                return true;
            }
        }
        return false;
    }
  
    public function update_post($data, $id)
    {
        return self::update('posts', $data, "id = $id");
    }

    public function delete_post($id)
    {
        return self::delete('posts', "id = $id");
    }

    public function check_post($user_id) {
        $sql = "SELECT id FROM posts WHERE user_id = '$user_id'";
        return self::db_num_rows($sql);
    }
}
