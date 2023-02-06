<template>
    <!-- Main container -->
    <div class="flex h-screen justify-center items-center bg-yellow-50">
        <!-- Form -->
        <div class="w-96 bg-white rounded-xl shadow-xl">
            <div class="text-center text-white font-semibold text-2xl p-4 rounded-t-xl bg-gradient-to-r from-cyan-500 to-blue-500">Оставьте заявку</div>
            <form action="" class="p-4">
                <label for="name" class="block">
                    <span class="sr-only">Имя</span>
                    <input type="text" id="name" class="mt-1 block w-full rounded-md border border-slate-300 py-2 pl-4 font-light focus:border-indigo-500 focus:shadow-md placeholder:italic placeholder:text-slate-400" placeholder="Ваше имя">
                </label>
                <label for="name" class=" block mt-4">
                    <span class="sr-only">Электронная почта</span>
                    <input type="text" id="name" class="mt-1 block w-full rounded-md border border-slate-300 py-2 pl-4 font-light focus:border-indigo-500 focus:shadow-md placeholder:italic placeholder:text-slate-400" placeholder="Ваша электронная почта">
                </label>

                <label for="name" class=" block mt-4">
                    <span class="sr-only">Отзыв</span>
                    <textarea type="text" id="name" class="mt-1 block w-full rounded-md border border-slate-300 py-2 pl-4 font-light focus:border-indigo-500 focus:shadow-md placeholder:italic placeholder:text-slate-400 h-48" placeholder="Отзыв"></textarea>
                </label>
                <button type="submit" class="mt-4 w-full rounded-md py-2 px-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold hover:opacity-90">Отправить отзыв</button>
            </form>
        </div>
    </div>
</template>

<script setup>
</script>