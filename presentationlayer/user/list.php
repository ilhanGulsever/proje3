<div style="margin: 10px 0">
    <h6 style="font-size: 20px" class="pull-left">Users</h6>
    <a href="user.php?mod=insert" class="btn btn-success btn-md pull-right">New Create User</a>
    <div class="clearfix"></div>
</div>

<table class="table table-bordered table-condensed table-responsive table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>User Name</th>
            <th width="10%">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($userList); $i++) {
            ?>
            <tr>
                <td>
                    <?php echo $userList[$i]->getID(); ?>
                </td>
                <td>
                    <?php echo $userList[$i]->getName(); ?>
                </td>
                <td>
                    <a href="user.php?mod=edit&id=<?php echo $userList[$i]->getID(); ?>" class="btn btn-xs btn-warning">Uptade</a>
                    <?php if (count($userList) > 1) { ?>
                        <a href="user.php?mod=delete&id=<?php echo $userList[$i]->getID(); ?>" class="btn btn-xs btn-danger">Delete</a>
                    <?php } ?>
                </td>
            </tr>

        <?php } ?>
    </tbody>


</table>
