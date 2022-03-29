    <?php require 'view/components/header.php'; ?>

    <div class="d-flex justify-content-between">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

        <button class="btn btn-success px-4 float-right" style="height: 40px;" href="index.php?con=contacts&op=create">Create New Contact</button>
        </div>
        <?= $html ?>
    </div>

    <?= $url = '<a href="index.php?op=create">Create</a>';?>
</div>
    <?php require 'view/components/footer.php'; ?>
