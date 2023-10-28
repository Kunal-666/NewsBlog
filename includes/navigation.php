<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="index.php">TheHeadlinePost</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php


                $query = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 5";
                $select_all_categories_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    $cat_class = '';
                    $reg_class = '';
                    $contact_class = '';

                    $pageName = basename($_SERVER['PHP_SELF']);
                    if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                        $cat_class = 'active';
                        $login_class = '';
                    } else if ($pageName == 'registration.php') {
                        $reg_class = 'active';
                        $login_class = '';
                    } elseif ($pageName == 'contact.php') {
                        $contact_class = 'active';
                        $login_class = '';
                    } else if ($pageName == 'login.php') {
                        $login_class = 'active';
                    } else {
                        $cat_class = '';
                        $reg_class = '';
                        $login_class = '';
                        $contact_class = '';
                    }

                    echo "<li class='$cat_class'><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                }
                $login_class = '';
                $cat_class = '';
                $reg_class = '';
                $contact_class = '';
                ?>
                <?php
                if (isset($_SESSION['user_role'])) {
                    $user_role = $_SESSION['user_role'];
                    if ($user_role == 'admin') {
                        echo "<li><a href='admin/index.php'>Admin panel</a></li>";
                    } elseif (isset($_SESSION['user_role'])) {
                        $user_role = $_SESSION['user_role'];
                        if ($user_role == 'subscriber') {
                            echo "<li><a href='users/index.php'>User Panel</a></li>";
                        }
                    }
                } else {
                    echo "<li class='$login_class'><a href='login.php'>Login</a></li>";
                    echo "<li class='$reg_class'><a href='registration.php'>Registation</a></li>";
                }
                ?>
                <?php
                if (isset($_SESSION['user_role'])) {
                    $user_role = $_SESSION['user_role'];
                    $username  = $_SESSION['username'];
                    if ($user_role == 'admin') {
                        if (isset($_GET['p_id'])) {
                            $the_p_id = $_GET['p_id'];
                            echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_p_id}'>Edit Post</a></li>";
                        }
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['user_role'])) {
                    $username  = $_SESSION['username'];
                    if (isset($_GET['user'])) {
                        $user = $_GET['user'];
                        if ($username == $user) {
                            echo "<li><a href='users/edit_profile.php'>Edit Profile</a></li>";
                        }
                    }
                }
                ?>
                <li class='<?php echo $contact_class; ?>'><a href='contact.php'>Contect Us</a></li>
                <li>
                    <a>
                        <div class="theme-btn mt-5">
                            <i class="glyphicon glyphicon-adjust" style="font-size: 2rem;"></i>
                        </div>
                    </a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" action="search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="search_submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 <meta charset="utf-8">
    <script>
    document.querySelector(".theme-btn").addEventListener("click", () => {
        document.body.classList.toggle("light-mode");
    })
</script>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">