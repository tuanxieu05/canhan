<form action="<?= BASE_URL ?>?action=insert-course" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Tên khóa học" name="name">
    <input type="file" name="thumbnail" accept="image/*">
    <select name="instructor_id">
        <?php foreach ($dataInstructor as $value): ?>
            <option value="<?= $value['id'] ?>">
                <?= $value['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="number" placeholder="Thời lượng" name="duration">
    <input type="number" placeholder="Giá" name="price">

    <button>Thêm mới</button>
</form>