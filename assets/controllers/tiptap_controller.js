/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 13/02/2026, 20:34
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file tiptap_controller.js
 * @date 14/02/2026
 * @time 11:19
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

import { Controller } from '@hotwired/stimulus';
import { Editor } from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';

export default class extends Controller {
    static targets = ['input', 'editor', 'toolbar', 'button'];
    static classes = ['active', 'inactive']

    /** @type {Editor} */
    editor;

    initialize() {
        const opts = {
            element: null,
            extensions: [
                StarterKit.configure({codeBlock: false, code: false, link: false}),
            ],
            autofocus: false,
            content: this.inputTarget.value,
            onUpdate: ({editor}) => {
                this.inputTarget.value = editor.getHTML();
                this.updateToolbar();
            },
            onSelectionUpdate: () => {
                this.updateToolbar();
            },
            onTransaction: () => {
                this.updateToolbar();
            },
            editorProps: {
                attributes: {
                    class: 'prose prose-sm max-w-none mx-auto focus:outline-none min-h-[150px] p-4',
                },
            },
        }

        this.editor = new Editor(opts);

    }

    connect() {
        this.editor.mount(this.editorTarget)

        this.updateToolbar();
    }

    disconnect() {
        this.editor.destroy();
    }

    // Métodos para la barra de herramientas
    toggle(event) {
        const name = event.params.name
        const level = event.params.level;
        const toggleName = `toggle${name.charAt(0).toUpperCase() + name.slice(1)}`

        if (name === 'heading') {
            this.editor.chain().focus().toggleHeading({level: level}).run();
        } else if (name === 'undo' || name === 'redo') {
            this.editor.chain().focus()[name]().run();
        } else {
            this.editor.chain().focus()[toggleName]().run();
        }

        this.updateToolbar();
    }

    updateToolbar() {
        if (!this.hasToolbarTarget) return;

        this.buttonTargets.forEach((/** @type {HTMLButtonElement} */ button) => {
            const name = button.dataset.tiptapNameParam;
            const level = button.dataset.tiptapLevelParam;
            const toggleName = `toggle${name.charAt(0).toUpperCase() + name.slice(1)}`;

            const {isActive, isDisabled} = this.#buttonState(name, toggleName, level);

            button.disabled = isDisabled

            button.classList.remove('bg-gray-200', 'dark:bg-gray-700', 'text-black', 'dark:text-white')
            button.classList.add('text-gray-600', 'dark:text-gray-400')

            if (isActive) {
                button.classList.add('bg-gray-200', 'dark:bg-gray-700', 'text-black', 'dark:text-white')
                button.classList.remove('text-gray-600', 'dark:text-gray-400')
            }
        });
    }

    #buttonState(name, toggleName, level) {
        let isActive = false
        let isDisabled = false

        if (name === 'heading') {
            return this.#buttonHeader(name, toggleName, level)
        } else if (name === 'undo' || name === 'redo') {
            return this.#buttonUndoRedo(name)
        }

        // Verificar si el comando se puede ejecutar
        if (typeof this.editor.can().chain().focus()[toggleName] === 'function') {
            isDisabled = !this.editor.can().chain().focus()[toggleName]().run()
        }

        isActive = this.editor.isActive(name)

        return {
            isActive,
            isDisabled,
        }
    }

    #buttonHeader(name, toggleName, level) {
        let isActive = false
        let isDisabled = false

        return {
            isActive,
            isDisabled,
        }
    }

    #buttonUndoRedo(name) {
        let isActive = false
        let isDisabled = !this.editor.can().chain().focus()[name]().run()

        return {
            isActive,
            isDisabled,
        }
    }
}
