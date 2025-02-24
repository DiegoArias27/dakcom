function clo(){
    let recuadro = document.getElementById("publicidad");
    recuadro.style.display="none";
}

function menu() {
  const btnMenu = document.getElementById('btn-menu');
  const body = document.querySelector('.contenedor2'); // Selecciona el contenedor al que pertenece el :before
  
  // Cuando el checkbox se marca o desmarca
  btnMenu.addEventListener('change', function () {
    if (btnMenu.checked) {
      // Si el checkbox está marcado, aplica las clases para mostrar el overlay
      body.classList.add('menu-active');
    } else {
      // Si el checkbox no está marcado, quita las clases
      body.classList.remove('menu-active');
    }
  });
}


function abrirchat(){
    let chatflotante = document.getElementById("chatflotante");
    let chat = document.getElementById("chat");
    let tacha = document.getElementById("tacha");
    

    chatflotante.style.transition = 'opacity 0.5s ease';
  chatflotante.style.opacity = 0;

  tacha.style.display="none";
  
  // Después de la transición, ocultar el chat flotante completamente
  setTimeout(function() {
    chatflotante.style.display = 'none';
  }, 500); // Tiempo igual a la duración de la transición
  
  // Mostrar el chat con transición de opacidad
  chat.style.display = 'block'; // Hacerlo visible
  chat.style.opacity = 0; // Empezar con opacidad 0
  chat.style.transition = 'opacity 0.5s ease';
  
  // Después de un pequeño retraso, animar la opacidad a 1
  setTimeout(function() {
    chat.style.opacity = 1;
  }, 10);

}

function cerrarchat(){
    let chatflotante = document.getElementById("chatflotante");
    let chat = document.getElementById("chat");
    let tacha = document.getElementById("tacha");
    var messagesContent = document.querySelector('.messages-content');

   
    // Ocultar el chat con transición de opacidad
  chat.style.transition = 'opacity 0.5s ease';
  chat.style.opacity = 0;
  
  // Después de la transición, ocultar el chat completamente
  setTimeout(function() {
    chat.style.display = 'none';
    
    // Mostrar el chat flotante con transición de opacidad
    chatflotante.style.display = 'none'; // Hacerlo visible
    chatflotante.style.opacity = 0; // Empezar con opacidad 0
    chatflotante.style.transition = 'opacity 0.5s ease';
    
    // Después de un pequeño retraso, animar la opacidad a 1
    setTimeout(function() {
      chatflotante.style.opacity = 1;
      tacha.style.display="none";
    }, 10); // Retraso mínimo para que funcione la transición
  }, 500);
  

  messagesContent.innerHTML="";

 

}

function minimizar(){
    let chatflotante = document.getElementById("chatflotante");
    let chat = document.getElementById("chat");
    let tacha = document.getElementById("tacha");
  
  // Ocultar el chat con transición de opacidad
  chat.style.transition = 'opacity 0.5s ease';
  chat.style.opacity = 0;

  
  
  // Después de la transición, ocultar el chat completamente
  setTimeout(function() {
    chat.style.display = 'none';
    
    // Mostrar el chat flotante con transición de opacidad
    chatflotante.style.display = 'flex'; // Hacerlo visible
    chatflotante.style.opacity = 0; // Empezar con opacidad 0
    chatflotante.style.transition = 'opacity 0.5s ease';
    
    // Después de un pequeño retraso, animar la opacidad a 1
    setTimeout(function() {
      chatflotante.style.opacity = 1;
      tacha.style.display="flex"
    }, 10); // Retraso mínimo para que funcione la transición
  }, 500);
}

// Seleccionar el contenedor de mensajes
var messagesContent = document.querySelector('.messages-content');

// Esperar a que la ventana cargue
window.addEventListener('load', function() {
  updateScrollbar();
  setTimeout(fakeMessage, 100);
});

// Función para desplazar el área de mensajes hacia abajo
function updateScrollbar() {
  messagesContent.scrollTop = messagesContent.scrollHeight;
}

// Variables para manejar el tiempo
var d, h, m, i = 0;

// Función para añadir la fecha y hora
function setDate() {
  d = new Date();
  if (m != d.getMinutes()) {
    m = d.getMinutes();
    var timestamp = document.createElement('div');
    timestamp.className = 'timestamp';
    timestamp.innerText = d.getHours() + ':' + (m < 10 ? '0' + m : m);
    document.querySelector('.message:last-child').append(timestamp);

    var checkmarkSent = document.createElement('div');
    checkmarkSent.className = 'checkmark-sent-delivered';
    checkmarkSent.innerHTML = '&check;';
    document.querySelector('.message:last-child').append(checkmarkSent);

    var checkmarkRead = document.createElement('div');
    checkmarkRead.className = 'checkmark-read';
    checkmarkRead.innerHTML = '&check;';
    document.querySelector('.message:last-child').append(checkmarkRead);
  }
}

// Función para insertar un mensaje
function insertMessage() {
  var msg = document.querySelector('.message-input').value.trim();
  if (msg === '') return false;

  var message = document.createElement('div');
  message.className = 'message message-personal';
  message.textContent = msg;
  messagesContent.append(message);
  setDate();
  document.querySelector('.message-input').value = '';
  updateScrollbar();

  // Espera de 1 segundo antes de responder automáticamente
  setTimeout(function() {
    generateResponse(msg);
  }, 1000);
}

// Función para generar respuesta según el mensaje del usuario con expresiones regulares
function generateResponse(msg) {
  var response = '';
  var lowerCaseMsg = msg.toLowerCase();

  // Definir respuestas con expresiones regulares y algunas palabras clave
  if (/como te llamas/.test(lowerCaseMsg)) {
    response = 'Me llamo Chatbot 😊 ¿y tú?';
  } else if (/que haces/.test(lowerCaseMsg)) {
    response = 'Estoy conversando contigo, ¿y tú qué haces?';
  } else if (/como estas/.test(lowerCaseMsg)) {
    response = '¡Estoy bien, gracias por preguntar! ¿Y tú?';
  } else if (/cuantos años tienes/.test(lowerCaseMsg)) {
    response = 'Soy un bot, así que no tengo edad, pero estoy en constante aprendizaje. 😄';
  } else if (/quiero saber mas sobre ti/.test(lowerCaseMsg)) {
    response = 'Soy un chatbot que puede ayudarte a resolver preguntas y tareas. ¡Dime, en qué te puedo ayudar! 🤖';
  } else if (/adios|bye/.test(lowerCaseMsg)) {
    response = '¡Adiós! Fue un placer hablar contigo. 😊';
  } else if (/^(hola|buenos dias|buenas tardes|hey)/.test(lowerCaseMsg)) {
    response = '¡Hola! ¿Cómo estás?';
  } else if (/^(quien|que|donde|cuando|por que|como)/.test(lowerCaseMsg)) {
    response = 'Interesante pregunta. ¿Puedes decirme más detalles?';
  } else {
    // Respuesta genérica si no se encuentra un patrón
    response = 'Lo siento, no entendí esa pregunta. 😕 ¿Puedes preguntar algo diferente?';
  }

  // Crear mensaje de respuesta con avatar
  var loadingMessage = document.createElement('div');
  loadingMessage.className = 'message loading new';
  loadingMessage.innerHTML = '<figure class="avatar"><img src="dakcom.png" /></figure><span></span>';
  messagesContent.append(loadingMessage);
  updateScrollbar();

  // Simular el tiempo de espera antes de mostrar la respuesta
  setTimeout(function() {
    loadingMessage.remove();
    var newMessage = document.createElement('div');
    newMessage.className = 'message new';
    newMessage.innerHTML = '<figure class="avatar"><img src="dakcom.png" /></figure>' + response;
    messagesContent.append(newMessage);
    setDate();
    updateScrollbar();
  }, 1000 + (Math.random() * 20) * 100);
}

// Evento para el botón de enviar mensaje
document.querySelector('.message-submit').addEventListener('click', insertMessage);

// Evento para enviar mensaje al presionar Enter
window.addEventListener('keydown', function(e) {
  if (e.key === 'Enter') {
    insertMessage();
    e.preventDefault();
  }
});

// Mensajes falsos de ejemplo
var Fake = [
  'Hola soy el asistente digital',
  '¿En que puedo ayudarte?',
];

// Función para mensajes falsos (similares a los previos)
function fakeMessage() {
  if (document.querySelector('.message-input').value !== '') return false;

  var loadingMessage = document.createElement('div');
  loadingMessage.className = 'message loading new';
  loadingMessage.innerHTML = '<figure class="avatar"><img src="dakcom.png" /></figure><span></span>';
  messagesContent.append(loadingMessage);
  updateScrollbar();

  setTimeout(function() {
    loadingMessage.remove();
    var newMessage = document.createElement('div');
    newMessage.className = 'message new';
    newMessage.innerHTML = '<figure class="avatar"><img src="dakcom.png" /></figure>' + Fake[i];
    messagesContent.append(newMessage);
    setDate();
    updateScrollbar();
    i++;
  }, 600 + (Math.random() * 2) * 800);
}

// Alternar la clase active en los elementos del menú
document.querySelector('.button').addEventListener('click', function() {
  document.querySelectorAll('.menu .items span').forEach(span => span.classList.toggle('active'));
  document.querySelector('.menu .button').classList.toggle('active');
});


function zoom() {
  const zoomImage = document.getElementById("zoomimage");
  const zoomContainer = document.querySelector(".imgProducto");

  let isZoomedIn = zoomImage.style.transform === "scale(2)";

  zoomContainer.addEventListener("click", function() {
      if (!isZoomedIn) {
          zoomImage.style.transform = "scale(2)"; // Aumenta el tamaño de la imagen (ajustable)
          zoomImage.style.cursor = "zoom-out"; // Cambia el cursor a "zoom-out" cuando está en zoom
          isZoomedIn=true;
      } else{
          zoomImage.style.transform = "scale(1)"; // Vuelve al tamaño normal
          zoomImage.style.cursor = "zoom-in"
          isZoomedIn=false;
      }
  });

  zoomContainer.addEventListener("mousemove", function(e) {
      if (isZoomedIn) {
          const containerRect = zoomContainer.getBoundingClientRect();
          const mouseX = e.clientX - containerRect.left; // Coordenada X dentro del contenedor
          const mouseY = e.clientY - containerRect.top; // Coordenada Y dentro del contenedor

          // Calculamos el desplazamiento de la imagen
          const moveX = (mouseX / zoomContainer.offsetWidth) * 100;
          const moveY = (mouseY / zoomContainer.offsetHeight) * 100;

          // Actualizamos la posición de la imagen para que se mueva con el cursor
          zoomImage.style.transformOrigin = `${moveX}% ${moveY}%`;
      }
  });
}