/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/02/2026, 23:21
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file app.js
 * @date 10/01/2026
 * @time 11:07
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

import './stimulus_bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';


document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('[data-slot="avatar-image"]').forEach(img => {
        const onLoad = () => {
            img.classList.remove("hidden");
            img.closest('[data-slot="avatar"]')
                ?.querySelector('[data-slot="avatar-fallback"]')
                ?.classList.add("hidden");
        };

        const onError = () => {
            // Aquí decides qué hacer si falla la imagen
            img.classList.add("hidden");
            img.closest('[data-slot="avatar"]')
                ?.querySelector('[data-slot="avatar-fallback"]')
                ?.classList.remove("hidden");
        };

        img.addEventListener("load", onLoad);
        img.addEventListener("error", onError);

        // Si ya estaba cargada antes de añadir el listener
        if (img.complete && img.naturalWidth !== 0) {
            onLoad();
        }

        // Si ya estaba en estado de error antes de añadir el listener
        if (img.complete && img.naturalWidth === 0) {
            onError();
        }
    });


});

/*

<img
    data-slot="avatar-image"
    class="{{ 'hidden rounded-full aspect-square size-full object-cover ' ~ attributes.render('class')|tailwind_merge }}"
    onload="this.classList.remove('hidden'); this.closest('[data-slot=avatar]')?.querySelector('[data-slot=avatar-fallback]')?.classList.add('hidden');"
    {{ attributes.defaults({alt: ''}) }}
/>

*/
