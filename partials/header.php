<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Binary Encoder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
            colors: {
                dark: {
                900: '#0f172a',
                800: '#1e293b',
                700: '#334155',
                }
            }
            }
        }
        }
    </script>
    </head>
    <body class="bg-dark-900 text-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-3xl bg-dark-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
        <h1 class="text-2xl font-bold tracking-tight">Binary Encoder</h1>
        <p class="text-indigo-100 text-sm mt-1">Convert text to binary and binary back to text</p>
        </div>
