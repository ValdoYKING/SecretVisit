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
      url: 'index.html'
    },
    {
      name: 'Nosotros',
      url: 'nosotros.html'
    },
    {
      name: 'Servicios',
      url: 'servicios.html'
    },
    {
      name: 'Crear cuestionario',
      url: 'creaCuestionario.html'
    },
    {
      name: 'Registrar empresa',
      url: 'registrarEmpresa.html'
    },
    {
      name: 'Perfil',
      url: 'perfil.html'
    },
    {
      name: 'Cerrar Sesión',
      onclick: 'cerrarSesion()'
    }
  ];
  
  nav.innerHTML = `
    <nav class="flex items-center justify-between flex-wrap bg-white p-6">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <p class="font-semibold text-black text-6xl tracking-tight">Secret</p>
        <span class="font-semibold text-purple-500 tracking-tight text-6xl">Visit</span>
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
  