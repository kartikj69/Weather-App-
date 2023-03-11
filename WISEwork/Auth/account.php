<?php 
	session_start();
	// if(!isset($_SESSION['user'])){
	// 	header("location: login.php");	exit();
	// }

	if(isset($_GET['logout'])){
		unset($_SESSION['user']);
		header("location: account.php");	exit();
	}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My weather app</title>
    <link rel="stylesheet" type="text/css" href="sty.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg py-3" id="navbar">
      <div class="container-fluid">
        <a class="navbar-brand text-strong text-light px-3" href="#">
        <?php
        if(isset($_SESSION['user'])) {
          echo $_SESSION['user'];
        } else {
          echo "Weather App";
        }?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item text-light">
              <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">About this App</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                More
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/Auth/login.php">Log In</a></li>                
                
                <li><a class="dropdown-item" href="/Auth/index.php">Register</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="?logout">Logout</a></li>

              </ul>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li> -->
          </ul>
          <form class="d-flex" role="search">
            <input id="city" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit" id="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <h1 class="my-4 text-center" id="we">Weather for <span id="cityName"></span></h1>
      <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-secondary">
              <div class="card-header py-3 text-bg-secondary">
                <h4 class="my-0 fw-normal">Temps</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">❄️<span id="tempx"></span><small class="text-muted fw-light">°C</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  
                  <li>Minimum Temprature is <span id="min_temp"></span></li>
                  <li>Maximum Temprature is <span id="max_temp"></span></li>
                  <li>But it Feels like<span id="feels_like"></span></li>
                </ul>
                
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-info">
              <div class="card-header py-3 text-bg-info">
                <h4 class="my-0 fw-normal">Sky</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">💦<span id="humidityx"></span><small class="text-muted fw-light">%</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>Humidity is <span id="humidity"></span></li>
                  <li>Sunrise time is <span id="sunrise"></span></li>
                  <li>Sun sets on <span id="sunset"></span></li>
                  
                </ul>

              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
              <div class="card-header py-3 text-bg-primary border-primary">
                <h4 class="my-0 fw-normal">Wind</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">💨<span id="wind_speedx"></span><small class="text-muted fw-light">km/hr</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>Cloud PCT is <span id="cloud_pct"></span></li>
                  <li>Wind is on <span id="wind_degrees"></span> degrees</li>
                  <li>Wind is on <span id="wind_speed"></span> mph</li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
    
        <h2 class="display-6 text-center mb-4" id="head">Weather of Common Cities</h2>
    
        <div class="table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <th></th>
                <th class="texti" style="width: 22%;"> Temp </th>
                <th class="texti" style="width: 22%;"> Feels_like </th>
                <th class="texti" style="width: 22%;"> Humidity </th>
                <th class="texti" style="width: 22%;"> Max_temp </th>
                <th class="texti" style="width: 22%;"> Min_temp </th>
                <th class="texti" style="width: 22%;"> Sunrise </th>
                <th class="texti" style="width: 22%;"> Sunset </th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row" class="text-start texti">NYC</th>

                <td class="texti"><span id="tempNYC"></span></td>
                <td class="texti"><span id="feels_likeNYC"></span></td>
                <td class="texti"><span id="humidityNYC"></span></td>
                <td class="texti"><span id="max_tempNYC"></span></td>
                <td class="texti"><span id="min_tempNYC"></span></td>
                <td class="texti"><span id="sunriseNYC"></span></td>
                <td class="texti"><span id="sunsetNYC"></span></td>
                
              </tr>
              <tr>
                <th scope="row" class="text-start texti">Boston</th>
                  <td class="texti"><span id="tempB"></span></td>
                  <td class="texti"><span id="feels_likeB"></span></td>
                  <td class="texti"><span id="humidityB"></span></td>
                  <td class="texti"><span id="max_tempB"></span></td>
                  <td class="texti"><span id="min_tempB"></span></td>
                  <td class="texti"><span id="sunriseB"></span></td>
                  <td class="texti"><span id="sunsetB"></span></td>
              </tr>
            </tbody>
    
            <tbody>
              <tr>
                <th scope="row" class="text-start texti">Luknow</th>
                  <td class="texti"><span id="tempLK"></span></td>
                  <td class="texti"><span id="feels_likeLK"></span></td>
                  <td class="texti"><span id="humidityLK"></span></td>
                  <td class="texti"><span id="max_tempLK"></span></td>
                  <td class="texti"><span id="min_tempLK"></span></td>
                  <td class="texti"><span id="sunriseLK"></span></td>
                  <td class="texti"><span id="sunsetLK"></span></td>
              </tr>
              <tr>
                <th scope="row" class="text-start texti">Delhi</th>
                <td class="texti"><span id="tempDEL"></span></td>
                  <td class="texti"><span id="feels_likeDEL"></span></td>
                  <td class="texti"><span id="humidityDEL"></span></td>
                  <td class="texti"><span id="max_tempDEL"></span></td>
                  <td class="texti"><span id="min_tempDEL"></span></td>
                  <td class="texti"><span id="sunriseDEL"></span></td>
                  <td class="texti"><span id="sunsetDEL"></span></td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="harry.js"></script>
  </body>
</html>