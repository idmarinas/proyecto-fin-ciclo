/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/03/2026, 18:17
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file user.sql
 * @date 07/03/2026
 * @time 18:48
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        63, 0, 0, 'super@admin.sh', 'Super Admin', '[
        "ROLE_SUPER_ADMIN"
    ]', '$2y$04$U1vWI4L7mX6EUJUfYeoXUenBQiTDG2Nm2dvl7TAbj.QKNEE0u3fA6', 0, 1, 0, 'Personal de administración',
        '2025-02-10 12:37:14', 1, null, '7e09bee8bfff78997c58fdb30e4db065bae9f930', null, '2024-02-02 01:50:37',
        '2023-10-27 15:52:25', '21.231.103.227', '149.14.228.105');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        86, 0, 0, 'super@admin.local', 'Gloria Rodríguez (Admin)', '[
        "ROLE_SUPER_ADMIN"
    ]', '$2y$04$VMBF8XSchAJmBZvqXaRKku9/woNygjlzHDk3R20JtzYYA7FeZq8He', 0, 1, 0, 'Personal de administración',
        '2025-01-22 20:38:30', 2, null, '15ce1718a4c5802d48e78f672e79706377b5c794', null, '2024-03-03 02:47:03',
        '2014-07-01 03:09:50', '250.125.133.206', '174.114.76.152');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1507009307501-065eabfc3385?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        93, 0, 0, 'admin1@lumina.local', 'Isabel López (Gestor)', '[
        "ROLE_ADMIN"
    ]', '$2y$04$w4RBVYTGMl09dWnM2saC5.3o/0FbveBvoH.BNvgUykddLAwJiGwsK', 1, 1, 1, 'Personal de administración',
        '2025-01-06 06:41:46', 3, null, '0df2e2a8a5995ef9b9e2a506a8fabda07c5d97be', null, '2024-04-04 03:11:33',
        '2023-10-21 13:29:55', '114.44.220.130', '28.215.48.219');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        79, 0, 0, 'admin2@lumina.local', 'Ramón Martínez (Gestor)', '[
        "ROLE_ADMIN"
    ]', '$2y$04$n3OfQl/XVGwNwn9D883jHuJbbhv4GoYxs7ofOL/EuWF6s0NUN6lie', 0, 0, 1, 'Personal de administración',
        '2025-02-05 15:54:24', 4, null, '0707b41c2851f93e05dde79984c897a0ccce1086', null, '2024-05-05 04:40:49',
        '2014-05-21 21:06:43', '132.164.34.241', '8.146.74.252');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1508214751196-bcfd092dcccb?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        65, 0, 0, 'admin3@lumina.local', 'Sofía García (Gestor)', '[
        "ROLE_ADMIN"
    ]', '$2y$04$r8NPfFmFA7eH0HK0E67uSu5xpx2hOmgjK6v1XRxHGt1i9GE6VbrAO', 1, 0, 1, 'Personal de administración',
        '2025-02-27 03:44:15', 5, null, '87b4997f9c6e2a353c7d159814a08958eae8ea59', null, '2024-06-06 05:10:52',
        '2014-05-20 12:20:49', '246.213.185.193', '101.213.171.123');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        98, 0, 0, 'support1@lumina.local', 'Javier Hernández (Soporte)', '[
        "ROLE_SUPPORT"
    ]', '$2y$04$zklx3H.umAAC4SxfFvSLLeYjD70vlGR/DQP83LYtdHRez7yPA36.u', 0, 1, 0, 'Personal de soporte',
        '2025-02-15 15:45:07', 6, null, '231aa414a5cc19f932bb977e08bdc9011549732d', null, '2024-07-07 06:03:36',
        '2023-05-08 05:29:36', '231.117.217.168', '147.111.212.110');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        96, 0, 0, 'support2@lumina.local', 'Anita Sánchez (Soporte)', '[
        "ROLE_SUPPORT"
    ]', '$2y$04$PRSWHNvGOO8fa5rWT0pHsen.6Eb1GUCq5ig62kSuI/00xxg.ZKtEi', 1, 1, 0, 'Personal de soporte',
        '2025-01-20 09:29:20', 7, null, '69aae2071a060508077c5a563e05ec97dda36cfd', null, '2024-08-08 07:13:01',
        '2016-04-27 14:31:43', '167.213.98.115', '36.236.181.251');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1506692957521-141d47d1e5d0?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        80, 0, 0, 'support3@lumina.local', 'Miguel Díaz (Soporte)', '[
        "ROLE_SUPPORT"
    ]', '$2y$04$L7kgm8LsAFlIn/fE7JRxeOI4L477.XZWAJJPNtlYou//9215L6q22', 1, 1, 1, 'Personal de soporte',
        '2025-02-17 13:27:44', 8, null, '55fcceb0dbb4c2fadae2edbecc83b0b6c596c71c', null, '2024-09-09 08:27:09',
        '2023-03-11 11:32:49', '225.196.143.151', '156.13.128.160');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        71, 0, 0, 'support4@lumina.local', 'Teresa Moreno (Soporte)', '[
        "ROLE_SUPPORT"
    ]', '$2y$04$qba9WYtbrAXFF8cIh9u6CulJiAsJ/R/nEHmnQ2U4Dg.dJG6bvGQA.', 0, 1, 1, 'Personal de soporte',
        '2025-02-17 16:33:49', 9, null, 'e2744bcdd3863a270192ff86f88ebf064194dfd6', null, '2024-10-10 09:14:26',
        '2020-03-18 18:47:15', '243.146.167.67', '108.151.53.226');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1510228250519-147d1b701bda?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        97, 0, 0, 'support5@lumina.local', 'Carlos Jiménez (Soporte)', '[
        "ROLE_SUPPORT"
    ]', '$2y$04$g40I6zxxHgtj0lBrxfQYGupd8EWlzol7vxD91d/9wjKW50/b/XCfu', 1, 0, 1, 'Personal de soporte',
        '2025-01-08 18:31:55', 10, null, 'cd0242d43785e92d4f24c1f988f67b2ee0c78d7d', null, '2024-11-11 10:40:58',
        '2006-03-01 14:55:51', '92.109.251.168', '132.252.233.30');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        20, 1, 0, 'client1@lumina.local', 'Alejandro Pérez García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$tsNeGEN3hTb8SKJvI24gLOvD2.NboJNL53OjLdApUUYGv9fEZTHiy', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-06 16:47:03', 11, null, 'ff59a4a55c190b993e2dd1a5f9ca393b45fd1f59', null, '2024-09-14 11:55:47',
        '1975-02-01 00:32:54', '133.106.115.248', '82.115.172.143');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        21, 1, 0, 'client2@lumina.local', 'Marina Fernández López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$HIAsSGRtHPGtfagU66r6HuCMTQ4rbFxAtO8YYCzqi/IUu/AO4JW9C', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-03 11:34:13', 12, null, '4077840ad3b51efcaab57a04653d209ab883e5af', null, '2024-09-28 05:46:08',
        '2009-01-12 12:59:30', '108.229.156.40', '24.52.245.239');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        11, 1, 0, 'client3@lumina.local', 'David González Martínez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$ROab6.KA3FPFkuGm4gGYUuatBNImz2WPAb4LWdVHHZU0vXgQqG23u', 1, 1, 1, 'Cliente de Lumina',
        '2025-01-10 06:43:30', 13, null, 'd41da1283ac7dcf6593783e63312bfbe4618193b', null, '2024-08-15 17:36:20',
        '1992-10-24 10:39:26', '60.20.54.195', '231.141.111.102');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        49, 1, 0, 'client4@lumina.local', 'Elena Ruiz Sánchez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$kza2m6FyLorAyR0yGJVPqe1EmgvOb3FRtL6/Wh6DMF89zSbTP7QQW', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-15 14:21:11', 14, null, 'de75448664796a1ad3ba9885adbc9a7fb2d97ebc', null, '2024-05-10 06:34:24',
        '1999-08-22 07:01:08', '39.125.116.224', '145.147.107.169');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        44, 1, 0, 'client5@lumina.local', 'Pablo Navarro Torres', '[
        "ROLE_CLIENT"
    ]', '$2y$04$VuOaJmcqZvW/fvDOkGLYfOgHbyN0HazXCTIbee3PUurtGUW.t3dk.', 0, 0, 1, 'Cliente de Lumina',
        '2025-02-05 06:35:21', 15, null, 'f4626eae99256462d6ec9f55351faf419e1a910e', null, '2024-09-17 03:30:58',
        '2012-07-02 08:59:51', '9.198.80.30', '24.223.156.232');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        28, 1, 0, 'client6@lumina.local', 'Laura Romero García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$2Jy0KYLWPB3GSiY39eQTFeNcawv7u/3Vxo3LKu/Nsg2M4ZXJE/RT6', 0, 0, 1, 'Cliente de Lumina',
        '2025-01-07 19:44:49', 16, null, 'aebbe7bcc962c06db469e85fc18ec56fc89d28d6', null, '2024-08-28 21:35:22',
        '2019-04-27 22:32:07', '210.20.242.209', '42.243.78.115');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        18, 1, 0, 'client7@lumina.local', 'Francisco Castro Rodríguez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$ZVk6U9wH1kfkKMETBhyGK.gI1n2f4nvIMr/nQ5qDhVYBaJE84Dk5W', 0, 1, 1, 'Cliente de Lumina',
        '2025-02-19 11:44:41', 17, null, '42025096bd0db03cd0add5addb40618d59884443', null, '2024-03-04 01:56:46',
        '2025-12-18 05:15:30', '200.232.8.42', '9.49.135.162');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        13, 1, 0, 'client8@lumina.local', 'Beatriz Núñez López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$D.fOA1iP8K660pBubevxd.OU.9glhzZM8M6s7gW8nfJvPWojCev.q', 0, 1, 1, 'Cliente de Lumina',
        '2025-01-14 09:17:39', 18, null, 'c82a2a37a46310b88dc5ec4c99f2dd6037434cd2', null, '2024-10-15 04:52:44',
        '2017-08-23 02:06:03', '114.83.93.112', '5.78.39.218');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        49, 1, 0, 'client9@lumina.local', 'Jorge Vega Martínez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$4oZpFQMeDUftnqlQY5wqiOGRRkaBV44O8lvHWkhlM4phMGH3O3cw.', 0, 1, 1, 'Cliente de Lumina',
        '2025-01-20 09:16:17', 19, null, 'ac8370640aeb2cc2c1a66aa3a4ffe11136f01de5', null, '2024-11-08 22:31:12',
        '2012-07-12 06:34:52', '89.252.182.118', '205.4.54.43');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        15, 1, 0, 'client10@lumina.local', 'Patricia Silva García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$0.pzonVoVnNz/97.AG00eev7dK7869HXTF6.rDIEVl/bHzt0oRd32', 1, 0, 1, 'Cliente de Lumina',
        '2025-02-12 14:15:19', 20, null, 'eb034636663ec48b1a1d6e896099aec1ece62e57', null, '2024-02-22 18:36:19',
        '1999-08-04 21:25:45', '128.62.3.219', '232.113.19.239');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        38, 1, 0, 'client11@lumina.local', 'Luis Vargas López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$X0N9YgXv0l8Qm6sDRnHrMOySDIqmfn2adHuHrQlvAIwu5X8xZ7yhS', 1, 1, 1, 'Cliente de Lumina',
        '2025-01-05 00:46:13', 21, null, '9501cea76f438c46df7156cdf0b15e8d1485d3a9', null, '2024-02-16 22:50:18',
        '2010-10-02 19:15:20', '60.148.179.4', '156.159.182.103');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        30, 1, 0, 'client12@lumina.local', 'Marta Campos Sánchez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$B6xnej2t5ICeZFDBkeu5Lus3jBTk0cmwbuj0bMzlFkK7EzGG63lIq', 1, 0, 1, 'Cliente de Lumina',
        '2025-01-11 05:32:20', 22, null, 'd7ee59702fb60434878bc8342d245054283fe70e', null, '2024-10-26 10:45:45',
        '1995-02-12 13:47:47', '51.30.8.42', '44.99.17.53');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        22, 1, 0, 'client13@lumina.local', 'José Delgado Rodríguez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$HmPn.1MHdOpNEU.KRzqWl.s4umeIrS3bvYDWk0m32rozCdM3kbKH6', 1, 1, 0, 'Cliente de Lumina',
        '2025-02-28 13:36:59', 23, null, 'dff1b3f6f55cf7b83dde72de6f5a8a7d36c8964d', null, '2024-10-09 20:31:22',
        '1995-03-27 21:50:36', '179.127.14.249', '30.174.109.35');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        30, 1, 0, 'client14@lumina.local', 'Rosa Molina García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$fSm12vHbvyUsTEsc31djhOUdYf2DOUI3JGbcnVqnPwmUJ2dAl3SiS', 1, 1, 1, 'Cliente de Lumina',
        '2025-02-09 03:18:18', 24, null, 'c069106e382a5bd8effe3e2261fa9c30a5251ac7', null, '2024-04-14 23:51:46',
        '2024-12-07 04:52:47', '246.118.123.207', '96.41.108.155');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        43, 1, 0, 'client15@lumina.local', 'Manuel Cabrera López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$29OtWFJuxr285yAZVF2pGuqE8MwiEBwZT2jWBAjigoCG0aVEiblcm', 1, 1, 1, 'Cliente de Lumina',
        '2025-02-02 00:44:34', 25, null, '527fd4d07fdd045d2c3ab9f64715201fb2547326', null, '2024-01-24 16:08:36',
        '1979-02-06 12:55:11', '103.3.183.62', '161.189.126.62');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        39, 1, 0, 'client16@lumina.local', 'Carmen Soto Martínez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$/YfPbRtYRWVXY5DDrQysNeyu3V6Wtnwb6ygQzGHLLOQ0k7yAURaNW', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-06 20:26:52', 26, null, '718049c85fbe1110358156d7743b8b3856717e50', null, '2024-07-01 02:25:57',
        '2017-04-16 00:54:51', '208.215.161.245', '33.28.113.163');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        18, 1, 0, 'client17@lumina.local', 'Antonio Medina García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$iA7cYvjkHv/e8oaHvMoJYOIpPMPlFqDMeTJKrCY1kaoAg4d5bPCZy', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-14 01:52:09', 27, null, '134ebbf6ee3ad111013578859b079fe6b3b4063a', null, '2024-06-27 07:23:49',
        '2010-02-19 15:23:09', '88.172.22.237', '124.85.48.102');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        25, 1, 0, 'client18@lumina.local', 'Lidia Iglesias López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$0D8EZb/VtRXgBt81vUzpqu5d46F7TI1v63eutM5F2VYUVhl379tjO', 0, 0, 1, 'Cliente de Lumina',
        '2025-01-27 23:19:45', 28, null, '6ab4013889dffe1c674016a48700a8fda0e8c8a3', null, '2024-11-18 23:19:02',
        '2022-11-05 04:46:53', '206.32.212.12', '151.103.68.175');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        44, 1, 0, 'client19@lumina.local', 'Enrique Flores Sánchez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$vy1FfV42PM3xIPMnBJymkunKIaU6AfW3BW1n7/Vsal5JpUqSSRxa6', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-02 18:29:41', 29, null, '48ef8d69918396075640696e92d2bff0d6ad9447', null, '2024-02-05 16:06:22',
        '2022-05-05 23:07:33', '71.45.37.151', '2.15.85.229');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        11, 1, 0, 'client20@lumina.local', 'Isabel Morales Rodríguez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$2lMLkdbzR/n9ld4qvZ54WOBqm.gueq4k6kXjTQS4fxXipWAE4m/CG', 1, 1, 0, 'Cliente de Lumina',
        '2025-02-26 23:31:13', 30, null, '441597329bc23061e3c5c9fd19af246eb6101bb2', null, '2024-01-01 03:17:47',
        '2022-02-05 06:59:30', '219.94.246.25', '25.103.192.81');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        23, 1, 0, 'client21@lumina.local', 'Cristóbal Rivas García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$x8KIxzKSoRQ3r.ysR9yhM.jLvxghnhVyzcLn3pnlujScrS4//QGzW', 0, 0, 0, 'Cliente de Lumina',
        '2025-02-24 19:35:17', 31, null, 'e642afc0059748cc64688a7ce9e733d469812f2a', null, '2024-02-14 12:13:52',
        '2005-12-14 02:14:38', '110.185.246.29', '130.226.232.182');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        11, 1, 0, 'client22@lumina.local', 'Dolores Aguirre López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$VjKBcrYQ84UUnL6XXxC0Au/55DOwjKTVV3lDquJNbnABl3RHRIrq2', 1, 1, 1, 'Cliente de Lumina',
        '2025-01-19 01:18:08', 32, null, '4d8cde69a11558e5474b5a87222b07b8e2aacff2', null, '2024-12-24 08:36:44',
        '2003-09-18 21:57:58', '36.51.145.69', '246.170.223.155');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        36, 1, 0, 'client23@lumina.local', 'Emilio Barrera Martínez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$bF0qxFsOJia.JwQK9ibv9.18EKszdT.x1ruVm0hOWKXV9M6JtMndC', 1, 0, 0, 'Cliente de Lumina',
        '2025-01-17 03:48:37', 33, null, '97a2dc482c96e2001f60fafa89a4c4a4f5063b32', null, '2024-07-18 04:07:39',
        '2002-10-17 03:10:49', '174.207.143.246', '217.158.40.125');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        22, 1, 0, 'client24@lumina.local', 'Fátima Cordero García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$kSTR/FxOPvY71XWmGvNPXeTloeyT/8k5J/oc0cksdYykPPFKFaAhm', 0, 0, 0, 'Cliente de Lumina',
        '2025-01-11 07:04:42', 34, null, '75166627e45fdec1346115ef42124f050e5ab29d', null, '2024-03-02 00:16:15',
        '2025-09-11 11:35:09', '46.236.218.246', '150.217.142.99');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        36, 1, 0, 'client25@lumina.local', 'Guillermo Dueñas López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$NAiWfhr/lNliRmKDK6/FH.sPNAu5QRb4DYkbYpQcTLnxWJTpTT4bS', 1, 1, 1, 'Cliente de Lumina',
        '2025-02-06 14:15:40', 35, null, '0865534bda39eb7676a06a5913bbc4af60d2851e', null, '2024-10-05 15:58:33',
        '2005-04-18 00:49:41', '30.122.75.179', '213.90.12.152');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        23, 1, 0, 'client26@lumina.local', 'Helena Escalante Sánchez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$2zx.UDYeE8vFEVBuQDPllelXk9rpm68UnJVNeGprkt452/0Ek2BXG', 0, 1, 1, 'Cliente de Lumina',
        '2025-01-18 01:07:26', 36, null, '3071d1a212d957d2f550e44bde25f118ac8ecca2', null, '2024-06-20 18:15:03',
        '1981-02-23 01:05:37', '196.77.102.42', '223.66.13.220');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        46, 1, 0, 'client27@lumina.local', 'Ignacio Flores Rodríguez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$QisxBxBLOqhfs9PsQ2p4PuImgpfMEmZNEvVDc7ym0jS.pIu85SmMq', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-24 19:31:06', 37, null, '5bf62c0d2768281c4e44c7ce123f68af99a38b2b', null, '2024-04-18 03:22:45',
        '2020-05-09 07:45:44', '20.133.249.115', '126.20.27.175');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        40, 1, 0, 'client28@lumina.local', 'Josefina González García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$miSTupFkani0SAXcrkl9X.Y6xcI8IHvAsiS.0BJprZk7ESRgIF/pa', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-01 05:09:00', 38, null, '980bde7426c5d4b5a43df7c3c3f4b43054123b87', null, '2024-10-18 20:44:49',
        '2025-04-15 13:48:22', '246.64.104.174', '199.84.225.167');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        48, 1, 0, 'client29@lumina.local', 'Leopoldo Herrera López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$e8mbo9KxnM0ZfQb6N18Uo.AYh756x/3FIE2wXiZ0kTpftmPQ8F7BS', 1, 1, 1, 'Cliente de Lumina',
        '2025-02-23 09:11:26', 39, null, '566c18f656dc4036b1221bd666a22060a4310fa6', null, '2024-05-10 03:36:59',
        '2019-05-07 01:12:16', '149.151.59.191', '130.56.51.188');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        47, 1, 0, 'client30@lumina.local', 'Magdalena Ibáñez Martínez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$E1I4e0FxmvJ8RTF0cQ5VaujIPHRd4Y1xj69hgfL.UFV5hytsY6.2u', 0, 1, 1, 'Cliente de Lumina',
        '2025-02-09 18:57:56', 40, null, 'a298454abb2e17b130b19d71579da9e7a94c6652', null, '2024-03-01 19:42:59',
        '2010-05-16 17:55:15', '74.0.228.251', '244.151.65.233');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        46, 1, 0, 'client31@lumina.local', 'Nicolás Jaramillo García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$nI3U487hLxt6UyE4EBkQPuDg4.eRCPNvYDkGD8elyD5Q5Aj7hZ55O', 0, 1, 0, 'Cliente de Lumina',
        '2025-01-26 07:42:12', 41, null, '24fee999d69bbd9b4644f63c081f9b84942eef19', null, '2024-12-16 20:31:30',
        '2000-01-04 00:48:49', '22.15.211.28', '121.23.186.14');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        46, 1, 0, 'client32@lumina.local', 'Olga Kauffmann López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$rr0zzeBO3vVMHNIGIu7IVOcJ7MQ0obUOEYVW8j2Hidc4g/2JCTQnm', 1, 1, 0, 'Cliente de Lumina',
        '2025-02-25 17:21:18', 42, null, '9789ec2496f701045d521410a46dc49e0e5f5ec5', null, '2024-04-27 20:49:18',
        '2020-05-31 14:10:51', '3.193.125.92', '226.152.169.144');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        46, 1, 0, 'client33@lumina.local', 'Pascual López Sánchez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$JKyNGaIjwG.9ma.M.BMuteNpO6WRcQqDLzBMs.Sd.i1H23krv747C', 1, 1, 1, 'Cliente de Lumina',
        '2025-02-25 11:59:49', 43, null, 'cd57a438103effe13b0994761b59615670cd2055', null, '2024-12-06 05:42:03',
        '2017-05-12 03:28:49', '105.59.202.241', '128.122.34.76');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        31, 1, 0, 'client34@lumina.local', 'Querubina Márquez Rodríguez', '[
        "ROLE_CLIENT"
    ]', '$2y$04$Q2l4Fs41gGReBItg5hj86ezK.weEJ5xfYYLz2djWsh47Mxhi5H7Lu', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-28 12:37:14', 44, null, 'cb2aa9b783302fa2d43aff901775b19fbc0aa86f', null, '2024-07-22 19:06:41',
        '2020-01-09 03:44:13', '167.209.69.47', '30.154.186.36');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        15, 1, 0, 'client35@lumina.local', 'Roberto Nieto García', '[
        "ROLE_CLIENT"
    ]', '$2y$04$4DRlI0l4ry96W33fAv29veGpPzqJYGo5/C7hIFfdoNo2GQ812YF0S', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-02 08:47:54', 45, null, '45703576c1ed639b4e4f6891e6779d72f6b5b82e', null, '2024-10-07 09:35:47',
        '2001-07-17 23:41:45', '151.243.131.147', '34.201.59.241');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        43, 1, 0, 'client36@lumina.local', 'Serafina Ochoa López', '[
        "ROLE_CLIENT"
    ]', '$2y$04$ludxEt1718/f7A5ERKRwi.HXHcXKiRKmuZvEmp/CcN8KgrFOs61lu', 1, 0, 1, 'Cliente de Lumina',
        '2025-01-25 13:59:11', 46, null, '68d4534c93653956efe2ec5cc695f1fb4a1e6426', null, '2024-04-16 04:03:58',
        '2016-08-16 20:43:26', '2.54.96.68', '171.186.141.123');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        28, 0, 0, 'user1@lumina.local', 'Teófilo Páez Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$LCsHLd0Aj0BgcGc1l5qvtutVZtc2BMuwzrzIJXw1Jl7AeGr.wN1Ki', 0, 1, 0, 'Cliente de Lumina',
        '2025-01-04 08:54:11', 47, null, 'e4efbbc742a52d80d71cfa77f5b97ee9baadbca5', null, '2024-04-23 12:27:56',
        '2016-02-26 13:40:58', '249.124.73.173', '210.243.211.81');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        39, 0, 0, 'user2@lumina.local', 'Úrsula Quiroga García', '[
        "ROLE_USER"
    ]', '$2y$04$bkuLfW6T/xRW3mkrnl1iwuhlpsLGsSimlbEWUjtflUIPcHtHXyOpO', 1, 1, 0, 'Cliente de Lumina',
        '2025-02-16 16:54:25', 48, null, '90023a0d392a2e277b50fdd8c5ffaf6c48644190', null, '2024-07-27 09:59:02',
        '2026-02-17 10:35:11', '39.151.143.130', '158.60.154.84');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        34, 0, 0, 'user3@lumina.local', 'Valentín Ramírez López', '[
        "ROLE_USER"
    ]', '$2y$04$m85KHxvyNF4G2kASM9XnOePNkhwq2H18UiaY/UZMsqXhYjAR6UbtG', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-16 18:12:59', 49, null, 'caff25e3c9d667ebeb297de85b2253c2fd4c6142', null, '2024-01-08 14:51:31',
        '1998-11-11 03:36:42', '103.105.196.185', '175.112.214.51');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        32, 0, 0, 'user4@lumina.local', 'Wenceslao Sáenz Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$e386hagdCFYJMqzrHPMeHurzeJLLsIN3oJrR4YpywFGgxjwiNaouO', 0, 1, 1, 'Cliente de Lumina',
        '2025-02-05 04:19:56', 50, null, '11b5dfef332f3f1d4335e09d8bbaac28e1ac59f7', null, '2024-02-22 18:48:55',
        '2019-04-20 19:20:38', '203.93.120.171', '152.165.222.109');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        29, 0, 0, 'user5@lumina.local', 'Xenia Téllez Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$GMgEISIUrCglo0Zqs0ACme06Yr18PSFI.96dMpUEEk5kKg8buafEO', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-23 05:20:36', 51, null, 'b5749ed7863738683851f9cf79d21395ed4ca549', null, '2024-11-15 09:03:00',
        '2015-09-11 20:22:47', '211.195.178.3', '168.147.233.154');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        50, 0, 0, 'user6@lumina.local', 'Yolanda Ureña García', '[
        "ROLE_USER"
    ]', '$2y$04$6BVeScvIz3hOcxXpl2OXi.mefyVYYGJFxJX4AbzMsYWpyq/emz31y', 1, 1, 0, 'Cliente de Lumina',
        '2025-02-15 22:22:18', 52, null, 'c28baf995df2503b49890eb8a4a1b092620fd719', null, '2024-07-25 10:39:06',
        '2016-06-25 17:04:12', '152.159.4.89', '180.3.76.121');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        39, 0, 0, 'user7@lumina.local', 'Zacarías Valdebenito López', '[
        "ROLE_USER"
    ]', '$2y$04$VSFVmeoHTW6CiLIoBXwtgufwA7BuHpgA9BZLDC6HC0QKbMQYxv2Mq', 1, 0, 1, 'Cliente de Lumina',
        '2025-01-28 12:35:33', 53, null, '9169d2411f1d571a11875bf34bd25b36d73f3c7f', null, '2024-03-24 01:30:41',
        '1989-10-29 03:53:15', '59.130.203.23', '202.14.233.246');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        30, 0, 0, 'user8@lumina.local', 'Aarón Villalba Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$I5na4n4ccBtT4eqrpL2gw.QHg.rlmhr2V1G9a/2MOFcLGxeiIEYS6', 0, 0, 1, 'Cliente de Lumina',
        '2025-01-20 20:09:54', 54, null, '52e6f70b788a9c15fb3be6e6313b10d3f1037fed', null, '2024-11-28 02:32:56',
        '2025-01-01 06:25:25', '143.144.209.50', '115.247.247.195');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        24, 0, 0, 'user9@lumina.local', 'Belinda Weissman García', '[
        "ROLE_USER"
    ]', '$2y$04$brF.1I4nRldHbS7b5VCzaOOq3Kw.PZryuIrz2Zhnf6ucOGFVed2Wq', 1, 1, 1, 'Cliente de Lumina',
        '2025-02-12 15:18:12', 55, null, '2c0bd3241fee27997341ae9006ca3ad83c6c79e1', null, '2024-12-08 22:33:29',
        '2025-03-12 10:50:12', '177.171.236.22', '30.37.199.145');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        20, 0, 0, 'user10@lumina.local', 'Celina Ximénez López', '[
        "ROLE_USER"
    ]', '$2y$04$e2eoFw0LfYqmAykv9skQeusIcY//WHtYcphfM686Ra0AfhVKxpnmq', 1, 0, 0, 'Cliente de Lumina',
        '2025-01-18 12:22:10', 56, null, '0fbcd848e43e072bb4a88f4910146f8c773b6ddd', null, '2024-08-28 22:52:07',
        '2009-05-03 14:01:22', '139.34.21.147', '111.178.112.144');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        21, 0, 0, 'user11@lumina.local', 'Dalila Ybarra Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$A5VS9dgLRAwhNEEfYTkEw.opqcloZsquVJbJc61zBCbedT1pYkiCG', 1, 1, 1, 'Cliente de Lumina',
        '2025-01-02 00:42:16', 57, null, 'ffd4d885d4e9ffb0bcc0cfa1a3d6cf7775c78a4d', null, '2024-01-24 04:47:29',
        '1984-08-25 18:50:58', '185.77.25.80', '32.76.184.72');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        44, 0, 0, 'user12@lumina.local', 'Evangelina Zambrano Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$f9ST8ybwoV/IPy0Ap4kqgujnxyOyMGORpIiqhTftM2egkmBvM96ju', 1, 0, 0, 'Cliente de Lumina',
        '2025-01-23 12:01:47', 58, null, '75562d03c10a5d4fd08ea23b10be58fb5ea52bb5', null, '2024-01-19 10:46:11',
        '2002-05-12 14:01:59', '58.117.170.234', '93.174.173.149');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        38, 0, 0, 'user13@lumina.local', 'Francisca Abad García', '[
        "ROLE_USER"
    ]', '$2y$04$0AyvbAGHbv8KlhhG0ef/SePuQhwtg9WSA.JL4qtlBliAyWAHdQEV6', 1, 0, 0, 'Cliente de Lumina',
        '2025-01-08 17:19:36', 59, null, 'f832e37f5061468f19a3c9dc79869398a5977950', null, '2024-05-08 12:22:50',
        '2012-11-13 10:51:09', '144.0.31.106', '233.8.115.204');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        29, 0, 0, 'user14@lumina.local', 'Geovanna Acevedo López', '[
        "ROLE_USER"
    ]', '$2y$04$GpJ4Do0GYAGrfDSt/wtLcuhf7KHa5/1Tdiev2r.KORgbJOUyuMQHG', 1, 0, 1, 'Cliente de Lumina',
        '2025-02-21 03:13:11', 60, null, '09742217294056f9553851a83f523e1f347b04f4', null, '2024-02-15 10:44:48',
        '2014-10-01 12:28:54', '30.181.155.49', '126.86.155.41');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        18, 0, 0, 'user15@lumina.local', 'Herminia Alfaro Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$uYzV060/mpVkjFW5WhDjFuwIQnu03Jo8W8L0XEdY859luwMKqorhu', 1, 0, 0, 'Cliente de Lumina',
        '2025-01-07 02:41:57', 61, null, '70505b026647416bf553a6fc579d466bff15b14e', null, '2024-02-09 23:40:54',
        '2021-05-06 13:52:28', '115.209.167.143', '113.113.107.50');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        49, 0, 0, 'user16@lumina.local', 'Isidora Almonte García', '[
        "ROLE_USER"
    ]', '$2y$04$z1/qqhuoB3JYJFOcmtj.8.O9Q9R2pmIfiTL09trz3FkazVKPy4qOy', 0, 0, 1, 'Cliente de Lumina',
        '2025-02-03 15:28:32', 62, null, '73d1fd5ac9c3248d1c3bad863ad74c648f45cb8f', null, '2024-12-13 10:26:52',
        '2017-11-13 03:28:21', '253.95.29.50', '88.19.156.91');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        36, 0, 0, 'user17@lumina.local', 'Jacintha Araya López', '[
        "ROLE_USER"
    ]', '$2y$04$OneQKaZdhwpR8uYm7aLhwuzXN8Ona34QLghX2TqcEdiNs008IvTZ.', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-13 07:26:42', 63, null, '48c3c54df4959c58de82b18e23fb1ae3f6f64af3', null, '2024-06-03 12:21:05',
        '1997-04-14 01:34:53', '122.95.161.24', '253.201.89.5');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        29, 0, 0, 'user18@lumina.local', 'Karenina Azofeifa Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$arWyouY.PW5R9ZSuRY6gd.kvjJC6ywcx16.aOU2sXCZw2BpLsOH/m', 1, 1, 1, 'Cliente de Lumina',
        '2025-01-07 15:09:30', 64, null, 'a53a53578a9917ed9595ac2428c136a40981b987', null, '2024-08-03 23:07:11',
        '2019-10-01 14:41:51', '219.174.121.145', '170.149.228.202');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        21, 0, 0, 'user19@lumina.local', 'Lorena Benavente Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$Zu7VTPgrkMMcGtKKGmfyIuLjlVy4XurwK1tp6rTDHtUs8uabIRAZi', 1, 1, 0, 'Cliente de Lumina',
        '2025-01-23 11:16:00', 65, null, 'b57f3f4b129d70c408dfe20d7d866d9dbf542423', null, '2024-09-08 18:21:59',
        '2017-07-30 04:50:39', '201.5.22.86', '86.135.221.132');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        35, 0, 0, 'user20@lumina.local', 'Marcelina Brenes García', '[
        "ROLE_USER"
    ]', '$2y$04$ZCIhguPtQPKg/WTamUxUHuy4zCU5SQx1OuaCgaNZ52HeZYUVZeR8O', 1, 1, 0, 'Cliente de Lumina',
        '2025-02-18 04:16:28', 66, null, 'cb87fc9a9cd41099038bc94fa7bdffa1119be33d', null, '2024-08-12 12:17:24',
        '2016-10-10 03:09:51', '32.235.17.92', '71.65.201.15');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        15, 0, 0, 'user21@lumina.local', 'Natividad Carballo López', '[
        "ROLE_USER"
    ]', '$2y$04$US7LSgli7e/TINYLBb4ouOGjA1q7Q56p7C9PDpN36qmhpdtkK0fHG', 0, 0, 1, 'Cliente de Lumina',
        '2025-01-22 22:22:19', 67, null, '5387ed2f9fd166fad1192b23feb3785868f6b969', null, '2024-04-12 02:49:17',
        '2020-06-24 19:25:10', '108.99.58.134', '234.232.255.225');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        35, 0, 0, 'user22@lumina.local', 'Ofelia Cascante Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$39xL2Yu2MaZ8cPg.h5O7m.g4K.ESP4Da3ebUYn8Fg6XP7NrI2Clhi', 0, 1, 1, 'Cliente de Lumina',
        '2025-02-04 05:37:00', 68, null, '9ca1ed84812f402aed2fc1f6914102ce420ce519', null, '2024-08-06 09:38:46',
        '2003-11-04 04:45:43', '248.212.122.44', '152.161.97.118');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        22, 0, 0, 'user23@lumina.local', 'Patrocinia Castillo García', '[
        "ROLE_USER"
    ]', '$2y$04$zjqVjBX3Nm0ago4H7HosEO2.FVERJnrleLYQ.ur76WueCc2kq2yjm', 1, 1, 1, 'Cliente de Lumina',
        '2025-01-07 08:24:44', 69, null, '0b0df43f6ba81dcd45bde9de36ebb1e8665a9b57', null, '2024-07-04 13:17:41',
        '2023-01-13 02:27:01', '67.182.66.59', '31.66.220.213');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        21, 0, 0, 'user24@lumina.local', 'Rebeca Castallanos López', '[
        "ROLE_USER"
    ]', '$2y$04$/2JVuu7I9/SAYmOfdV0FveVJPe7iM2dZt4dA7WJ1lPUq8J9XZtL2C', 1, 0, 0, 'Cliente de Lumina',
        '2025-02-17 05:43:07', 70, null, '136796bccde6855c9867d9b6fcf4c74c8cea4102', null, '2024-10-09 12:16:03',
        '2007-11-05 12:53:05', '224.152.139.45', '155.254.209.45');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        1, 0, 0, 'user25@lumina.local', 'Óscar Blanco González', '[
        "ROLE_USER"
    ]', '$2y$04$bp0zXGDlLIepd.Z/0bXXlu1TGDUJ/TdxtneQ528pKX8UX1wk.CCHW', 0, 1, 1, 'Usuario de Lumina',
        '2025-02-12 10:11:25', 71, null, '4b12d860141d0035ed99a138ff2f5ff19e8ebfdd', null, '2024-10-20 15:30:19',
        '1998-07-30 04:56:51', '161.236.199.69', '69.25.243.97');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        15, 0, 0, 'user26@lumina.local', 'Natalia Contreras López', '[
        "ROLE_USER"
    ]', '$2y$04$wrb2Z5cX4gnhK8b6266Kk.keubS9M0GY1bIkfptRyJddm1YBQiwj.', 0, 1, 1, 'Usuario de Lumina',
        '2025-02-19 19:58:56', 72, null, 'c99fca4ba1992b9e7ba592b523f286af6a6e7ac2', null, '2024-08-23 01:44:32',
        '1976-07-27 19:19:50', '135.122.95.251', '132.52.245.124');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        16, 0, 0, 'user27@lumina.local', 'Víctor Salazar Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$DVUJoHuArqXX.ZnpUT.OH.X.wZix4An1yiLjSKgtjEC7dCplihEMu', 1, 0, 1, 'Usuario de Lumina',
        '2025-01-26 14:08:40', 73, null, '9f73769f24e5ae766d3e95dae9ed87e3fffca925', null, '2024-04-11 15:20:44',
        '1990-03-13 12:49:04', '65.164.170.205', '214.116.220.153');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        6, 0, 0, 'user28@lumina.local', 'Andrea Ponte García', '[
        "ROLE_USER"
    ]', '$2y$04$YrSAo5am7sBwxIMnZLpA/OxqbSIMA/qqVifI3JLmsZG3ERp3408Ny', 0, 1, 0, 'Usuario de Lumina',
        '2025-01-19 19:24:39', 74, null, '26d1fe219837b9e3696b6b39c76fb9b7ae1d8990', null, '2024-11-25 00:59:18',
        '2015-07-12 16:16:15', '87.241.141.236', '146.141.61.210');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        39, 0, 0, 'user29@lumina.local', 'Tomás Bravo López', '[
        "ROLE_USER"
    ]', '$2y$04$yLbcWQlt3WEQ.PzV8fKypu6aGg2.IzWp98Z82C/FE8Bb79poaqxI2', 1, 0, 1, 'Usuario de Lumina',
        '2025-02-18 02:09:30', 75, null, 'fcda316c59aa871af5332e6d9ab78430726b1e8b', null, '2024-03-07 17:15:14',
        '2003-12-17 09:52:26', '161.39.111.138', '4.111.149.123');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        40, 0, 0, 'user30@lumina.local', 'Verónica Acosta Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$Y8ZXqUBJXVTC.fSj9A7K2OAIjXxfbXF5PY4TwvfERmcli0FclAGF.', 1, 0, 1, 'Usuario de Lumina',
        '2025-02-20 13:48:38', 76, null, '4f8abaab3db77ac8db3fc517a6d93ebd25474101', null, '2024-11-05 08:10:29',
        '2016-07-18 05:05:53', '158.81.130.149', '36.21.60.125');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        15, 0, 0, 'user31@lumina.local', 'Rafael Fuentes Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$jrVPCrUUDpkH8DiDBVUJB.JVe8jICm07QM/IlXKAyAbCrNmxL0EFe', 0, 1, 0, 'Usuario de Lumina',
        '2025-01-14 12:45:35', 77, null, '17dc657554dca648ea06c2105761dffd570f29b7', null, '2024-12-07 11:24:26',
        '2020-02-27 21:27:56', '50.72.60.132', '41.56.91.41');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        9, 0, 0, 'user32@lumina.local', 'Silvia Rubio García', '[
        "ROLE_USER"
    ]', '$2y$04$O7yxVaY5am7fzT80yIJE6OGoKiEGW19BWJeOeg1hYeLaGRI/aXjq.', 1, 0, 1, 'Usuario de Lumina',
        '2025-02-02 21:49:34', 78, null, '5827731c3d037b4e54ed3456550bb502edb081a8', null, '2024-06-17 04:59:30',
        '2024-01-05 01:18:59', '192.52.101.141', '210.25.102.133');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        30, 0, 0, 'user33@lumina.local', 'Sergio Cano López', '[
        "ROLE_USER"
    ]', '$2y$04$ZwCo1TugosCZOty2JGla2u5NWZeVqbvDbp7yfQ2ME4STmBZ.2e46C', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-05 12:53:13', 79, null, '2d8b0c9ed52d93e819b2219873c35fc6ccc9357b', null, '2024-09-18 04:52:42',
        '2017-09-10 00:59:33', '137.108.231.177', '222.127.56.121');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        14, 0, 0, 'user34@lumina.local', 'Catalina Ramos Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$UWUrYwGU16RGyWB4hdpXiextynlFIy1LAeKOD2UKy/j/8RQpLxz.a', 0, 1, 0, 'Usuario de Lumina',
        '2025-01-09 21:39:55', 80, null, '393038a216e1cb99fa3e29fcae293c7f54aa7648', null, '2024-03-27 18:44:48',
        '2019-04-05 06:19:16', '228.126.47.138', '51.220.105.190');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        3, 0, 0, 'user35@lumina.local', 'Felipe Solís García', '[
        "ROLE_USER"
    ]', '$2y$04$z2Oo7JefHtzfxP25ck5LreVfPi/RjugZztKHmtBG0vlT825SV.TgK', 0, 1, 1, 'Usuario de Lumina',
        '2025-01-16 17:34:28', 81, null, '76146504a71d31a179fd0c560882694fbcfe7b15', null, '2024-07-26 01:51:05',
        '1976-10-30 19:11:20', '206.226.4.108', '154.90.184.202');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        31, 0, 0, 'user36@lumina.local', 'Irene Torres López', '[
        "ROLE_USER"
    ]', '$2y$04$pjiOISH/qHTFCNhAoaWC8OXVYlVSu6xCp/s/UHUxiBIkX1IP14RDG', 1, 1, 1, 'Usuario de Lumina',
        '2025-02-13 06:24:04', 82, null, '610f97e585f5470315fa1191f02118150d531d6e', null, '2024-01-11 04:34:45',
        '2016-01-17 06:50:54', '224.44.114.155', '137.60.98.153');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        20, 0, 0, 'user37@lumina.local', 'Gonzalo Bustamante Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$DlLoGmb/P.tScm4pjC3qs.CsSUNcb1K5jZHvUzrrkgTrjRDcdksdK', 0, 0, 0, 'Usuario de Lumina',
        '2025-01-23 04:54:35', 83, null, '26a37a9e81e1776d1e90711d5217b57f967cca73', null, '2024-12-10 16:08:03',
        '2022-05-28 05:55:49', '24.188.130.89', '206.148.232.31');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        32, 0, 0, 'user38@lumina.local', 'Vanessa Montoya Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$R9kuRd.qGJpAPWyiG5Tsq.s8ljDFGewtyqp1ahLQK2Y6JVwbzgxES', 1, 0, 1, 'Usuario de Lumina',
        '2025-01-16 10:13:36', 84, null, 'c133754c872849d012faf51f69e21e9ed5fe9416', null, '2024-03-02 11:58:32',
        '2003-12-09 22:15:28', '197.118.8.113', '26.242.226.204');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        7, 0, 0, 'user39@lumina.local', 'Raúl Domínguez García', '[
        "ROLE_USER"
    ]', '$2y$04$pF8/Qa788DxPjFa4s.THpOsSYp4aWZcyxPLfFwIzt61fSAgYmVS4S', 0, 0, 0, 'Usuario de Lumina',
        '2025-02-14 15:11:20', 85, null, '1ab02bc777b70d8397dd4b139f1cd4d62e11bbf3', null, '2024-04-18 15:35:09',
        '1993-01-18 20:54:41', '25.40.182.228', '74.79.105.57');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        27, 0, 0, 'user40@lumina.local', 'Yolanda Sánchez López', '[
        "ROLE_USER"
    ]', '$2y$04$6H9qV8rERplORp881r4Gr.NNVnkESvKXmNCbgcc9hT7tT3Wr7KEIW', 1, 1, 1, 'Usuario de Lumina',
        '2025-02-08 21:29:07', 86, null, 'c7b12a34f35e18348e09a3392bcc6c70f564e0ca', null, '2024-06-13 19:55:33',
        '2006-05-03 07:32:27', '61.207.43.164', '179.244.151.120');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        4, 0, 0, 'user41@lumina.local', 'Arturo Ochoa Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$dgy8h37HnCaIF8bmmypMmu6xzoe/HS.1vOaQwHStQ2PBZaYqjtFyS', 0, 0, 1, 'Usuario de Lumina',
        '2025-01-10 14:46:37', 87, null, '4e6a6cc584c9506d04e2afc79750db3ce8509eca', null, '2024-09-15 15:44:13',
        '2013-09-25 03:47:34', '234.33.145.63', '150.74.34.77');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        14, 0, 0, 'user42@lumina.local', 'Fabiana Guzmán García', '[
        "ROLE_USER"
    ]', '$2y$04$YZ1NM48L9FeGmVmIKVsB7.Zu12A/HLImTAg4xe0DleiYu.gxo83re', 0, 1, 1, 'Usuario de Lumina',
        '2025-01-08 04:58:32', 88, null, '2c91c8d2cf7d1e890d2624097c7364d710d5ac73', null, '2024-07-15 14:32:05',
        '1996-07-30 18:49:30', '210.146.240.25', '184.192.237.198');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        37, 0, 0, 'user43@lumina.local', 'Edmundo Méndez López', '[
        "ROLE_USER"
    ]', '$2y$04$d91R8PBD054sLvAzcEaWkeomapj1XcLDeoKQbyAXILgU1UOH3uyEK', 1, 1, 0, 'Usuario de Lumina',
        '2025-02-21 06:04:29', 89, null, '993313f4a39e88b1145106aeac87c5c36c27175b', null, '2024-11-05 20:29:51',
        '2019-03-29 13:13:11', '156.141.242.27', '234.53.171.1');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        9, 0, 0, 'user44@lumina.local', 'Gloria Leiva Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$lEvmoshJFYOTUrs23C4cd.Pov4LY0Bt23Ji84PhijurRc6MI/ogcy', 1, 0, 1, 'Usuario de Lumina',
        '2025-02-02 01:27:29', 90, null, '0b44c6cad8ee80ddd491253a58918e411a331d5f', null, '2024-12-19 12:09:32',
        '2005-10-04 15:37:43', '151.160.207.66', '185.110.232.141');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        0, 0, 0, 'user45@lumina.local', 'Bruno Herrera Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$6vO1sQfvNyM7odplQ0eZyOEQl7qxOmjiIiGMuHV/ZkrEv1TRTOVyS', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-09 10:36:29', 91, null, 'ba94dcaeb0123d7af2f0349cd7d19fb42a5811c3', null, '2024-02-22 05:37:03',
        '2018-11-11 19:21:54', '163.143.58.100', '13.226.127.189');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        24, 0, 0, 'user46@lumina.local', 'Alma Castro García', '[
        "ROLE_USER"
    ]', '$2y$04$O3zzx75DxNSFy950C9QaT.bj1BI8rIpuoSnjeiYD6/hR.LgrhByyC', 1, 0, 0, 'Usuario de Lumina',
        '2025-02-13 23:20:46', 92, null, '61eb9d7d509b524941bd3c9cee586a5460d9f316', null, '2024-04-10 04:44:51',
        '2023-10-24 23:49:33', '3.214.192.223', '88.243.93.59');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        30, 0, 0, 'user47@lumina.local', 'Claudio Molina López', '[
        "ROLE_USER"
    ]', '$2y$04$BT1rOfTDUG2HlLWlv172ke/0Fovu2gHJ75wj05R9Ur/n.SN5AuJf.', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-28 01:17:52', 93, null, 'c2e5994bee898cf47fd2f104dc80e6312d5fd654', null, '2024-04-04 23:02:25',
        '2009-11-20 01:58:06', '103.78.34.31', '42.177.222.254');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        37, 0, 0, 'user48@lumina.local', 'Dionisia Esparza Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$.mgmdEuDrZwl5/9bYQTP3Ol6nLg586zToLli6yBBYdkQqmldj4UQe', 0, 0, 1, 'Usuario de Lumina',
        '2025-01-05 14:14:37', 94, null, '4a80618e0f595638edd8ecce9f755a1dc85bef7b', null, '2024-06-03 02:01:47',
        '1983-01-13 04:32:26', '173.189.196.32', '65.220.246.148');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        34, 0, 0, 'user49@lumina.local', 'Eugenio Flores García', '[
        "ROLE_USER"
    ]', '$2y$04$rb3MqaJiBjccU6XM/Y9G8OZ0XHPInBKI.0kmmadEehoItpHGNBGcG', 0, 1, 0, 'Usuario de Lumina',
        '2025-01-15 21:28:22', 95, null, 'da75089f4b024cf405544a5455f4476e78991e9f', null, '2024-03-06 03:05:02',
        '2002-09-08 15:06:19', '196.88.11.189', '201.37.142.103');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        20, 0, 0, 'user50@lumina.local', 'Florencia Gálvez López', '[
        "ROLE_USER"
    ]', '$2y$04$cWYvAtG9w8p8T1/su0owXukITZwuj54m04aqingA63jZRM9kq1bIG', 1, 1, 1, 'Usuario de Lumina',
        '2025-02-20 19:35:03', 96, null, '28fbfd0261914f7358b6ead99fefcfe3ac8c28ee', null, '2024-02-20 19:45:04',
        '2019-11-24 06:16:41', '148.45.5.171', '31.17.178.205');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        13, 0, 0, 'user51@lumina.local', 'Gumersindo Hernández Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$RksjGPLBML5s05M5i3q6iu9NVUubyodnKTuUbb9F2Re3DtxOAyJia', 1, 1, 1, 'Usuario de Lumina',
        '2025-02-23 06:31:02', 97, null, '9c3ffaefe0447c421d0b01d0e7ba51611c2f08ec', null, '2024-12-14 05:58:04',
        '1988-04-28 02:26:30', '80.23.69.0', '241.115.73.124');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        24, 0, 0, 'user52@lumina.local', 'Hortensia Ibáñez Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$j0JMmIfcGJLBBe1QtLwplun6pGMmTi4N4NDnPgZoTuoXTceWIyMXy', 1, 1, 1, 'Usuario de Lumina',
        '2025-02-01 20:12:49', 98, null, '274ed0536f0cf0426ff5e1fe2e248e5c8c2c5d88', null, '2024-11-08 14:19:26',
        '2014-10-29 20:59:05', '35.82.129.31', '198.153.60.150');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        16, 0, 0, 'user53@lumina.local', 'Inocencia Jiménez García', '[
        "ROLE_USER"
    ]', '$2y$04$OJCwGNHgLZ8A6PrqcEYY9.ZtkRTTtJILtxXqFLpfHB8q3vK6YdCwK', 1, 0, 0, 'Usuario de Lumina',
        '2025-02-07 20:42:46', 99, null, '0ae26470406395c3816b0a501f6bb035a36c43b8', null, '2024-07-10 01:09:49',
        '2007-06-01 11:27:19', '20.55.169.175', '28.187.90.101');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        23, 0, 0, 'user54@lumina.local', 'Jacobo Kindelán López', '[
        "ROLE_USER"
    ]', '$2y$04$e8xznaxrK1amHs0nLN7//u9BvI1gZsfUf8oq47PYXlsihDPztFFcy', 1, 0, 1, 'Usuario de Lumina',
        '2025-01-08 08:24:57', 100, null, 'a82dfae8da4943e23bb604149bae82a4f58c7e5a', null, '2024-09-26 20:42:26',
        '2014-06-19 15:33:34', '10.247.199.245', '153.47.217.49');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        18, 0, 0, 'user55@lumina.local', 'Kosme Lara Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$HC6Usoq0yby2ORTk1BCTgeaFI3OnOVmGFiT5mXq/prWgCHCLvDrTW', 0, 0, 1, 'Usuario de Lumina',
        '2025-01-07 15:56:58', 101, null, '18f0a5d9596a9b5a7da00ad3e7f0f02d7775e24c', null, '2024-12-02 14:25:28',
        '1991-01-30 09:51:28', '52.30.85.30', '207.213.66.9');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        35, 0, 0, 'user56@lumina.local', 'Leticia Leyva García', '[
        "ROLE_USER"
    ]', '$2y$04$0RCagGgQ1ry5dzGwinGNmeYAfeEkwmAyvR6F1EJrt21Di6AQyEoIS', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-23 01:25:05', 102, null, 'e60b599279a442daf837ec2e7915a62f401f6b46', null, '2024-12-07 17:59:24',
        '2017-11-05 18:53:51', '5.200.50.214', '24.120.50.35');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        22, 0, 0, 'user57@lumina.local', 'Matías Lozano López', '[
        "ROLE_USER"
    ]', '$2y$04$QCIGwUoEZZJYv9tAnHIj0eh7x0XQvsgVrAytaJYS.sHaPaRVPGXJe', 0, 0, 0, 'Usuario de Lumina',
        '2025-01-15 12:56:34', 103, null, 'decc50e910721b3ac64b557801d736dad6010326', null, '2024-12-21 16:44:42',
        '2016-02-27 17:13:24', '170.7.138.121', '126.20.232.189');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        16, 0, 0, 'user58@lumina.local', 'Nemesio Madera Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$SBvR6z3zElvS73NEkE8g9eXWx4Y8BIBSB.QOm8JevsNg8aApCjtLi', 1, 0, 1, 'Usuario de Lumina',
        '2025-01-16 15:56:22', 104, null, 'f39321972aa39ffaecdd9ac50ba1fa023123df80', null, '2024-12-06 21:09:41',
        '2012-10-15 19:59:26', '119.125.55.243', '229.19.235.109');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        39, 0, 0, 'user59@lumina.local', 'Orfilia Noriega Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$tIQL5TtZO1JegkJeeNr8Sem1IzNjoOXw5ErcIE70VZuKAK8fY1ba6', 1, 1, 1, 'Usuario de Lumina',
        '2025-02-25 15:35:25', 105, null, 'c1c6f536817f043adec43f29a7ad653b32ef1a07', null, '2024-03-26 18:08:11',
        '2005-07-08 11:57:36', '228.55.169.145', '155.15.28.74');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        1, 0, 0, 'user60@lumina.local', 'Plutarco Orozco García', '[
        "ROLE_USER"
    ]', '$2y$04$UattEx.IJCqwbflaKaMwxep8wbvg.dsRszoeLVnFQ57iOxgfa6.aW', 1, 1, 0, 'Usuario de Lumina',
        '2025-02-19 13:47:14', 106, null, '4c3f06ab5c443ae4b21d45662c1846012d9cdd6d', null, '2024-09-11 14:34:08',
        '1990-05-03 15:28:39', '16.123.49.187', '205.21.144.0');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        17, 0, 0, 'user61@lumina.local', 'Queta Pacheco López', '[
        "ROLE_USER"
    ]', '$2y$04$DKPAxdSX6wqthKIiaipeKuTivJeGzdcxjifwLChPn5nJTB4NLYhlK', 0, 1, 1, 'Usuario de Lumina',
        '2025-01-11 07:49:01', 107, null, 'ad8db8a5eab4afabbbb9bde50177239d386b15f5', null, '2024-10-20 18:54:00',
        '2008-02-14 12:55:20', '208.175.194.212', '62.172.239.50');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        5, 0, 0, 'user62@lumina.local', 'Romualdo Quiroz Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$3eOXkI/5uPF3Cr9M.BA3HOZyHpoRhFL6hQhBeHaxJ76OY67AAuwfq', 0, 0, 0, 'Usuario de Lumina',
        '2025-02-13 23:44:46', 108, null, 'b22b365b01d17f0c000de3654cd5a9de9ffcf2b3', null, '2024-01-16 04:20:29',
        '1998-05-27 09:14:48', '39.128.15.19', '111.14.24.219');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        29, 0, 0, 'user63@lumina.local', 'Samuela Rodríguez García', '[
        "ROLE_USER"
    ]', '$2y$04$DtWr5b0f0QiZBYvxeLWPbeWCfqGZ0dZPiBly9GZVX4t65P174fGV.', 0, 1, 1, 'Usuario de Lumina',
        '2025-02-04 07:35:24', 109, null, '7ca5b21c046919a16b6508466be14fec96d98cff', null, '2024-09-19 01:35:27',
        '1977-02-27 07:19:03', '112.201.148.32', '155.243.64.119');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        26, 0, 0, 'user64@lumina.local', 'Tiburcio Roque López', '[
        "ROLE_USER"
    ]', '$2y$04$.KtaAPUe0GEdB7jB8rmByezVsmx0l0bLYRcJIQ4OZ0xBtTAKblrlK', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-24 18:16:29', 110, null, '3375e4defc439350d39cf43699f8ff12d85ed80c', null, '2024-02-15 11:53:14',
        '2009-08-01 18:31:37', '151.224.125.54', '121.123.211.10');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        30, 0, 0, 'user65@lumina.local', 'Unai Rueda Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$pbvH7yfSUM7Y2ATvBM5RG.epJeMlCeR.J5Y/vSaGyTxzWhRZ6Htea', 1, 0, 0, 'Usuario de Lumina',
        '2025-01-03 22:18:12', 111, null, '02762605d466d242216b82af60244a376926d96f', null, '2024-08-08 00:23:09',
        '2026-02-10 06:21:43', '14.10.162.165', '168.47.93.158');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        34, 0, 0, 'user66@lumina.local', 'Valeska Salazar Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$Ggqb5xYCSaOMS.l2sdvbBeJlui2LjhK2zC92gWJR2dwb7OGcB3/v2', 0, 0, 0, 'Usuario de Lumina',
        '2025-02-14 00:49:07', 112, null, '04747bd4df525473f26203fde0a88123475ba502', null, '2024-01-21 02:57:46',
        '2017-01-07 14:04:38', '234.93.76.38', '100.230.30.21');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        14, 0, 0, 'user67@lumina.local', 'Waldo Santamaría García', '[
        "ROLE_USER"
    ]', '$2y$04$Twj8NdwHdqz7bkGfGETOKOx66oOMyxp.o3zjj7GFb0xuhvfzq0dF.', 0, 0, 1, 'Usuario de Lumina',
        '2025-02-08 23:40:49', 113, null, '25ff1be7ec70160de294088547370b134381a46b', null, '2024-07-07 00:43:26',
        '2012-03-20 07:36:30', '142.173.197.192', '38.217.155.195');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        21, 0, 0, 'user68@lumina.local', 'Xochiquetzal Serrano López', '[
        "ROLE_USER"
    ]', '$2y$04$J6VBZYgqxja9mCwzZPFMi.Hd7sci22rPwmv3mXN.4mGlYiZLzMAVK', 1, 0, 1, 'Usuario de Lumina',
        '2025-01-04 08:02:15', 114, null, '9c5582981646a663d0108b5c3854f7b81a63a976', null, '2024-12-05 01:57:56',
        '1989-11-08 22:22:39', '26.55.78.10', '73.29.125.99');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        28, 0, 0, 'user69@lumina.local', 'Yamila Sierra Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$Ypv8eVZfSo6y6lHjEfiYoeK4fCTGe0YNNvErCwFUuz7iLINsF0YOK', 0, 1, 1, 'Usuario de Lumina',
        '2025-02-02 22:07:38', 115, null, '3c91ffdaf7ec0108a70ba0c4be0f87d8950e9518', null, '2024-07-21 11:14:04',
        '2021-10-21 20:59:39', '155.237.99.211', '170.3.34.152');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        23, 0, 0, 'user70@lumina.local', 'Zaira Solano García', '[
        "ROLE_USER"
    ]', '$2y$04$4nMjf0LdSJBfFESVAp87pOtFOsSAYlJaAQv8uUIzbI2GT/0J3ApN2', 1, 0, 1, 'Usuario de Lumina',
        '2025-01-11 09:39:43', 116, null, 'beba47777dec0c8b194a7306f97b14ed0a044eea', null, '2024-09-05 17:03:28',
        '2001-09-09 23:51:34', '119.226.12.220', '246.135.102.82');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        39, 0, 0, 'user71@lumina.local', 'Abundio Suárez López', '[
        "ROLE_USER"
    ]', '$2y$04$VJqZgUA6DziMZxFQp4zbVuWoSaVb2ZLF/9GI7p2w20PQuuZAL8Lcy', 1, 1, 0, 'Usuario de Lumina',
        '2025-02-16 16:48:02', 117, null, '75fe74d5740101ee99788702a93b8e5c920281d7', null, '2024-01-18 17:04:15',
        '1991-01-14 01:28:47', '222.198.172.205', '147.134.220.1');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        31, 0, 0, 'user72@lumina.local', 'Brigida Tejada Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$c39.QTEpGcJOspJwfQVYw.Q4Edy35VQxKHq6Ac5EX5dTf0wpghMsi', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-23 21:14:48', 118, null, 'cab7be10ec6574a41a3c3ca4e53b812496f2e9af', null, '2024-10-15 22:15:34',
        '2013-01-30 09:16:59', '115.227.147.138', '39.18.64.173');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        17, 0, 0, 'user73@lumina.local', 'Cesáreo Téllez Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$kfMXk2bHnidqELlZeLN3aeKgCJybu18WZgYOojqiACE3Xmv/bhS4a', 0, 0, 0, 'Usuario de Lumina',
        '2025-02-17 08:04:08', 119, null, '03d0acdc103e2c132618f9c3a7fe4e1255dee19b', null, '2024-02-19 07:56:49',
        '2020-06-22 03:03:56', '17.81.114.86', '116.242.48.165');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        6, 0, 0, 'user74@lumina.local', 'Demócrates Tenorio García', '[
        "ROLE_USER"
    ]', '$2y$04$.7ZG5oEX7M9EVTGpEbSsW.SkRNV6jvuab6v8pG2hnTmcgOm2GNE16', 1, 0, 0, 'Usuario de Lumina',
        '2025-02-04 15:15:52', 120, null, '427532ff17970e7803b658a9a58ab24febd85026', null, '2024-07-21 11:33:18',
        '1990-09-07 22:01:02', '183.49.48.159', '17.141.93.62');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        11, 0, 0, 'user75@lumina.local', 'Everardo Toledo López', '[
        "ROLE_USER"
    ]', '$2y$04$JrwewDdxrTZ6qa.ZMuB0GuGvAT70H9UR76ba.x36GCFW2Souc3B4u', 1, 0, 1, 'Usuario de Lumina',
        '2025-02-01 20:37:20', 121, null, '794fc27a024c4ff3384aa21f0f0229f90d0aa20c', null, '2024-02-20 10:59:46',
        '2018-03-18 07:22:56', '45.208.152.187', '60.20.177.205');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        21, 0, 0, 'user76@lumina.local', 'Filadelfo Tordoya Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$1qWf/SJ7AyBLq7xL64MW1OqvrCEPCBsVUxGJAK5/GOpdRnyGcKQWK', 1, 1, 1, 'Usuario de Lumina',
        '2025-01-10 13:50:43', 122, null, '1fa152e884eeda988c6135111124b0c62bedf683', null, '2024-05-07 01:37:38',
        '1992-12-08 21:07:37', '63.94.151.168', '232.179.98.125');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        6, 0, 0, 'user77@lumina.local', 'Genoveva Toro García', '[
        "ROLE_USER"
    ]', '$2y$04$fp3rQFxyMtjKjSfs8tJuCe8N6PWIkzIJVYzLiu9eix5I1jxgpurd2', 1, 1, 0, 'Usuario de Lumina',
        '2025-01-21 04:16:19', 123, null, '504ac5c726434c18cb307d02969994fdc7c0edc8', null, '2024-03-20 14:53:20',
        '2020-04-22 14:17:02', '150.30.196.237', '130.44.78.116');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        27, 0, 0, 'user78@lumina.local', 'Hermenegildo Tortolero López', '[
        "ROLE_USER"
    ]', '$2y$04$/Z.ssUfCqTUNEsaWIYGxFO.vda9Gw9DMiSpvh5aiwA6w7yzAVNp82', 0, 0, 1, 'Usuario de Lumina',
        '2025-01-21 10:43:33', 124, null, 'b60d26215d26ba3a8b6d800aab279dbd839ddeb5', null, '2024-10-06 11:57:09',
        '2012-01-15 03:14:00', '139.105.212.124', '193.162.136.228');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        1, 0, 0, 'user79@lumina.local', 'Imelda Tovilla Sánchez', '[
        "ROLE_USER"
    ]', '$2y$04$.y9RryavVgLPNfvk6o9F6uEssjZ93yZtGEdb/AZKxBaYa6Vblv4lq', 1, 0, 0, 'Usuario de Lumina',
        '2025-02-26 02:20:17', 125, null, '2662f149b1e8599bc48e15b736e3c38410715c6f', null, '2024-03-26 03:15:26',
        '2025-02-04 08:16:55', '249.161.227.145', '191.241.56.107');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        13, 0, 0, 'user80@lumina.local', 'Juvenal Toya Rodríguez', '[
        "ROLE_USER"
    ]', '$2y$04$qpB2ERSMYYK6XaHCiesXEOpcpHXfo.fomE75PycbRqGqXy6h3e6Fa', 1, 0, 1, 'Usuario de Lumina',
        '2025-02-23 05:38:56', 126, null, '88a6edc9d3f11f02712ea8c6ea7ac1c2f74f9bae', null, '2024-04-28 02:04:35',
        '2014-06-24 06:01:32', '196.3.63.26', '38.23.110.112');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        3, 0, 0, 'user81@lumina.local', 'Kutxa Trejo García', '[
        "ROLE_USER"
    ]', '$2y$04$eskTCwcTtcHjExXEnb2nvOPnphTSqwqQcnZMDM0iJF.5xSW6XUhLu', 0, 1, 0, 'Usuario de Lumina',
        '2025-02-24 19:12:40', 127, null, 'c5530fcab705f69daaa4f657fc8744a4f5638dcb', null, '2024-02-13 17:48:58',
        '2009-03-12 19:51:05', '88.191.106.31', '235.227.48.215');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        4, 0, 0, 'user82@lumina.local', 'Lamberto Treviño López', '[
        "ROLE_USER"
    ]', '$2y$04$HG4nUjhb8S7D2WghoP88heWNzb1PJZBHdIH0oPphS6qqVvVk1L5BC', 0, 0, 1, 'Usuario de Lumina',
        '2025-01-26 11:36:31', 128, null, '248cce21764975e66a6c5620587b9adc277ff96e', null, '2024-09-03 16:44:27',
        '2009-01-10 03:01:38', '79.165.188.127', '166.177.38.142');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        38, 0, 0, 'user83@lumina.local', 'Mariano Triviño Martínez', '[
        "ROLE_USER"
    ]', '$2y$04$G3P5Pm3N2odPnQNSDgEXbuYUlMFEqXIW76dl/HRcW2VWn7E3o2bPu', 0, 0, 1, 'Usuario de Lumina',
        '2025-01-07 21:42:42', 129, null, '31c524ea0372fdc0ccc29c3140fec8ddd69d7ead', null, '2024-10-17 07:04:22',
        '2014-07-14 12:22:46', '146.102.173.146', '254.210.81.228');
INSERT INTO database_db_dev.user (avatar, reputation, client, deletion_warning_sent, email, username, roles, password,
                                  is_verified, terms_accepted, privacy_accepted, signature, last_active_at, id,
                                  banned_until, session_id, deleted_at, created_at, updated_at, created_from_ip,
                                  updated_from_ip)
VALUES ('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=compress&cs=tinysrgb&w=400&h=400&q=80&crop=entropy&fit=crop',
        22, 0, 0, 'user84@lumina.local', 'Néstor Urtado García', '[
        "ROLE_USER"
    ]', '$2y$04$yobmoBSmxAkBbEL8IuXQ7O3N1oHleWHcnbq85BVAeCfkeF7XadyQe', 0, 1, 0, 'Usuario de Lumina',
        '2025-01-07 10:34:20', 130, null, '0f71361e1ac95583fa7b39ca75c3a4d751020f45', null, '2024-06-19 01:25:50',
        '1997-03-10 23:40:02', '129.23.71.115', '241.38.198.126');
