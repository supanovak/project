<html>
    <head>
        <title>UQForum</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if (session()->get('email')) { ?>
                        <li class="nav-item">
                            <form action="<?php echo base_url(); ?>hub">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Question Hub</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>chat">
                                <img src="/assignment/assets/img/speech_bubble.png" alt="Chat" width="5%" style="width:48px;height:48px;object-fit:cover;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="<?php echo base_url(); ?>home">UQForum</a>
                        </li>
                        <li class="nav-item">
                            <form action="<?php echo base_url(); ?>post">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ask</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action="<?php echo base_url(); ?>profile">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Profile</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action="<?php echo base_url(); ?>favourite">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Favourite</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action= "<?php echo base_url(); ?>login/logout">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                            </form>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a onclick="alert('Please log in to access this feature');">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onsubmit>Question Hub</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a onclick="alert('Please log in to access this feature');">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                    <img src="/assignment/assets/img/speech_bubble.png" alt="Chat" width="5%" style="width:48px;height:48px;object-fit:cover;">
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="<?php echo base_url(); ?>login">UQForum</a>
                        </li>
                        <li class="nav-item">
                            <form action="<?php echo base_url(); ?>register">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action= "<?php echo base_url(); ?>login">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
                            </form>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav my-lg-0">
            </div>
        </nav>
