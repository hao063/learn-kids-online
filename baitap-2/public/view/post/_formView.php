<div class="row">
    <div class="col-6">
        <div class="has-warning form-group">
            <label for="inputIsInvalid" class=" form-control-label">Tiêu đề</label>
            <input type="text" name="title" id="inputIsInvalid" value="<?= old('title' , $data['data']['title'] ?? null) ?>"
            class="<?= !empty($data['errors']['title']) ? 'is-invalid' : '' ?> form-control ">
            <?php if (!empty($data['errors']['title'])): ?>
                <p class="text-danger"><?= $data['errors']['title'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-6">
        <div class="has-warning form-group">
        <label for="inputIsValid" class=" form-control-label">Tác giả</label>
            <select name="user_id" id="disabledSelect" class="form-control 
            <?= !empty($data['errors']['user_id']) ? 'is-invalid' : '' ?>
            ">
                <option value="0">Chọn tác giả</option>
                <?php foreach($data['dataUser'] as $item): ?>
                    <option 
                    <?php 
                        $id = old('user_id' , $data['data']['user_id'] ?? null);
                        if($id != null)
                           echo $id == $item['id'] ? 'selected' : '';
                    ?>
                    
                    value="<?= $item['id'] ?>"><?= $item['name'].' - '.$item['phone'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['errors']['user_id'])): ?>
                <p class="text-danger"><?= $data['errors']['user_id'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <label for="floatingTextarea">Nội dung</label>
            <textarea class="form-control" id="floatingTextarea"
            name="content"
            class="form-control"
            <?php if(!empty($data['errors']['content'])): ?>
                style="border: 1px solid red;"
            <?php endif; ?>
            ><?= old('content' , $data['data']['content'] ?? null) ?></textarea>
            <?php if (!empty($data['errors']['content'])): ?>
                <p class="text-danger"><?= $data['errors']['content'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 m-t-20">
        <div class="has-warning form-group">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</div>