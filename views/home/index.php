<html>
<head>
    <link rel="stylesheet" href="<?= asset_url() ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= asset_url() ?>css/all.min.css" />
    <link rel="stylesheet" href="<?= asset_url() ?>css/index_style.css" />
</head>
<body>
    <div class="jumbotron jum">
        <div class=" navbar">
            <h3>Phone Book <i class="far fa-address-book"></i></h3>
        </div>
        <div class="row">
            <div class="col-lg-4 inp">
                <form action="">
                    <input autocomplete="off" onkeyup="" id="myInput" name='s' class="form-control mt-2" placeholder="search">
                    <span class="icon text-primary"><i class="fas fa-search"></i></span>
                </form>
                <h5 class="mt-5">Add New Contact</h5>
                <form action="<?= site_url('contact/add') ?>" method="post">
                    <input autocomplete="off" name='name' class="form-control mb-3 mt-3" placeholder="add name" id="userName">
                    <input autocomplete="off" name='mobile' class="form-control mb-3" placeholder="add phone" id="userPhone">
                    <input autocomplete="off" name='email' class="form-control mb-3" placeholder="add e-mail" id="userEmail">
                    <button type="submit" class="btn btn-info w-100 btn1">Add</button>
                </form>
            </div>
            <div class="col-lg-8">
                <?php if(!is_null($searchKeyword)): ?>
                <h2 class="mb-3">Search results for <span class='text-warning'><?= $searchKeyword ?></span></h2>
               <?php endif ?>
                <table id="myTable" class="table text-justify table-striped">
                    <thead class="tableh1">
                        <th class="">id</th>
                        <th class="">Name</th>
                        <th class="">Phone</th>
                        <th class="">Email</th>
                        <th class="col-1">Actions</th>
                    </thead>
                    <tbody id="tableBody">
                        <?php foreach ($contacts as $contact) : ?>
                            <tr>
                                <td class=""><?= $contact['id'] ?></td>
                                <td class=""><?= $contact['name'] ?></td>
                                <td class=""><?= $contact['mobile'] ?></td>
                                <td class=""><?= $contact['email'] ?></td>
                                <td class="col-1">
                                    <a href="<?= site_url("contact/delete/{$contact['id']}") ?>"><img src="<?= asset_url('images/delete-icon.png') ?>"></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="pagination">
        <?php
        // صفحه فعلی
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // تعداد صفحات در هر نمایش
        $pageRange = 3;
        // شروع و پایان صفحه‌بندی
        $startPage = max(1, $currentPage - 1);
        $endPage = min($pageCount, $startPage + $pageRange - 1);
        // لینک صفحه قبلی
        if ($currentPage > 1) {
            echo '<a href="?page=' . ($currentPage - 1) . '">&laquo; Prev</a>';
        }
        // لینک صفحات
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
        }
        // لینک صفحه بعدی
        if ($currentPage < $pageCount) {
            echo '<a href="?page=' . ($currentPage + 1) . '">Next &raquo;</a>';
        }
        ?>
    </div>
        </div>
    </div>
    <footer class="text-center">Ahmad Al-Shahawi 2019.All rights reserved</footer>
    <script src="<?= asset_url() ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= asset_url() ?>js/popper.min.js"></script>
    <script src="<?= asset_url() ?>js/bootstrap.min.js"></script>
    <!-- <script src="<?= asset_url() ?>js/index.js"></script> -->
</body>
</html>