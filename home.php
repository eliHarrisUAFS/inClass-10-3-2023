<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME TO THE LIBRARY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark" style="margin-bottom: 20px">
    <a class="navbar-brand" href="#">
        GET YA BOOKS
    </a>
    </nav>
    <div class="container">
    <div class="row">
        <div class="col-sm-8">
            <table class="table table-bordered table-striped">
                <thead><tr><th>ISBN</th><th>Title</th></tr></thead>
                <tbody>
                    <?php   
                        $title = "title.txt";
                        $isbn = "isbn.txt";
                        $title_content = file_get_contents($title);
                        $isbn_content = file_get_contents($isbn);
                    
                        $title_array = explode("\n", $title_content);
                        $isbn_array = explode("\n", $isbn_content);
                        $count = count($title_array);
                        for ($i = 0; $i < $count; $i++) {
                            echo "<tr><td>$isbn_array[$i]</td><td>$title_array[$i]</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>       
        </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Book</h5>
                        <p class="card-text">Add a new book to the list.</p>
                        <form action="home.php" method="POST">
                        <label for="ISBN" class="form-label">ISBN</label>
                            <input type="text" class="form-control mb-3" id="ISBN" name="ISBN" placeholder="Enter ISBN" required>
                            <label for="Title" class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" id="Title" name="Title" placeholder="Enter a Title" required>
                            <input type="submit" name="button" class="btn btn-primary w-100"></input>
                            <?php
                                if (isset($_POST['ISBN']) && isset($_POST['Title']) && isset($_POST['button'])) {
                                    $isbn = $_POST['ISBN'];
                                    $title = $_POST['Title'];
                                    $title_file = fopen("title.txt", "a");
                                    $isbn_file = fopen("isbn.txt", "a");
                                    fwrite($title_file, "\n$title");
                                    fwrite($isbn_file, "\n$isbn");
                                    fclose($title_file);
                                    fclose($isbn_file);
                                    header("Refresh:0");
                                    exit;
                                }
                            ?>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>