# 🎨 SGIC 2.0 \- Design System & UI Standards

## 📋 Documento de Referencia para Todas las Vistas

---

## 🎯 1\. IDENTIDAD VISUAL

### **Paleta de Colores Oficial**

/\* Colores Primarios \*/

\--primary: \#059669;        /\* emerald-600 \*/

\--primary-hover: \#047857;  /\* emerald-700 \*/

\--primary-light: \#d1fae5;  /\* emerald-100 \*/

/\* Colores Secundarios \*/

\--secondary: \#4f46e5;      /\* indigo-600 \*/

\--secondary-hover: \#4338ca;/\* indigo-700 \*/

\--secondary-light: \#e0e7ff;/\* indigo-100 \*/

/\* Colores de Acento \*/

\--accent: \#06b6d4;         /\* cyan-500 \*/

\--accent-light: \#cffafe;   /\* cyan-100 \*/

/\* Colores Neutros (Slate) \*/

\--bg-dark: \#0f172a;        /\* slate-900 \- Sidebar/Hero \*/

\--bg-main: \#f8fafc;        /\* slate-50 \- Fondo principal \*/

\--bg-card: \#ffffff;        /\* white \- Cards \*/

\--border: \#e2e8f0;         /\* slate-200 \- Bordes \*/

\--text-primary: \#1e293b;   /\* slate-800 \- Texto principal \*/

\--text-secondary: \#64748b; /\* slate-500 \- Texto secundario \*/

/\* Colores Semánticos \*/

\--success: \#10b981;        /\* emerald-500 \*/

\--warning: \#f59e0b;        /\* amber-500 \*/

\--error: \#ef4444;          /\* red-500 \*/

\--info: \#3b82f6;           /\* blue-500 \*/

### **Tipografía**

font-family: 'Inter', sans-serif;

/\* Escala de Tamaños \*/

\--text-xs: 0.75rem;    /\* 12px \- Labels, badges \*/

\--text-sm: 0.875rem;   /\* 14px \- Body text \*/

\--text-base: 1rem;     /\* 16px \- Default \*/

\--text-lg: 1.125rem;   /\* 18px \- Subtitles \*/

\--text-xl: 1.25rem;    /\* 20px \- Section titles \*/

\--text-2xl: 1.5rem;    /\* 24px \- Page titles \*/

\--text-3xl: 1.875rem;  /\* 30px \- Hero titles \*/

---

## 🏗️ 2\. ESTRUCTURA DE LAYOUT

### **Layout Principal (Vistas Autenticadas)**

┌─────────────────────────────────────────────────────┐

│  SIDEBAR (w-64)          │  MAIN CONTENT (flex-1)  │

│  bg-slate-900            │  bg-slate-50            │

│                          │                         │

│  ┌──────────────────┐   │  ┌─────────────────────┐│

│  │ LOGO \+ Nombre    │   │  │ TOP BAR (h-16)      ││

│  ──────────────────┘   │  │ bg-white shadow-sm  ││

│                          │  └─────────────────────┘│

│  ┌──────────────────┐   │                         │

│  │ User Info        │   │  ┌─────────────────────┐│

│  └──────────────────┘   │  │ CONTENT AREA        ││

│                          │  │ p-6                 ││

│  ──────────────────┐   │  │                     ││

│  │ Navigation       │   │  │  \[Vista específica\] ││

│  │ \- Sección 1      │   │  │                     ││

│  │ \- Sección 2      │   │  └─────────────────────┘│

│  └──────────────────┘   │                         │

│                          │                         │

│  ┌──────────────────┐   │                         │

│  │ System Status    │   │                         │

│  └──────────────────┘   │                         │

└─────────────────────────────────────────────────────┘

### **Layout Landing (Vistas Públicas)**

┌─────────────────────────────────────────────────────┐

│  NAVBAR (h-16)                                      │

│  bg-white border-b                                  │

├─────────────────────────────────────────────────────┤

│  HERO SECTION                                       │

│  bg-slate-900 \+ patrón SVG                          │

│  py-20 lg:py-28                                     │

├─────────────────────────────────────────────────────┤

│  FEATURES GRID                                      │

│  bg-white py-16                                     │

│  grid-cols-1 md:grid-cols-2 lg:grid-cols-3          │

├─────────────────────────────────────────────────────┤

│  CTA FOOTER                                         │

│  bg-slate-900 py-12                                 │

└─────────────────────────────────────────────────────┘

---

## 🎨 3\. COMPONENTES ESTÁNDAR

### **3.1 Cards**

\<\!-- Card Básica \--\>

\<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow"\>

    \<\!-- Contenido \--\>

\</div\>

\<\!-- Card con Borde Lateral de Color \--\>

\<div class="bg-white rounded-xl shadow-sm border border-slate-100 relative overflow-hidden"\>

    \<div class="absolute right-0 top-0 h-full w-1 bg-emerald-500"\>\</div\>

    \<\!-- Contenido \--\>

\</div\>

\<\!-- Card de KPI \--\>

\<div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100"\>

    \<div class="flex justify-between items-start"\>

        \<div\>

            \<p class="text-sm font-medium text-slate-500"\>Título\</p\>

            \<h3 class="text-3xl font-bold text-slate-800 mt-2"\>Valor\</h3\>

            \<p class="text-xs text-emerald-600 mt-1"\>+12% vs mes anterior\</p\>

        \</div\>

        \<div class="p-3 bg-emerald-50 rounded-lg text-emerald-600"\>

            \<i class="fa-solid fa-icon text-xl"\>\</i\>

        \</div\>

    \</div\>

\</div\>

### **3.2 Botones**

\<\!-- Botón Primario \--\>

\<button class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors shadow-sm"\>

    Acción

\</button\>

\<\!-- Botón Secundario \--\>

\<button class="bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 font-medium py-2.5 px-4 rounded-lg transition-colors"\>

    Cancelar

\</button\>

\<\!-- Botón con Icono \--\>

\<button class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors flex items-center gap-2"\>

    \<i class="fa-solid fa-plus"\>\</i\>

    Nuevo

\</button\>

\<\!-- Botón Peligro \--\>

\<button class="bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors"\>

    Eliminar

\</button\>

### **3.3 Inputs**

\<\!-- Input con Icono \--\>

\<div class="relative"\>

    \<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"\>

        \<i class="fa-solid fa-user text-slate-400"\>\</i\>

    \</div\>

    \<input type="text" 

           class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-lg 

                  focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 

                  transition-colors text-slate-900 placeholder-slate-400"

           placeholder="Nombre completo"\>

\</div\>

\<\!-- Input con Error \--\>

\<input type="text" 

       class="block w-full px-3 py-2.5 border border-red-300 rounded-lg 

              focus:ring-2 focus:ring-red-500 focus:border-red-500 

              bg-red-50 text-red-900"\>

\<p class="mt-1.5 text-xs text-red-600 flex items-center gap-1"\>

    \<i class="fa-solid fa-circle-exclamation"\>\</i\>

    Este campo es obligatorio

\</p\>

\<\!-- Select \--\>

\<select class="block w-full px-3 py-2.5 border border-slate-300 rounded-lg 

               focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 

               bg-white text-slate-900"\>

    \<option value=""\>Seleccionar...\</option\>

\</select\>

### **3.4 Badges / Status**

\<\!-- Badge de Estado \--\>

\<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800"\>

    Activo

\</span\>

\<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800"\>

    Por Vencer

\</span\>

\<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"\>

    Suspendido

\</span\>

\<\!-- Badge con Punto de Color \--\>

\<div class="flex items-center gap-2"\>

    \<div class="h-2 w-2 rounded-full bg-emerald-500"\>\</div\>

    \<span class="text-sm text-slate-600"\>Activo\</span\>

\</div\>

### **3.5 Tablas**

\<div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden"\>

    \<div class="p-6 border-b border-slate-100"\>

        \<h3 class="font-bold text-slate-800"\>Título de la Tabla\</h3\>

    \</div\>

    \<div class="overflow-x-auto"\>

        \<table class="min-w-full divide-y divide-slate-200"\>

            \<thead class="bg-slate-50"\>

                \<tr\>

                    \<th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"\>

                        Columna

                    \</th\>

                \</tr\>

            \</thead\>

            \<tbody class="bg-white divide-y divide-slate-100"\>

                \<tr class="hover:bg-slate-50 transition-colors"\>

                    \<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"\>

                        Contenido

                    \</td\>

                \</tr\>

            \</tbody\>

        \</table\>

    \</div\>

\</div\>

### **3.6 Alertas / Notificaciones**

\<\!-- Alerta de Éxito \--\>

\<div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg"\>

    \<div class="flex items-start"\>

        \<i class="fa-solid fa-circle-check text-emerald-500 mt-0.5 mr-3"\>\</i\>

        \<div\>

            \<h3 class="text-sm font-semibold text-emerald-800"\>Éxito\</h3\>

            \<p class="text-sm text-emerald-700 mt-1"\>Operación completada\</p\>

        \</div\>

    \</div\>

\</div\>

\<\!-- Alerta de Error \--\>

\<div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg"\>

    \<div class="flex items-start"\>

        \<i class="fa-solid fa-circle-exclamation text-red-500 mt-0.5 mr-3"\>\</i\>

        \<div\>

            \<h3 class="text-sm font-semibold text-red-800"\>Error\</h3\>

            \<p class="text-sm text-red-700 mt-1"\>Algo salió mal\</p\>

        \</div\>

    \</div\>

\</div\>

---

## 🎭 4\. PATRONES DE DISEÑO

### **4.1 Gradientes**

/\* Gradiente Primario (Emerald/Cyan) \*/

background: linear-gradient(135deg, \#059669 0%, \#06b6d4 100%);

/\* Gradiente Secundario (Indigo/Purple) \*/

background: linear-gradient(135deg, \#4f46e5 0%, \#7c3aed 100%);

/\* Gradiente Oscuro (Hero/Sidebar) \*/

background: linear-gradient(135deg, \#0f172a 0%, \#1e293b 100%);

### **4.2 Sombras**

shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);

shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);

shadow-md: 0 4px 6px \-1px rgba(0, 0, 0, 0.1), 0 2px 4px \-1px rgba(0, 0, 0, 0.06);

shadow-lg: 0 10px 15px \-3px rgba(0, 0, 0, 0.1), 0 4px 6px \-2px rgba(0, 0, 0, 0.05);

### **4.3 Bordes Redondeados**

rounded-lg: 0.5rem;    /\* 8px \- Botones, inputs \*/

rounded-xl: 0.75rem;   /\* 12px \- Cards \*/

rounded-2xl: 1rem;     /\* 16px \- Modales \*/

rounded-full: 9999px;  /\* Badges, avatars \*/

### **4.4 Espaciado**

/\* Padding estándar \*/

p-4: 1rem;    /\* 16px \- Cards pequeñas \*/

p-6: 1.5rem;  /\* 24px \- Cards medianas \*/

p-8: 2rem;    /\* 32px \- Cards grandes \*/

/\* Gap entre elementos \*/

gap-4: 1rem;    /\* 16px \*/

gap-6: 1.5rem;  /\* 24px \*/

gap-8: 2rem;    /\* 32px \*/

---

## 🎬 5\. ANIMACIONES Y TRANSICIONES

### **Transiciones Estándar**

/\* Hover en Cards \*/

transition: all 0.2s ease-in-out;

hover:shadow-md;

/\* Hover en Botones \*/

transition: background-color 0.2s ease;

hover:bg-emerald-700;

/\* Hover en Filas de Tabla \*/

transition: background-color 0.15s ease;

hover:bg-slate-50;

### **Animaciones Decorativas**

/\* Blob Animation (Hero sections) \*/

@keyframes blob {

    0%, 100% { transform: translate(0, 0\) scale(1); }

    33% { transform: translate(30px, \-50px) scale(1.1); }

    66% { transform: translate(-20px, 20px) scale(0.9); }

}

.animate-blob {

    animation: blob 7s infinite;

}

.animation-delay-2000 {

    animation-delay: 2s;

}

.animation-delay-4000 {

    animation-delay: 4s;

}

/\* Pulse Animation (Status indicators) \*/

@keyframes pulse {

    0%, 100% { opacity: 1; }

    50% { opacity: 0.5; }

}

.animate-pulse {

    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1\) infinite;

}

---

## 6\. RESPONSIVE BREAKPOINTS

/\* Mobile First \*/

sm: 640px;   /\* Tablets pequeñas \*/

md: 768px;   /\* Tablets \*/

lg: 1024px;  /\* Laptops \*/

xl: 1280px;  /\* Desktops \*/

2xl: 1536px; /\* Pantallas grandes \*/

### **Ejemplos de Uso**

\<\!-- Grid responsive \--\>

\<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"\>

    \<\!-- Cards \--\>

\</div\>

\<\!-- Sidebar responsive \--\>

\<aside class="fixed md:relative md:translate-x-0"\>

    \<\!-- Contenido \--\>

\</aside\>

\<\!-- Texto responsive \--\>

\<h1 class="text-2xl md:text-3xl lg:text-4xl font-bold"\>

    Título

\</h1\>

---

## 🎯 7\. COMPONENTES ESPECÍFICOS POR MÓDULO

### **7.1 Dashboard Cards**

\<div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 relative overflow-hidden"\>

    \<div class="absolute right-0 top-0 h-full w-1 bg-emerald-500"\>\</div\>

    \<div class="flex justify-between items-start"\>

        \<div\>

            \<p class="text-sm font-medium text-slate-500"\>Título del KPI\</p\>

            \<h3 class="text-3xl font-bold text-slate-800 mt-2"\>123\</h3\>

            \<p class="text-xs text-emerald-600 mt-1 font-medium flex items-center"\>

                \<i class="fa-solid fa-arrow-up mr-1"\>\</i\> \+12% vs mes anterior

            \</p\>

        \</div\>

        \<div class="p-3 bg-emerald-50 rounded-lg text-emerald-600"\>

            \<i class="fa-solid fa-icon text-xl"\>\</i\>

        \</div\>

    \</div\>

    \<div class="mt-4 pt-3 border-t border-slate-100 flex justify-between text-xs text-slate-500"\>

        \<span\>Meta: 150\</span\>

        \<span class="font-semibold text-emerald-600"\>82%\</span\>

    \</div\>

\</div\>

### **7.2 Wizard Steps (Crear Tenant)**

\<\!-- Progress Bar \--\>

\<div class="flex items-center justify-between mb-8"\>

    @foreach($steps as $index \=\> $step)

        \<div class="flex items-center flex-1"\>

            \<div class="flex flex-col items-center"\>

                \<div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm

                    @if($currentStep \> $index) bg-emerald-500 text-white

                    @elseif($currentStep \=== $index) bg-indigo-600 text-white

                    @else bg-slate-200 text-slate-500 @endif"\>

                    @if($currentStep \> $index)

                        \<i class="fa-solid fa-check"\>\</i\>

                    @else

                        {{ $index \+ 1 }}

                    @endif

                \</div\>

                \<span class="text-xs mt-2 font-medium {{ $currentStep \>= $index ? 'text-indigo-600' : 'text-slate-400' }}"\>

                    {{ $step }}

                \</span\>

            \</div\>

            @if(\!$loop-\>last)

                \<div class="flex-1 h-1 mx-3 rounded-full {{ $currentStep \> $index ? 'bg-emerald-500' : 'bg-slate-200' }}"\>\</div\>

            @endif

        \</div\>

    @endforeach

\</div\>

### **7.3 Status Badge con Color Dinámico**

@php

    $statusColors \= \[

        'active' \=\> 'bg-emerald-100 text-emerald-800',

        'expiring' \=\> 'bg-amber-100 text-amber-800',

        'expired' \=\> 'bg-red-100 text-red-800',

        'suspended' \=\> 'bg-slate-100 text-slate-800',

    \];

@endphp

\<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors\[$status\] }}"\>

    {{ $statusLabel }}

\</span\>

---

## 8\. ICONOS (Font Awesome 6\)

### **Iconos por Categoría**

\<\!-- Navegación \--\>

\<i class="fa-solid fa-house"\>\</i\>           \<\!-- Home \--\>

\<i class="fa-solid fa-chart-line"\>\</i\>      \<\!-- Dashboard \--\>

\<i class="fa-solid fa-building"\>\</i\>        \<\!-- Tenants \--\>

\<i class="fa-solid fa-users"\>\</i\>           \<\!-- Usuarios \--\>

\<i class="fa-solid fa-gear"\>\</i\>            \<\!-- Configuración \--\>

\<\!-- Acciones \--\>

\<i class="fa-solid fa-plus"\>\</i\>            \<\!-- Crear \--\>

\<i class="fa-solid fa-pen-to-square"\>\</i\>   \<\!-- Editar \--\>

\<i class="fa-solid fa-trash"\>\</i\>           \<\!-- Eliminar \--\>

\<i class="fa-solid fa-eye"\>\</i\>             \<\!-- Ver \--\>

\<i class="fa-solid fa-download"\>\</i\>        \<\!-- Descargar \--\>

\<\!-- Estados \--\>

\<i class="fa-solid fa-circle-check"\>\</i\>    \<\!-- Éxito \--\>

\<i class="fa-solid fa-circle-exclamation"\>\</i\> \<\!-- Error \--\>

\<i class="fa-solid fa-triangle-exclamation"\>\</i\> \<\!-- Advertencia \--\>

\<i class="fa-solid fa-circle-info"\>\</i\>     \<\!-- Info \--\>

\<\!-- Negocio \--\>

\<i class="fa-solid fa-church"\>\</i\>          \<\!-- Cementerio \--\>

\<i class="fa-solid fa-layer-group"\>\</i\>     \<\!-- Criptas \--\>

\<i class="fa-solid fa-file-invoice-dollar"\>\</i\> \<\!-- Finanzas \--\>

\<i class="fa-solid fa-handshake"\>\</i\>       \<\!-- Contratos \--\>

---

## 📐 9\. REGLAS DE ORO DEL DISEÑO

### **✅ SIEMPRE**

1. **Usar la paleta oficial** (emerald, indigo, slate)  
2. **Mantener consistencia** en espaciado (múltiplos de 4px)  
3. **Incluir iconos** en botones y acciones principales  
4. **Agregar hover states** en elementos interactivos  
5. **Validar visualmente** errores en formularios  
6. **Usar sombras sutiles** (shadow-sm, shadow-md)  
7. **Redondear esquinas** (rounded-lg, rounded-xl)  
8. **Responsive first** (mobile → desktop)

### **❌ NUNCA**

1. **Usar colores fuera de la paleta** (no rosas, naranjas, etc.)  
2. **Mezclar estilos** (no combinar Bootstrap con Tailwind)  
3. **Ignorar estados** (hover, focus, active, disabled)  
4. **Usar texto plano** sin jerarquía visual  
5. **Crear componentes inconsistentes** con los existentes  
6. **Olvidar la accesibilidad** (contraste, labels, ARIA)

---

## 🎯 10\. CHECKLIST PARA NUEVAS VISTAS

Antes de crear una nueva vista, verifica:

- [ ] ¿Usa el layout estándar (sidebar \+ main)?  
- [ ] ¿Los colores son de la paleta oficial?  
- [ ] ¿Los botones tienen hover states?  
- [ ] ¿Los inputs tienen iconos y validación visual?  
- [ ] ¿Las cards tienen shadow-sm y rounded-xl?  
- [ ] ¿Es responsive (mobile-first)?  
- [ ] ¿Los iconos son de Font Awesome 6?  
- [ ] ¿La tipografía es Inter?  
- [ ] ¿Hay transiciones suaves en interacciones?  
- [ ] ¿Los estados (success, error, warning) usan colores semánticos?

---

## 📚 11\. EJEMPLOS DE VISTAS EXISTENTES

### **Referencia Rápida**

| Vista | Archivo | Características Clave |
| :---- | :---- | :---- |
| **Welcome** | `welcome.blade.php` | Hero oscuro, features grid, CTA |
| **Login** | `auth/login.blade.php` | Split layout, validación en tiempo real |
| **Dashboard SuperAdmin** | `dashboard-superadmin.blade.php` | KPIs, charts, sidebar oscuro |
| **Tenants Index** | `super-admin/tenants/index.blade.php` | Tabla, filtros, KPIs |
| **Tenants Create** | `super-admin/tenants/create.blade.php` | Wizard, progress bar, validación |
| **Tenants Show** | `super-admin/tenants/show.blade.php` | Info grid, stats, historial |

---

## 🎨 12\. CÓMO USAR ESTE DOCUMENTO

### **Para Desarrolladores**

1. **Antes de crear una vista**: Revisa este documento  
2. **Al diseñar componentes**: Copia los ejemplos de código  
3. **Al revisar código**: Usa el checklist de la sección 10  
4. **Al reportar bugs**: Verifica si es inconsistencia visual

### **Para Diseñadores**

1. **Paleta de colores**: Sección 1  
2. **Tipografía**: Sección 1  
3. **Componentes**: Sección 3  
4. **Layouts**: Sección 2

---

## 📝 NOTAS FINALES

Este documento es la **fuente única de verdad** para el diseño visual de SGIC 2.0. Todas las vistas nuevas deben seguir estos estándares para mantener la consistencia visual del sistema.

**Última actualización**: 13 de Julio, 2026  
**Versión**: 1.0  
**Mantenido por**: Equipo de Desarrollo SGIC 2.0

---

¿Necesitas que agregue algún componente específico o ajuste algún estándar?  
