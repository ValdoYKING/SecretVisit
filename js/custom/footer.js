const footer = document.getElementById('footer');

footer.innerHTML = `
  <footer class="bg-white mt-60 ">
    <div class="mx-auto bg-purple-200 px-6 py-2">
      <div class="flex flex-col items-center">
        <div class="flex flex-col md:flex-row md:justify-between">
          <div class="flex-1 min-w-1/2">
            <a href="#" class="text-xl font-bold text-gray-700 md:text-2xl uppercase">Secret<span
                class="text-purple-500">Visit</span></a>
            <p class="mt-2 text-sm text-gray-500">Mantén tu producto a la altura de tus clientes</p>
          </div>
          <div class="flex-1">
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
            <p class="text-xl font-bold text-gray-700 md:text-2xl">Contacto</p>
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
                  <span class="ml-2">
                    <a href="tel:1234567890">
                      1234567890
                    </a>
                  </span>
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
`;