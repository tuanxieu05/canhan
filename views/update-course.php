<form action="<?= BASE_URL ?>?action=edit-course&id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Tên khóa học" name="name" value="<?= $data['name'] ?>">
    <?php if ($data['thumbnail']): ?>
        <img src="<?= BASE_ASSETS_UPLOADS . $data['thumbnail'] ?>" alt="" width="100px">
    <?php endif; ?>


    <input type="file" name="thumbnail" accept="image/*">
    <select name="instructor_id">
        <?php foreach ($dataInstructor as $value): ?>
            <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $data['instructor_id']): ?> selected
                <?php endif; ?>>
                <?= $value['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="number" placeholder="Thời lượng" name="duration" value="<?= $data['duration'] ?>">
    <input type="number" placeholder="Giá" name="price" value="<?= $data['price'] ?>">

    <button>Chỉnh sửa</button>
</form>