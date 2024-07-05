fetch('http://httpbin.org/ip')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var ip = data.origin;
    var message = "New visitor's IP: " + ip;

    // Отправка логов в Telegram
    var token = '7419899814:AAH1plPVW3g5ZUGAFBXKZLmWYGEA0kU20FI';
    var chatId = '-4226250479';

    var url = "https://api.telegram.org/bot" + token + "/sendMessage?chat_id=" + chatId + "&text=" + encodeURIComponent(message);

    fetch(url)
      .then(function(response) {
        console.log('Message sent to Telegram');
      })
      .catch(function(error) {
        console.error('Error sending message to Telegram:', error);
      });
  })
  .catch(function(error) {
    console.error('Error getting IP address:', error);
  });
