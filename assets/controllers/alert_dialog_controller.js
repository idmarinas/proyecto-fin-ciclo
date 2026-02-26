/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/02/2026, 23:11
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file alert_dialog_controller.js
 * @date 14/02/2026
 * @time 11:34
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

import {Controller} from '@hotwired/stimulus';

/**
 * @property {HTMLDialogElement} dialogTarget
 * @property {HTMLButtonElement} triggerTarget
 * @property {boolean} hasTriggerTarget
 */
export default class extends Controller {
    static targets = ['trigger', 'dialog'];

    initialize() {
        window.addEventListener('dialog:open', (event) => {
            if (this.dialogTarget.getAttribute('id').endsWith(event.detail.dialogId)) {
                return this.dialogTarget.showModal()
            }
        })
        window.addEventListener('dialog:close', (event) => {
            if (this.dialogTarget.getAttribute('id').endsWith(event.detail.dialogId)) {
                return this.dialogTarget.close()
            }
        })
    }

    connect() {
        if (this.element.hasAttribute('open')) {
            this.dialogTarget.showModal();
        }
    }

    async open() {
        this.dialogTarget.showModal();

        if (this.hasTriggerTarget) {
            if (this.dialogTarget.getAnimations().length > 0) {
                this.dialogTarget.addEventListener('transitionend', () => {
                    this.triggerTarget.setAttribute('aria-expanded', 'true');
                })
            } else {
                this.triggerTarget.setAttribute('aria-expanded', 'true');
            }
        }
    }

    async close() {
        this.dialogTarget.close();

        if (this.hasTriggerTarget) {
            if (this.dialogTarget.getAnimations().length > 0) {
                this.dialogTarget.addEventListener('transitionend', () => {
                    this.triggerTarget.setAttribute('aria-expanded', 'false');
                })
            } else {
                this.triggerTarget.setAttribute('aria-expanded', 'false');
            }
        }
    }
}
