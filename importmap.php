<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    'exception_error' => [
        'path' => './assets/exception_error.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.23',
    ],
    '@stimulus-components/notification' => [
        'version' => '3.0.0',
    ],
    'stimulus-use' => [
        'version' => '0.52.3',
    ],
    'hotkeys-js' => [
        'version' => '4.0.0',
    ],
    '@stimulus-components/dropdown' => [
        'version' => '3.0.0',
    ],
    '@tiptap/core' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/transform' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/commands' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/state' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/model' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/schema-list' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/view' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/keymap' => [
        'version' => '3.19.0',
    ],
    'prosemirror-transform' => [
        'version' => '1.11.0',
    ],
    'prosemirror-commands' => [
        'version' => '1.7.1',
    ],
    'prosemirror-state' => [
        'version' => '1.4.4',
    ],
    'prosemirror-model' => [
        'version' => '1.25.4',
    ],
    'prosemirror-schema-list' => [
        'version' => '1.5.1',
    ],
    'prosemirror-view' => [
        'version' => '1.41.6',
    ],
    'prosemirror-keymap' => [
        'version' => '1.2.3',
    ],
    'orderedmap' => [
        'version' => '2.1.1',
    ],
    'w3c-keyname' => [
        'version' => '2.2.8',
    ],
    'prosemirror-view/style/prosemirror.min.css' => [
        'version' => '1.41.6',
        'type' => 'css',
    ],
    '@tiptap/starter-kit' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-blockquote' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-bold' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-code' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-code-block' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-document' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-hard-break' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-heading' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-horizontal-rule' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-italic' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-link' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-list' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-paragraph' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-strike' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-text' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extension-underline' => [
        'version' => '3.19.0',
    ],
    '@tiptap/extensions' => [
        'version' => '3.19.0',
    ],
    '@tiptap/core/jsx-runtime' => [
        'version' => '3.19.0',
    ],
    'linkifyjs' => [
        'version' => '4.3.2',
    ],
    '@tiptap/pm/dropcursor' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/gapcursor' => [
        'version' => '3.19.0',
    ],
    '@tiptap/pm/history' => [
        'version' => '3.19.0',
    ],
    'prosemirror-dropcursor' => [
        'version' => '1.8.2',
    ],
    'prosemirror-gapcursor' => [
        'version' => '1.4.0',
    ],
    'prosemirror-history' => [
        'version' => '1.5.0',
    ],
    'rope-sequence' => [
        'version' => '1.3.4',
    ],
    'prosemirror-gapcursor/style/gapcursor.min.css' => [
        'version' => '1.4.0',
        'type' => 'css',
    ],
];
