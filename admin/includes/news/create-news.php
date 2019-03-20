<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/4/2019
 * Time: 7:07 PM
 */
?>

<!--INIT-->
<?php
    ob_start();

    require_once(BASE_URL . 'classes/NewsFeed.php');

    if(isset($_POST['create_news'])) {
        $news_feed = new NewsFeed();
        $result = $news_feed->insertNews($_POST['news_title'], $_POST['news_description']);

        header("Location: " . BASE_URL . "admin/news.php");
    }
?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create News</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form method="post" id="news-form">
        <div class="form-group">
            <label for="news_title">News Title</label>
            <input id="news_title" name="news_title" class="form-control" placeholder="Event Name">
        </div>
        <div class="form-group">
            <label for="news_description">News Description</label>
            <textarea name="news_description" id="news_description" class="form-control" cols="30" rows="5" placeholder="Event Details"></textarea>
        </div>
<!-- TODO: FOR IMAGE; INTEGRATE THE MULTIPLE FILE SELECTOR MODULE -->
<!--                <div class="form-group">-->
<!--                    <label for="news_title">Event Name</label>-->
<!--                    <input id="event_name" name="event_name" class="form-control" placeholder="Event Name">-->
<!--                </div>-->
        <div class="form-group">
            <button class="btn btn-instagram" type="submit" name="create_news">Create News Feed</button>
        </div>
    </form>
</section>
<!-- /.content -->