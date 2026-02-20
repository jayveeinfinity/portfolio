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
                            "primary": "#144bb8",
                            "background-light": "#f8f9fc",
                            "background-dark": "#0e121b",
                        },
                        fontFamily: {
                            "display": ["Inter", "sans-serif"]
                        },
                        borderRadius: {
                            "DEFAULT": "0.125rem",
                            "lg": "0.25rem",
                            "xl": "0.5rem",
                            "full": "9999px"
                        },
                    },
                },
            }
        </script>
        <style>
            body { font-family: 'Inter', sans-serif; }
            .grid-pattern {
                background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
                background-size: 30px 30px;
            }
            .blur-blob {
                filter: blur(80px);
                opacity: 0.4;
                z-index: -1;
            }
        </style>
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="bg-background-light text-[#1f2937] antialiased">
        @inertia
    </body>
</html>