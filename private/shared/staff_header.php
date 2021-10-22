<!doctype html>

<html lang="en">
  <head>
    <!--
      XSS -- Cross-site Scripting Prevention
      Notice the h() function in the PHP echo statment. This function wraps the PHP function 
      htmlspecialchars() around the $page_title. This prevents XSS (Cross-site Scripting).
      This function is in the functions.php file
    -->
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>WNC Birds Staff Area</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
