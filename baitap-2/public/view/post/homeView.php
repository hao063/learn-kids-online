<?= __Include('layout.header') ?>
<h3 class="title-5 m-b-35 m-t-20">Danh sách User</h3>
<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= session('success') ?>
    </div>
<?php endif; ?>

<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
                <th></th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data['data'] as $key => $item): ?>
            <tr class="tr-shadow  <?php
                if (!empty($_SESSION['id_new'])) {
                    echo $item['id'] == $_SESSION['id_new'] ? 'border border-success' : '';
                    if(count($data['data']) == $key + 1) {
                        // session('id_new');
                    }
                }
                ?>">
                <td><?= ++$key ?></td>
                <td >
                    <span class="block-email"> <?= $item['title'] ?></span>
                </td>
                <td ><?= $item['name'].' - '.$item['phone'] ?></td>
                <td><?= $item['content'] ?></td>
                <td><?= $item['created_at'] ?></td>
                <td><?= $item['updated_at'] ?></td>
                <td>
                    <div class="table-data-feature">
                        <a href="post/edit/<?= $item['id'] ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>
                        <a href="post/delete/<?= $item['id'] ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <tr class="spacer"></tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= __Include('layout.footer') ?>
                      ;