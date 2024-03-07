const cerrarSesion = async () => {
  try {
    const respuesta = await fetch('srv/srvLogout.php');
    const json = await respuesta.json();
    // Redirige a la página de inicio después de cerrar sesión
    location.href = 'index.html';
  } catch (error) {
    console.error('Error al cerrar sesión:', error);
  }
};

const nav = document.getElementById('nav');

const navItems = [
  {
    name: 'Inicio',
    url: 'analista.html'
  },
  {
    name: 'Crear preguntas',
    url: 'crearPregunta.html'
  },
  {
    name: 'Preguntas',
    url: 'listaPregunta.html'
  },
  {
    name: 'Crear encuesta',
    url: 'crearEncuesta.html'
  },
  {
    name: 'Encuestas',
    url: 'listaEncuesta.html'
  },
  {
    name: 'Registrar empresa',
    url: 'registrarEmpresa.html'
  },
  {
    name: 'Empresas',
    url: 'listaEmpresas.html'
  },
  {
    name: 'Perfil',
    url: 'perfil.html'
  }
];

nav.innerHTML = `
  <nav class="flex items-center justify-between flex-wrap bg-white p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
      
    </div>
    <ul class="flex">
      ${navItems.map((item) => `
        <li>
          <a href="${item.url}" onclick="${item.onclick ? item.onclick : ''}"
            class="inline-block text-sm px-4 py-2 leading-none border rounded text-black border-white hover:border-transparent hover:text-white hover:bg-purple-700 mt-4 lg:mt-0">${item.name}</a>
        <li>
      `).join('')}
    </ul>
  </nav>
`;
