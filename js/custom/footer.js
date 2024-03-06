const footer = document.getElementById('footer');

footer.innerHTML = `
  <footer class="bg-white pt-60">
    <div class="mx-auto bg-purple-200 px-6 ">
      <div class="flex flex-col items-center">
        <div class="flex flex-col md:flex-row md:justify-between">
          <div class="flex-1 min-w-full mt-20">
            <a href="#" class="text-xl font-bold text-gray-700 md:text-8xl  uppercase">Secret<span
                class="text-purple-500">Visit</span></a>
            <p class="mt-2 text-sm text-gray-500">Mantén tu producto a la altura de tus clientes</p>
            <p class="mt-2 text-sm text-gray-500">© 2021 SecretVisit. Todos los derechos reservados</p>
          </div>
          <div class="flex-1 mt-20">
            <p class="text-xl font-bold text-gray-700 md:text-2xl">Enlaces</p>
            <ul class="mt-2 text-gray-600">
              <li class="mt-2">Inicio</li>
              <li class="mt-2">Nosotros</li>
              <li class="mt-2">Servicios</li>
              <li class="mt-2">Registro</li>
              <li class="mt-2">Iniciar Sesión</li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="text-xl font-bold text-gray-700 md:text-2xl mt-20 ml-2">Contacto</p>
            <ul class="mt-2 text-gray-600">
              <li class="mt-2">
                <p>
                  <i class="fas fa-envelope"></i>
                  <span class="ml-2">

                    <a href="mailto:
                    secret@email.com">
                  </p>
                </span>
              </li>
              <li class="mt-2">
                <p>
                  <i class="fas fa-phone-alt"></i>
                  Contacto:
                  <span class="ml-2">
                  <br>
                    <a href="tel:1234567890">
                      55 1234 56
                    </a>
                  </span>
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#a855f7" fill-opacity="1"
        d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
    </div>
  </footer>
`;