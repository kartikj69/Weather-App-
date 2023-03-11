const apiKey = "5b9366c7aec27c8d7e147ba5123b1c42";

const submitBtn = document.getElementById("submit-btn");
const cityInput = document.getElementById("city-input");
const temperature = document.getElementById("temperature");
const weather = document.getElementById("weather");
const resultContainer = document.getElementById("result-container");

submitBtn.addEventListener("click", () => {
	const city = cityInput.value;

	fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`)
		.then(response => response.json())
		.then(data => {
			resultContainer.style.display = "block";
			temperature.innerText = `Temperature: ${data.main.temp}°C`;
			weather.innerText = `Weather: ${data.weather[0].description}`;
		})
		.catch(error => {
			console.error(error);
			console.log(error)
			alert("Error fetching weather data");
		});
});
