<html>
  <head>
    <!-- Edit the pagename only -->
    <title>HBO-Memes - PAGENAME</title>
    <?php require('func.header.php'); ?>
  </head>

  <body>

    <form action="/voting.php" method="post">
        <input type="hidden" name="memeid" value="28">
        <input type="hidden" name="user" value="16">
        <input type="hidden" name="soort" value="upvote">
        Upvote
        <input type="submit" value="Submit">
    </form>

    <form action="/voting.php" method="post">
        <input type="hidden" name="memeid" value="28">
        <input type="hidden" name="user" value="16">
        <input type="hidden" name="soort" value="downvote">
        Downvote
        <input type="submit" value="Submit">
    </form>

  </body>

  <footer>
    <?php require('func.footer.php'); ?>
  </footer>
</html>
