/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 24/02/2026, 22:37
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

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import {registerVueControllerComponents} from '@symfony/ux-vue';
import './stimulus_bootstrap.js';
import './styles/app.css';


registerVueControllerComponents();

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
