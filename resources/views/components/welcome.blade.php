<div class="rounded-2xl bg-white p-5">
    <div class=" rounded flex my-5 p-5">
       <div class="px-2">
            <h1 class="text-2xl text-center font-bold">Gestion de Proyectos</h1>
            <p class="m-5 text-justify ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       </div>
            <x-logo width='10%'/>
    </div>
    <hr>
    <div class="grid grid-cols-2 my-5" id="menu">
        
        <div class="col-1 p-5 m-auto  border-x-2 hover:rounded hover:bg-gray-100 hover:shadow-sm" > 
            <a href="{{route('proyectos.index')}}" class="flex justify-between">
                <div class="col-1 w-1/2 ">
                    <svg x-data="" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-full hover:fill-amber-100 hover:stroke-blue-400">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                    </svg>
                </div>
                <div>
                    <p class="text-xl text-center">Lista de Proyectos</p>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </a>
        </div>

        <div class="col-1 p-5 m-auto hover:rounded border-r-2 hover:bg-gray-100 hover:shadow-sm "> 
            <a href="{{route('informes.index')}}" class="flex justify-between">
                <div class="col-1 w-1/2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full hover:fill-amber-100 hover:stroke-blue-400">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                    </svg>
                </div>
                <div>
                    <p class="text-xl text-center">Informe de Proyectos</p>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                </div>
            </a>
        </div>        
        <div class="col-1 p-5 m-auto hover:rounded border-x-2 hover:bg-gray-100 hover:shadow-sm "> 
            <a href="{{route('definiciones.index')}}" class="flex justify-between">
                <div class="col-1 w-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full hover:fill-amber-100 hover:stroke-blue-400">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xl text-center">Definiciones</p>
                    <p class="text-justify">Breve resumen de cada campo, para que obtenga una guia a la hora de crear sus <span class="font-semibold">proyectos</span></p>
                </div>
            </a>
        </div>        
        <div class="col-1 p-5 m-auto hover:rounded border-r-2 hover:bg-gray-100 hover:shadow-sm " class="flex justify-between"> 
            <a href="http://www.usuarios.bh/inicio" class="flex justify-between" target="blank">
                
                <div class="col-1 w-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full hover:fill-amber-100 hover:stroke-blue-400">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xl text-center">Perfil de Usuarios</p>
                    <p class="text-justify">Pagina de Usuarios, donde podra gestionar: Nombre, clave de acceso yfoto de su pefil</span></p>
                </div>
            </a>
        </div>
    </div>
</div>


