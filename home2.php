<?php
require 'login/functionLogin.php';
$select = new Select();
if (isset($_SESSION['id'])) {
    $user = $select->SelectuserByuser($_SESSION['id']);
} else {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="layout" x-data="{ isCollapsed: false }">
        <!-- Sidebar -->
        <div :class="{'sidebar-expanded': !isCollapsed, 'sidebar-collapsed': isCollapsed}" 
             class="sidebar">
            <div class="sidebar-header">
                <button @click="isCollapsed = !isCollapsed" class="collapse-button">
                    <svg x-show="!isCollapsed" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    <svg x-show="isCollapsed" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
            <div class="sidebar-content">
                <div class="sidebar-profile" x-show="!isCollapsed">
                    <img src="https://via.placeholder.com/100" alt="Imagen de empleado" class="profile-image">
                    <div class="menu-container">
                        <div class="menu-item">
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="menu-button">
                                    <span>Mis Actividades</span>
                                    <svg :class="{'rotate': open}" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </button>
                                <div x-show="open" class="submenu">
                                    <button onclick="location.href='vistas/registrarActividades.php'" class="submenu-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        Registrar Actividades
                                    </button>
                                    <button onclick="location.href='vistas/verActividades.php'" class="submenu-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        Ver Actividades
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="menu-button">
                                    <span>Gestionar empleados</span>
                                    <svg :class="{'rotate': open}" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </button>
                                <div x-show="open" class="submenu">
                                    <button onclick="location.href='vistas/verEmpleado.php'" class="submenu-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                        Ver Empleado
                                    </button>
                                    <button onclick="location.href='vistas/registrarEmpleado.php'" class="submenu-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                        Registrar empleado
                                    </button>                                
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <p class="menu-text">Evaluar actividad</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-footer">
                <a href="Login/Logout.php" class="logout-button">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span x-show="!isCollapsed">Cerrar Sesión</span>
                </a>
            </div>
        </div>
        <!-- Main content -->
        <main class="main-content">
            <h1 class="page-title">Panel de Control</h1>
            <div class="info-grid">
                <div class="info-card">
                    <h2 class="card-title">Información 1</h2>
                    <p>Contenido del recuadro 1</p>
                </div>
                <div class="info-card">
                    <h2 class="card-title">Información 2</h2>
                    <p>Contenido del recuadro 2</p>
                </div>
                <div class="info-card">
                    <h2 class="card-title">Información 3</h2>
                    <p>Contenido del recuadro 3</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>