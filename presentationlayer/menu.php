<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
        <a class="navbar-brand" href="main.php">SUPPLIER MANAGEMENT SYSTEM</a>
    </div>


    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="index.php?type=cikis">
               <i class="fa fa-sign-out" aria-hidden="true"></i>  Logout(<?php echo getSession('name'); ?>)
            </a>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a  href="user.php" > Users</a>
                </li>
                <li>
                    <a href="category.php"> Categories</a>
                </li>
                <li>
                    <a href="main.php"> Accounting</a>
                </li>
         
                <li>
                    <a href="#"> Products <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">New Product</a>
                        </li>
                        <li>
                            <a href="#">Purchase</a>
                        </li>
                             <li>
                            <a href="#">Sell</a>
                        </li>
                    </ul>
                </li>
                
                    <li>
                    <a href="services.php"> Services</a>
                </li>
         
            </ul>
        </div>

    </div>

</nav>