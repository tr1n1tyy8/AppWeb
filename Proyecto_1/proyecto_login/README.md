# 🌐 Proyecto 1 – Aplicaciones Web  
**Autora:** Sandra Gamella Pérez 
**Curso:** Sistemas Microinformáticos y Redes
**Módulo:** Aplicaciones Web  

---

## 🧩 Descripción del Proyecto
Este proyecto consiste en la creación de una página web funcional que permite **registrar, iniciar y cerrar sesión de usuarios**, gestionando sus datos mediante archivos PHP y un sistema de verificación básico.  
Su objetivo principal es comprender el funcionamiento de la autenticación de usuarios, la gestión de sesiones y las primeras medidas de seguridad en entornos web.

---

## 🗂️ Estructura del Proyecto
- **registro.php** → Permite registrar nuevos usuarios.  
- **procesar_registro.php** → Valida y guarda los datos registrados.  
- **iniciar_sesion.php** → Formulario de inicio de sesión.  
- **procesar_inicio_sesion.php** → Verifica los datos introducidos.  
- **index.php** → Página principal que da la bienvenida al usuario.  
- **cerrar_sesion.php** → Finaliza la sesión y redirige al login.  
- **usuarios.txt** → Archivo de texto que actúa como base de datos temporal.  
- **estilos_formularios.css** → Estilos para las páginas de formularios.  
- **estilos_pagina_principal.css** → Estilos para la página principal.

---

## ⚙️ Tecnologías Utilizadas
- **HTML5** y **CSS3 (Flexbox)** para la estructura y el diseño.  
- **PHP** para la lógica del servidor y manejo de sesiones.  
- **Apache2** como servidor local.  
- **VirtualBox (Kali Linux)** como entorno de práctica.  
- **Visual Studio Code** como editor principal.  
- **Git y GitHub** para control de versiones y publicación del repositorio.

---

## 🔒 Funciones de Seguridad Implementadas
- Uso de `session_start()` para gestionar sesiones activas.  
- Cifrado de contraseñas con `password_hash()` y verificación con `password_verify()`.  
- Redirección automática si el usuario no tiene sesión iniciada.  

> ⚠️ Nota: este proyecto utiliza un archivo `.txt` como base de datos únicamente con fines educativos; para entornos reales se recomienda usar una base de datos segura como **MySQL**.

---

## 🎨 Diseño y Estilo
- Se ha aplicado un diseño **limpio, moderno y profesional** con Flexbox.  
- Fondos con imágenes, bordes redondeados y animaciones suaves en botones.  
- Separación visual entre el área de inicio de sesión y la zona principal del sitio.  

---

## 🚀 Próximas Mejoras
- Sustituir el archivo de texto por una base de datos **MySQL cifrada**.  
- Añadir validación avanzada de formularios (JavaScript).  
