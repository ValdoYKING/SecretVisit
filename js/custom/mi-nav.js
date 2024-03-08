const nav = document.getElementById('nav');

const isAutorizate = localStorage.getItem('isAutorizate')
let navItems;

console.log(isAutorizate)
if (isAutorizate ) {
  navItems = [
    {
      name: 'Crear cuestionario',
      url: 'creaCuestionario.html'
    },
    {
      name: 'Registrar empresa',
      url: 'registrarEmpresa.html'
    },
  ];
} else {
  navItems = [
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
      name: 'Registro',
      url: 'register.html'
    },
    {
      name: 'Iniciar Sesión',
      url: 'login.html'
    }
  ];
}



nav.innerHTML = `
 <nav class="flex items-center justify-between flex-wrap bg-white p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6" id='title'>
    <img src="https://th.bing.com/th/id/OIG2.KFzQxrvWFD.MC7NEsWT2?w=1024&h=1024&rs=1&pid=ImgDetMain" 
      class="rounded-full w-20 h-20 mr-3" alt="logo">"
    </div>
    <ul class="flex">
    ${navItems.map((item) => `
            <a href="${item.url}"
                class="inline-block text-sm px-4 py-2 leading-none border rounded text-black border-white hover:border-transparent hover:text-white hover:bg-purple-700 mt-4 lg:mt-0">${item.name}</a>
        <li>
    `).join('')}
    </ul>

  </nav>
`;
