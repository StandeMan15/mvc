    <?php require 'view/components/header.php'; ?>

    <div class="d-flex justify-content-between">
        <form action="index.php?con=products&op=search" method="POST" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" name="searchSubmit" type="submit">Search</button>
        </form>

        <a class="btn btn-success px-4 float-right" style="height: 40px;" href="index.php?con=products&op=create">Create New Product</a>
    </div>


    <?= $html ?>
    <?= $nav ?>

    

    </div>
    </div>
    <?php require 'view/components/footer.php'; ?>