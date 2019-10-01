<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Git example</title>

    <!-- Bootstrap core CSS -->
    <link href="src/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="src/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">GitPage</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Hey</a>
              <a class="dropdown-item" href="#">Cool mockup ey</a>
              <a class="dropdown-item" href="#">Stole it from bootstrap :)</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Github-Example</h1>
        <p>Git aint easy. But it can be! You just need a good example and some webpage to keep coming back to everytime you doubt yourself.</p>
        <p>You can <b>clone a repository</b> by doing <code>git clone https://github.com/RedFirebreak/HBO-ICTMemes.git</code> Cloning is basically "copying" the current state of the project to your computer so you can work on it. </p>
        <p>You can download git <a href="https://git-scm.com/downloads">HERE</a>.<br>You can open a <b>command window</b> to <b>enter all these commands</b> by <b>Shift-Right-Clicking in the project directory and clicking "Open Powershell here"</b></p>
      
        <br>
        <div class="container">
      <!-- Example row of columns -->
          <div class="row">
            <div class="col-md-6">
              <p><b>STARTED TO WORK?</b> Make sure to follow this first:</p>
              <ul>
                <li>1. Check the discord for any changes. (Github channel)</li>
                <li>2. Command window: Git pull (UPDATE) anyways/always.</li>
                <li>3. Done! Good luck on your work!</li>
              </ul>
            </div>
            <div class="col-md-6">
            <p><b>DONE WITH WORK?</b> Finish accordingly!</p>
              <ul>
                <li>1. Double check if all your work is saved.</li>
                <li>2. Command window: Follow the "Pushing your changes"</li>
                <li>3. Double check if your work is pushed on <a href="https://github.com/RedFirebreak/HBO-ICTMemes">the Github</a> and discordbot.</li>
              </ul>
            </div>
            </div>
          </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
            <h2>Updating (git pull)</h2>
            <p>If you want to <b>pull all the changes/updates</b> that have been made to the repository you can easily <b>do the following:</b></p>
            <code>
            git pull
            </code>
            <p><b> will pull and overwrite all non-changed files on your system.</b> If you changed a file that would have been pulled from the repository, you will get a merge conflict and the pull will fail.
  You can fix this by deleting your changed files or push your updates to the repository</p>
        </div>

        <div class="col-md-4">
            <h2>Pushing your changes</h2>
            <p>Have you made changes? <b>Are you proud of them? Awesome!</b> Time to push your progress to the repository and have those epic bragging rights you deserve for your awesome code.
                <b>To start a push, you must do the following:</b></p>
            <p><b>Let git know you made changes</b></p>
            <code>
            git add .
            </code>

            <p><b>Giving a name to the files you want to push</b></p>
            <code>
            git commit -m "NAME"
            </code>

            <p><b>Pushing everything to github! Woop!</b></p>
            <code>
            git push origin BRANCHNAME
            </code>
            <p>Branchnames in our project are <b>MASTER</b> and <b>DEVELOP</b></p>
        </div>

        <div class="col-md-4">
            <h2>Branch switching</h2>
            <p>You can swap branches easily by doing <b>the following command:</b></p>
            <code>
            git checkout BRANCHNAME
            </code>
            <p>Branchnames in our project are <b>MASTER</b> and <b>DEVELOP</b></p>
            <p>To swap back to the "original" branch you can do the same command:</p>
            <code>
            git checkout master
            </code>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; HBO-ICTMemes</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="src/dist/js/bootstrap.min.js"></script>
  </body>
</html>
