# 🏐 Sistema de Gestión Deportiva - Club ISE

Sistema de información web desarrollado en Laravel para la gestión administrativa, financiera y operativa de un club de voleibol femenino ubicado en Cúcuta, Colombia.

Este proyecto tiene como objetivo centralizar y optimizar los procesos del club, reemplazando métodos manuales y herramientas dispersas por una plataforma robusta, segura y escalable.

---

## 📌 Contexto

El Club de Voleibol Corporación ISE fue fundado en 2022 con el propósito de formar jóvenes deportistas bajo altos estándares deportivos y humanos. 

Actualmente, el club maneja múltiples procesos como:

- Control de asistencia
- Gestión de mensualidades
- Venta de uniformes
- Administración de sedes y grupos
- Seguimiento financiero

Estos procesos se realizaban de forma manual o en herramientas no integradas, generando:

- ❌ Inconsistencias en la información
- ❌ Dificultad para el seguimiento de pagos
- ❌ Riesgo de pérdida de datos
- ❌ Baja eficiencia operativa

Este sistema busca solucionar dichas problemáticas mediante la digitalización y automatización de la gestión del club.

---

## 🚀 Funcionalidades

### 🔐 Gestión de usuarios
- Autenticación mediante correo y contraseña
- Roles del sistema:
  - `super_admin`
  - `entrenador`
  - `secretaria`
- Control de acceso basado en roles

### 🏐 Gestión de deportistas
- Registro y administración de jugadoras
- Asociación a grupos
- Información personal centralizada

### 📚 Gestión de grupos
- Creación y administración de grupos
- Asociación a sedes
- Preparado para asignación de entrenadores

### 📍 Gestión de sedes
- Registro de sedes del club
- Relación directa con grupos

### 📅 Control de asistencia *(en desarrollo)*
- Registro por fecha y grupo
- Seguimiento individual de deportistas

### 💰 Gestión de pagos *(en desarrollo)*
- Control de mensualidades
- Registro de pagos por deportista
- Seguimiento de estado de cuenta

### 🧾 Facturación y paz y salvo *(en desarrollo)*
- Generación de certificados
- Validación de estado financiero del deportista

---

## 🏗️ Arquitectura del sistema

El sistema está construido bajo una arquitectura MVC utilizando Laravel:

- **Modelos (Eloquent ORM):** Gestión de datos y relaciones
- **Controladores:** Lógica de negocio
- **Vistas (Blade):** Interfaz de usuario
- **Middleware:** Control de acceso y roles

---

## 🛠️ Tecnologías utilizadas

- **Backend:** Laravel
- **Frontend:** Blade + TailwindCSS
- **Base de datos:** MySQL
- **Autenticación:** Laravel Auth (session-based)
- **Control de versiones:** Git + GitHub

---

## 🎨 Diseño de interfaz

El sistema implementa una interfaz moderna tipo panel administrativo con:

- Sidebar de navegación
- Componentes reutilizables (inputs, cards, botones)
- Diseño responsivo
- Estética limpia tipo SaaS

---

## 📊 Objetivos del sistema

- Centralizar la información del club
- Mejorar el control de asistencia
- Permitir seguimiento en tiempo real de pagos
- Reducir errores administrativos
- Facilitar la toma de decisiones estratégicas
- Garantizar la sostenibilidad económica del club

---
