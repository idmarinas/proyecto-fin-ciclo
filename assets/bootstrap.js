/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 14/09/2025, 11:28
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file bootstrap.js
 * @date 27/08/2025
 * @time 20:20
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since 1.0.0
 */

import {startStimulusApp} from '@symfony/stimulus-bundle'
import registerIdmUiBundle from '@idmarinas/ui-bundle'

const app = startStimulusApp()
registerIdmUiBundle(app)

// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
