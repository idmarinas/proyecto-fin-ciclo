/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/01/2026, 11:04
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file stimulus_bootstrap.js
 * @date 10/01/2026
 * @time 11:05
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

import { startStimulusApp } from '@symfony/stimulus-bundle'
import registerIdmUiBundle from '@idmarinas/ui-bundle'

const app = startStimulusApp()
registerIdmUiBundle(app)
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
