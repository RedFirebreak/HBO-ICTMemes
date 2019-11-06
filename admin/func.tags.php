
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
        // Check if the user is allowed on the admin page
        if (!$Loggedin) {
          //Er is niemand ingelogd!
          require ("notallowed.php");
          exit;
        }
        // Then check if the user is allowed
        if (!$LoggedinUserrole == 'admin' OR !$LoggedinUserrole == 'uber-admin' OR $LoggedinUserrole == "user") {
          //Er is geen admin ingelogd, maar een user
          require ("notallowed.php");
          exit;
        }
?>

<h1 class="page-header">
            Tags
            <p class="lead">(<a href="http://www.bootply.com/128936">with off-canvas sidebar</a>)</p>
          </h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>
          
          <hr>

          <h2 class="sub-header">Here's a table</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
              </tbody>
            </table>
          </div>

          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->