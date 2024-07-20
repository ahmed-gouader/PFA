function getWeatherByLocation() {
    const apiKey = '3fec382f2683e37ae5780ed141861668'; // Replace 'YOUR_API_KEY' with your actual OpenWeatherMap API key

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            fetchWeatherData(latitude, longitude, apiKey);
        }, error => {
            console.error('Error getting location:', error);
            alert('Error getting location. Please try again.');
        });
    } else {
        alert('Geolocation is not supported by this browser.');
    }
}

function fetchWeatherData(latitude, longitude, apiKey) {
    const currentWeatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`;

    fetch(currentWeatherUrl)
        .then(response => response.json())
        .then(data => {
            displayWeather(data);
        })
        .catch(error => {
            console.error('Error fetching weather data:', error);
            alert('Error fetching weather data. Please try again.');
        });
}

function displayWeather(data) {
const tempDiv = document.getElementById('temp-div');
const weatherInfoDiv = document.getElementById('weather-info');
const weatherEmojiDiv = document.getElementById('weather-emoji');
const locationDiv = document.getElementById('location'); // Nouveau

// Clear previous content
tempDiv.innerHTML = '';
weatherInfoDiv.innerHTML = '';
weatherEmojiDiv.innerHTML = '';
locationDiv.innerHTML = ''; // Nouveau

if (data.cod === 200) { // 200 is the success code
const temperature = Math.round(data.main.temp - 273.15); // Convert to Celsius
const description = data.weather[0].description;
const emoji = getEmoji(description); // Get emoji based on weather description
const location = data.name + ', ' + data.sys.country; // Concatenate location name and country code

// Display the current temperature
tempDiv.textContent = `${temperature}°C`;

// Display weather information
weatherInfoDiv.textContent = `${description}`;

// Display weather emoji with animation
weatherEmojiDiv.textContent = `${emoji}`;
weatherEmojiDiv.style.animation = 'fadeIn 1s ease-out';

// Display location
locationDiv.textContent = location;
} else {
tempDiv.textContent = `Error: ${data.message}`;
}
function updateDateTime() {
const dateTimeElement = document.getElementById('date-time');
const now = new Date();

const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };

const dateString = now.toLocaleDateString('en-US', dateOptions);
const timeString = now.toLocaleTimeString('en-US', timeOptions);

const dateTimeString = `${dateString}, ${timeString}`;
dateTimeElement.textContent = dateTimeString;
}

}


// Function to get emoji based on weather description
function getEmoji(description) {
switch (description.toLowerCase()) {
case 'clear sky':
    return '☀️';
case 'few clouds':
    return '🌤️';
case 'scattered clouds':
    return '⛅';
case 'broken clouds':
    return '☁️';
case 'shower rain':
    return '🌦️';
case 'rain':
    return '🌧️';
case 'thunderstorm':
    return '⛈️';
case 'snow':
    return '❄️';
case 'mist':
    return '🌫️';
case 'overcast clouds':
    return '☁️'; // You can choose an appropriate emoji for overcast clouds
default:
    return '';
}

}
window.onload = function() {
getWeatherByLocation(); // Appel à votre fonction existante pour afficher la météo
updateDateTime(); // Mettre à jour la date et l'heure initiales

// Mettre à jour la date et l'heure chaque seconde
setInterval(updateDateTime, 1000);
};


// Call the function to fetch weather data automatically when the page loads
window.onload = getWeatherByLocation;