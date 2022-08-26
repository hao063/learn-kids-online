

<div class="row">
    <div class="col-12">
        <div class="has-success form-group">
        <label for="inputIsValid" class=" form-control-label">Họ tên</label>
            <input type="text" name="name" id="inputIsValid"
            value="<?= old('name' , $data['data']['name'] ?? null) ?>"
            class="<?= !empty($data['errors']['name']) ? 'is-invalid' : '' ?> form-control">
            <?php if (!empty($data['errors']['name'])): ?>
                <p class="text-danger"><?= $data['errors']['name'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="has-warning form-group">
            <label for="inputIsInvalid" class=" form-control-label">Ngày sinh</label>
            <input type="date" name="birth" id="inputIsInvalid" 
            value="<?= old('birth' , $data['data']['birth'] ?? null) ?>"
            class="<?= !empty($data['errors']['birth']) ? 'is-invalid' : '' ?> form-control">
            <?php if (!empty($data['errors']['birth'])): ?>
                <p class="text-danger"><?= $data['errors']['birth'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-6">
        <div class="has-warning form-group">
            <label for="inputIsInvalid" class=" form-control-label">Số điện thoại</label>
            <input type="number" name="phone" id="inputIsInvalid"
            value="<?= old('phone' , $data['data']['phone'] ?? null) ?>"
            class="<?= !empty($data['errors']['phone']) ? 'is-invalid' : '' ?> form-control">
            <?php if (!empty($data['errors']['phone'])): ?>
                <p class="text-danger"><?= $data['errors']['phone'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="has-warning form-group">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</div>