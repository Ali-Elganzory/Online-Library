<!DOCTYPE html>

<html>
    <head>
        <title>Admin Panel</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="public/css/admin_panel.css">
        <link rel="stylesheet" href="public/css/loginpage.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


        <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="application/javascript"
                src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>


        <script src="/public/js/admin_panel.js"></script>
    </head>
    <body>
        <div id="dimbg" onclick="closeForm(active)"></div>
        <div class="manage-books" id="manage-books">
            <div class="list">
                <div class="list-title" >
                    Books Manager
                </div>
                <div class="list-header">
                    <div class="add-btn">

                    </div>
                    <div style="position: relative; display: inline-block; height: 40px;width: 300px;margin-left: 100px; float: right">
                        <input class="search" type="search" placeholder="Find Book..." name="searchtitle" id="bsearch"
                        onchange="">
                    </div>
                </div>
                <?php foreach (array_slice($books,0,21) as $book):?>
                <div class="list-item">
                    <div class="data" contenteditable="true" style="width: 10%">
                        <span><?=$book->title?></span>
                    </div>
                    <div class="data" contenteditable="true" style="width: 10%">
                        <span><?=$book->author?></span>
                    </div>
                    <div class="data" contenteditable="true" style="width: 60%">
                        <span>
                            <?=$book->description?>
                        </span>
                    </div>
                    <div class="image" style="width: 20%" onclick="openForm('editpic', '<?=$book->id?>')">
                        <img id="<?=$book->id?>" src="<?=$book->image_url?>">
                    </div>
                </div>
                <?php endforeach;?>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-lg">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


        </div>
        <div class="manage-users" id = "manage-users" style = "display:none;">
            <div class="list">
                <div class="list-title">
                    Users Manager
                </div>
                <div class="list-header">
                    <div class="add-btn">

                    </div>
                    <div style="position: relative; display: inline-block; height: 40px;width: 300px;margin-left: 100px; float: right">
                        <input class="search" type="search" placeholder="Find Book..." name="searchtitle" id="bsearch"
                        onchange="">
                    </div>
                </div>
                <?php foreach (array_slice($users,0,21) as $user):?>
                <div class="list-item">
                <div class="data" contenteditable="true" style="width: 50%">
                        <span><?=$user->username?></span>
                    </div>
                    <div class="image" style="width: 50%" onclick="openForm('editpic', '<?=$book->id?>')">
                        <img id="<?=$user->id?>" src="<?=$user->image_url?>">
                    </div>
                </div>
                <?php endforeach;?>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-lg">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div role="navigation">
            <ul class="nav nav-tabs" style="position: fixed; bottom: 0; margin-left: 50px">
                <li id="books-tab" role="presentation" class="active navigation-tabs" onclick="manageBooks()"><a href="#">Manage Books</a></li>
                <li id="users-tab" role="presentation" class="navigation-tabs" onclick="manageUsers()"><a href="#">Manage Members</a></li>
            </ul>

        <form action="" method="post" class="editpic" id="editpic" name="editpic" style="height: 250px" enctype="multipart/form-data">
            <fieldset>
                <div class="form-title" style="margin-top: 0">CHANGE BOOK IMAGE</div>
                <input class="form-control form-control-lg" id="formFileLg" name="formFileLg" type="file">
                <input type="submit" value = "upload">
            </fieldset>
        </form>
    </body>
</html>