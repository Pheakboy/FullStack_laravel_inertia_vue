

<template>
    <div class="flex flex-col min-h-screen">
        <header class="bg-red-500 shadow-lg sticky top-0 z-50">
            <nav class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-2xl font-bold text-white hover:text-slate-200 transition-colors">
                        <a href="/">Logo</a>
                    </div>
                    <div class="flex gap-8">
                        <a 
                            href="/" 
                            class="text-slate-200 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md transition-colors duration-200 font-medium"
                        >
                            Home
                        </a>
                        <a 
                            href="/about" 
                            class="text-slate-200 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md transition-colors duration-200 font-medium"
                        >
                            About
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <main class="flex-1 p-8 max-w-7xl mx-auto w-full">
            <slot/>
        </main>
    </div>
</template>