/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/03/2026, 22:35
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file pfc_forum.sql
 * @date 07/03/2026
 * @time 22:55
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/03/2026, 18:17
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file pfc_forum.sql
 * @date 07/03/2026
 * @time 18:48
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (30, 122, 4, 15, 5, 6,
        'Foro dedicado a resolver dudas, compartir buenas prácticas y analizar problemas relacionados con la creación, personalización y envío de facturas, presupuestos y documentos generados desde la plataforma.',
        'Facturación y documentos', 'facturacion-y-documentos',
        'https://images.pexels.com/photos/6863250/pexels-photo-6863250.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        1, null, '2013-05-14 02:04:49', '2026-03-07 18:08:15', 1, 10, 0, 8, null, 1, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (10, 39, 1, 5, 2, 2,
        'Subforo centrado en la configuración de series, impuestos, plantillas, numeración y personalización avanzada de facturas.',
        'Configuración de facturas', 'configuracion-de-facturas',
        'https://images.pexels.com/photos/6801682/pexels-photo-6801682.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        2, null, '1998-04-18 15:45:49', '2026-03-07 18:08:14', 2, 3, 1, 64, null, 1, 1);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 35, 1, 3, 1, 2,
        'Espacio dedicado a la generación de PDFs, diseño de plantillas, problemas de visualización, envío automático de documentos por correo.',
        'PDF y envío por email', 'pdf-y-envio-por-email',
        'https://images.pexels.com/photos/8382613/pexels-photo-8382613.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        3, null, '2007-02-18 09:38:03', '2026-03-07 18:08:14', 4, 5, 1, 5, null, 1, 1);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 19, 1, 3, 1, 1,
        'Subforo para gestión de presupuestos, proformas, ofertas y documentos previos a la facturación.',
        'Presupuestos y proformas', 'presupuestos-y-proformas',
        'https://images.pexels.com/photos/6863251/pexels-photo-6863251.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        4, null, '2007-01-19 00:54:27', '2026-03-07 18:08:15', 6, 7, 1, 67, null, 1, 1);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 29, 1, 4, 1, 1,
        'Espacio para consultas sobre notas de crédito, facturas rectificativas y procedimientos de anulación.',
        'Notas crédito y rectificación', 'notas-credito-y-rectificacion',
        'https://images.pexels.com/photos/6863252/pexels-photo-6863252.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        5, null, '2001-02-21 16:55:34', '2026-03-07 18:08:15', 8, 9, 1, 8, null, 1, 1);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (28, 149, 4, 11, 6, 7,
        'Foro dedicado a integraciones con Shopify, WooCommerce, APIs externas, webhooks y flujos de automatización.',
        'Integraciones y automatización', 'integraciones-y-automatizacion',
        'https://images.pexels.com/photos/3861957/pexels-photo-3861957.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        6, null, '1990-07-10 23:51:13', '2026-03-07 18:08:19', 1, 10, 0, 197, null, 6, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (9, 55, 1, 4, 1, 3,
        'Subforo especializado en la integración con Shopify, sincronización de pedidos, clientes y productos.',
        'Integración con Shopify', 'integracion-con-shopify',
        'https://images.pexels.com/photos/6214472/pexels-photo-6214472.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        7, null, '2005-09-29 16:31:55', '2026-03-07 18:08:17', 2, 3, 1, 71, null, 6, 6);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 28, 1, 2, 2, 1, 'Espacio para desarrolladores que trabajan con la API y los webhooks de la plataforma.',
        'API y webhooks', 'api-y-webhooks',
        'https://images.pexels.com/photos/270404/pexels-photo-270404.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        8, null, '2014-05-18 10:36:38', '2026-03-07 18:08:17', 4, 5, 1, 133, null, 6, 6);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 24, 1, 2, 2, 1,
        'Subforo para integraciones con WooCommerce, Magento y otros sistemas de comercio electrónico.',
        'WooCommerce y otros CMS', 'woocommerce-y-otros-cms',
        'https://images.pexels.com/photos/6214473/pexels-photo-6214473.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        9, null, '2002-09-16 18:43:31', '2026-03-07 18:08:18', 6, 7, 1, 13, null, 6, 6);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 42, 1, 3, 1, 2,
        'Espacio para crear y compartir flujos de automatización, tareas programadas y procesos automáticos.',
        'Automatización y flujos', 'automatizacion-y-flujos',
        'https://images.pexels.com/photos/6214474/pexels-photo-6214474.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        10, null, '1971-01-30 08:17:02', '2026-03-07 18:08:19', 8, 9, 1, 197, null, 6, 6);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (25, 99, 3, 12, 6, 4,
        'Foro general para incidencias técnicas, rendimiento, acceso a cuentas, seguridad y funcionamiento de la plataforma.',
        'Soporte técnico y plataforma', 'soporte-tecnico-y-plataforma',
        'https://images.pexels.com/photos/8867267/pexels-photo-8867267.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        11, null, '2002-07-31 13:43:37', '2026-03-07 18:08:23', 1, 8, 0, 203, null, 11, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (10, 34, 1, 6, 2, 1,
        'Subforo para resolver problemas de inicio de sesión, recuperación de contraseña, gestión de usuarios.',
        'Acceso y cuentas', 'acceso-y-cuentas',
        'https://images.pexels.com/photos/15373485/pexels-photo-15373485.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        12, null, '1971-11-19 17:01:03', '2026-03-07 18:08:21', 2, 3, 1, 78, null, 11, 11);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (9, 51, 1, 3, 3, 2,
        'Espacio para reportar errores, caídas, lentitud y problemas de rendimiento de la plataforma.',
        'Rendimiento y errores', 'rendimiento-y-errores',
        'https://images.pexels.com/photos/6424590/pexels-photo-6424590.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        13, null, '1982-08-21 16:37:53', '2026-03-07 18:08:22', 4, 5, 1, 141, null, 11, 11);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 14, 1, 3, 1, 1, 'Subforo para dudas sobre gestión de permisos, roles de usuario y control de acceso.',
        'Permisos y roles', 'permisos-y-roles',
        'https://images.pexels.com/photos/15373486/pexels-photo-15373486.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        14, null, '2011-02-07 11:12:16', '2026-03-07 18:08:23', 6, 7, 1, 203, null, 11, 11);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (24, 116, 3, 13, 3, 5,
        'Foro dedicado a la gestión de servicios contratados, monitorización, renovaciones y optimización.',
        'Servicios y gestión', 'servicios-y-gestion',
        'https://images.pexels.com/photos/5632399/pexels-photo-5632399.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        15, null, '1995-12-25 18:47:09', '2026-03-07 18:08:28', 1, 8, 0, 209, null, 15, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (8, 40, 1, 4, 1, 2,
        'Subforo para configuración de monitorización, alertas de servicios y métricas en tiempo real.',
        'Monitoreo y alertas', 'monitoreo-y-alertas',
        'https://images.pexels.com/photos/5632400/pexels-photo-5632400.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        16, null, '2007-07-16 22:08:44', '2026-03-07 18:08:25', 2, 3, 1, 205, null, 15, 15);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (10, 54, 1, 7, 1, 1, 'Espacio para solicitar cambios de plan, ampliaciones de servicios y downgrades.',
        'Cambios y upgrades', 'cambios-y-upgrades',
        'https://images.pexels.com/photos/5632401/pexels-photo-5632401.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        17, null, '1991-07-25 00:08:18', '2026-03-07 18:08:27', 4, 5, 1, 86, null, 15, 15);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 22, 1, 2, 1, 2, 'Subforo para consultas sobre facturación de servicios, renovaciones automáticas y pagos.',
        'Facturación de servicios', 'facturacion-de-servicios',
        'https://images.pexels.com/photos/5632402/pexels-photo-5632402.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        18, null, '1991-08-16 17:38:27', '2026-03-07 18:08:28', 6, 7, 1, 209, null, 15, 15);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (21, 86, 3, 11, 4, 3,
        'Foro para dudas sobre el panel de control, personalización de widgets, dashboard y configuración.',
        'Panel de control y personalización', 'panel-de-control-y-personalizacion',
        'https://images.pexels.com/photos/265087/pexels-photo-265087.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        19, null, '1978-07-03 16:12:42', '2026-03-07 18:08:32', 1, 8, 0, 214, null, 19, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 14, 1, 3, 1, 1, 'Subforo para consultas sobre widgets, gráficos, métricas y customización de dashboards.',
        'Widgets y dashboards', 'widgets-y-dashboards',
        'https://images.pexels.com/photos/5474051/pexels-photo-5474051.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        20, null, '1970-05-28 03:04:29', '2026-03-07 18:08:29', 2, 3, 1, 28, null, 19, 19);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 27, 1, 4, 1, 1, 'Espacio para mejorar navegación, crear atajos personalizados y optimizar flujo de trabajo.',
        'Accesos rápidos y navegación', 'accesos-rapidos-y-navegacion',
        'https://images.pexels.com/photos/5474055/pexels-photo-5474055.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        21, null, '2002-12-29 04:49:27', '2026-03-07 18:08:30', 4, 5, 1, 212, null, 19, 19);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (8, 45, 1, 4, 2, 1,
        'Subforo para usuarios que quieren customizar profundamente su experiencia en la plataforma.',
        'Personalización avanzada', 'personalizacion-avanzada',
        'https://images.pexels.com/photos/5474056/pexels-photo-5474056.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        22, null, '1978-02-17 01:28:20', '2026-03-07 18:08:32', 6, 7, 1, 214, null, 19, 19);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (23, 99, 3, 12, 4, 4, 'Foro dedicado a temas de seguridad, autenticación, cifrado, RGPD y protección de datos.',
        'Seguridad y privacidad', 'seguridad-y-privacidad',
        'https://images.pexels.com/photos/5380664/pexels-photo-5380664.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        23, null, '2014-11-20 03:52:51', '2026-03-07 18:08:37', 1, 8, 0, 159, null, 23, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 29, 1, 3, 1, 1, 'Subforo para configurar autenticación de dos factores, tokens y recuperación de acceso.',
        'Autenticación y 2FA', 'autenticacion-y-2fa',
        'https://images.pexels.com/photos/5473954/pexels-photo-5473954.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        24, null, '1972-04-28 00:22:36', '2026-03-07 18:08:34', 2, 3, 1, 94, null, 23, 23);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (8, 31, 1, 5, 1, 1,
        'Espacio para consultas sobre regulaciones de privacidad, exportación de datos y cumplimiento normativo.',
        'RGPD y protección de datos', 'rgpd-y-proteccion-de-datos',
        'https://images.pexels.com/photos/5473955/pexels-photo-5473955.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        25, null, '1972-10-17 08:49:22', '2026-03-07 18:08:35', 4, 5, 1, 96, null, 23, 23);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (9, 39, 1, 4, 2, 2, 'Subforo para asuntos relacionados con leyes, regulaciones y certificaciones de seguridad.',
        'Cumplimiento normativo', 'cumplimiento-normativo',
        'https://images.pexels.com/photos/5473956/pexels-photo-5473956.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        26, null, '1983-04-12 04:04:20', '2026-03-07 18:08:37', 6, 7, 1, 159, null, 23, 23);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (15, 81, 2, 6, 4, 3,
        'Foro especializado en integraciones de pasarelas de pago, métodos de pago y procesamiento de transacciones.',
        'Pagos y pasarelas', 'pagos-y-pasarelas',
        'https://images.pexels.com/photos/3943716/pexels-photo-3943716.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        27, null, '1990-05-16 17:58:17', '2026-03-07 18:08:42', 1, 8, 0, 102, null, 27, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (8, 43, 1, 3, 2, 2, 'Subforo para configurar integraciones con Stripe, Redsys, PayPal y otras pasarelas.',
        'Integración de pasarelas', 'integracion-de-pasarelas',
        'https://images.pexels.com/photos/1602726/pexels-photo-1602726.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        28, null, '1972-11-08 01:19:10', '2026-03-07 18:08:40', 2, 3, 1, 161, null, 27, 27);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (0, 0, 0, 0, 0, 0, 'Espacio para reportar errores en pagos, fallos de transacción y discrepancias en registros.',
        'Errores y disputas en pagos', 'errores-y-disputas-en-pagos',
        'https://images.pexels.com/photos/6863253/pexels-photo-6863253.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        29, null, '1978-07-25 06:58:32', '2021-02-05 10:29:27', 4, 5, 1, null, null, 27, 27);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 38, 1, 3, 2, 1,
        'Subforo para consultas sobre métodos de pago alternativos, criptomonedas y soluciones customizadas.',
        'Métodos de pago especiales', 'metodos-de-pago-especiales',
        'https://images.pexels.com/photos/6863254/pexels-photo-6863254.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        30, null, '1987-07-17 06:21:45', '2026-03-07 18:08:42', 6, 7, 1, 102, null, 27, 27);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (19, 85, 3, 10, 3, 3,
        'Foro dedicado a generación de reportes, análisis de datos, exportaciones y auditoría financiera.',
        'Reportes y análisis', 'reportes-y-analisis',
        'https://images.pexels.com/photos/669619/pexels-photo-669619.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        31, null, '1977-12-28 23:14:50', '2026-03-07 18:08:48', 1, 8, 0, 46, null, 31, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 26, 1, 4, 1, 1,
        'Subforo para crear reportes personalizados, exportar datos a diferentes formatos y programar reportes.',
        'Generación de reportes', 'generacion-de-reportes',
        'https://images.pexels.com/photos/590022/pexels-photo-590022.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        32, null, '1997-12-03 13:41:17', '2026-03-07 18:08:44', 2, 3, 1, 43, null, 31, 31);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 30, 1, 3, 1, 1, 'Espacio para análisis de ingresos, márgenes, rentabilidad y métricas clave del negocio.',
        'Análisis financiero', 'analisis-financiero',
        'https://images.pexels.com/photos/5632403/pexels-photo-5632403.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        33, null, '1972-12-22 04:48:11', '2026-03-07 18:08:46', 4, 5, 1, 166, null, 31, 31);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 29, 1, 3, 1, 1, 'Subforo para herramientas BI, dashboards de inteligencia empresarial y analytics avanzado.',
        'Inteligencia empresarial', 'inteligencia-empresarial',
        'https://images.pexels.com/photos/5632404/pexels-photo-5632404.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        34, null, '1970-08-29 12:22:36', '2026-03-07 18:08:48', 6, 7, 1, 46, null, 31, 31);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (21, 105, 3, 10, 4, 4,
        'Foro con tutoriales, guías, webinars, documentación y recursos para aprovechar Lumina al máximo.',
        'Formaciones y recursos', 'formaciones-y-recursos',
        'https://images.pexels.com/photos/256541/pexels-photo-256541.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        35, null, '1985-05-09 15:11:31', '2026-03-07 18:08:55', 1, 8, 0, 112, null, 35, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (8, 44, 1, 3, 2, 2, 'Subforo con tutoriales paso a paso, guías de inicio rápido y mejores prácticas.',
        'Tutoriales y guías', 'tutoriales-y-guias',
        'https://images.pexels.com/photos/4145153/pexels-photo-4145153.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        36, null, '2001-10-23 04:11:08', '2026-03-07 18:08:51', 2, 3, 1, 48, null, 35, 35);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (7, 32, 1, 4, 1, 1,
        'Espacio para compartir casos de uso reales, implementaciones exitosas e historias de éxito.', 'Casos de uso',
        'casos-de-uso',
        'https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        37, null, '1970-03-12 15:51:21', '2026-03-07 18:08:53', 4, 5, 1, 232, null, 35, 35);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (6, 29, 1, 3, 1, 1, 'Subforo para anunciar y discutir webinars, eventos, charlas y conferencias de Lumina.',
        'Webinars y eventos', 'webinars-y-eventos',
        'https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        38, null, '1989-09-21 00:04:52', '2026-03-07 18:08:55', 6, 7, 1, 112, null, 35, 35);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (38, 171, 5, 20, 7, 6,
        'Foro para sugerencias de mejora, feedback, anuncios de novedades y comunicación con la comunidad.',
        'Sugerencias y comunidad', 'sugerencias-y-comunidad',
        'https://images.pexels.com/photos/1595385/pexels-photo-1595385.jpeg?auto=compress&cs=tinysrgb&w=600&h=800&fit=crop',
        39, null, '1997-03-16 22:24:21', '2026-03-07 18:09:09', 1, 10, 0, 243, null, 39, null);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (12, 47, 2, 7, 2, 1, 'Subforo para proponer nuevas funcionalidades, mejoras en interfaz y optimizaciones.',
        'Sugerencias de mejora', 'sugerencias-de-mejora',
        'https://images.pexels.com/photos/5632405/pexels-photo-5632405.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        40, null, '1976-08-10 07:30:42', '2026-03-07 18:09:05', 2, 3, 1, 120, null, 39, 39);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (9, 51, 1, 4, 2, 2,
        'Espacio oficial para comunicar actualizaciones, cambios importantes y nuevas características.',
        'Anuncios y novedades', 'anuncios-y-novedades',
        'https://images.pexels.com/photos/5632406/pexels-photo-5632406.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        41, null, '1999-08-27 10:33:53', '2026-03-07 18:09:07', 4, 5, 1, 60, null, 39, 39);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (12, 58, 1, 7, 2, 2, 'Subforo para conectar con otros usuarios, compartir experiencias y hacer networking.',
        'Comunidad y networking', 'comunidad-y-networking',
        'https://images.pexels.com/photos/5632407/pexels-photo-5632407.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        42, null, '1984-06-27 16:01:03', '2026-03-07 18:09:09', 6, 7, 1, 243, null, 39, 39);
INSERT INTO pfc_forum (total_threads, total_messages, threads_open, threads_in_progress,
                       threads_resolved, threads_closed, description, title, slug, image, id,
                       deleted_at, created_at, updated_at, ltf, rgt, lvl, last_thread_id, seo_id,
                       tree_root, parent_id)
VALUES (5, 15, 1, 2, 1, 1,
        'Espacio para que los usuarios compartan su experiencia, valoren el servicio y aporten sugerencias de mejora continua.',
        'Feedback y valoraciones', 'feedback-y-valoraciones',
        'https://images.pexels.com/photos/3184416/pexels-photo-3184416.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
        43, null, '1997-10-07 00:24:46', '2026-03-07 18:09:04', 8, 9, 1, 180, null, 39, 39);
