<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Preview - {{ $page->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;family=Inter:wght@300..700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed": "#341100",
                        "surface-tint": "#3a5f94",
                        "on-surface-variant": "#43474f",
                        "primary-fixed": "#d5e3ff",
                        "surface": "#f7f9fc",
                        "surface-dim": "#d8dadd",
                        "on-primary-fixed-variant": "#1f477b",
                        "on-secondary": "#ffffff",
                        "secondary-fixed-dim": "#b8c8da",
                        "on-secondary-fixed": "#0d1d2a",
                        "secondary": "#50606f",
                        "inverse-primary": "#a7c8ff",
                        "surface-variant": "#e0e3e6",
                        "surface-bright": "#f7f9fc",
                        "primary-container": "#003366",
                        "background": "#f7f9fc",
                        "surface-container": "#eceef1",
                        "on-primary-fixed": "#001b3c",
                        "surface-container-highest": "#e0e3e6",
                        "error-container": "#ffdad6",
                        "primary-fixed-dim": "#a7c8ff",
                        "on-error-container": "#93000a",
                        "error": "#ba1a1a",
                        "outline-variant": "#c3c6d1",
                        "on-background": "#191c1e",
                        "surface-container-low": "#f2f4f7",
                        "surface-container-high": "#e6e8eb",
                        "tertiary-fixed-dim": "#ffb690",
                        "on-tertiary-fixed-variant": "#723610",
                        "tertiary": "#381300",
                        "on-primary": "#ffffff",
                        "on-tertiary-container": "#d8885c",
                        "tertiary-container": "#592300",
                        "on-secondary-fixed-variant": "#394857",
                        "primary": "#001e40",
                        "secondary-fixed": "#d4e4f6",
                        "tertiary-fixed": "#ffdbca",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#2d3133",
                        "on-primary-container": "#799dd6",
                        "on-error": "#ffffff",
                        "on-secondary-container": "#556474",
                        "outline": "#737780",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#d1e1f4",
                        "on-surface": "#191c1e",
                        "inverse-on-surface": "#eff1f4"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Manrope", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        .text-balance {
            text-wrap: balance;
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container">

    @foreach($sections as $type => $content)
    @includeIf('sections.' . $page->template . '.' . $type, [
    'data' => $content
    ])
    @endforeach

</body>

</html>