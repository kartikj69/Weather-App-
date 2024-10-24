const options = {
  method: "GET",
  headers: {
    "X-RapidAPI-Key": process.env.RAPIDAPI_KEY,
    "X-RapidAPI-Host": "weather-by-api-ninjas.p.rapidapi.com",
  },
};

// Function to get weather data for a given city
const getWeather = (city) => {
  cityName.innerHTML = city;
  fetch(
    "https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=" + city,
    options
  )
    .then((response) => response.json())
    .then((response) => {
      cloud_pct.innerHTML = response.cloud_pct;
      feels_like.innerHTML = response.feels_like;
      humidity.innerHTML = response.humidity;
      humidityx.innerHTML = response.humidity;
      max_temp.innerHTML = response.max_temp;
      min_temp.innerHTML = response.min_temp;
      sunrise.innerHTML = response.sunrise;
      sunset.innerHTML = response.sunset;
      tempx.innerHTML = response.temp;
      wind_degrees.innerHTML = response.wind_degrees;
      wind_speed.innerHTML = response.wind_speed;
      wind_speedx.innerHTML = response.wind_speed;

      console.log(response);
    })
    .catch((err) => {
      console.error(err);
      alert("Error fetching weather data");
    });
};

// Event listener for the submit button
submit.addEventListener("click", (e) => {
  e.preventDefault();
  if (city.value.trim() === "") {
    alert("Please enter a city name");
    return;
  }
  getWeather(city.value);
});

// Get weather data for Delhi by default
getWeather("Delhi");

// Function to get weather data for a specific city and update the DOM
const fetchWeatherForCity = (city, tempElement, feelsLikeElement, humidityElement, maxTempElement, minTempElement, sunriseElement, sunsetElement) => {
  fetch(
    `https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=${city}`,
    options
  )
    .then((response) => response.json())
    .then((response) => {
      tempElement.innerHTML = response.temp;
      feelsLikeElement.innerHTML = response.feels_like;
      humidityElement.innerHTML = response.humidity;
      maxTempElement.innerHTML = response.max_temp;
      minTempElement.innerHTML = response.min_temp;
      sunriseElement.innerHTML = response.sunrise;
      sunsetElement.innerHTML = response.sunset;
      console.log(response);
    })
    .catch((err) => {
      console.error(err);
      alert(`Error fetching weather data for ${city}`);
    });
};

// Fetch weather data for NYC
fetchWeatherForCity("New York", tempNYC, feels_likeNYC, humidityNYC, max_tempNYC, min_tempNYC, sunriseNYC, sunsetNYC);

// Fetch weather data for Boston
fetchWeatherForCity("Boston", tempB, feels_likeB, humidityB, max_tempB, min_tempB, sunriseB, sunsetB);

// Fetch weather data for Lucknow
fetchWeatherForCity("Lucknow", tempLK, feels_likeLK, humidityLK, max_tempLK, min_tempLK, sunriseLK, sunsetLK);

// Fetch weather data for Delhi
fetchWeatherForCity("Delhi", tempDEL, feels_likeDEL, humidityDEL, max_tempDEL, min_tempDEL, sunriseDEL, sunsetDEL);
