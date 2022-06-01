<?php
include 'inc/header.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>

<div class="container">
    <h1 class="text-center mt-5">Movie Library App</h1>
    <form id="movieFrom" autocomplete="off">
        <div class="form-group">
            <label for="Movie">Movie Name</label>
            <input class="form-control" type="text" id="movie" placeholder="Movie....">
        </div>
        <div class="form-group">
            <button class="btn btn-danger btn-block">
                Search Movie
            </button>
        </div>
    </form>
    <div id="result"> </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        var apikey = "749ef764"

        $("#movieFrom").submit(function (event) {
            event.preventDefault()

            var movie = $("#movie").val()

            var result = ""

            var url = "http://www.omdbapi.com/?apikey=" + apikey

            $.ajax({
                method: 'GET',
                url: url + "&t=" + movie,
                success: function (data) {
                    console.log(data)

                    result = `

                    <img style="float:left" class="img-thumnail" width="200" height="200" src="${data.Poster}"/>
                    <h2>${data.Title}</h2>
                    <h2>${data.Released}</h2>
                    <h2>${data.Runtime}</h2>
                    <h2>${data.Genere}</h2>
                    <h2>${data.Director}</h2>
                    <h2>${data.Actors}</h2>

                    `
                    $("#result").html(result)

                }
            })
        })
    })
</script>
