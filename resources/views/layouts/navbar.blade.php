<nav id="navbar" class="mb-3 navbar-glass fs--1 font-weight-semi-bold row navbar-top sticky-kit navbar navbar-expand-sm navbar-light" ng-controller="navbarController">
   <button aria-label="Toggle navigation" id="toggleMenu" type="button" class="navbar-toggler">
	 <span class="navbar-toggler-icon"></span>
   </button>
   <a class="text-decoration-none navbar-brand text-left ml-3" id="topLogo" href="#">
      <div class="d-flex align-items-center">
	  <img class="mr-2" src="{{ asset('images/logo.png') }}" alt="Logo" width="40"><span class="text-sans-serif">Conexiones</span></div>
   </a>
   <div class="collapse navbar-collapse" aria-expanded="false">
      <ul class="align-items-center d-none d-lg-block navbar-nav">
         <li class="nav-item">
            <div class="mb-3" style="margin-bottom: 0px!important;">
               <ul class="nav">
                  <li class="nav-item"><a href="{{ route('home') }}" class="nav-link home">Inicio</a></li>
                  <li class="nav-item"><a href="{{ route('aboutus') }}" class="nav-link aboutus">Qué es conexiones?</a></li>
                  <li class="nav-item"><a href="{{ route('contactus') }}" class="nav-link contactus">Contáctenos</a></li>
				  
				  <!-- Authentication Links -->
				  @guest('afiliadoempresa')
                     <li class="nav-item">
                     <a class="mr-2 ml-4 btn btn-primary btn-sm" href="{{ route('user.login') }}">Iniciar Sesión</a>
                     </li>
                     @if (Route::has('register'))
                        <li class="nav-item">
                        <a class="mr-2 ml-2 btn btn-secondary btn-sm" href="{{ route('register') }}">Registro gratis</a>
                        </li>
                     @endif
				  @endguest
               </ul>
            </div>
         </li>
      </ul>
      <ul class="align-items-center ml-auto navbar-nav">
		 <li class="nav-item">
            <a class="px-0 notification-indicator notification-indicator-warning notification-indicator-fill nav-link" href="/shoppingcard">
            <span class="notification-indicator-number">3</span>
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18 fs-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="transform-origin: 0.5625em 0.5em;">
                  <g transform="translate(288 256)">
                     <g transform="translate(0, 0)  scale(0.5625, 0.5625)  rotate(0 0 0)">
                        <path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z" transform="translate(-288 -256)"></path>
                     </g>
                  </g>
               </svg>
            </a>
         </li>
		 @auth('afiliadoempresa')
         <li class="dropdown nav-item">
            <a aria-haspopup="true" href="#" class="px-0 notification-indicator notification-indicator-primary nav-link" aria-expanded="false">
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" class="svg-inline--fa fa-bell fa-w-14 fs-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="transform-origin: 0.4375em 0.5em;">
                  <g transform="translate(224 256)">
                     <g transform="translate(0, 0)  scale(0.625, 0.625)  rotate(0 0 0)">
                        <path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z" transform="translate(-224 -256)"></path>
                     </g>
                  </g>
               </svg>
            </a>
			
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-card dropdown-menu dropdown-menu-right">
               <div class="modal-backdrop fade show"></div>
			   <div class="modal-menu card-notification shadow-none card py-2" style="max-width: 20rem;">
                  <div class="card-header card-header">
                     <div class="align-items-center row">
                        <div class="col">
                           <h6 class="mb-0">Notificaciones</h6>
                        </div>
                        <div class="text-right col-auto"><a class="card-link font-weight-normal" href="">Marcar como leídos</a></div>
                     </div>
                  </div>
                  <ul class="font-weight-normal fs--1 list-group list-group-flush">
                     <div class="list-group-title">NEW</div>
                     <li class="list-group-item">
                        <a class="notification bg-200 notification-flush rounded-0 border-x-0 border-300 border-bottom-0" href="">
                           <div class="notification-avatar">
                              <div class="avatar avatar-2xl mr-3"><img class="rounded-circle " 
							  src="{{ asset('static/media/1.38f0341f.jpg') }}" alt=""></div>
                           </div>
                           <div class="notification-body">
                              <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                              <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>Just Now</span>
                           </div>
                        </a>
                     </li>
                     <li class="list-group-item">
                        <a class="notification bg-200 notification-flush rounded-0 border-x-0 border-300 border-bottom-0" href="">
                           <div class="notification-avatar">
                              <div class="avatar avatar-2xl mr-3">
                                 <div class="avatar-name rounded-circle "><span>AB</span></div>
                              </div>
                           </div>
                           <div class="notification-body">
                              <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                              <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">❤️</span>9hr</span>
                           </div>
                        </a>
                     </li>
                     <div class="list-group-title">EARLIER</div>
                  </ul>
                  <div class="card-footer text-center border-top-0"><a class="card-link d-block" href="/pages/notifications">Ver todo</a></div>
               </div>
			   
			</div>
         </li>
         <li class="dropdown nav-item">
            <a aria-haspopup="true" href="#" class="pr-0 nav-link" aria-expanded="false">
               <div class="avatar avatar-xl "><img class="rounded-circle " 	
					src="{{ asset('static/media/3.cb95ae1b.jpg') }}" alt=""></div>
            </a>
            <div tabindex="-1" role="menu" aria-hidden="false" class="dropdown-menu-card dropdown-menu dropdown-menu-right">
			   <div class="modal-backdrop fade show"></div>
			   <div class="modal-menu shadow-none card py-2" style="max-width: 20rem;">
                  <a href="#!" tabindex="0" role="menuitem" class="font-weight-bold text-warning dropdown-item">
                     <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="crown" class="svg-inline--fa fa-crown fa-w-20 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="currentColor" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5.4 5.1.8 7.7.8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"></path>
                     </svg>
                     <span>Go Pro</span>
                  </a>
                  <div tabindex="-1" class="dropdown-divider"></div>
				  @if(auth('afiliadoempresa')->user()->hasAnyRole('tutor'))
                  <a href="#!" tabindex="0" role="menuitem" class="dropdown-item" ng-href="{{ route('tutor',auth('afiliadoempresa')->user()->company_name()) }}">Ver estado</a>
                  @endif  
                  @if(auth('afiliadoempresa')->user()->hasAnyRole('tutor'))
                  <a tabindex="0" role="menuitem" class="dropdown-item" ng-href="{{ route('tutorProfile',auth('afiliadoempresa')->user()->company_name()) }}">Perfíl &amp; cuenta</a>
                  @elseif(auth('afiliadoempresa')->user()->hasAnyRole('student'))
                  <a tabindex="0" role="menuitem" class="dropdown-item" ng-href="{{ route('student',auth('afiliadoempresa')->user()->company_name()) }}">Perfíl &amp; cuenta</a>
                  @endif
                  <a href="#!" tabindex="0" role="menuitem" class="dropdown-item">PQRS</a>
                  <div tabindex="-1" class="dropdown-divider"></div>
                  @if(auth('afiliadoempresa')->user()->hasAnyRole('admin'))
                  <a tabindex="0" role="menuitem" class="dropdown-item" ng-href="{{ route('admin',auth('afiliadoempresa')->user()->company_name()) }}">Configuración</a>
			      @endif
				  <a tabindex="0" role="menuitem" class="dropdown-item" href="#" 
					onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
				  <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
					@csrf
				  </form>
               </div>
			   
            </div>
			
         </li>
		 @endauth
		 <li class="nav-item nav-spacer"></li>
		 <li class="nav-item">
            <form class="search-box form-inline ng-pristine ng-valid">
               <input placeholder="Buscar..." aria-label="Search" type="search" class="rounded-pill search-input form-control">
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16 position-absolute text-400 search-box-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
               </svg>
            </form>
         </li>
	  </ul>
   </div>
</nav>
