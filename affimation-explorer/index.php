<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksplorer Afirmacji</title>
    <link rel="stylesheet" href="./css/style.css"?v=1.1>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="page">
        <div class="page__container">
            
            <h1>Eksplorer Afirmacji</h1>

            <!-- Form for looking up the potential problems -->
            <div class="form__wrapper sec_margin">
                <form id="searchForm">
                    <label for="problem">Wyszukaj problem: </label>
                    <input type="text" id="problem" name="problem" required class="input__field">
                    <button type="submit">Szukaj</button>
                    <span class="seprator">
                        <button type="reset" id="clearExplorer">Wyczyść</button>
                    </span>
                </form>
            </div>
            <!-- This is the div where the search results will be displayed -->
                <div id="results"></div>
                <script>
                    $(document).ready(function(){
                        $("#searchForm").on("submit", function(event) {
                            event.preventDefault();

                            let problem = $("#problem").val();

                            $.ajax({
                                url: "search-db.php",
                                type: 'POST',
                                data: {problem: problem},
                                success: function(response) {
                                    $('#results').html(response);
                                },
                                error: function() {
                                    $("#results").html(("Wystąpił błąd. Spróbuj jeszcze raz."));
                                }
                            });
                        });
                    });
                </script>

        <!-- Option for alphabetical review of the problems -->
            <div class="alphabetical sec_margin">
                <h2>Przeglądaj problemy w porządku alfabetycznym</h2>
                <div class="alphabet__links">
                    <?php
                        require 'db.php';

                        $letters = range('A', 'Z');
                        foreach ($letters as $letter) {
                            echo "<a href='#' class='letter' data-letter='$letter'>$letter</a> ";
                        }
                    ?> <br>
                </div>
                <span class="seprator">
                    <button type="reset" id="clearAlphabet">Wyczyść</button>
                </span>
                <div id="alphabetResults"></div>
                <script>
                    $(document).ready(function(){
                        $(".letter").click(function(event) {
                            event.preventDefault();

                            let letter = $(this).data('letter');

                            $.ajax({
                                url: "alphabet-display-db.php",
                                type: 'GET',
                                data: {letter: letter},
                                success: function(response) {
                                    $('#alphabetResults').html(response);
                                },
                                error: function() {
                                    $("#alphabetResults").html(("Wystąpił błąd. Spróbuj jeszcze raz."));
                                }
                            });
                        });
                    });
                </script>
            </div>    

             <!-- Clear the search results -->
            <script>
                $(document).ready(function(){
                    $("#clearExplorer").click(function(event) {
                        event.preventDefault();
                        $("#results").html("");
                        $("#problem").val("");
                    });

                    $("#clearAlphabet").click(function(event) {
                        event.preventDefault();
                        $("#alphabetResults").html("");
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>