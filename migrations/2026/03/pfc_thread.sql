/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:34
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file pfc_thread.sql
 * @date 08/03/2026
 * @time 22:51
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xochiquetzal Serrano López', 'Contenido detallado del thread 1', 0, 'Thread 1 en subforo 11',
        'Xochiquetzal Serrano López', 0, 0, 0, 0, 1, 'thread-1-en-subforo-11', 'open', 0, 90, 1, null,
        '2024-05-30 00:45:58', '2025-01-11 00:24:05', null, 114, 2, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Filadelfo Tordoya Martínez', 'Contenido detallado del thread 5', 1, 'Thread 5 en subforo 11', null, 1, 0, 0, 1,
        1, 'thread-5-en-subforo-11', 'resolved', 0, 85, 2, null, '2024-05-02 00:28:54', '2026-03-07 18:09:09', 12, 122,
        2, 12, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Jacobo Kindelán López', 'Contenido detallado del thread 9', 8, 'Thread 9 en subforo 11', null, 1, 0, 0, 1, 0,
        'thread-9-en-subforo-11', 'waiting_support', 0, 30, 3, null, '2024-03-08 00:28:37', '2026-03-07 18:08:14', 38,
        100, 2, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Eugenio Flores García', 'Contenido detallado del thread 13', 8, 'Thread 13 en subforo 12', null, 0, 0, 0, 0, 1,
        'thread-13-en-subforo-12', 'waiting_customer', 1, 52, 4, null, '2024-06-01 00:06:25', '2026-03-07 18:08:14', 49,
        95, 3, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Samuela Rodríguez García', 'Contenido detallado del thread 17', 7, 'Thread 17 en subforo 12', null, 0, 0, 0, 0,
        0, 'thread-17-en-subforo-12', 'closed', 0, 5, 5, null, '2024-10-21 00:48:21', '2026-03-07 18:08:14', 74, 109, 3,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marcelina Brenes García', 'Contenido detallado del thread 21', 2, 'Thread 21 en subforo 13', null, 0, 0, 0, 0,
        0, 'thread-21-en-subforo-13', 'waiting_support', 0, 88, 6, null, '2024-05-31 00:50:10', '2026-03-07 18:08:14',
        84, 66, 4, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marcelina Brenes García', 'Contenido detallado del thread 25', 4, 'Thread 25 en subforo 14', null, 1, 1, 1, 9,
        1, 'thread-25-en-subforo-14', 'waiting_customer', 0, 48, 7, null, '2024-09-07 00:41:07', '2026-03-07 18:08:15',
        99, 66, 5, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Waldo Santamaría García', 'Contenido detallado del thread 29', 10, 'Thread 29 en subforo 14', null, 0, 0, 0, 0,
        0, 'thread-29-en-subforo-14', 'waiting_support', 0, 83, 8, null, '2024-05-29 00:13:57', '2026-03-07 18:08:15',
        122, 113, 5, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Kosme Lara Martínez', 'Contenido detallado del thread 33', 1, 'Thread 33 en subforo 21', null, 0, 0, 0, 0, 0,
        'thread-33-en-subforo-21', 'waiting_support', 0, 75, 9, null, '2024-08-29 00:23:46', '2026-03-07 18:08:16', 142,
        101, 7, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Claudio Molina López', 'Contenido detallado del thread 37', 8, 'Thread 37 en subforo 21', null, 1, 0, 0, 1, 1,
        'thread-37-en-subforo-21', 'closed', 0, 62, 10, null, '2024-05-11 00:53:09', '2026-03-07 18:08:16', 174, 93, 7,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teófilo Páez Martínez', 'Contenido detallado del thread 41', 6, 'Thread 41 en subforo 22', null, 0, 0, 0, 0, 0,
        'thread-41-en-subforo-22', 'waiting_customer', 1, 64, 11, null, '2024-06-28 00:10:16', '2026-03-07 18:08:17',
        193, 47, 8, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Raúl Domínguez García', 'Contenido detallado del thread 45', 8, 'Thread 45 en subforo 23', null, 0, 0, 0, 0, 0,
        'thread-45-en-subforo-23', 'resolved', 0, 84, 12, null, '2024-09-03 00:39:09', '2026-03-07 18:09:09', 213, 85,
        9, 206, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Óscar Blanco González', 'Contenido detallado del thread 49', 2, 'Thread 49 en subforo 23', null, 1, 0, 0, 1, 0,
        'thread-49-en-subforo-23', 'closed', 0, 50, 13, null, '2024-04-07 00:42:04', '2026-03-07 18:08:18', 229, 71, 9,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Super Admin', 'Contenido detallado del thread 53', 7, 'Thread 53 en subforo 24', null, 0, 0, 0, 0, 1,
        'thread-53-en-subforo-24', 'waiting_support', 0, 19, 14, null, '2024-06-10 00:41:31', '2026-03-07 18:08:19',
        249, 1, 10, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Andrea Ponte García', 'Contenido detallado del thread 57', 0, 'Thread 57 en subforo 31', 'Andrea Ponte García',
        1, 0, 0, 1, 1, 'thread-57-en-subforo-31', 'open', 0, 88, 15, null, '2024-01-11 00:37:48', '2025-02-04 00:38:28',
        null, 74, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teresa Moreno (Soporte)', 'Contenido detallado del thread 61', 1, 'Thread 61 en subforo 31', null, 1, 0, 0, 1,
        0, 'thread-61-en-subforo-31', 'resolved', 0, 68, 16, null, '2024-11-23 00:44:59', '2026-03-07 18:09:09', 289, 9,
        12, 289, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Francisca Abad García', 'Contenido detallado del thread 65', 1, 'Thread 65 en subforo 31', null, 0, 0, 0, 0, 0,
        'thread-65-en-subforo-31', 'resolved', 0, 58, 17, null, '2024-12-12 00:42:40', '2026-03-07 18:09:09', 301, 59,
        12, 301, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yolanda Sánchez López', 'Contenido detallado del thread 69', 10, 'Thread 69 en subforo 32', null, 1, 0, 0, 1,
        0, 'thread-69-en-subforo-32', 'waiting_customer', 0, 13, 18, null, '2024-04-29 00:56:40', '2026-03-07 18:08:21',
        324, 86, 13, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Lorena Benavente Rodríguez', 'Contenido detallado del thread 73', 7, 'Thread 73 en subforo 32', null, 1, 0, 0,
        1, 0, 'thread-73-en-subforo-32', 'waiting_support', 0, 47, 19, null, '2024-03-07 00:29:04',
        '2026-03-07 18:08:22', 347, 65, 13, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gloria Rodríguez (Admin)', 'Contenido detallado del thread 77', 3, 'Thread 77 en subforo 33', null, 1, 0, 0, 1,
        1, 'thread-77-en-subforo-33', 'waiting_support', 1, 86, 20, null, '2024-03-02 00:41:19', '2026-03-07 18:08:23',
        359, 2, 14, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Jorge Vega Martínez', 'Contenido detallado del thread 81', 0, 'Thread 81 en subforo 41', 'Jorge Vega Martínez',
        0, 0, 0, 0, 1, 'thread-81-en-subforo-41', 'open', 1, 7, 21, null, '2024-10-27 00:38:03', '2025-01-28 00:23:32',
        null, 19, 16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zacarías Valdebenito López', 'Contenido detallado del thread 85', 6, 'Thread 85 en subforo 41', null, 1, 1, 1,
        9, 1, 'thread-85-en-subforo-41', 'resolved', 0, 56, 22, null, '2024-04-15 00:05:19', '2026-03-07 18:09:09', 391,
        53, 16, 391, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Waldo Santamaría García', 'Contenido detallado del thread 89', 0, 'Thread 89 en subforo 42',
        'Waldo Santamaría García', 1, 1, 1, 9, 0, 'thread-89-en-subforo-42', 'open', 0, 37, 23, null,
        '2024-05-11 00:03:03', '2025-01-28 00:24:53', null, 113, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Lamberto Treviño López', 'Contenido detallado del thread 93', 2, 'Thread 93 en subforo 42', null, 0, 0, 0, 0,
        0, 'thread-93-en-subforo-42', 'resolved', 0, 65, 24, null, '2024-03-12 00:19:04', '2026-03-07 18:09:09', 438,
        128, 17, 438, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yolanda Ureña García', 'Contenido detallado del thread 97', 1, 'Thread 97 en subforo 42', null, 0, 0, 0, 0, 1,
        'thread-97-en-subforo-42', 'waiting_customer', 1, 6, 25, null, '2024-11-22 00:55:05', '2026-03-07 18:08:27',
        461, 52, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Aarón Villalba Martínez', 'Contenido detallado del thread 101', 4, 'Thread 101 en subforo 43', null, 0, 0, 0,
        0, 0, 'thread-101-en-subforo-43', 'waiting_customer', 1, 48, 26, null, '2024-06-30 00:33:24',
        '2026-03-07 18:08:27', 475, 54, 18, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Enrique Flores Sánchez', 'Contenido detallado del thread 105', 0, 'Thread 105 en subforo 51',
        'Enrique Flores Sánchez', 1, 1, 1, 9, 1, 'thread-105-en-subforo-51', 'open', 0, 76, 27, null,
        '2024-04-11 00:36:50', '2025-01-03 00:48:57', null, 29, 20, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('José Delgado Rodríguez', 'Contenido detallado del thread 109', 1, 'Thread 109 en subforo 51', null, 0, 0, 0, 0,
        0, 'thread-109-en-subforo-51', 'resolved', 0, 89, 28, null, '2024-01-22 00:03:28', '2026-03-07 18:09:09', 500,
        23, 20, 500, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Roberto Nieto García', 'Contenido detallado del thread 113', 1, 'Thread 113 en subforo 52', null, 0, 0, 0, 0,
        1, 'thread-113-en-subforo-52', 'waiting_support', 0, 52, 29, null, '2024-06-19 00:37:41', '2026-03-07 18:08:29',
        509, 45, 21, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Dalila Ybarra Sánchez', 'Contenido detallado del thread 117', 0, 'Thread 117 en subforo 53',
        'Dalila Ybarra Sánchez', 1, 0, 0, 1, 1, 'thread-117-en-subforo-53', 'open', 0, 68, 30, null,
        '2024-04-24 00:39:30', '2025-02-08 00:33:09', null, 57, 22, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Felipe Solís García', 'Contenido detallado del thread 121', 8, 'Thread 121 en subforo 53', null, 0, 0, 0, 0, 1,
        'thread-121-en-subforo-53', 'resolved', 0, 61, 31, null, '2024-10-11 00:04:28', '2026-03-07 18:09:09', 558, 81,
        22, 558, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Arturo Ochoa Martínez', 'Contenido detallado del thread 125', 0, 'Thread 125 en subforo 61',
        'Arturo Ochoa Martínez', 0, 0, 0, 0, 1, 'thread-125-en-subforo-61', 'open', 0, 86, 32, null,
        '2024-03-10 00:58:53', '2025-01-19 00:22:45', null, 87, 24, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Demócrates Tenorio García', 'Contenido detallado del thread 129', 6, 'Thread 129 en subforo 61', null, 1, 1, 1,
        9, 0, 'thread-129-en-subforo-61', 'resolved', 0, 97, 33, null, '2024-03-16 00:06:32', '2026-03-07 18:09:09',
        594, 120, 24, 594, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Úrsula Quiroga García', 'Contenido detallado del thread 133', 3, 'Thread 133 en subforo 62', null, 1, 1, 1, 9,
        0, 'thread-133-en-subforo-62', 'waiting_customer', 0, 65, 34, null, '2024-04-01 00:03:15',
        '2026-03-07 18:08:34', 609, 48, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Everardo Toledo López', 'Contenido detallado del thread 137', 1, 'Thread 137 en subforo 62', null, 0, 0, 0, 0,
        0, 'thread-137-en-subforo-62', 'waiting_support', 1, 33, 35, null, '2024-12-27 00:29:33', '2026-03-07 18:08:35',
        629, 121, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Sergio Cano López', 'Contenido detallado del thread 141', 1, 'Thread 141 en subforo 63', null, 1, 1, 1, 9, 0,
        'thread-141-en-subforo-63', 'waiting_customer', 0, 19, 36, null, '2024-02-26 00:11:23', '2026-03-07 18:08:36',
        641, 79, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Ofelia Cascante Martínez', 'Contenido detallado del thread 145', 2, 'Thread 145 en subforo 63', null, 0, 0, 0,
        0, 0, 'thread-145-en-subforo-63', 'resolved', 0, 62, 37, null, '2024-05-12 00:19:24', '2026-03-07 18:09:09',
        662, 68, 26, 662, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gumersindo Hernández Sánchez', 'Contenido detallado del thread 149', 8, 'Thread 149 en subforo 71', null, 0, 0,
        0, 0, 0, 'thread-149-en-subforo-71', 'closed', 0, 56, 38, null, '2024-10-29 00:22:43', '2026-03-07 18:08:38',
        679, 97, 28, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Edmundo Méndez López', 'Contenido detallado del thread 153', 7, 'Thread 153 en subforo 71', null, 1, 0, 0, 1,
        1, 'thread-153-en-subforo-71', 'closed', 1, 24, 39, null, '2024-01-16 00:51:40', '2026-03-07 18:08:39', 702, 89,
        28, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Nicolás Jaramillo García', 'Contenido detallado del thread 157', 9, 'Thread 157 en subforo 73', null, 0, 0, 0,
        0, 0, 'thread-157-en-subforo-73', 'resolved', 1, 82, 40, null, '2024-06-13 00:05:21', '2026-03-07 18:09:09',
        723, 41, 30, 715, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Belinda Weissman García', 'Contenido detallado del thread 161', 1, 'Thread 161 en subforo 73', null, 1, 1, 1,
        9, 0, 'thread-161-en-subforo-73', 'closed', 0, 38, 41, null, '2024-07-27 00:44:24', '2026-03-07 18:08:42', 746,
        55, 30, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Wenceslao Sáenz Sánchez', 'Contenido detallado del thread 165', 5, 'Thread 165 en subforo 81', null, 1, 1, 1,
        9, 0, 'thread-165-en-subforo-81', 'waiting_customer', 0, 90, 42, null, '2024-04-26 00:47:54',
        '2026-03-07 18:08:43', 761, 50, 32, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Aarón Villalba Martínez', 'Contenido detallado del thread 169', 4, 'Thread 169 en subforo 81', null, 1, 1, 1,
        9, 0, 'thread-169-en-subforo-81', 'waiting_support', 0, 61, 43, null, '2024-05-04 00:39:55',
        '2026-03-07 18:08:44', 778, 54, 32, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Nemesio Madera Sánchez', 'Contenido detallado del thread 173', 3, 'Thread 173 en subforo 82', null, 0, 0, 0, 0,
        0, 'thread-173-en-subforo-82', 'waiting_support', 0, 5, 44, null, '2024-01-29 00:06:37', '2026-03-07 18:08:45',
        789, 104, 33, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alejandro Pérez García', 'Contenido detallado del thread 177', 8, 'Thread 177 en subforo 83', null, 0, 0, 0, 0,
        1, 'thread-177-en-subforo-83', 'waiting_support', 0, 74, 45, null, '2024-04-03 00:59:22', '2026-03-07 18:08:46',
        816, 11, 34, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yamila Sierra Martínez', 'Contenido detallado del thread 181', 2, 'Thread 181 en subforo 83', null, 1, 0, 0, 1,
        0, 'thread-181-en-subforo-83', 'closed', 0, 28, 46, null, '2024-02-24 00:45:42', '2026-03-07 18:08:48', 837,
        115, 34, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zaira Solano García', 'Contenido detallado del thread 185', 6, 'Thread 185 en subforo 91', null, 1, 0, 0, 1, 0,
        'thread-185-en-subforo-91', 'waiting_support', 1, 8, 47, null, '2024-07-20 00:39:45', '2026-03-07 18:08:49',
        855, 116, 36, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gumersindo Hernández Sánchez', 'Contenido detallado del thread 189', 6, 'Thread 189 en subforo 91', null, 1, 1,
        1, 9, 0, 'thread-189-en-subforo-91', 'closed', 0, 14, 48, null, '2024-08-02 00:36:24', '2026-03-07 18:08:51',
        881, 97, 36, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Filadelfo Tordoya Martínez', 'Contenido detallado del thread 193', 4, 'Thread 193 en subforo 92', null, 0, 0,
        0, 0, 1, 'thread-193-en-subforo-92', 'waiting_support', 0, 65, 49, null, '2024-04-22 00:22:52',
        '2026-03-07 18:08:52', 897, 122, 37, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Javier Hernández (Soporte)', 'Contenido detallado del thread 197', 0, 'Thread 197 en subforo 93',
        'Javier Hernández (Soporte)', 1, 1, 1, 9, 0, 'thread-197-en-subforo-93', 'open', 0, 25, 50, null,
        '2024-11-26 00:45:53', '2025-02-11 00:48:43', null, 6, 38, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Isabel Morales Rodríguez', 'Contenido detallado del thread 201', 8, 'Thread 201 en subforo 93', null, 1, 0, 0,
        1, 0, 'thread-201-en-subforo-93', 'resolved', 0, 27, 51, null, '2024-02-22 00:59:33', '2026-03-07 18:09:09',
        940, 30, 38, 940, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Edmundo Méndez López', 'Contenido detallado del thread 205', 3, 'Thread 205 en subforo 101', null, 0, 0, 0, 0,
        0, 'thread-205-en-subforo-101', 'waiting_customer', 0, 12, 52, null, '2024-03-01 00:43:27',
        '2026-03-07 18:08:56', 949, 89, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zaira Solano García', 'Contenido detallado del thread 209', 2, 'Thread 209 en subforo 101', null, 0, 0, 0, 0,
        0, 'thread-209-en-subforo-101', 'waiting_customer', 0, 81, 53, null, '2024-05-25 00:02:23',
        '2026-03-07 18:08:57', 967, 116, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Andrea Ponte García', 'Contenido detallado del thread 213', 4, 'Thread 213 en subforo 102', null, 0, 0, 0, 0,
        1, 'thread-213-en-subforo-102', 'waiting_customer', 0, 68, 54, null, '2024-01-21 00:14:21',
        '2026-03-07 18:08:58', 982, 74, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marina Fernández López', 'Contenido detallado del thread 217', 3, 'Thread 217 en subforo 102', null, 0, 0, 0,
        0, 0, 'thread-217-en-subforo-102', 'closed', 0, 75, 55, null, '2024-02-29 00:13:14', '2026-03-07 18:09:00',
        1003, 12, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Evangelina Zambrano Rodríguez', 'Contenido detallado del thread 221', 7, 'Thread 221 en subforo 103', null, 0,
        0, 0, 0, 0, 'thread-221-en-subforo-103', 'waiting_support', 0, 50, 56, null, '2024-09-20 00:05:18',
        '2026-03-07 18:09:01', 1016, 58, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Wenceslao Sáenz Sánchez', 'Contenido detallado del thread 225', 3, 'Thread 225 en subforo 103', null, 1, 0, 0,
        1, 0, 'thread-225-en-subforo-103', 'waiting_support', 0, 85, 57, null, '2024-12-08 00:07:32',
        '2026-03-07 18:09:02', 1037, 50, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Raúl Domínguez García', 'Contenido detallado del thread 229', 2, 'Thread 229 en subforo 104', null, 1, 0, 0, 1,
        0, 'thread-229-en-subforo-104', 'waiting_customer', 1, 46, 58, null, '2024-01-26 00:54:47',
        '2026-03-07 18:09:04', 1051, 85, 43, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Valentín Ramírez López', 'Contenido detallado del thread 233', 10, 'Thread 233 en subforo 105', null, 1, 1, 1,
        9, 1, 'thread-233-en-subforo-105', 'waiting_support', 0, 89, 59, null, '2024-02-23 00:03:42',
        '2026-03-07 18:09:05', 1066, 49, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Florencia Gálvez López', 'Contenido detallado del thread 237', 9, 'Thread 237 en subforo 105', null, 0, 0, 0,
        0, 0, 'thread-237-en-subforo-105', 'closed', 0, 71, 60, null, '2024-12-16 00:50:39', '2026-03-07 18:09:07',
        1093, 96, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Tiburcio Roque López', 'Contenido del thread cerrado 241', 0, 'Thread cerrado en subforo 13',
        'Tiburcio Roque López', 0, 0, 0, 0, 0, 'thread-cerrado-en-subforo-13', 'closed', 0, 23, 61, null,
        '2025-01-01 00:25:09', '2025-02-15 00:11:11', null, 110, 4, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rafael Fuentes Rodríguez', 'Contenido detallado del thread 2', 3, 'Thread 2 en subforo 11', null, 1, 1, 1, 9,
        0, 'thread-2-en-subforo-11', 'resolved', 1, 62, 62, null, '2024-03-19 00:54:44', '2026-03-07 18:09:09', 3, 77,
        2, 1, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rosa Molina García', 'Contenido detallado del thread 6', 8, 'Thread 6 en subforo 11', null, 1, 1, 1, 9, 1,
        'thread-6-en-subforo-11', 'closed', 0, 35, 63, null, '2024-03-25 00:52:57', '2026-03-07 18:08:13', 20, 24, 2,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Samuela Rodríguez García', 'Contenido detallado del thread 10', 1, 'Thread 10 en subforo 11', null, 0, 0, 0, 0,
        0, 'thread-10-en-subforo-11', 'waiting_support', 0, 97, 64, null, '2024-12-10 00:29:02', '2026-03-07 18:08:14',
        39, 109, 2, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gonzalo Bustamante Sánchez', 'Contenido detallado del thread 14', 3, 'Thread 14 en subforo 12', null, 1, 0, 0,
        1, 1, 'thread-14-en-subforo-12', 'waiting_support', 1, 47, 65, null, '2024-06-18 00:44:46',
        '2026-03-07 18:08:14', 52, 83, 3, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Valeska Salazar Rodríguez', 'Contenido detallado del thread 18', 0, 'Thread 18 en subforo 13',
        'Valeska Salazar Rodríguez', 1, 1, 1, 9, 1, 'thread-18-en-subforo-13', 'open', 1, 56, 66, null,
        '2024-10-29 00:40:18', '2025-02-09 00:49:47', null, 112, 4, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Dalila Ybarra Sánchez', 'Contenido detallado del thread 22', 9, 'Thread 22 en subforo 13', null, 0, 0, 0, 0, 0,
        'thread-22-en-subforo-13', 'resolved', 0, 24, 67, null, '2024-11-27 00:51:28', '2026-03-07 18:09:09', 93, 57, 4,
        93, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Celina Ximénez López', 'Contenido detallado del thread 26', 8, 'Thread 26 en subforo 14', null, 0, 0, 0, 0, 0,
        'thread-26-en-subforo-14', 'waiting_support', 0, 79, 68, null, '2024-05-23 00:16:19', '2026-03-07 18:08:15',
        107, 56, 5, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Celina Ximénez López', 'Contenido detallado del thread 30', 0, 'Thread 30 en subforo 21',
        'Celina Ximénez López', 0, 0, 0, 0, 1, 'thread-30-en-subforo-21', 'open', 1, 57, 69, null,
        '2024-04-21 00:31:57', '2025-01-18 00:54:12', null, 56, 7, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Francisca Abad García', 'Contenido detallado del thread 34', 7, 'Thread 34 en subforo 21', null, 1, 1, 1, 9, 0,
        'thread-34-en-subforo-21', 'resolved', 0, 58, 70, null, '2024-09-08 00:24:43', '2026-03-07 18:09:09', 149, 59,
        7, 149, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Miguel Díaz (Soporte)', 'Contenido detallado del thread 38', 3, 'Thread 38 en subforo 21', null, 1, 1, 1, 9, 1,
        'thread-38-en-subforo-21', 'closed', 0, 73, 71, null, '2024-08-10 00:30:49', '2026-03-07 18:08:17', 177, 8, 7,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Elena Ruiz Sánchez', 'Contenido detallado del thread 42', 5, 'Thread 42 en subforo 22', null, 1, 0, 0, 1, 1,
        'thread-42-en-subforo-22', 'waiting_support', 0, 79, 72, null, '2024-12-21 00:25:32', '2026-03-07 18:08:17',
        198, 14, 8, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alma Castro García', 'Contenido detallado del thread 46', 5, 'Thread 46 en subforo 23', null, 1, 0, 0, 1, 1,
        'thread-46-en-subforo-23', 'waiting_customer', 1, 37, 73, null, '2024-10-13 00:11:52', '2026-03-07 18:08:18',
        218, 92, 9, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Pascual López Sánchez', 'Contenido detallado del thread 50', 0, 'Thread 50 en subforo 24',
        'Pascual López Sánchez', 1, 1, 1, 9, 1, 'thread-50-en-subforo-24', 'open', 0, 51, 74, null,
        '2024-04-07 00:39:08', '2025-02-07 00:56:16', null, 43, 10, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Hermenegildo Tortolero López', 'Contenido detallado del thread 54', 3, 'Thread 54 en subforo 24', null, 1, 1,
        1, 9, 0, 'thread-54-en-subforo-24', 'resolved', 0, 91, 75, null, '2024-04-26 00:04:41', '2026-03-07 18:09:09',
        252, 124, 10, 252, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Filadelfo Tordoya Martínez', 'Contenido detallado del thread 58', 4, 'Thread 58 en subforo 31', null, 0, 0, 0,
        0, 0, 'thread-58-en-subforo-31', 'waiting_customer', 0, 71, 76, null, '2024-09-16 00:24:35',
        '2026-03-07 18:08:20', 275, 122, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alma Castro García', 'Contenido detallado del thread 62', 6, 'Thread 62 en subforo 31', null, 0, 0, 0, 0, 0,
        'thread-62-en-subforo-31', 'closed', 0, 49, 77, null, '2024-01-12 00:55:33', '2026-03-07 18:08:20', 295, 92, 12,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Romualdo Quiroz Martínez', 'Contenido detallado del thread 66', 4, 'Thread 66 en subforo 31', null, 1, 1, 1, 9,
        0, 'thread-66-en-subforo-31', 'waiting_customer', 0, 17, 78, null, '2024-03-03 00:19:05', '2026-03-07 18:08:21',
        305, 108, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Antonio Medina García', 'Contenido detallado del thread 70', 6, 'Thread 70 en subforo 32', null, 1, 0, 0, 1, 1,
        'thread-70-en-subforo-32', 'waiting_support', 0, 43, 79, null, '2024-04-10 00:18:28', '2026-03-07 18:08:22',
        330, 27, 13, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Leticia Leyva García', 'Contenido detallado del thread 74', 2, 'Thread 74 en subforo 32', null, 0, 0, 0, 0, 0,
        'thread-74-en-subforo-32', 'resolved', 0, 99, 80, null, '2024-03-18 00:10:53', '2026-03-07 18:09:09', 349, 102,
        13, 349, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Filadelfo Tordoya Martínez', 'Contenido detallado del thread 78', 2, 'Thread 78 en subforo 33', null, 1, 0, 0,
        1, 1, 'thread-78-en-subforo-33', 'waiting_customer', 1, 88, 81, null, '2024-07-28 00:59:14',
        '2026-03-07 18:08:23', 361, 122, 14, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xenia Téllez Rodríguez', 'Contenido detallado del thread 82', 1, 'Thread 82 en subforo 41', null, 1, 0, 0, 1,
        1, 'thread-82-en-subforo-41', 'waiting_customer', 1, 13, 82, null, '2024-02-03 00:57:22', '2026-03-07 18:08:23',
        371, 51, 16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Manuel Cabrera López', 'Contenido detallado del thread 86', 1, 'Thread 86 en subforo 41', null, 1, 0, 0, 1, 0,
        'thread-86-en-subforo-41', 'closed', 0, 100, 83, null, '2024-11-12 00:04:25', '2026-03-07 18:08:24', 392, 25,
        16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Elena Ruiz Sánchez', 'Contenido detallado del thread 90', 10, 'Thread 90 en subforo 42', null, 0, 0, 0, 0, 0,
        'thread-90-en-subforo-42', 'waiting_customer', 0, 87, 84, null, '2024-09-28 00:16:24', '2026-03-07 18:08:25',
        420, 14, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Lamberto Treviño López', 'Contenido detallado del thread 94', 9, 'Thread 94 en subforo 42', null, 0, 0, 0, 0,
        0, 'thread-94-en-subforo-42', 'closed', 0, 13, 85, null, '2024-02-04 00:15:01', '2026-03-07 18:08:26', 447, 128,
        17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Valeska Salazar Rodríguez', 'Contenido detallado del thread 98', 3, 'Thread 98 en subforo 42', null, 0, 0, 0,
        0, 1, 'thread-98-en-subforo-42', 'waiting_support', 0, 67, 86, null, '2024-02-03 00:07:53',
        '2026-03-07 18:08:27', 464, 112, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teófilo Páez Martínez', 'Contenido detallado del thread 102', 8, 'Thread 102 en subforo 43', null, 0, 0, 0, 0,
        1, 'thread-102-en-subforo-43', 'waiting_support', 0, 53, 87, null, '2024-01-29 00:22:50', '2026-03-07 18:08:28',
        483, 47, 18, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Everardo Toledo López', 'Contenido detallado del thread 106', 3, 'Thread 106 en subforo 51', null, 1, 0, 0, 1,
        0, 'thread-106-en-subforo-51', 'waiting_support', 0, 47, 88, null, '2024-03-17 00:03:18', '2026-03-07 18:08:28',
        489, 121, 20, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Bruno Herrera Rodríguez', 'Contenido detallado del thread 110', 0, 'Thread 110 en subforo 52',
        'Bruno Herrera Rodríguez', 1, 0, 0, 1, 1, 'thread-110-en-subforo-52', 'open', 0, 61, 89, null,
        '2024-05-14 00:31:44', '2025-01-22 00:54:08', null, 91, 21, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Querubina Márquez Rodríguez', 'Contenido detallado del thread 114', 7, 'Thread 114 en subforo 52', null, 1, 1,
        1, 9, 1, 'thread-114-en-subforo-52', 'resolved', 0, 84, 90, null, '2024-04-12 00:49:45', '2026-03-07 18:09:09',
        516, 44, 21, 516, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Aarón Villalba Martínez', 'Contenido detallado del thread 118', 6, 'Thread 118 en subforo 53', null, 0, 0, 0,
        0, 1, 'thread-118-en-subforo-53', 'resolved', 0, 69, 91, null, '2024-04-02 00:40:00', '2026-03-07 18:09:09',
        533, 54, 22, 528, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Edmundo Méndez López', 'Contenido detallado del thread 122', 10, 'Thread 122 en subforo 53', null, 1, 0, 0, 1,
        1, 'thread-122-en-subforo-53', 'closed', 1, 54, 92, null, '2024-03-27 00:02:16', '2026-03-07 18:08:32', 568, 89,
        22, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Silvia Rubio García', 'Contenido detallado del thread 126', 9, 'Thread 126 en subforo 61', null, 1, 0, 0, 1, 1,
        'thread-126-en-subforo-61', 'waiting_customer', 1, 86, 93, null, '2024-04-16 00:10:35', '2026-03-07 18:08:33',
        581, 78, 24, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alma Castro García', 'Contenido detallado del thread 130', 7, 'Thread 130 en subforo 61', null, 1, 0, 0, 1, 1,
        'thread-130-en-subforo-61', 'closed', 1, 27, 94, null, '2024-01-25 00:34:27', '2026-03-07 18:08:34', 601, 92,
        24, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Evangelina Zambrano Rodríguez', 'Contenido detallado del thread 134', 7, 'Thread 134 en subforo 62', null, 1,
        0, 0, 1, 1, 'thread-134-en-subforo-62', 'waiting_support', 0, 45, 95, null, '2024-12-02 00:19:15',
        '2026-03-07 18:08:34', 616, 58, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Karenina Azofeifa Sánchez', 'Contenido detallado del thread 138', 3, 'Thread 138 en subforo 62', null, 1, 1, 1,
        9, 1, 'thread-138-en-subforo-62', 'waiting_support', 0, 44, 96, null, '2024-07-06 00:04:15',
        '2026-03-07 18:08:35', 632, 64, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Ofelia Cascante Martínez', 'Contenido detallado del thread 142', 9, 'Thread 142 en subforo 63', null, 1, 0, 0,
        1, 0, 'thread-142-en-subforo-63', 'waiting_support', 0, 45, 97, null, '2024-05-11 00:51:39',
        '2026-03-07 18:08:36', 650, 68, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rebeca Castallanos López', 'Contenido detallado del thread 146', 6, 'Thread 146 en subforo 63', null, 0, 0, 0,
        0, 1, 'thread-146-en-subforo-63', 'waiting_support', 0, 72, 98, null, '2024-12-08 00:08:53',
        '2026-03-07 18:08:37', 668, 70, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yolanda Ureña García', 'Contenido detallado del thread 150', 4, 'Thread 150 en subforo 71', null, 1, 0, 0, 1,
        0, 'thread-150-en-subforo-71', 'waiting_customer', 0, 26, 99, null, '2024-01-24 00:39:34',
        '2026-03-07 18:08:38', 683, 52, 28, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xochiquetzal Serrano López', 'Contenido detallado del thread 154', 9, 'Thread 154 en subforo 71', null, 1, 0,
        0, 1, 0, 'thread-154-en-subforo-71', 'resolved', 0, 90, 100, null, '2024-02-08 00:33:36', '2026-03-07 18:09:09',
        711, 114, 28, 711, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Irene Torres López', 'Contenido detallado del thread 158', 8, 'Thread 158 en subforo 73', null, 1, 0, 0, 1, 0,
        'thread-158-en-subforo-73', 'waiting_customer', 0, 96, 101, null, '2024-02-21 00:10:18', '2026-03-07 18:08:41',
        731, 82, 30, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Andrea Ponte García', 'Contenido detallado del thread 162', 6, 'Thread 162 en subforo 73', null, 1, 0, 0, 1, 1,
        'thread-162-en-subforo-73', 'waiting_customer', 1, 5, 102, null, '2024-06-06 00:40:22', '2026-03-07 18:08:42',
        752, 74, 30, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Eugenio Flores García', 'Contenido detallado del thread 166', 2, 'Thread 166 en subforo 81', null, 1, 0, 0, 1,
        1, 'thread-166-en-subforo-81', 'waiting_support', 0, 62, 103, null, '2024-01-02 00:27:11',
        '2026-03-07 18:08:43', 763, 95, 32, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Helena Escalante Sánchez', 'Contenido detallado del thread 170', 0, 'Thread 170 en subforo 82',
        'Helena Escalante Sánchez', 1, 0, 0, 1, 1, 'thread-170-en-subforo-82', 'open', 0, 84, 104, null,
        '2024-12-07 00:06:33', '2025-01-12 00:24:04', null, 36, 33, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Celina Ximénez López', 'Contenido detallado del thread 174', 9, 'Thread 174 en subforo 82', null, 0, 0, 0, 0,
        0, 'thread-174-en-subforo-82', 'resolved', 0, 7, 105, null, '2024-01-23 00:34:34', '2026-03-07 18:09:09', 798,
        56, 33, 798, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Silvia Rubio García', 'Contenido detallado del thread 178', 8, 'Thread 178 en subforo 83', null, 1, 1, 1, 9, 0,
        'thread-178-en-subforo-83', 'waiting_customer', 1, 98, 106, null, '2024-06-09 00:33:35', '2026-03-07 18:08:47',
        824, 78, 34, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Everardo Toledo López', 'Contenido detallado del thread 182', 0, 'Thread 182 en subforo 91',
        'Everardo Toledo López', 1, 0, 0, 1, 1, 'thread-182-en-subforo-91', 'open', 1, 22, 107, null,
        '2024-10-08 00:56:30', '2025-01-12 00:03:40', null, 121, 36, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Laura Romero García', 'Contenido detallado del thread 186', 9, 'Thread 186 en subforo 91', null, 0, 0, 0, 0, 0,
        'thread-186-en-subforo-91', 'resolved', 0, 18, 108, null, '2024-02-25 00:25:23', '2026-03-07 18:09:09', 864, 16,
        36, 864, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Antonio Medina García', 'Contenido detallado del thread 190', 0, 'Thread 190 en subforo 92',
        'Antonio Medina García', 0, 0, 0, 0, 0, 'thread-190-en-subforo-92', 'open', 1, 54, 109, null,
        '2024-06-29 00:02:22', '2025-01-23 00:51:04', null, 27, 37, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Anita Sánchez (Soporte)', 'Contenido detallado del thread 194', 8, 'Thread 194 en subforo 92', null, 0, 0, 0,
        0, 0, 'thread-194-en-subforo-92', 'resolved', 0, 57, 110, null, '2024-07-06 00:23:15', '2026-03-07 18:09:09',
        905, 7, 37, 905, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Demócrates Tenorio García', 'Contenido detallado del thread 198', 5, 'Thread 198 en subforo 93', null, 1, 0, 0,
        1, 0, 'thread-198-en-subforo-93', 'waiting_support', 0, 64, 111, null, '2024-05-02 00:41:06',
        '2026-03-07 18:08:54', 918, 120, 38, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Isidora Almonte García', 'Contenido detallado del thread 202', 2, 'Thread 202 en subforo 93', null, 0, 0, 0, 0,
        0, 'thread-202-en-subforo-93', 'closed', 1, 58, 112, null, '2024-03-21 00:48:48', '2026-03-07 18:08:55', 942,
        62, 38, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Olga Kauffmann López', 'Contenido detallado del thread 206', 8, 'Thread 206 en subforo 101', null, 1, 1, 1, 9,
        1, 'thread-206-en-subforo-101', 'waiting_support', 0, 36, 113, null, '2024-07-10 00:03:22',
        '2026-03-07 18:08:56', 957, 42, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Carmen Soto Martínez', 'Contenido detallado del thread 210', 2, 'Thread 210 en subforo 101', null, 1, 1, 1, 9,
        1, 'thread-210-en-subforo-101', 'waiting_customer', 0, 16, 114, null, '2024-12-26 00:53:41',
        '2026-03-07 18:08:57', 969, 26, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Anita Sánchez (Soporte)', 'Contenido detallado del thread 214', 5, 'Thread 214 en subforo 102', null, 1, 1, 1,
        9, 1, 'thread-214-en-subforo-102', 'waiting_customer', 1, 45, 115, null, '2024-10-24 00:50:43',
        '2026-03-07 18:08:59', 987, 7, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gloria Leiva Sánchez', 'Contenido detallado del thread 218', 0, 'Thread 218 en subforo 103',
        'Gloria Leiva Sánchez', 1, 1, 1, 9, 0, 'thread-218-en-subforo-103', 'open', 0, 55, 116, null,
        '2024-01-11 00:31:40', '2025-02-03 00:12:51', null, 90, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Fabiana Guzmán García', 'Contenido detallado del thread 222', 6, 'Thread 222 en subforo 103', null, 1, 0, 0, 1,
        1, 'thread-222-en-subforo-103', 'resolved', 0, 59, 117, null, '2024-09-05 00:09:04', '2026-03-07 18:09:09',
        1022, 88, 42, 1022, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Imelda Tovilla Sánchez', 'Contenido detallado del thread 226', 4, 'Thread 226 en subforo 103', null, 1, 0, 0,
        1, 0, 'thread-226-en-subforo-103', 'closed', 0, 53, 118, null, '2024-04-01 00:30:02', '2026-03-07 18:09:03',
        1041, 125, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Samuela Rodríguez García', 'Contenido detallado del thread 230', 2, 'Thread 230 en subforo 104', null, 0, 0, 0,
        0, 0, 'thread-230-en-subforo-104', 'waiting_support', 0, 22, 119, null, '2024-12-30 00:03:50',
        '2026-03-07 18:09:04', 1053, 109, 43, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alejandro Pérez García', 'Contenido detallado del thread 234', 1, 'Thread 234 en subforo 105', null, 0, 0, 0,
        0, 0, 'thread-234-en-subforo-105', 'waiting_customer', 0, 88, 120, null, '2024-01-28 00:03:20',
        '2026-03-07 18:09:05', 1067, 11, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Herminia Alfaro Martínez', 'Contenido detallado del thread 238', 7, 'Thread 238 en subforo 105', null, 1, 1, 1,
        9, 0, 'thread-238-en-subforo-105', 'resolved', 1, 7, 121, null, '2024-11-04 00:26:52', '2026-03-07 18:09:09',
        1100, 61, 42, 1100, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Francisco Castro Rodríguez', 'Contenido del thread cerrado 242', 0, 'Thread cerrado en subforo 22',
        'Francisco Castro Rodríguez', 0, 0, 0, 0, 0, 'thread-cerrado-en-subforo-22', 'closed', 0, 17, 122, null,
        '2025-01-01 00:17:02', '2025-02-15 00:49:41', null, 17, 8, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Cesáreo Téllez Rodríguez', 'Contenido detallado del thread 3', 1, 'Thread 3 en subforo 11', null, 0, 0, 0, 0,
        0, 'thread-3-en-subforo-11', 'waiting_customer', 0, 86, 123, null, '2024-09-06 00:13:18', '2026-03-07 18:08:13',
        4, 119, 2, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Enrique Flores Sánchez', 'Contenido detallado del thread 7', 3, 'Thread 7 en subforo 11', null, 1, 1, 1, 9, 1,
        'thread-7-en-subforo-11', 'waiting_customer', 0, 30, 124, null, '2024-07-24 00:50:03', '2026-03-07 18:08:13',
        23, 29, 2, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Arturo Ochoa Martínez', 'Contenido detallado del thread 11', 0, 'Thread 11 en subforo 12',
        'Arturo Ochoa Martínez', 1, 0, 0, 1, 1, 'thread-11-en-subforo-12', 'open', 1, 14, 125, null,
        '2024-11-14 00:22:17', '2025-01-24 00:08:51', null, 87, 3, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Laura Romero García', 'Contenido detallado del thread 15', 7, 'Thread 15 en subforo 12', null, 1, 1, 1, 9, 1,
        'thread-15-en-subforo-12', 'resolved', 0, 83, 126, null, '2024-09-01 00:24:27', '2026-03-07 18:09:09', 59, 16,
        3, 59, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Cristóbal Rivas García', 'Contenido detallado del thread 19', 1, 'Thread 19 en subforo 13', null, 0, 0, 0, 0,
        0, 'thread-19-en-subforo-13', 'waiting_support', 0, 56, 127, null, '2024-09-27 00:48:28', '2026-03-07 18:08:14',
        75, 31, 4, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Leopoldo Herrera López', 'Contenido detallado del thread 23', 0, 'Thread 23 en subforo 14',
        'Leopoldo Herrera López', 0, 0, 0, 0, 1, 'thread-23-en-subforo-14', 'open', 1, 35, 128, null,
        '2024-01-02 00:22:11', '2025-01-16 00:32:44', null, 39, 5, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yolanda Sánchez López', 'Contenido detallado del thread 27', 4, 'Thread 27 en subforo 14', null, 1, 1, 1, 9, 1,
        'thread-27-en-subforo-14', 'resolved', 0, 75, 129, null, '2024-11-21 00:32:23', '2026-03-07 18:09:09', 111, 86,
        5, 111, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Bruno Herrera Rodríguez', 'Contenido detallado del thread 31', 9, 'Thread 31 en subforo 21', null, 1, 0, 0, 1,
        0, 'thread-31-en-subforo-21', 'waiting_customer', 0, 55, 130, null, '2024-10-19 00:18:51',
        '2026-03-07 18:08:15', 131, 91, 7, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Emilio Barrera Martínez', 'Contenido detallado del thread 35', 7, 'Thread 35 en subforo 21', null, 0, 0, 0, 0,
        1, 'thread-35-en-subforo-21', 'closed', 0, 69, 131, null, '2024-06-05 00:28:05', '2026-03-07 18:08:16', 156, 33,
        7, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Valeska Salazar Rodríguez', 'Contenido detallado del thread 39', 0, 'Thread 39 en subforo 22',
        'Valeska Salazar Rodríguez', 1, 1, 1, 9, 1, 'thread-39-en-subforo-22', 'open', 0, 7, 132, null,
        '2024-01-12 00:53:11', '2025-02-06 00:35:18', null, 112, 8, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Juvenal Toya Rodríguez', 'Contenido detallado del thread 43', 7, 'Thread 43 en subforo 22', null, 0, 0, 0, 0,
        1, 'thread-43-en-subforo-22', 'resolved', 0, 39, 133, null, '2024-11-17 00:21:06', '2026-03-07 18:09:09', 205,
        126, 8, 205, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Belinda Weissman García', 'Contenido detallado del thread 47', 7, 'Thread 47 en subforo 23', null, 0, 0, 0, 0,
        0, 'thread-47-en-subforo-23', 'waiting_support', 0, 19, 134, null, '2024-06-06 00:43:18', '2026-03-07 18:08:18',
        225, 55, 9, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Ignacio Flores Rodríguez', 'Contenido detallado del thread 51', 9, 'Thread 51 en subforo 24', null, 1, 0, 0, 1,
        1, 'thread-51-en-subforo-24', 'waiting_support', 0, 10, 135, null, '2024-12-01 00:39:45', '2026-03-07 18:08:18',
        238, 37, 10, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rebeca Castallanos López', 'Contenido detallado del thread 55', 9, 'Thread 55 en subforo 24', null, 0, 0, 0, 0,
        1, 'thread-55-en-subforo-24', 'closed', 1, 45, 136, null, '2024-11-26 00:45:28', '2026-03-07 18:08:19', 261, 70,
        10, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Nicolás Jaramillo García', 'Contenido detallado del thread 59', 6, 'Thread 59 en subforo 31', null, 1, 1, 1, 9,
        1, 'thread-59-en-subforo-31', 'waiting_customer', 1, 40, 137, null, '2024-05-20 00:03:46',
        '2026-03-07 18:08:20', 281, 41, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Enrique Flores Sánchez', 'Contenido detallado del thread 63', 2, 'Thread 63 en subforo 31', null, 0, 0, 0, 0,
        1, 'thread-63-en-subforo-31', 'waiting_support', 0, 39, 138, null, '2024-03-30 00:23:39', '2026-03-07 18:08:20',
        297, 29, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Francisca Abad García', 'Contenido detallado del thread 67', 0, 'Thread 67 en subforo 32',
        'Francisca Abad García', 1, 1, 1, 9, 0, 'thread-67-en-subforo-32', 'open', 0, 26, 139, null,
        '2024-05-16 00:41:50', '2025-01-01 00:04:04', null, 59, 13, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Querubina Márquez Rodríguez', 'Contenido detallado del thread 71', 6, 'Thread 71 en subforo 32', null, 1, 0, 0,
        1, 1, 'thread-71-en-subforo-32', 'resolved', 0, 24, 140, null, '2024-01-03 00:43:40', '2026-03-07 18:09:09',
        336, 44, 13, 336, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xochiquetzal Serrano López', 'Contenido detallado del thread 75', 7, 'Thread 75 en subforo 32', null, 1, 0, 0,
        1, 0, 'thread-75-en-subforo-32', 'resolved', 0, 46, 141, null, '2024-11-16 00:33:51', '2026-03-07 18:09:09',
        356, 114, 13, 356, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marina Fernández López', 'Contenido detallado del thread 79', 8, 'Thread 79 en subforo 33', null, 0, 0, 0, 0,
        0, 'thread-79-en-subforo-33', 'waiting_support', 0, 85, 142, null, '2024-03-18 00:11:01', '2026-03-07 18:08:23',
        369, 12, 14, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rafael Fuentes Rodríguez', 'Contenido detallado del thread 83', 10, 'Thread 83 en subforo 41', null, 0, 0, 0,
        0, 0, 'thread-83-en-subforo-41', 'waiting_customer', 0, 17, 143, null, '2024-12-01 00:39:43',
        '2026-03-07 18:08:23', 381, 77, 16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yamila Sierra Martínez', 'Contenido detallado del thread 87', 10, 'Thread 87 en subforo 41', null, 0, 0, 0, 0,
        1, 'thread-87-en-subforo-41', 'waiting_support', 0, 93, 144, null, '2024-11-23 00:03:08', '2026-03-07 18:08:24',
        402, 115, 16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rosa Molina García', 'Contenido detallado del thread 91', 8, 'Thread 91 en subforo 42', null, 1, 0, 0, 1, 1,
        'thread-91-en-subforo-42', 'waiting_customer', 0, 28, 145, null, '2024-02-19 00:50:41', '2026-03-07 18:08:25',
        428, 24, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Serafina Ochoa López', 'Contenido detallado del thread 95', 8, 'Thread 95 en subforo 42', null, 1, 0, 0, 1, 1,
        'thread-95-en-subforo-42', 'waiting_support', 0, 88, 146, null, '2024-05-18 00:25:36', '2026-03-07 18:08:27',
        455, 46, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Carlos Jiménez (Soporte)', 'Contenido detallado del thread 99', 0, 'Thread 99 en subforo 43',
        'Carlos Jiménez (Soporte)', 1, 0, 0, 1, 1, 'thread-99-en-subforo-43', 'open', 0, 96, 147, null,
        '2024-10-13 00:10:43', '2025-02-13 00:29:23', null, 10, 18, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Sofía García (Gestor)', 'Contenido detallado del thread 103', 1, 'Thread 103 en subforo 43', null, 1, 0, 0, 1,
        0, 'thread-103-en-subforo-43', 'resolved', 0, 81, 148, null, '2024-08-13 00:24:28', '2026-03-07 18:09:09', 484,
        5, 18, 484, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rebeca Castallanos López', 'Contenido detallado del thread 107', 3, 'Thread 107 en subforo 51', null, 1, 0, 0,
        1, 1, 'thread-107-en-subforo-51', 'waiting_customer', 0, 26, 149, null, '2024-10-14 00:37:08',
        '2026-03-07 18:08:28', 492, 70, 20, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Queta Pacheco López', 'Contenido detallado del thread 111', 4, 'Thread 111 en subforo 52', null, 1, 1, 1, 9, 1,
        'thread-111-en-subforo-52', 'waiting_support', 0, 12, 150, null, '2024-09-15 00:26:20', '2026-03-07 18:08:29',
        504, 107, 21, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Guillermo Dueñas López', 'Contenido detallado del thread 115', 8, 'Thread 115 en subforo 52', null, 1, 1, 1, 9,
        0, 'thread-115-en-subforo-52', 'closed', 1, 67, 151, null, '2024-02-17 00:16:07', '2026-03-07 18:08:30', 524,
        35, 21, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Mariano Triviño Martínez', 'Contenido detallado del thread 119', 10, 'Thread 119 en subforo 53', null, 0, 0, 0,
        0, 1, 'thread-119-en-subforo-53', 'waiting_customer', 0, 42, 152, null, '2024-11-05 00:12:31',
        '2026-03-07 18:08:31', 543, 129, 22, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Jorge Vega Martínez', 'Contenido detallado del thread 123', 3, 'Thread 123 en subforo 53', null, 1, 0, 0, 1, 0,
        'thread-123-en-subforo-53', 'waiting_support', 1, 36, 153, null, '2024-02-11 00:59:35', '2026-03-07 18:08:32',
        571, 19, 22, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Leticia Leyva García', 'Contenido detallado del thread 127', 6, 'Thread 127 en subforo 61', null, 1, 0, 0, 1,
        1, 'thread-127-en-subforo-61', 'waiting_customer', 0, 78, 154, null, '2024-08-03 00:50:16',
        '2026-03-07 18:08:33', 587, 102, 24, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Tomás Bravo López', 'Contenido detallado del thread 131', 0, 'Thread 131 en subforo 62', 'Tomás Bravo López',
        1, 1, 1, 9, 0, 'thread-131-en-subforo-62', 'open', 0, 88, 155, null, '2024-04-01 00:14:39',
        '2025-02-03 00:19:44', null, 75, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Isidora Almonte García', 'Contenido detallado del thread 135', 9, 'Thread 135 en subforo 62', null, 0, 0, 0, 0,
        1, 'thread-135-en-subforo-62', 'resolved', 0, 43, 156, null, '2024-03-15 00:59:31', '2026-03-07 18:09:09', 625,
        62, 25, 625, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Carmen Soto Martínez', 'Contenido detallado del thread 139', 0, 'Thread 139 en subforo 63',
        'Carmen Soto Martínez', 0, 0, 0, 0, 1, 'thread-139-en-subforo-63', 'open', 0, 76, 157, null,
        '2024-10-17 00:09:54', '2025-02-07 00:05:28', null, 26, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teresa Moreno (Soporte)', 'Contenido detallado del thread 143', 1, 'Thread 143 en subforo 63', null, 1, 0, 0,
        1, 1, 'thread-143-en-subforo-63', 'resolved', 0, 65, 158, null, '2024-04-26 00:12:57', '2026-03-07 18:09:09',
        651, 9, 26, 651, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gloria Rodríguez (Admin)', 'Contenido detallado del thread 147', 3, 'Thread 147 en subforo 63', null, 0, 0, 0,
        0, 1, 'thread-147-en-subforo-63', 'closed', 1, 34, 159, null, '2024-01-28 00:06:51', '2026-03-07 18:08:37', 671,
        2, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Luis Vargas López', 'Contenido detallado del thread 151', 4, 'Thread 151 en subforo 71', null, 0, 0, 0, 0, 1,
        'thread-151-en-subforo-71', 'waiting_support', 0, 54, 160, null, '2024-05-10 00:21:42', '2026-03-07 18:08:38',
        687, 21, 28, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Olga Kauffmann López', 'Contenido detallado del thread 155', 3, 'Thread 155 en subforo 71', null, 1, 1, 1, 9,
        1, 'thread-155-en-subforo-71', 'waiting_support', 0, 37, 161, null, '2024-12-20 00:05:35',
        '2026-03-07 18:08:40', 714, 42, 28, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Valentín Ramírez López', 'Contenido detallado del thread 159', 10, 'Thread 159 en subforo 73', null, 0, 0, 0,
        0, 0, 'thread-159-en-subforo-73', 'waiting_support', 1, 16, 162, null, '2024-02-28 00:58:19',
        '2026-03-07 18:08:42', 741, 49, 30, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alma Castro García', 'Contenido detallado del thread 163', 0, 'Thread 163 en subforo 81', 'Alma Castro García',
        0, 0, 0, 0, 0, 'thread-163-en-subforo-81', 'open', 1, 42, 163, null, '2024-03-21 00:46:45',
        '2025-01-01 00:45:40', null, 92, 32, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Cesáreo Téllez Rodríguez', 'Contenido detallado del thread 167', 5, 'Thread 167 en subforo 81', null, 1, 0, 0,
        1, 1, 'thread-167-en-subforo-81', 'resolved', 1, 57, 164, null, '2024-12-12 00:12:50', '2026-03-07 18:09:09',
        768, 119, 32, 768, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rebeca Castallanos López', 'Contenido detallado del thread 171', 2, 'Thread 171 en subforo 82', null, 0, 0, 0,
        0, 1, 'thread-171-en-subforo-82', 'waiting_support', 0, 57, 165, null, '2024-11-19 00:15:07',
        '2026-03-07 18:08:44', 780, 70, 33, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Karenina Azofeifa Sánchez', 'Contenido detallado del thread 175', 10, 'Thread 175 en subforo 82', null, 0, 0,
        0, 0, 0, 'thread-175-en-subforo-82', 'closed', 0, 73, 166, null, '2024-08-28 00:09:15', '2026-03-07 18:08:46',
        808, 64, 33, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Mariano Triviño Martínez', 'Contenido detallado del thread 179', 9, 'Thread 179 en subforo 83', null, 0, 0, 0,
        0, 0, 'thread-179-en-subforo-83', 'waiting_support', 1, 90, 167, null, '2024-05-17 00:02:23',
        '2026-03-07 18:08:48', 833, 129, 34, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Sergio Cano López', 'Contenido detallado del thread 183', 8, 'Thread 183 en subforo 91', null, 1, 1, 1, 9, 0,
        'thread-183-en-subforo-91', 'resolved', 1, 72, 168, null, '2024-08-29 00:24:29', '2026-03-07 18:09:09', 845, 79,
        36, 838, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Ramón Martínez (Gestor)', 'Contenido detallado del thread 187', 10, 'Thread 187 en subforo 91', null, 0, 0, 0,
        0, 0, 'thread-187-en-subforo-91', 'closed', 0, 100, 169, null, '2024-06-05 00:09:39', '2026-03-07 18:08:50',
        874, 4, 36, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Roberto Nieto García', 'Contenido detallado del thread 191', 3, 'Thread 191 en subforo 92', null, 1, 1, 1, 9,
        1, 'thread-191-en-subforo-92', 'waiting_support', 0, 95, 170, null, '2024-08-17 00:05:19',
        '2026-03-07 18:08:51', 884, 45, 37, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Antonio Medina García', 'Contenido detallado del thread 195', 1, 'Thread 195 en subforo 92', null, 1, 0, 0, 1,
        0, 'thread-195-en-subforo-92', 'closed', 0, 62, 171, null, '2024-04-22 00:47:30', '2026-03-07 18:08:53', 906,
        27, 37, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Plutarco Orozco García', 'Contenido detallado del thread 199', 5, 'Thread 199 en subforo 93', null, 0, 0, 0, 0,
        0, 'thread-199-en-subforo-93', 'waiting_customer', 0, 49, 172, null, '2024-02-25 00:50:26',
        '2026-03-07 18:08:54', 923, 106, 38, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marta Campos Sánchez', 'Contenido detallado del thread 203', 0, 'Thread 203 en subforo 101',
        'Marta Campos Sánchez', 0, 0, 0, 0, 1, 'thread-203-en-subforo-101', 'open', 0, 100, 173, null,
        '2024-01-05 00:05:08', '2025-01-01 00:21:41', null, 22, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xenia Téllez Rodríguez', 'Contenido detallado del thread 207', 7, 'Thread 207 en subforo 101', null, 0, 0, 0,
        0, 0, 'thread-207-en-subforo-101', 'resolved', 1, 58, 174, null, '2024-03-09 00:05:28', '2026-03-07 18:09:09',
        964, 51, 40, 964, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marta Campos Sánchez', 'Contenido detallado del thread 211', 9, 'Thread 211 en subforo 101', null, 1, 0, 0, 1,
        0, 'thread-211-en-subforo-101', 'resolved', 0, 60, 175, null, '2024-04-17 00:34:22', '2026-03-07 18:09:09', 978,
        22, 40, 978, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zacarías Valdebenito López', 'Contenido detallado del thread 215', 3, 'Thread 215 en subforo 102', null, 1, 0,
        0, 1, 1, 'thread-215-en-subforo-102', 'waiting_support', 1, 15, 176, null, '2024-10-14 00:54:49',
        '2026-03-07 18:08:59', 990, 53, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Olga Kauffmann López', 'Contenido detallado del thread 219', 1, 'Thread 219 en subforo 103', null, 0, 0, 0, 0,
        1, 'thread-219-en-subforo-103', 'waiting_support', 1, 14, 177, null, '2024-10-24 00:38:11',
        '2026-03-07 18:09:00', 1004, 42, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xenia Téllez Rodríguez', 'Contenido detallado del thread 223', 5, 'Thread 223 en subforo 103', null, 1, 0, 0,
        1, 1, 'thread-223-en-subforo-103', 'closed', 0, 75, 178, null, '2024-06-29 00:28:32', '2026-03-07 18:09:02',
        1027, 51, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Inocencia Jiménez García', 'Contenido detallado del thread 227', 0, 'Thread 227 en subforo 104',
        'Inocencia Jiménez García', 1, 1, 1, 9, 0, 'thread-227-en-subforo-104', 'open', 1, 39, 179, null,
        '2024-02-14 00:04:53', '2025-02-09 00:08:33', null, 99, 43, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Samuela Rodríguez García', 'Contenido detallado del thread 231', 3, 'Thread 231 en subforo 104', null, 1, 0, 0,
        1, 1, 'thread-231-en-subforo-104', 'resolved', 0, 78, 180, null, '2024-04-21 00:10:19', '2026-03-07 18:09:09',
        1056, 109, 43, 1056, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Belinda Weissman García', 'Contenido detallado del thread 235', 10, 'Thread 235 en subforo 105', null, 1, 0, 0,
        1, 1, 'thread-235-en-subforo-105', 'waiting_support', 0, 31, 181, null, '2024-06-18 00:21:59',
        '2026-03-07 18:09:06', 1077, 55, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Lidia Iglesias López', 'Contenido detallado del thread 239', 4, 'Thread 239 en subforo 105', null, 0, 0, 0, 0,
        0, 'thread-239-en-subforo-105', 'waiting_support', 1, 31, 182, null, '2024-09-20 00:23:33',
        '2026-03-07 18:09:08', 1104, 28, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teresa Moreno (Soporte)', 'Contenido del thread cerrado 243', 0, 'Thread cerrado en subforo 33',
        'Teresa Moreno (Soporte)', 0, 0, 0, 0, 0, 'thread-cerrado-en-subforo-33', 'closed', 0, 43, 183, null,
        '2025-01-01 00:55:05', '2025-02-15 00:17:12', null, 9, 14, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xochiquetzal Serrano López', 'Contenido detallado del thread 4', 7, 'Thread 4 en subforo 11', null, 1, 0, 0, 1,
        0, 'thread-4-en-subforo-11', 'waiting_support', 0, 97, 184, null, '2024-04-19 00:41:35', '2026-03-07 18:08:13',
        11, 114, 2, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xenia Téllez Rodríguez', 'Contenido detallado del thread 8', 7, 'Thread 8 en subforo 11', null, 0, 0, 0, 0, 0,
        'thread-8-en-subforo-11', 'closed', 1, 60, 185, null, '2024-01-15 00:41:19', '2026-03-07 18:08:13', 30, 51, 2,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Felipe Solís García', 'Contenido detallado del thread 12', 2, 'Thread 12 en subforo 12', null, 1, 1, 1, 9, 0,
        'thread-12-en-subforo-12', 'waiting_customer', 0, 52, 186, null, '2024-02-01 00:06:32', '2026-03-07 18:08:14',
        41, 81, 3, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Unai Rueda Sánchez', 'Contenido detallado del thread 16', 8, 'Thread 16 en subforo 12', null, 1, 1, 1, 9, 1,
        'thread-16-en-subforo-12', 'closed', 0, 90, 187, null, '2024-10-19 00:38:37', '2026-03-07 18:08:14', 67, 111, 3,
        null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Patrocinia Castillo García', 'Contenido detallado del thread 20', 7, 'Thread 20 en subforo 13', null, 0, 0, 0,
        0, 0, 'thread-20-en-subforo-13', 'waiting_customer', 1, 77, 188, null, '2024-04-29 00:43:39',
        '2026-03-07 18:08:14', 82, 69, 4, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Serafina Ochoa López', 'Contenido detallado del thread 24', 2, 'Thread 24 en subforo 14', null, 0, 0, 0, 0, 1,
        'thread-24-en-subforo-14', 'waiting_support', 0, 84, 189, null, '2024-06-16 00:39:21', '2026-03-07 18:08:15',
        95, 46, 5, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Unai Rueda Sánchez', 'Contenido detallado del thread 28', 1, 'Thread 28 en subforo 14', null, 0, 0, 0, 0, 0,
        'thread-28-en-subforo-14', 'closed', 1, 24, 190, null, '2024-09-28 00:37:02', '2026-03-07 18:08:15', 112, 111,
        5, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Natalia Contreras López', 'Contenido detallado del thread 32', 10, 'Thread 32 en subforo 21', null, 1, 0, 0, 1,
        0, 'thread-32-en-subforo-21', 'waiting_customer', 0, 43, 191, null, '2024-11-06 00:02:05',
        '2026-03-07 18:08:16', 141, 72, 7, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Belinda Weissman García', 'Contenido detallado del thread 36', 10, 'Thread 36 en subforo 21', null, 1, 0, 0, 1,
        1, 'thread-36-en-subforo-21', 'waiting_support', 1, 86, 192, null, '2024-05-24 00:50:36', '2026-03-07 18:08:16',
        166, 55, 7, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Laura Romero García', 'Contenido detallado del thread 40', 10, 'Thread 40 en subforo 22', null, 1, 1, 1, 9, 0,
        'thread-40-en-subforo-22', 'resolved', 0, 61, 193, null, '2024-04-11 00:14:49', '2026-03-07 18:09:09', 187, 16,
        8, 178, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zaira Solano García', 'Contenido detallado del thread 44', 0, 'Thread 44 en subforo 23', 'Zaira Solano García',
        0, 0, 0, 0, 0, 'thread-44-en-subforo-23', 'open', 1, 44, 194, null, '2024-02-07 00:40:40',
        '2025-01-26 00:02:31', null, 116, 9, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Néstor Urtado García', 'Contenido detallado del thread 48', 2, 'Thread 48 en subforo 23', null, 0, 0, 0, 0, 1,
        'thread-48-en-subforo-23', 'resolved', 0, 25, 195, null, '2024-02-20 00:57:40', '2026-03-07 18:09:09', 227, 130,
        9, 227, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Unai Rueda Sánchez', 'Contenido detallado del thread 52', 4, 'Thread 52 en subforo 24', null, 0, 0, 0, 0, 0,
        'thread-52-en-subforo-24', 'waiting_customer', 0, 38, 196, null, '2024-10-15 00:42:19', '2026-03-07 18:08:18',
        242, 111, 10, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Queta Pacheco López', 'Contenido detallado del thread 56', 10, 'Thread 56 en subforo 24', null, 0, 0, 0, 0, 1,
        'thread-56-en-subforo-24', 'closed', 0, 93, 197, null, '2024-05-30 00:52:51', '2026-03-07 18:08:19', 271, 107,
        10, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Néstor Urtado García', 'Contenido detallado del thread 60', 7, 'Thread 60 en subforo 31', null, 0, 0, 0, 0, 0,
        'thread-60-en-subforo-31', 'waiting_support', 0, 98, 198, null, '2024-12-25 00:20:29', '2026-03-07 18:08:20',
        288, 130, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Natalia Contreras López', 'Contenido detallado del thread 64', 3, 'Thread 64 en subforo 31', null, 1, 1, 1, 9,
        1, 'thread-64-en-subforo-31', 'waiting_support', 0, 80, 199, null, '2024-04-28 00:04:10', '2026-03-07 18:08:20',
        300, 72, 12, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zaira Solano García', 'Contenido detallado del thread 68', 9, 'Thread 68 en subforo 32', null, 0, 0, 0, 0, 1,
        'thread-68-en-subforo-32', 'closed', 1, 77, 200, null, '2024-08-14 00:31:29', '2026-03-07 18:08:21', 314, 116,
        13, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Filadelfo Tordoya Martínez', 'Contenido detallado del thread 72', 4, 'Thread 72 en subforo 32', null, 1, 0, 0,
        1, 0, 'thread-72-en-subforo-32', 'closed', 1, 94, 201, null, '2024-02-07 00:39:09', '2026-03-07 18:08:22', 340,
        122, 13, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Magdalena Ibáñez Martínez', 'Contenido detallado del thread 76', 0, 'Thread 76 en subforo 33',
        'Magdalena Ibáñez Martínez', 1, 1, 1, 9, 1, 'thread-76-en-subforo-33', 'open', 0, 17, 202, null,
        '2024-07-11 00:46:20', '2025-01-29 00:47:55', null, 40, 14, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Carlos Jiménez (Soporte)', 'Contenido detallado del thread 80', 1, 'Thread 80 en subforo 33', null, 1, 0, 0, 1,
        0, 'thread-80-en-subforo-33', 'resolved', 0, 82, 203, null, '2024-04-20 00:23:25', '2026-03-07 18:09:09', 370,
        10, 14, 370, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Verónica Acosta Sánchez', 'Contenido detallado del thread 84', 4, 'Thread 84 en subforo 41', null, 1, 1, 1, 9,
        1, 'thread-84-en-subforo-41', 'waiting_support', 1, 70, 204, null, '2024-09-23 00:24:32', '2026-03-07 18:08:24',
        385, 76, 16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Natalia Contreras López', 'Contenido detallado del thread 88', 8, 'Thread 88 en subforo 41', null, 0, 0, 0, 0,
        1, 'thread-88-en-subforo-41', 'closed', 0, 69, 205, null, '2024-02-15 00:21:15', '2026-03-07 18:08:25', 410, 72,
        16, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teresa Moreno (Soporte)', 'Contenido detallado del thread 92', 8, 'Thread 92 en subforo 42', null, 1, 0, 0, 1,
        0, 'thread-92-en-subforo-42', 'waiting_support', 0, 86, 206, null, '2024-07-12 00:18:28', '2026-03-07 18:08:26',
        436, 9, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Querubina Márquez Rodríguez', 'Contenido detallado del thread 96', 5, 'Thread 96 en subforo 42', null, 1, 0, 0,
        1, 0, 'thread-96-en-subforo-42', 'waiting_customer', 0, 59, 207, null, '2024-08-30 00:07:03',
        '2026-03-07 18:08:27', 460, 44, 17, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Fabiana Guzmán García', 'Contenido detallado del thread 100', 7, 'Thread 100 en subforo 43', null, 0, 0, 0, 0,
        0, 'thread-100-en-subforo-43', 'closed', 1, 53, 208, null, '2024-10-09 00:56:39', '2026-03-07 18:08:27', 471,
        88, 18, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Roberto Nieto García', 'Contenido detallado del thread 104', 2, 'Thread 104 en subforo 43', null, 0, 0, 0, 0,
        1, 'thread-104-en-subforo-43', 'closed', 1, 48, 209, null, '2024-05-17 00:56:57', '2026-03-07 18:08:28', 486,
        45, 18, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Laura Romero García', 'Contenido detallado del thread 108', 7, 'Thread 108 en subforo 51', null, 1, 0, 0, 1, 1,
        'thread-108-en-subforo-51', 'waiting_support', 1, 38, 210, null, '2024-07-22 00:21:59', '2026-03-07 18:08:28',
        499, 16, 20, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Isidora Almonte García', 'Contenido detallado del thread 112', 4, 'Thread 112 en subforo 52', null, 0, 0, 0, 0,
        1, 'thread-112-en-subforo-52', 'waiting_customer', 1, 53, 211, null, '2024-02-14 00:21:12',
        '2026-03-07 18:08:29', 508, 62, 21, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Catalina Ramos Martínez', 'Contenido detallado del thread 116', 3, 'Thread 116 en subforo 52', null, 1, 0, 0,
        1, 0, 'thread-116-en-subforo-52', 'waiting_customer', 0, 64, 212, null, '2024-02-22 00:32:32',
        '2026-03-07 18:08:30', 527, 80, 21, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Kutxa Trejo García', 'Contenido detallado del thread 120', 7, 'Thread 120 en subforo 53', null, 0, 0, 0, 0, 0,
        'thread-120-en-subforo-53', 'waiting_support', 0, 88, 213, null, '2024-07-05 00:57:19', '2026-03-07 18:08:31',
        550, 127, 22, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Rafael Fuentes Rodríguez', 'Contenido detallado del thread 124', 1, 'Thread 124 en subforo 53', null, 1, 1, 1,
        9, 1, 'thread-124-en-subforo-53', 'waiting_support', 1, 35, 214, null, '2024-12-02 00:06:25',
        '2026-03-07 18:08:32', 572, 77, 22, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Emilio Barrera Martínez', 'Contenido detallado del thread 128', 1, 'Thread 128 en subforo 61', null, 1, 0, 0,
        1, 0, 'thread-128-en-subforo-61', 'waiting_support', 1, 17, 215, null, '2024-10-30 00:16:13',
        '2026-03-07 18:08:33', 588, 33, 24, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Jorge Vega Martínez', 'Contenido detallado del thread 132', 5, 'Thread 132 en subforo 62', null, 1, 0, 0, 1, 0,
        'thread-132-en-subforo-62', 'waiting_support', 0, 11, 216, null, '2024-12-27 00:04:03', '2026-03-07 18:08:34',
        606, 19, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Fabiana Guzmán García', 'Contenido detallado del thread 136', 3, 'Thread 136 en subforo 62', null, 1, 0, 0, 1,
        0, 'thread-136-en-subforo-62', 'closed', 0, 83, 217, null, '2024-11-20 00:39:56', '2026-03-07 18:08:35', 628,
        88, 25, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Francisco Castro Rodríguez', 'Contenido detallado del thread 140', 8, 'Thread 140 en subforo 63', null, 0, 0,
        0, 0, 0, 'thread-140-en-subforo-63', 'waiting_support', 0, 13, 218, null, '2024-10-22 00:44:30',
        '2026-03-07 18:08:36', 640, 17, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Edmundo Méndez López', 'Contenido detallado del thread 144', 9, 'Thread 144 en subforo 63', null, 0, 0, 0, 0,
        0, 'thread-144-en-subforo-63', 'closed', 0, 95, 219, null, '2024-01-18 00:01:54', '2026-03-07 18:08:37', 660,
        89, 26, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Marta Campos Sánchez', 'Contenido detallado del thread 148', 0, 'Thread 148 en subforo 71',
        'Marta Campos Sánchez', 0, 0, 0, 0, 1, 'thread-148-en-subforo-71', 'open', 0, 67, 220, null,
        '2024-02-24 00:09:56', '2025-01-21 00:17:46', null, 22, 28, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Xenia Téllez Rodríguez', 'Contenido detallado del thread 152', 8, 'Thread 152 en subforo 71', null, 1, 0, 0, 1,
        1, 'thread-152-en-subforo-71', 'resolved', 0, 52, 221, null, '2024-03-08 00:24:48', '2026-03-07 18:09:09', 695,
        51, 28, 695, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Francisco Castro Rodríguez', 'Contenido detallado del thread 156', 0, 'Thread 156 en subforo 73',
        'Francisco Castro Rodríguez', 1, 1, 1, 9, 0, 'thread-156-en-subforo-73', 'open', 0, 28, 222, null,
        '2024-04-24 00:03:25', '2025-02-02 00:04:36', null, 17, 30, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Guillermo Dueñas López', 'Contenido detallado del thread 160', 4, 'Thread 160 en subforo 73', null, 0, 0, 0, 0,
        1, 'thread-160-en-subforo-73', 'resolved', 0, 19, 223, null, '2024-07-09 00:36:12', '2026-03-07 18:09:09', 745,
        35, 30, 745, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Teófilo Páez Martínez', 'Contenido detallado del thread 164', 4, 'Thread 164 en subforo 81', null, 0, 0, 0, 0,
        1, 'thread-164-en-subforo-81', 'waiting_support', 1, 38, 224, null, '2024-08-10 00:19:04',
        '2026-03-07 18:08:43', 756, 47, 32, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Yolanda Sánchez López', 'Contenido detallado del thread 168', 6, 'Thread 168 en subforo 81', null, 0, 0, 0, 0,
        0, 'thread-168-en-subforo-81', 'closed', 0, 68, 225, null, '2024-05-09 00:29:48', '2026-03-07 18:08:44', 774,
        86, 32, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Zaira Solano García', 'Contenido detallado del thread 172', 6, 'Thread 172 en subforo 82', null, 1, 1, 1, 9, 1,
        'thread-172-en-subforo-82', 'waiting_customer', 0, 48, 226, null, '2024-08-15 00:53:39', '2026-03-07 18:08:44',
        786, 116, 33, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gonzalo Bustamante Sánchez', 'Contenido detallado del thread 176', 0, 'Thread 176 en subforo 83',
        'Gonzalo Bustamante Sánchez', 0, 0, 0, 0, 0, 'thread-176-en-subforo-83', 'open', 0, 19, 227, null,
        '2024-11-17 00:08:08', '2025-02-02 00:07:25', null, 83, 34, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Ofelia Cascante Martínez', 'Contenido detallado del thread 180', 2, 'Thread 180 en subforo 83', null, 0, 0, 0,
        0, 0, 'thread-180-en-subforo-83', 'resolved', 0, 10, 228, null, '2024-09-10 00:24:50', '2026-03-07 18:09:09',
        835, 68, 34, 835, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Carmen Soto Martínez', 'Contenido detallado del thread 184', 4, 'Thread 184 en subforo 91', null, 0, 0, 0, 0,
        1, 'thread-184-en-subforo-91', 'waiting_customer', 1, 39, 229, null, '2024-02-12 00:24:48',
        '2026-03-07 18:08:49', 849, 26, 36, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Tiburcio Roque López', 'Contenido detallado del thread 188', 1, 'Thread 188 en subforo 91', null, 1, 0, 0, 1,
        1, 'thread-188-en-subforo-91', 'waiting_support', 1, 21, 230, null, '2024-10-27 00:39:32',
        '2026-03-07 18:08:51', 875, 110, 36, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Néstor Urtado García', 'Contenido detallado del thread 192', 9, 'Thread 192 en subforo 92', null, 1, 1, 1, 9,
        1, 'thread-192-en-subforo-92', 'waiting_customer', 0, 68, 231, null, '2024-02-20 00:03:02',
        '2026-03-07 18:08:52', 893, 130, 37, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Serafina Ochoa López', 'Contenido detallado del thread 196', 7, 'Thread 196 en subforo 92', null, 1, 0, 0, 1,
        1, 'thread-196-en-subforo-92', 'waiting_support', 0, 95, 232, null, '2024-07-03 00:46:21',
        '2026-03-07 18:08:53', 913, 46, 37, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Gloria Leiva Sánchez', 'Contenido detallado del thread 200', 9, 'Thread 200 en subforo 93', null, 1, 1, 1, 9,
        0, 'thread-200-en-subforo-93', 'waiting_support', 0, 24, 233, null, '2024-09-23 00:34:29',
        '2026-03-07 18:08:55', 932, 90, 38, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Dolores Aguirre López', 'Contenido detallado del thread 204', 4, 'Thread 204 en subforo 101', null, 0, 0, 0, 0,
        0, 'thread-204-en-subforo-101', 'waiting_customer', 0, 25, 234, null, '2024-11-09 00:58:32',
        '2026-03-07 18:08:56', 946, 32, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Patrocinia Castillo García', 'Contenido detallado del thread 208', 1, 'Thread 208 en subforo 101', null, 1, 0,
        0, 1, 1, 'thread-208-en-subforo-101', 'closed', 0, 11, 235, null, '2024-01-28 00:40:20', '2026-03-07 18:08:57',
        965, 69, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Arturo Ochoa Martínez', 'Contenido detallado del thread 212', 0, 'Thread 212 en subforo 102',
        'Arturo Ochoa Martínez', 1, 0, 0, 1, 0, 'thread-212-en-subforo-102', 'open', 0, 90, 236, null,
        '2024-03-22 00:40:47', '2025-02-13 00:54:19', null, 87, 41, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Vanessa Montoya Rodríguez', 'Contenido detallado del thread 216', 10, 'Thread 216 en subforo 102', null, 0, 0,
        0, 0, 0, 'thread-216-en-subforo-102', 'resolved', 0, 63, 237, null, '2024-10-17 00:38:21',
        '2026-03-07 18:09:09', 1000, 84, 41, 1000, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Alejandro Pérez García', 'Contenido detallado del thread 220', 5, 'Thread 220 en subforo 103', null, 1, 0, 0,
        1, 0, 'thread-220-en-subforo-103', 'waiting_customer', 0, 76, 238, null, '2024-05-17 00:33:34',
        '2026-03-07 18:09:00', 1009, 11, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Leopoldo Herrera López', 'Contenido detallado del thread 224', 7, 'Thread 224 en subforo 103', null, 0, 0, 0,
        0, 0, 'thread-224-en-subforo-103', 'waiting_support', 0, 35, 239, null, '2024-07-14 00:37:19',
        '2026-03-07 18:09:02', 1034, 39, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Aarón Villalba Martínez', 'Contenido detallado del thread 228', 8, 'Thread 228 en subforo 104', null, 1, 1, 1,
        9, 1, 'thread-228-en-subforo-104', 'closed', 0, 7, 240, null, '2024-08-12 00:02:23', '2026-03-07 18:09:03',
        1049, 54, 43, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Anita Sánchez (Soporte)', 'Contenido detallado del thread 232', 0, 'Thread 232 en subforo 105',
        'Anita Sánchez (Soporte)', 1, 0, 0, 1, 0, 'thread-232-en-subforo-105', 'open', 1, 69, 241, null,
        '2024-02-13 00:08:26', '2025-01-29 00:38:19', null, 7, 40, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Irene Torres López', 'Contenido detallado del thread 236', 7, 'Thread 236 en subforo 105', null, 0, 0, 0, 0, 0,
        'thread-236-en-subforo-105', 'resolved', 0, 93, 242, null, '2024-04-04 00:51:57', '2026-03-07 18:09:09', 1084,
        82, 41, 1084, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Mariano Triviño Martínez', 'Contenido detallado del thread 240', 9, 'Thread 240 en subforo 105', null, 0, 0, 0,
        0, 0, 'thread-240-en-subforo-105', 'waiting_support', 0, 43, 243, null, '2024-07-08 00:45:40',
        '2026-03-07 18:09:09', 1113, 129, 42, null, null);
INSERT INTO pfc_thread (created_by, description, message_count, title, updated_by, is_incident,
                        is_critical, affects_business, priority, private, slug, status, sticky,
                        view_count, id, deleted_at, created_at, updated_at, last_message_id, author_id,
                        forum_id, solved_message_id, seo_id)
VALUES ('Nemesio Madera Sánchez', 'Contenido del thread cerrado 244', 0, 'Thread cerrado en subforo 51',
        'Nemesio Madera Sánchez', 0, 0, 0, 0, 0, 'thread-cerrado-en-subforo-51', 'closed', 0, 99, 244, null,
        '2025-01-01 00:31:16', '2025-02-15 00:42:50', null, 104, 20, null, null);
