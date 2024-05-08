document.getElementById('toggleCard').addEventListener('click', function() {
    var cardImage = document.getElementById('cardImage');
    var message = document.querySelector('.message');
    var music = document.getElementById('backgroundMusic');
  
    if (message.style.display === 'block') {
      message.style.display = 'none';
      cardImage.src = 'assets/2.jpg';
      this.textContent = 'Abrir Tarjeta';
      music.pause();
    } else {
      message.style.display = 'block';
      cardImage.src = 'assets/1.jpg';
      this.textContent = 'Cerrar Tarjeta';
      music.play();
    }
  });
  