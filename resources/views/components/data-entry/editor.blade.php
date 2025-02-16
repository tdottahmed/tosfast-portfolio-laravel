@props([])
@php
    $attributes = $attributes->merge(['id' => $attributes->get('id') ?? uniqid('editor-')]);
    $id = $attributes->get('id');
@endphp

<!-- Hidden textarea to store the content -->
<textarea name="{{ $attributes->get('name') }}" id="{{ $id }}-content" style="display: none">
    {!! $slot !!}
</textarea>

<!-- Visible textarea for TinyMCE initialization -->
<textarea {{ $attributes->except('name') }}>{!! $slot !!}</textarea>

@pushOnce('styles')
    <style>
        figure.image {
            display: inline-block;
            border: 1px solid gray;
            margin: 0 2px 0 1px;
            background: #f5f2f0;
        }

        figure.align-left {
            float: left;
        }

        figure.align-right {
            float: right;
        }

        figure.image img {
            margin: 8px 8px 0 8px;
        }

        figure.image figcaption {
            margin: 6px 8px 6px 8px;
            text-align: center;
        }

        img.align-left {
            float: left;
        }

        img.align-right {
            float: right;
        }

        .mce-toc {
            border: 1px solid gray;
        }

        .mce-toc h2 {
            margin: 4px;
        }

        .mce-toc li {
            list-style-type: none;
        }

        .tox-promotion {
            display: none;
        }

        .tox-statusbar__branding {
            display: none;
        }
    </style>
@endPushOnce

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
            const useDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';

            tinymce.init({
                selector: '#{{ $id }}',
                setup: (editor) => {
                    // Sync content with the hidden textarea on change
                    editor.on('change', function() {
                        document.getElementById('{{ $id }}-content').value = editor
                            .getContent();
                    });

                    // Initialize with the content from the hidden textarea
                    editor.on('init', function() {
                        editor.setContent(document.getElementById('{{ $id }}-content')
                            .value);
                    });
                },
                plugins: 'preview searchreplace autolink save directionality code visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
                editimage_cors_hosts: ['picsum.photos'],
                menubar: true,
                toolbar: `undo redo | link media image table | bold italic underline strikethrough removeformat | forecolor backcolor | numlist bullist | blocks fontsize | align lineheight outdent indent | ltr rtl | charmap emoticons | codesample preview | insertdatetime searchreplace`,
                toolbar_sticky: false,
                images_file_types: 'jpg,jpeg,gif,png,svg,webp',
                file_picker_types: 'file image media',
                image_advtab: true,
                link_list: [{
                        title: 'My page 1',
                        value: 'https://www.tiny.cloud'
                    },
                    {
                        title: 'My page 2',
                        value: 'http://www.moxiecode.com'
                    },
                ],
                image_list: [{
                        title: 'My page 1',
                        value: 'https://www.tiny.cloud'
                    },
                    {
                        title: 'My page 2',
                        value: 'http://www.moxiecode.com'
                    },
                ],
                image_class_list: [{
                        title: 'None',
                        value: ''
                    },
                    {
                        title: 'Some class',
                        value: 'class-name'
                    },
                ],
                importcss_append: true,
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept',
                        'image/*, video/*, audio/*, application/pdf, application/zip');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        const reader = new FileReader();

                        reader.addEventListener('load', () => {
                            const id = 'blobid' + new Date().getTime();
                            const blobCache = tinymce.activeEditor.editorUpload
                                .blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });

                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                min_height: 450,
                max_height: 450,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image table',
                skin: useDarkMode ? 'oxide-dark' : 'oxide',
                content_css: useDarkMode ? 'dark' : 'default',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            });
        });
    </script>
@endPushOnce
