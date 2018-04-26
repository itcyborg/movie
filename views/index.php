<html>
<head>
    <title>Movie Shop</title>
    <link rel="stylesheet" href="<?php View::asset('bootstrap.css')?>">
    <link rel="stylesheet" href="<?php View::asset('style.css')?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>
<nav class="navbar-inverse navbar-fixed nav">
    <div class="nav-brand">
    </div>
    <div class="nav-search">
        <form action="search" id="search" class="form-inline">
            <input type="text"  class="form-control input-sm" placeholder="Title" name="name" id="name">
            <select name="genre" id="genre" class="form-control input-sm">
                <?php
                foreach ($genres as $item) {
                    dd($item);
                    echo "<option value='".$item['name']."'>".$item['name']."</option>";
                } ?>
            </select>
            <input type="text"  class="form-control input-sm" placeholder="Actor" name="actor" id="genre">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>
    </div>
</nav>
<hr>
<br>
<div class="content">
    <div class="sidebar">
        <a href="#home" onclick="headTo('home')">Home <i class="fa fa-home pull-right"></i></a>
        <a href="#upload" onclick="headTo('upload')">Upload <i class="fa fa-upload pull-right"></i></a>
        <a href="#genre" onclick="headTo('genre')">Add Genre <i class="fa fa-tags pull-right"></i></a>
    </div>
    <div class="content-display container-fluid">
        <div id="results" class="container-fluid">
            <?php echo $data;?>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <video id="video" src="" autoplay controls></video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="<?php View::asset('jquery-3.1.1.js'); ?>"></script>
<script src="<?php View::asset('bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    function headTo(page) {
        $.ajax({
            url: page,
            type: 'get',
            success: function (data) {
                console.log(data);
                $('#results').html(data);
            }
        });
    }
    $('#search').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'search',
            type: 'post',
            data: {
                'name': $('#name').val(),
                'actor': $('#name').val(),
                'genre': $('#name').val()
            },
            // dataType:'json',
            success: function (data) {
                console.log(data);
                $('#results').html(data);
            }
        });
    });
    function loadVideo(videourl,name){
        $('#video').attr('src',videourl);
        $('.modal-title').html("Now Playing:"+name);
        $('#myModal').modal();
    }
    $('body').on('hidden.bs.modal', '.modal', function () {
        $('video').trigger('pause');
    });
</script>
</body>
</html>