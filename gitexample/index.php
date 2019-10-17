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

        <h1 class="display-3">Github-HOWTWO</h1>
        <p><small>Now with fork explanation!</small></p>   
        <p>Git aint easy. But it can be! You just need a good example and some webpage to keep coming back to everytime you doubt yourself.</p> 
        <br>
        <div class="container">
      <!-- Example row of columns -->
          <div class="row">

          <div class="row">
            <div class="col-md-12">
          <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Setting up? Installation instructions here!</a>
          </p>

              <!-- first element -->

              <div class="collapse" id="multiCollapseExample1">
                <div class="card card-body">
                <div class="accordion" id="accordionExample"> <!-- Start the cards!-->
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      1. Getting started
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                  <h3>Introduction</h3>
                  <p>So, you wanna get started on GIT? Awesome! We just need to install a few tools onto your system to get started. You have two options here.<p>
                  <ul>
                    <li>Install GIT for commandline to push/pull and manage your git repository from powershell or cmd.
                      <ul>
                        <li>Download git <a href="https://git-scm.com/downloads">HERE</a>.</li>
                        <li>You can open a <b>command window</b> to <b>enter all these commands</b> by <b>Shift-Right-Clicking in the project directory and clicking "Open Powershell here"</b></li>
                      </ul></li>
                      <li>Installing GitHub Desktop to have a slightly more graphical solution.
                      <ul>
                        <li>Download git desktop <a href="https://desktop.github.com/">HERE</a>.</li>
                        <li>You can install the application. But please wait with the actual setup of branches. Since we are going to fork the main branch first.</b></li>
                      </ul></li>
                  </ul>
                  <p>FRIENDLY REMINDER:<br> You can open a <b>command window</b> to <b>enter all these commands</b> by <b>Shift-Right-Clicking in the project directory and clicking "Open Powershell here"</b></p>
                  </div>
                </div>
              </div>

              <div class="card"> 
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      2. Forking and cloning the repository
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                  <h3>Fork/Clone</h3>
                  <p>Alright! Lets make a fork off the main github repository. A fork is basically YOUR copy of the project, so you can "work in peace".</p>
                  <ol>
                    <li>Go to the main repository
                      <ul>
                        <li><a href="https://github.com/RedFirebreak/HBO-ICTMemes">Link to our main fork</a>.</li>
                      </ul></li>
                      <li>check the develop branch, then Click "fork" on the top-right
                      <ul>
                        <li><img src="./img/fork.png" alt="fork"></li>
                      </ul></li>
                      <li>Wait a second untill it is done copying.</li>
                      <li>Now choose what you want to use to make a clone of this fork</li>
                      </ol>


                      <p> <!--- git or dekstopgit -->
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#gitcommandline1" aria-expanded="false" aria-controls="gitcommandline1">
                          Git Commandline
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#gitcommandline2" aria-expanded="false" aria-controls="gitcommandline2">
                          Git Desktop
                        </button>
                        (please close one before you open another)
                      </p>
                      <div class="collapse" id="gitcommandline1">
                        <div class="card card-body">
                        <h4>Git-Commandline</h4>
                          <p><b>Git for the commandline ey! Good choice. We are now gonna clone your copy, to your device so we can start working!</b></p>
                          <ol>
                            <li>Click the geen button "clone or download" and copy the link inside (ON YOUR COPY OF THE PROJECTPAGE)
                              <ul>
                                <li><img src="./img/cloneordownload.png" alt="fork"></li>
                              </ul></li>

                              <li>Go to a folder on your device, then <b>open a command-window where you want the project to be</b>. For me, I want it inside of my HTDOCS folder from XAMMP, but anywhere is fine.
                              <ul>
                                <li>You can open a command window by <b>SHIFT+RIGHTCLICKING in the directory. Then clicking "open powershell here"</b></li>
                                <li><img src="./img/openpowershellhere.png" alt="fork"></li>
                              </ul></li>

                              <li>Enter the following command, then paste the link you just copied from the green button
                              <ul>
                                <li><code>git clone PASTEDLINK</code></li>
                                <li><img src="./img/gitclone.png" alt="fork"></li>
                              </ul></li>
                            <li>We are done! You just copied your own fork of the project to a folder on your device. Good job!</li>
                          </ol>
                        </div>
                      </div>

                      <div class="collapse" id="gitcommandline2">
                        <div class="card card-body">
                        <h4>Git-Desktop</h4>
                          <p><b>Git for the desktop ey! Good choice. I like being lazy too :). <br>We are now gonna clone your copy to your device so we can start working!</b></p>
                          <ol>
                            <li>Click the geen button "clone or download" on YOUR forked copy-page, then click "open in Desktop".
                                  <ul>
                                    <li><img src="./img/cloneordownload.png" alt="fork"></li>
                                  </ul></li>
                            <li>Git Desktop will now open and greet you. Change the local path to the spot where you the copy to be on your device
                                  <ul>
                                    <li><img src="./img/gitdekstop.png" alt="fork"></li>
                                  </ul></li>
                            <li>Done! Github Desktop has now made a copy of your own fork on your device.</li>
                          </ol>                                
                        </div>
                      </div>

                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #3
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>

          </div> <!-- The end of div class card -->

                </div>
              </div>



            </div>
          </div>


            <!-- OLD
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
            -->

            </div>
          </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">

        <h2>Git CommandLine</h2>

        <div class="accordion" id="accordion3">

          <div class="card">
            <div class="card-header" id="heading3-1">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse3-1" aria-expanded="false" aria-controls="collapseOne">
                  Switching branches
                </button>
              </h2>
            </div>
            <div id="collapse3-1" class="collapse" aria-labelledby="heading3-1" data-parent="#accordion3">
            <div class="card-body">
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
          </div>

          <div class="card">
            <div class="card-header" id="heading3-2">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3-2" aria-expanded="false" aria-controls="collapseTwo">
                  Updating (Git pull)
                </button>
              </h2>
            </div>
            <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion3">
            <div class="card-body">
              <h2>Updating (git pull)</h2>
                <p>If you want to <b>pull all the changes/updates</b> that have been made to the repository you can easily <b>do the following:</b></p>
                <code>
                git pull
                </code>
                <p><b> will pull and overwrite all non-changed files on your system.</b> If you changed a file that would have been pulled from the repository, you will get a merge conflict and the pull will fail.
                You can fix this by deleting your changed files or push your updates to the repository</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="heading3-3">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3-3" aria-expanded="false" aria-controls="collapseThree">
                  Merge/Commit
                </button>
              </h2>
            </div>
            <div id="collapse3-3" class="collapse" aria-labelledby="heading3-3" data-parent="#accordion3">
              <div class="card-body">
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
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading3-4">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3-4" aria-expanded="false" aria-controls="collapseThree">
                  Check current status
                </button>
              </h2>
            </div>
            <div id="collapse3-4" class="collapse" aria-labelledby="heading3-4" data-parent="#accordion3">
              <div class="card-body">
              <h2>Checking status</h2>
                <p>You can check the status of your projects (and errors) by doing <b>the following command:</b></p>
                <code>
                git checkout BRANCHNAME
                </code>
              </div>
            </div>
          </div>

        </div> <!-- Close the cards -->
        </div> <!-- Close the div -->

        <div class="col-md-4">
        <h2>Git Desktop</h2>

        <div class="accordion" id="accordion2">

          <div class="card">
            <div class="card-header" id="heading2-1">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2-1" aria-expanded="false" aria-controls="collapseOne">
                  Switching branches
                </button>
              </h2>
            </div>
            <div id="collapse2-1" class="collapse" aria-labelledby="heading2-1" data-parent="#accordion2">
            <div class="card-body">
              <h2>Branch switching</h2>
                <p>You can swap branches by clicking "current branch" on the top bar</p>
                <img src="./img/gitdekstopcheckbranch.png" alt="fork">
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="heading2-2">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2-2" aria-expanded="false" aria-controls="collapseTwo">
                  Updating (Git pull)
                </button>
              </h2>
            </div>
            <div id="collapse2-2" class="collapse" aria-labelledby="heading2-2" data-parent="#accordion2">
            <div class="card-body">
              <h2>Updating (git pull)</h2>
                <p>If you want to <b>pull all the changes/updates</b> that have been made to the repository you can easily <b>do the following:</b></p>
                <code>
                git pull
                </code>
                <p><b> will pull and overwrite all non-changed files on your system.</b> If you changed a file that would have been pulled from the repository, you will get a merge conflict and the pull will fail.
                You can fix this by deleting your changed files or push your updates to the repository</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="heading2-3">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2-3" aria-expanded="false" aria-controls="collapseThree">
                  Merge/Commit
                </button>
              </h2>
            </div>
            <div id="collapse2-3" class="collapse" aria-labelledby="heading2-3" data-parent="#accordion2">
              <div class="card-body">
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
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading2-4">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2-4" aria-expanded="false" aria-controls="collapseThree">
                  Check current status
                </button>
              </h2>
            </div>
            <div id="collapse2-4" class="collapse" aria-labelledby="heading2-4" data-parent="#accordion2">
              <div class="card-body">
              <h2>Checking status</h2>
                <p>You can check the status of your projects (and errors) by doing <b>the following command:</b></p>
                <code>
                git checkout BRANCHNAME
                </code>
              </div>
            </div>
          </div>
        </div> <!-- Close the cards -->
        </div> <!-- Close the div -->

        <div class="col-md-4">
        <h2>Other</h2>

        <div class="accordion" id="accordion4">

          <div class="card">
            <div class="card-header" id="heading4-1">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse4-1" aria-expanded="false" aria-controls="collapseOne">
                  Switching branches
                </button>
              </h2>
            </div>
            <div id="collapse4-1" class="collapse" aria-labelledby="heading4-1" data-parent="#accordion4">
            <div class="card-body">
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
          </div>

          <div class="card">
            <div class="card-header" id="heading4-2">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4-2" aria-expanded="false" aria-controls="collapseTwo">
                  Updating (Git pull)
                </button>
              </h2>
            </div>
            <div id="collapse4-2" class="collapse" aria-labelledby="heading4-2" data-parent="#accordion4">
            <div class="card-body">
              <h2>Updating (git pull)</h2>
                <p>If you want to <b>pull all the changes/updates</b> that have been made to the repository you can easily <b>do the following:</b></p>
                <code>
                git pull
                </code>
                <p><b> will pull and overwrite all non-changed files on your system.</b> If you changed a file that would have been pulled from the repository, you will get a merge conflict and the pull will fail.
                You can fix this by deleting your changed files or push your updates to the repository</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="heading4-3">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4-3" aria-expanded="false" aria-controls="collapseThree">
                  Merge/Commit
                </button>
              </h2>
            </div>
            <div id="collapse4-3" class="collapse" aria-labelledby="heading4-3" data-parent="#accordion4">
              <div class="card-body">
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
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading4-4">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4-4" aria-expanded="false" aria-controls="collapseThree">
                  Check current status
                </button>
              </h2>
            </div>
            <div id="collapse4-4" class="collapse" aria-labelledby="heading4-4" data-parent="#accordion4">
              <div class="card-body">
              <h2>Checking status</h2>
                <p>You can check the status of your projects (and errors) by doing <b>the following command:</b></p>
                <code>
                git checkout BRANCHNAME
                </code>
              </div>
            </div>
          </div>
        </div> <!-- Close the cards -->
        </div> <!-- Close the div -->

      </div> <!-- Close the container -->

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
