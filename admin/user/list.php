<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Quản lý tài khoản</h3>


<form action="index.php" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Ảnh</th>
        <th>Vai trò</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($items as $item) {
        extract($item);

        ?>
        <tr>
          <th><input type="checkbox" name="user_id" value="<?= $user_id ?>"></th>
          <td>
            <?= $fullname ?>
          </td>
          <td>
            <?= $email ?>
          </td>

          <td>
            <img src="<?= $image ?>" alt="" style="width: 90px; height: 90px" class="ml-4">

          </td>

          <td>
            <?= $is_admin == 1 ? 'Admin' : 'Khách hàng' ?>
          </td>
          <td>
            <a href="index.php?btn_edit&user_id=<?= $user_id ?>" class="link link-secondary mr-1">Sửa</a>
            <?php if ($_SESSION['user_id'] != $user_id) { ?>
              <a href="index.php?btn_delete&user_id=<?= $user_id ?>" class="link link-secondary remove">Xoá</a>
            <?php } ?>

          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7">
          <?php
          require_once "../components/pagination.php"
            ?>
        </td>
      </tr>
      <tr>
        <td colspan="7">
          <button id="check-all" type="button" class="button-red">Chọn tất cả</button>
          <button id="clear-all" type="button" class="button-white mx-5">Bỏ chọn tất cả</button>
          <button id="btn-delete" name="btn_delete" class="button-red">Xoá tất cả các mục đã chọn </button>
          <a href="index.php?btn_new" class="ml-4 link-primary">Add new user</a>
        </td>
      </tr>
    </tfoot>
  </table>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>


<script src="../../content/js/xshop-list.js"></script>