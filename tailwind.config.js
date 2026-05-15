import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', 'serif'],
            },
            colors: {
                brand: {
                    ink: '#10151f',
                    muted: '#647084',
                    cream: '#f6f0e6',
                    gold: '#f4b942',
                    coral: '#e85d56',
                    teal: '#0f766e',
                    navy: '#0c121c',
                    'navy-light': '#1a2639',
                },
                admin: {
                    bg: '#f1f5f9',
                    surface: '#ffffff',
                    ink: '#0f172a',
                    line: '#e2e8f0',
                    muted: '#64748b',
                    primary: '#0f766e',
                    'primary-light': 'rgba(15,118,110,0.08)',
                },
            },
        },
    },

    plugins: [forms],
};
