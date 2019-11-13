    <footer>
        <div class="container">
            <hr>
            <p>&copy; HBO-ICTMemes</p>

        </div>
    </footer>
    </main> <!-- end ALL content here. Please make sure to not add anything after this -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="/src/js/menujquery.js"></script>
    <script src="/src/js/menu.js"></script> <!-- Resource jQuery -->

    <script>
window.jQuery || document.write('<script src="/src/js/jquery.min.js"><\/script>')
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="/src/js/bootstrap.min.js"></script>
    <?php
        databaseDisconnect($dbConnection); // disconnect from database
    ?>