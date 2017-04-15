<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php
        //include_title();
        echo '<title>'; include_slot('title', 'Jobeet, Your best job board'); echo '</title>';
        include_http_metas();
        include_metas();
        include_stylesheets();
        include_javascripts();
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
                    <a href="<?php echo url_for('job/index')?>">
                        <img src="/images/logo.jpg" alt="Jobeet Job Board" />
                    </a>
                </h1>
                <div id="sub_header">
                    <div class="post">
                        <h2>Ask for people</h2>
                        <div><a href="<?php echo url_for('job/new')?>">Post a Job</a></div>
                    </div>
                    <div class="search">
                        <h2>Ask for a job</h2>
                        <form action="" method="get">
                            <input type="text" name="keywords" id="search_keywords" />
                            <input type="submit" value="Search" name="searchBtn" />
                            <div class="help">Enter some keywords(city, country, position, ...)</div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="content">
                <?php if ($sf_user->hasFlash('notice')) 
                { ?>
                    <div class="flash_notice"><?php echo $sf_user->getFlash('notice'); ?></div>
                <?php } ?>
                
                <?php if ($sf_user->hasFlash('error')) 
                { ?>
                    <div class="flash_error"><?php echo $sf_user->getFlash('error'); ?></div>
                <?php } ?>
                <div class="content">
                    <?php echo $sf_content; ?>
                </div>
            </div>
            <div id="footer">
                <div class="content">
                    <span class="symfony">
                        <img src="/images/jobeet-mini.png" alt="" />
                        powered by<a href="/"><img src="/images/symfony.gif" alt="symfony framework" /></a> 
                    </span>
                    <ul>
                        <li><a href="">About Jobeet</a></li>
                        <li class="feed"><a href="">Full Feed</a></li>
                        <li><a href="">Jobeet API</a></li>
                        <li class="last"><a href="">Affiliates</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
