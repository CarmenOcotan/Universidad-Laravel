const phrase = "WELCOME";
const speed = 100; // Velocidad de la animación (en milisegundos)
const typewriterElement = document.getElementById('typewriter');
let i = 0;

function typeWriter() {
  if (i < phrase.length) {
    typewriterElement.innerHTML += phrase.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}

typeWriter();
