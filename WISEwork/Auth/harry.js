const options = {
  method: "GET",
  headers: {
    "X-RapidAPI-Key": "7607bdf441msh57b90d69c3f1a91p179fc2jsnb82fa2e08550",
    "X-RapidAPI-Host": "weather-by-api-ninjas.p.rapidapi.com",
  },
};
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
      // temp.innerHTML = response.temp;
      tempx.innerHTML = response.temp;
      wind_degrees.innerHTML = response.wind_degrees;
      wind_speed.innerHTML = response.wind_speed;
      wind_speedx.innerHTML = response.wind_speed;

      console.log(response);
    })
    .catch((err) => console.error(err));
};

submit.addEventListener("click", (e) => {
  e.preventDefault();
  getWeather(city.value);
});
getWeather("Delhi");

// NYC
fetch(
  "https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=New%20York",
  options
)
  .then((response) => response.json())
  .then((response) => {
    tempNYC.innerHTML = response.temp;
    feels_likeNYC.innerHTML = response.feels_like;
    humidityNYC.innerHTML = response.humidity;
    max_tempNYC.innerHTML = response.max_temp;
    min_tempNYC.innerHTML = response.min_temp;
    sunriseNYC.innerHTML = response.sunrise;
    sunsetNYC.innerHTML = response.sunset;
    console.log(response);
  })
  .catch((err) => console.error(err));

//Boston
fetch(
  "https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=Boston",
  options
)
  .then((response) => response.json())
  .then((response) => {
    feels_likeB.innerHTML = response.feels_like;
    humidityB.innerHTML = response.humidity;
    max_tempB.innerHTML = response.max_temp;
    min_tempB.innerHTML = response.min_temp;
    sunriseB.innerHTML = response.sunrise;
    sunsetB.innerHTML = response.sunset;
    tempB.innerHTML = response.temp;
    console.log(response);
  })
  .catch((err) => console.error(err));

//lucknow
fetch(
  "https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=Lucknow",
  options
)
  .then((response) => response.json())
  .then((response) => {
    feels_likeLK.innerHTML = response.feels_like;
    humidityLK.innerHTML = response.humidity;
    max_tempLK.innerHTML = response.max_temp;
    min_tempLK.innerHTML = response.min_temp;
    sunriseLK.innerHTML = response.sunrise;
    sunsetLK.innerHTML = response.sunset;
    tempLK.innerHTML = response.temp;
    console.log(response);
  })
  .catch((err) => console.error(err));
//Delhi
fetch(
  "https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=Delhi",
  options
)
  .then((response) => response.json())
  .then((response) => {
    feels_likeDEL.innerHTML = response.feels_like;
    humidityDEL.innerHTML = response.humidity;
    max_tempDEL.innerHTML = response.max_temp;
    min_tempDEL.innerHTML = response.min_temp;
    sunriseDEL.innerHTML = response.sunrise;
    sunsetDEL.innerHTML = response.sunset;
    tempDEL.innerHTML = response.temp;
    console.log(response);
  })
  .catch((err) => console.error(err));
