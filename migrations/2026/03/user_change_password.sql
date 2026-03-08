/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:43
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file user_change_password.sql
 * @date 08/03/2026
 * @time 22:51
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

UPDATE user
SET password = '$2y$04$BS/P2PQp8X1h3wuseOZRTuOYkdTFw2TEYUt4BT3z8A7WBsMwC0EGq'
WHERE id = 1;

UPDATE user
SET password = '$2y$04$h9SUZLGCTk/wqM716wahf.Vc57.AHCnUaTNizJwiwQBaDGvcthcVa'
WHERE id = 3;

UPDATE user
SET password = '$2y$04$.p0nB2dPH6T/CGTh2MyCieOsmqo0uM9J3Q5XhiyQVdaI4yR3I/HnO'
WHERE id = 6;

UPDATE user
SET password = '$2y$04$FDncMkfkM3KB.g3FOBFmz.VpNVO7ibgH8RG7CZECZ2Zt5.VlUvQ8a'
WHERE id = 11;

UPDATE user
SET password = '$2y$04$aj.I6vbckPV99jch30JnTO7Am7pOfkaWp9IE11GieCe5oeUx/2age'
WHERE id = 47;
