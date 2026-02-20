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
                    "primary": "#d41111",
                    "background-light": "#f8f6f6",
                    "background-dark": "#181111",
                    "accent-yellow": "#FFD700",
                    "card-bg": "#271c1c",
                    "border-dark": "#392828"
                },
                fontFamily: {
                    "display": ["Space Grotesk", "sans-serif"]
                },
                borderWidth: {
                    '3': '3px',
                    '4': '4px',
                },
                boxShadow: {
                    'comic': '6px 6px 0px 0px #000',
                    'comic-hover': '2px 2px 0px 0px #000',
                    'comic-red': '6px 6px 0px 0px #d41111',
                },
                borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
            }
        </script>
        <style>
            body {
                font-family: 'Space Grotesk', sans-serif;
                background-color: #181111;
            }
            .comic-border {
                border: 3px solid #000;
            }
            .comic-panel {
                background-image: radial-gradient(#392828 1px, transparent 1px);
                background-size: 15px 15px;
            }
            .speech-bubble {
                position: relative;
                background: #fff;
                border: 3px solid #000;
            }
            .speech-bubble:after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 20%;
                width: 0;
                height: 0;
                border: 15px solid transparent;
                border-top-color: #000;
                border-bottom: 0;
                border-left: 0;
                margin-left: -7.5px;
                margin-bottom: -15px;
            }
        </style>
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 overflow-x-hidden">
        @inertia
    </body>
</html>