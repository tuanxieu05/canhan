<a href="<?= BASE_URL ?>?action=add-course">dagvdgasdadas</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ảnh</th>
            <th>Lương</th>
            <th>Tên phòng ban</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value): ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['email'] ?></td>
                <td>
                    <?php if ($value['avatar']): ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . $value['avatar'] ?>" alt="" width="100px">
                    <?php endif; ?>
                </td>
                <td><?= $value['salary'] ?></td>
                <td><?= $value['instructorName'] ?></td>

                <td>
                    <a href="<?= BASE_URL ?>?action=update-course&id=<?= $value['id'] ?>">Sửa</a>
                    <a href="<?= BASE_URL ?>?action=detail-course&id=<?= $value['id'] ?>">Xem chi tiết</a>
                    <a href="<?= BASE_URL ?>?action=delete-course&id=<?= $value['id'] ?>"
                        onclick="return confirm('Bạn có muốn xóa không?')">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>