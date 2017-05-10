<div style="margin: 10px 0">
    <h6 style="font-size: 20px" class="pull-left">Categories</h6>
    <a href="category.php?mod=insert" class="btn btn-success btn-md pull-right">New Create Category</a>
    <div class="clearfix"></div>
</div>

<table class="table table-bordered table-condensed table-responsive table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th width="20%">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($categoriList); $i++) {
            ?>
            <tr>
                <td>
                    <?php echo $categoriList[$i]->getId(); ?>
                </td>
                <td>
                    <?php echo $categoriList[$i]->getName(); ?>
                </td>
                <td>
                    
                    <a href="category.php?mod=proper&id=<?php echo $categoriList[$i]->getId(); ?>" class="btn btn-xs btn-info">Category Properties</a>
                    <a href="category.php?mod=edit&id=<?php echo $categoriList[$i]->getId(); ?>" class="btn btn-xs btn-warning">Edit</a>

                    <a href="category.php?mod=delete&id=<?php echo $categoriList[$i]->getId(); ?>" class="btn btn-xs btn-danger">Delete</a>

                </td>
            </tr>

        <?php } ?>
    </tbody>


</table>
