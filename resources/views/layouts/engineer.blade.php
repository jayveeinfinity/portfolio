<!DOCTYPE html>
<html class="dark">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "primary": "#135bec",
                            "background-light": "#f6f6f8",
                            "background-dark": "#101622",
                            "border-muted": "#232f48",
                            "text-muted": "#92a4c9"
                        },
                        fontFamily: {
                            "display": ["Space Grotesk", "sans-serif"],
                            "sans": ["Space Grotesk", "sans-serif"]
                        },
                        borderRadius: {
                            "DEFAULT": "0.25rem",
                            "lg": "0.5rem",
                            "xl": "0.75rem",
                            "full": "9999px"
                        },
                    },
                },
            }
        </script>
        <style>
            body {
                background-image: 
                    linear-gradient(to right, rgba(35, 47, 72, 0.1) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(35, 47, 72, 0.1) 1px, transparent 1px);
                background-size: 40px 40px;
            }
            .blueprint-clip {
                clip-path: polygon(0% 0%, 100% 0%, 100% 90%, 95% 100%, 0% 100%);
            }
            .technical-line {
                background: repeating-linear-gradient(90deg, #135bec, #135bec 2px, transparent 2px, transparent 10px);
            }
        </style>
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="bg-background-light dark:bg-background-dark font-display text-white selection:bg-primary selection:text-white">
        @inertia
    </body>
</html>