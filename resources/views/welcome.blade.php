
@extends('layouts.app')

@section('content')
    <!--
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <main class="main" id="main">
        <div class="container">
            <nav class="navbar-vertical navbar-glass navbar navbar-light" style="display: none!important;" >
                <a class="text-decoration-none navbar-brand text-left" href="https://falcon.technext.it/">
                    <div class="d-flex align-items-center py-3"><img class="mr-2" src="{{ asset('falcon/static/media/falcon.920a9ff0.png') }}" alt="Logo" width="40"><span class="text-sans-serif">falcon</span></div>
                </a>
                <div id="sideMenu" class="collapse navbar-collapse" aria-expanded="false">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="true">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" class="svg-inline--fa fa-chart-pie fa-w-17 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512">
                                    <path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path>
                                 </svg>
                              </span>
                                    <span>Home</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="true" style="">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Dashboard" href="/">
                                            <div class="d-flex align-items-center"><span>Dashboard</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" name="Dashboard alt" href="/dashboard-alt" aria-current="page">
                                            <div class="d-flex align-items-center"><span>Dashboard alt</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Feed" href="/feed">
                                            <div class="d-flex align-items-center"><span>Feed</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Landing" href="/landing">
                                            <div class="d-flex align-items-center"><span>Landing</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" class="svg-inline--fa fa-copy fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path>
                                 </svg>
                              </span>
                                    <span>Pages</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Activity" goToPage="./pages/profile-student.html">
                                            <div class="d-flex align-items-center"><span>Perfíl de estudiante</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link goToPage" name="Associations" goToPage="./pages/profile-tutor.html">
                                            <div class="d-flex align-items-center"><span>Perfil de tutor</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                            <div class="d-flex align-items-center"><span>Errors</span></div>
                                        </a>
                                        <div class="collapse" aria-expanded="false">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" name="404" href="/errors/404">
                                                        <div class="d-flex align-items-center"><span>404</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="500" href="/errors/500">
                                                        <div class="d-flex align-items-center"><span>500</span></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open" class="svg-inline--fa fa-envelope-open fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M512 464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V200.724a48 48 0 0 1 18.387-37.776c24.913-19.529 45.501-35.365 164.2-121.511C199.412 29.17 232.797-.347 256 .003c23.198-.354 56.596 29.172 73.413 41.433 118.687 86.137 139.303 101.995 164.2 121.512A48 48 0 0 1 512 200.724V464zm-65.666-196.605c-2.563-3.728-7.7-4.595-11.339-1.907-22.845 16.873-55.462 40.705-105.582 77.079-16.825 12.266-50.21 41.781-73.413 41.43-23.211.344-56.559-29.143-73.413-41.43-50.114-36.37-82.734-60.204-105.582-77.079-3.639-2.688-8.776-1.821-11.339 1.907l-9.072 13.196a7.998 7.998 0 0 0 1.839 10.967c22.887 16.899 55.454 40.69 105.303 76.868 20.274 14.781 56.524 47.813 92.264 47.573 35.724.242 71.961-32.771 92.263-47.573 49.85-36.179 82.418-59.97 105.303-76.868a7.998 7.998 0 0 0 1.839-10.967l-9.071-13.196z"></path>
                                 </svg>
                              </span>
                                    <span>Email</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Inbox" href="/email/inbox">
                                            <div class="d-flex align-items-center"><span>Inbox</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Email detail" href="/email/email-detail">
                                            <div class="d-flex align-items-center"><span>Email detail</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Compose" href="/email/compose">
                                            <div class="d-flex align-items-center"><span>Compose</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" class="svg-inline--fa fa-lock fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path>
                                 </svg>
                              </span>
                                    <span>Authentication</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                            <div class="d-flex align-items-center"><span>Basic</span></div>
                                        </a>
                                        <div class="collapse" aria-expanded="false">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Login" href="/authentication/basic/login">
                                                        <div class="d-flex align-items-center"><span>Login</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Logout" href="/authentication/basic/logout">
                                                        <div class="d-flex align-items-center"><span>Logout</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Register" href="/authentication/basic/register">
                                                        <div class="d-flex align-items-center"><span>Register</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Forgot password" href="/authentication/basic/forget-password">
                                                        <div class="d-flex align-items-center"><span>Forgot password</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Reset password" href="/authentication/basic/password-reset">
                                                        <div class="d-flex align-items-center"><span>Reset password</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Confirm mail" href="/authentication/basic/confirm-mail">
                                                        <div class="d-flex align-items-center"><span>Confirm mail</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Lock screen" href="/authentication/basic/lock-screen">
                                                        <div class="d-flex align-items-center"><span>Lock screen</span></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                            <div class="d-flex align-items-center"><span>Card</span></div>
                                        </a>
                                        <div class="collapse" aria-expanded="false">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Login" href="/authentication/card/login">
                                                        <div class="d-flex align-items-center"><span>Login</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Logout" href="/authentication/card/logout">
                                                        <div class="d-flex align-items-center"><span>Logout</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Register" href="/authentication/card/register">
                                                        <div class="d-flex align-items-center"><span>Register</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Forgot password" href="/authentication/card/forget-password">
                                                        <div class="d-flex align-items-center"><span>Forgot password</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Reset password" href="/authentication/card/password-reset">
                                                        <div class="d-flex align-items-center"><span>Reset password</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Confirm mail" href="/authentication/card/confirm-mail">
                                                        <div class="d-flex align-items-center"><span>Confirm mail</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Lock screen" href="/authentication/card/lock-screen">
                                                        <div class="d-flex align-items-center"><span>Lock screen</span></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                            <div class="d-flex align-items-center"><span>Split</span></div>
                                        </a>
                                        <div class="collapse" aria-expanded="false">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Login" href="/authentication/split/login">
                                                        <div class="d-flex align-items-center"><span>Login</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Logout" href="/authentication/split/logout">
                                                        <div class="d-flex align-items-center"><span>Logout</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Register" href="/authentication/split/register">
                                                        <div class="d-flex align-items-center"><span>Register</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Forgot password" href="/authentication/split/forget-password">
                                                        <div class="d-flex align-items-center"><span>Forgot password</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Reset password" href="/authentication/split/password-reset">
                                                        <div class="d-flex align-items-center"><span>Reset password</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Confirm mail" href="/authentication/split/confirm-mail">
                                                        <div class="d-flex align-items-center"><span>Confirm mail</span></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="Lock screen" href="/authentication/split/lock-screen">
                                                        <div class="d-flex align-items-center"><span>Lock screen</span></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-plus" class="svg-inline--fa fa-cart-plus fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                 </svg>
                              </span>
                                    <span>E commerce</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Product list" href="/e-commerce/products/list">
                                            <div class="d-flex align-items-center"><span>Product list</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Product grid" href="/e-commerce/products/grid">
                                            <div class="d-flex align-items-center"><span>Product grid</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Product details" href="/e-commerce/product-details">
                                            <div class="d-flex align-items-center"><span>Product details</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Orders" href="/e-commerce/orders">
                                            <div class="d-flex align-items-center"><span>Orders</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Order details" href="/e-commerce/order-details">
                                            <div class="d-flex align-items-center"><span>Order details</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Customers" href="/e-commerce/customers">
                                            <div class="d-flex align-items-center"><span>Customers</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Shopping cart" href="/e-commerce/shopping-cart">
                                            <div class="d-flex align-items-center"><span>Shopping cart</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Checkout" href="/e-commerce/checkout">
                                            <div class="d-flex align-items-center"><span>Checkout</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Favourite items" href="/e-commerce/favourite-items">
                                            <div class="d-flex align-items-center"><span>Favourite items</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="puzzle-piece" class="svg-inline--fa fa-puzzle-piece fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor" d="M519.442 288.651c-41.519 0-59.5 31.593-82.058 31.593C377.409 320.244 432 144 432 144s-196.288 80-196.288-3.297c0-35.827 36.288-46.25 36.288-85.985C272 19.216 243.885 0 210.539 0c-34.654 0-66.366 18.891-66.366 56.346 0 41.364 31.711 59.277 31.711 81.75C175.885 207.719 0 166.758 0 166.758v333.237s178.635 41.047 178.635-28.662c0-22.473-40-40.107-40-81.471 0-37.456 29.25-56.346 63.577-56.346 33.673 0 61.788 19.216 61.788 54.717 0 39.735-36.288 50.158-36.288 85.985 0 60.803 129.675 25.73 181.23 25.73 0 0-34.725-120.101 25.827-120.101 35.962 0 46.423 36.152 86.308 36.152C556.712 416 576 387.99 576 354.443c0-34.199-18.962-65.792-56.558-65.792z"></path>
                                 </svg>
                              </span>
                                    <span>Components</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Alerts" href="/components/alerts">
                                            <div class="d-flex align-items-center"><span>Alerts</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Accordions" href="/components/accordions">
                                            <div class="d-flex align-items-center"><span>Accordions</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Avatar" href="/components/avatar">
                                            <div class="d-flex align-items-center"><span>Avatar</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Badges" href="/components/badges">
                                            <div class="d-flex align-items-center"><span>Badges</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Backgrounds" href="/components/backgrounds">
                                            <div class="d-flex align-items-center"><span>Backgrounds</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Breadcrumb" href="/components/breadcrumb">
                                            <div class="d-flex align-items-center"><span>Breadcrumb</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Buttons" href="/components/buttons">
                                            <div class="d-flex align-items-center"><span>Buttons</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Cards" href="/components/cards">
                                            <div class="d-flex align-items-center"><span>Cards</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Collapses" href="/components/collapses">
                                            <div class="d-flex align-items-center"><span>Collapses</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Dropdowns" href="/components/dropdowns">
                                            <div class="d-flex align-items-center"><span>Dropdowns</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Forms" href="/components/forms">
                                            <div class="d-flex align-items-center"><span>Forms</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="List groups" href="/components/listgroups">
                                            <div class="d-flex align-items-center"><span>List groups</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Modals" href="/components/modals">
                                            <div class="d-flex align-items-center"><span>Modals</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Navs" href="/components/navs">
                                            <div class="d-flex align-items-center"><span>Navs</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Navbars" href="/components/navbars">
                                            <div class="d-flex align-items-center"><span>Navbars</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Page headers" href="/components/pageheaders">
                                            <div class="d-flex align-items-center"><span>Page headers</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Paginations" href="/components/paginations">
                                            <div class="d-flex align-items-center"><span>Paginations</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Popovers" href="/components/popovers">
                                            <div class="d-flex align-items-center"><span>Popovers</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Progress" href="/components/progress">
                                            <div class="d-flex align-items-center"><span>Progress</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Tables" href="/components/tables">
                                            <div class="d-flex align-items-center"><span>Tables</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Tooltips" href="/components/tooltips">
                                            <div class="d-flex align-items-center"><span>Tooltips</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="hotjar" class="svg-inline--fa fa-hotjar fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M414.9 161.5C340.2 29 121.1 0 121.1 0S222.2 110.4 93 197.7C11.3 252.8-21 324.4 14 402.6c26.8 59.9 83.5 84.3 144.6 93.4-29.2-55.1-6.6-122.4-4.1-129.6 57.1 86.4 165 0 110.8-93.9 71 15.4 81.6 138.6 27.1 215.5 80.5-25.3 134.1-88.9 148.8-145.6 15.5-59.3 3.7-127.9-26.3-180.9z"></path>
                                 </svg>
                              </span>
                                    <span>Utilities</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Borders" href="/utilities/borders">
                                            <div class="d-flex align-items-center"><span>Borders</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Clearfix" href="/utilities/clearfix">
                                            <div class="d-flex align-items-center"><span>Clearfix</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Close icon" href="/utilities/closeIcon">
                                            <div class="d-flex align-items-center"><span>Close icon</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Colors" href="/utilities/colors">
                                            <div class="d-flex align-items-center"><span>Colors</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Display" href="/utilities/display">
                                            <div class="d-flex align-items-center"><span>Display</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Embed" href="/utilities/embed">
                                            <div class="d-flex align-items-center"><span>Embed</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Figures" href="/utilities/figures">
                                            <div class="d-flex align-items-center"><span>Figures</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Flex" href="/utilities/flex">
                                            <div class="d-flex align-items-center"><span>Flex</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Grid" href="/utilities/grid">
                                            <div class="d-flex align-items-center"><span>Grid</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Sizing" href="/utilities/sizing">
                                            <div class="d-flex align-items-center"><span>Sizing</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Spacing" href="/utilities/spacing">
                                            <div class="d-flex align-items-center"><span>Spacing</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Stretched link" href="/utilities/stretchedLink">
                                            <div class="d-flex align-items-center"><span>Stretched link</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Typography" href="/utilities/typography">
                                            <div class="d-flex align-items-center"><span>Typography</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Vertical align" href="/utilities/verticalAlign">
                                            <div class="d-flex align-items-center"><span>Vertical align</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Visibility" href="/utilities/visibility">
                                            <div class="d-flex align-items-center"><span>Visibility</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" aria-expanded="false" href="">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plug" class="svg-inline--fa fa-plug fa-w-12 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="currentColor" d="M256 144V32c0-17.673 14.327-32 32-32s32 14.327 32 32v112h-64zm112 16H16c-8.837 0-16 7.163-16 16v32c0 8.837 7.163 16 16 16h16v32c0 77.406 54.969 141.971 128 156.796V512h64v-99.204c73.031-14.825 128-79.39 128-156.796v-32h16c8.837 0 16-7.163 16-16v-32c0-8.837-7.163-16-16-16zm-240-16V32c0-17.673-14.327-32-32-32S64 14.327 64 32v112h64z"></path>
                                 </svg>
                              </span>
                                    <span>Plugins</span>
                                </div>
                            </a>
                            <div class="collapse" aria-expanded="false">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" name="Bulk select" href="/plugins/bulk-select">
                                            <div class="d-flex align-items-center"><span>Bulk select</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Chart" href="/plugins/chart">
                                            <div class="d-flex align-items-center"><span>Chart</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Countup" href="/plugins/countup">
                                            <div class="d-flex align-items-center"><span>Countup</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Datetime" href="/plugins/datetime">
                                            <div class="d-flex align-items-center"><span>Datetime</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Echarts" href="/plugins/echarts">
                                            <div class="d-flex align-items-center"><span>Echarts</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Fontawesome" href="/plugins/fontawesome">
                                            <div class="d-flex align-items-center"><span>Fontawesome</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Google map" href="/plugins/google-map">
                                            <div class="d-flex align-items-center"><span>Google map</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Image lightbox" href="/plugins/image-lightbox">
                                            <div class="d-flex align-items-center"><span>Image lightbox</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Plyr" href="/plugins/plyr">
                                            <div class="d-flex align-items-center"><span>Plyr</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Progressbar" href="/plugins/progressbar">
                                            <div class="d-flex align-items-center"><span>Progressbar</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Select" href="/plugins/select">
                                            <div class="d-flex align-items-center"><span>Select</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Slick Carousel" href="/plugins/slick-carousel">
                                            <div class="d-flex align-items-center"><span>Slick Carousel</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Toastify" href="/plugins/toastify">
                                            <div class="d-flex align-items-center"><span>Toastify</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="Typed" href="/plugins/typed">
                                            <div class="d-flex align-items-center"><span>Typed</span></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" name="WYSIWYG editor" href="/plugins/wysiwyg">
                                            <div class="d-flex align-items-center"><span>WYSIWYG editor</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" name="Documentation" icon="book" href="/documentation">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" class="svg-inline--fa fa-book fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                 </svg>
                              </span>
                                    <span>Documentation</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" name="Changelog" icon="code-branch" badge="[object Object]" href="/changelog">
                                <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="code-branch" class="svg-inline--fa fa-code-branch fa-w-12 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="currentColor" d="M384 144c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 36.4 24.3 67.1 57.5 76.8-.6 16.1-4.2 28.5-11 36.9-15.4 19.2-49.3 22.4-85.2 25.7-28.2 2.6-57.4 5.4-81.3 16.9v-144c32.5-10.2 56-40.5 56-76.3 0-44.2-35.8-80-80-80S0 35.8 0 80c0 35.8 23.5 66.1 56 76.3v199.3C23.5 365.9 0 396.2 0 432c0 44.2 35.8 80 80 80s80-35.8 80-80c0-34-21.2-63.1-51.2-74.6 3.1-5.2 7.8-9.8 14.9-13.4 16.2-8.2 40.4-10.4 66.1-12.8 42.2-3.9 90-8.4 118.2-43.4 14-17.4 21.1-39.8 21.6-67.9 31.6-10.8 54.4-40.7 54.4-75.9zM80 64c8.8 0 16 7.2 16 16s-7.2 16-16 16-16-7.2-16-16 7.2-16 16-16zm0 384c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16zm224-320c8.8 0 16 7.2 16 16s-7.2 16-16 16-16-7.2-16-16 7.2-16 16-16z"></path>
                                 </svg>
                              </span>
                                    <span>Changelog</span><span class="ml-2 badge badge-soft-primary badge-pill">v2.0.0</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="px-3 px-xl-0">
                        <hr class="border-300 my-3">
                        <h6 class="text-uppercase fs--2 font-weight-semi-bold ls text-600">Settings</h6>
                        <div class="bg-light border py-card rounded" style="padding-left: 1.4375rem; padding-right: 1.4375rem;">
                            <div class="custom-checkbox custom-control"><input type="checkbox" id="dark" name="dark" class="custom-control-input"><label class="custom-control-label" for="dark">Dark Mode <span class="badge badge-soft-primary badge-pill">new</span></label></div>
                            <div class="custom-checkbox custom-control"><input type="checkbox" id="rtl" name="rtl" class="custom-control-input"><label class="custom-control-label" for="rtl">RTL Layout</label></div>
                            <div class="custom-checkbox custom-control"><input type="checkbox" id="fluid" name="fluid" class="custom-control-input"><label class="custom-control-label" for="fluid">Fluid Container</label></div>
                        </div>
                    </div>
                    <a href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template-react/" target="_blank" class="my-3 btn btn-primary btn-sm btn-block">Purchase</a>
                </div>
            </nav>
            <div class="content">
                <nav class="mb-3 navbar-glass fs--1 font-weight-semi-bold row navbar-top sticky-kit navbar navbar-expand navbar-light">
                    <button aria-label="Toggle navigation" id="burgerMenu" type="button" class="navbar-toggler">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="text-decoration-none navbar-brand text-left ml-3" id="topLogo" href="https://falcon.technext.it/">
                        <div class="d-flex align-items-center"><img class="mr-2" src="{{ asset('falcon/static/media/falcon.920a9ff0.png') }}" alt="Logo" width="40"><span class="text-sans-serif">falcon</span></div>
                    </a>
                    <div class="collapse navbar-collapse" aria-expanded="false" >
                        <ul class="align-items-center d-none d-lg-block navbar-nav">
                            <li class="nav-item">
                                <div class="mb-3" style="margin-bottom: 0px!important;">
                                    <ul class="nav"><li class="nav-item"><a href="#" class="nav-link">Inicio</a></li><li class="nav-item">
                                            <a href="#" class="nav-link">Equipo</a></li><li class="nav-item"><a href="#" class="nav-link">Contáctenos</a></li>
                                        <li class="nav-item">
                                            <button class="mr-2 ml-4 btn btn-primary btn-sm">Iniciar Sesión</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="mr-2 ml-2 btn btn-secondary btn-sm">Registro gratis</button>
                                        </li>
                                    </ul></div>
                            </li>
                        </ul>
                        <ul class="align-items-center ml-auto navbar-nav">
                            <li class="nav-item">
                                <form class="search-box form-inline">
                                    <input placeholder="Search..." aria-label="Search" type="search" class="rounded-pill search-input form-control">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16 position-absolute text-400 search-box-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                    </svg>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="px-0 notification-indicator notification-indicator-warning notification-indicator-fill nav-link" href="/e-commerce/shopping-cart">
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
                                    <div class="card-notification shadow-none card" style="max-width: 20rem;">
                                        <div class="card-header card-header">
                                            <div class="align-items-center row">
                                                <div class="col">
                                                    <h6 class="mb-0">Notifications</h6>
                                                </div>
                                                <div class="text-right col-auto"><a class="card-link font-weight-normal" href="">Mark all as read</a></div>
                                            </div>
                                        </div>
                                        <ul class="font-weight-normal fs--1 list-group list-group-flush">
                                            <div class="list-group-title">NEW</div>
                                            <li class="list-group-item">
                                                <a class="notification bg-200 notification-flush rounded-0 border-x-0 border-300 border-bottom-0" href="">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-2xl mr-3"><img class="rounded-circle " src="./static/media/1.38f0341f.jpg" alt=""></div>
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
                                            <li class="list-group-item">
                                                <a class="notification notification-flush rounded-0 border-x-0 border-300 border-bottom-0" href="">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-2xl mr-3"><img class="rounded-circle " src="./static/media/weather.4bf9c59e.jpg" alt=""></div>
                                                    </div>
                                                    <div class="notification-body">
                                                        <p class="mb-1">The forecast today shows a low of 20℃ in California. See today's weather.</p>
                                                        <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">🌤️</span>9hr</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="card-footer text-center border-top-0"><a class="card-link d-block" href="/pages/notifications">View all</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown nav-item">
                                <a aria-haspopup="true" href="#" class="pr-0 nav-link" aria-expanded="true">
                                    <div class="avatar avatar-xl "><img class="rounded-circle " src="./static/media/3.cb95ae1b.jpg" alt=""></div>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="false" class="dropdown-menu-card dropdown-menu dropdown-menu-right">
                                    <div class="bg-white rounded-soft py-2">
                                        <a href="#!" tabindex="0" role="menuitem" class="font-weight-bold text-warning dropdown-item">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="crown" class="svg-inline--fa fa-crown fa-w-20 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                <path fill="currentColor" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5.4 5.1.8 7.7.8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"></path>
                                            </svg>
                                            <span>Go Pro</span>
                                        </a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a href="#!" tabindex="0" role="menuitem" class="dropdown-item">Set status</a><a tabindex="0" role="menuitem" class="dropdown-item" href="/pages/profile">Profile &amp; account</a><a href="#!" tabindex="0" role="menuitem" class="dropdown-item">Feedback</a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a tabindex="0" role="menuitem" class="dropdown-item" href="/pages/settings">Settings</a><a tabindex="0" role="menuitem" class="dropdown-item" href="/authentication/basic/logout">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div id="main-panel">
                </div>
                <footer>
                    <div class="justify-content-between text-center fs--1 mt-4 mb-3 no-gutters row">
                        <div class="col-sm-auto">
                            <p class="mb-0 text-600">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none"> 2020 © <a href="https://themewagon.com">Themewagon</a></p>
                        </div>
                        <div class="col-sm-auto">
                            <p class="mb-0 text-600">v2.0.0</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="Toastify">
            <div class="Toastify__toast-container Toastify__toast-container--bottom-left" style="pointer-events: none;"></div>
        </div>
    </main>
@endsection
