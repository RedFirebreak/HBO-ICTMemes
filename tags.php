<!DOCTYPE html>
<html lang="en">

<head>
    <title>HBO-ICTMemes</title>
    <?php
    require "func.header.php";
    ?>
</head>

<body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Tags</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
            if ($Loggedin) {
            ?>
                <h2>Alle tags</h2>
                <input type="text" id="myInput" onkeyup="searchtags()" placeholder="Zoek voor tags..."
                    title="Typ een tag-naam!">
                <ul id="myUL">
                    <?php
                    echo "<br>";
                    $sql = "SELECT tagnaam t FROM tags ORDER by tagnaam ASC;";
                    $result = $dbConnection->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $tag = $row["t"];
                            echo "<li><a href='/search.php?search=$tag'>$tag</a></li>";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
                </ul>
                <script>
                function searchtags() {
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByTagName("li");
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
                </script>
                <?php
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Je moet ingelogd zijn om deze pagina te kunnen bekijken.";
                echo "</div>";
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    require "func.footer.php";
    ?>
</body>

</html>